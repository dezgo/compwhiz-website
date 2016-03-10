function CanvasState(canvas) {
  // **** First some setup! ****
  
  this.canvas = canvas;
  this.width = canvas.width;
  this.height = canvas.height;
  this.ctx = canvas.getContext('2d');
  // This complicates things a little but fixes mouse co-ordinate problems
  // when there's a border or padding. See getMouse for more detail
  var stylePaddingLeft, stylePaddingTop, styleBorderLeft, styleBorderTop;
  if (document.defaultView && document.defaultView.getComputedStyle) {
    this.stylePaddingLeft = parseInt(document.defaultView.getComputedStyle(canvas, null)['paddingLeft'], 10)      || 0;
    this.stylePaddingTop  = parseInt(document.defaultView.getComputedStyle(canvas, null)['paddingTop'], 10)       || 0;
    this.styleBorderLeft  = parseInt(document.defaultView.getComputedStyle(canvas, null)['borderLeftWidth'], 10)  || 0;
    this.styleBorderTop   = parseInt(document.defaultView.getComputedStyle(canvas, null)['borderTopWidth'], 10)   || 0;
  }
  // Some pages have fixed-position bars (like the stumbleupon bar) at the top or left of the page
  // They will mess up mouse coordinates and this fixes that
  var html = document.body.parentNode;
  this.htmlTop = html.offsetTop;
  this.htmlLeft = html.offsetLeft;

  // **** Keep track of state! ****
  
  this.valid = false; // when set to false, the canvas will redraw everything
  this.dominos = [];  // the collection of things to be drawn
  this.dragging = false; // Keep track of when we are dragging
  // the current selected object. In the future we could turn this into an array for multiple selection
  this.selection = null;
  this.dragoffx = 0; // See mousedown and mousemove events for explanation
  this.dragoffy = 0;
	this.allowRotate = false;
  
  // **** Then events! ****
  
  // This is an example of a closure!
  // Right here "this" means the CanvasState. But we are making events on the Canvas itself,
  // and when the events are fired on the canvas the variable "this" is going to mean the canvas!
  // Since we still want to use this particular CanvasState in the events we have to save a reference to it.
  // This is our reference!
  var myState = this;
  
  //fixes a problem where double clicking causes text to get selected on the canvas
  canvas.addEventListener('selectstart', function(e) { e.preventDefault(); return false; }, false);
  // Up, down, and move are for dragging
  canvas.addEventListener('mousedown', function(e) {
    var mouse = myState.getMouse(e);
		myState.allowRotate = true;
    var mx = mouse.x;
    var my = mouse.y;
    var dominos = myState.dominos;
    var l = dominos.length;
    for (var i = l-1; i >= 0; i--) {
    	// check if mouse is over this domino and it's in the current player's hand
      if (dominos[i].contains(mx, my) && globals.gHands[globals.gameObj.playerTurn].hasDomino(dominos[i].top, dominos[i].bottom)) {
        var mySel = dominos[i];
        mySel.inPlay = true;
        // Keep track of where in the object we clicked
        // so we can move it smoothly (see mousemove)
        myState.dragoffx = mx - mySel.x;
        myState.dragoffy = my - mySel.y;
        myState.dragging = true;
        myState.selection = mySel;
        myState.valid = false;
        return;
      }
    }
    // havent returned means we have failed to select anything.
    // If there was an object selected, we deselect it
    if (myState.selection) {
      myState.selection = null;
      myState.valid = false; // Need to clear the old selection border
    }
  }, true);
	canvas.addEventListener('click', function(e) {
		var mouse = myState.getMouse(e);
    var mx = mouse.x;
    var my = mouse.y;
    var dominos = myState.dominos;
    var l = dominos.length;
    for (var i = l-1; i >= 0; i--) {
      if (dominos[i].contains(mx, my) && globals.gHands[globals.gameObj.playerTurn].hasDomino(dominos[i].top, dominos[i].bottom)) {
        var mySel = dominos[i];
        globals.gameObj.selectedDomino = mySel;

				// only rotate the domino if appropriate (ie. not being dragged)
				if (myState.allowRotate) mySel.rotate();
				myState.valid = false;
        return;
      }
    }
	}, true);
	canvas.addEventListener('mousemove', function(e) {
    if (myState.dragging){
			myState.allowRotate = false;
      var mouse = myState.getMouse(e);
      // We don't want to drag the object by its top-left corner, we want to drag it
      // from where we clicked. Thats why we saved the offset and use it here
      myState.selection.x = mouse.x - myState.dragoffx;
      myState.selection.y = mouse.y - myState.dragoffy;   
      myState.valid = false; // Something's dragging so we must redraw
    }
  }, true);
  canvas.addEventListener('mouseup', function(e) {
		myState.dragging = false;		
  }, true);
  // double click for making new dominos

  // **** Options! ****
  
  this.selectionColor = '#CC0000';
  this.selectionWidth = 2;  
  this.interval = 10;
  setInterval(function() { myState.draw(); }, myState.interval);
}

CanvasState.prototype.addDomino = function(domino) {
  this.dominos.push(domino);
  this.valid = false;
}

CanvasState.prototype.clear = function() {
  this.ctx.clearRect(0, 0, this.width, this.height);
}

// While draw is called as often as the INTERVAL variable demands,
// It only ever does something if the canvas gets invalidated by our code
CanvasState.prototype.draw = function() {
  // if our state is invalid, redraw and validate!
  if (!this.valid) {
  	var playerRect = {x: 0, y: 0, w: 0, h: 0};
    var ctx = this.ctx;
    var dominos = this.dominos;
    this.clear();
    
    // ** Add stuff you want drawn in the background all the time here **
    
    // draw felt first so other stuff goes on top
		var sprite = globals.gSpriteSheet['green.png'];
		ctx.drawImage(globals.gImage,sprite.frame.x,sprite.frame.y,sprite.frame.w,sprite.frame.h,0,0,this.canvas.width,this.canvas.height);
    
    // write player text and highlight current player
		for (var playerNum=0; playerNum<4; playerNum++) {
			if (globals.gameObj.playerTurn == playerNum) {
				ctx.font = "bold 26px verdana";
				ctx.fillStyle = "#FFFFFF";
			} else {
				ctx.font = "normal 22px verdana";
				ctx.fillStyle = "#FFFFFF";
			}

			if (playerNum < 2)
				playerRect.x = 5;
			else
				playerRect.x = this.canvas.width-(globals.dimg_w*globals.dimg_scale+5)*7;
			
			if (playerNum % 2 == 1)
				playerRect.y = this.canvas.height-globals.dimg_h*globals.dimg_scale-12;
			else
				playerRect.y = globals.dimg_h*globals.dimg_scale+25;
		
			ctx.fillText("Player " + (playerNum+1), playerRect.x, playerRect.y);
		
		}
		
    // draw all dominos
    var l = dominos.length;
    for (var i = 0; i < l; i++) {
      var domino = dominos[i];
      // We can skip the drawing of elements that have moved off the screen:
      if (domino.x > this.width || domino.y > this.height ||
          domino.x + domino.w < 0 || domino.y + domino.h < 0) continue;
      domino.draw(ctx,false,this.selection);
    }
    
    // draw selection
    // right now this is just a stroke along the edge of the selected Domino
    if (this.selection != null) {
      ctx.strokeStyle = this.selectionColor;
      ctx.lineWidth = this.selectionWidth;
      var mySel = this.selection;
 
			var diff = (this.selection.h-this.selection.w)/2;
			if (this.selection.orientation % 2 == 0)
				ctx.strokeRect(mySel.x,mySel.y,mySel.w,mySel.h);
			else
				ctx.strokeRect(mySel.x-diff,mySel.y+diff,mySel.w+diff*2,mySel.h-diff*2);
    }
    
    // ** Add stuff you want drawn on top all the time here **
    
    this.valid = true;
  }
}


// Creates an object with x and y defined, set to the mouse position relative to the state's canvas
// If you wanna be super-correct this can be tricky, we have to worry about padding and borders
CanvasState.prototype.getMouse = function(e) {
  var element = this.canvas, offsetX = 0, offsetY = 0, mx, my;
  
  // Compute the total offset
  if (element.offsetParent !== undefined) {
    do {
      offsetX += element.offsetLeft;
      offsetY += element.offsetTop;
    } while ((element = element.offsetParent));
  }

  // Add padding and border style widths to offset
  // Also add the <html> offsets in case there's a position:fixed bar
  offsetX += this.stylePaddingLeft + this.styleBorderLeft + this.htmlLeft;
  offsetY += this.stylePaddingTop + this.styleBorderTop + this.htmlTop;

  mx = e.pageX - offsetX;
  my = e.pageY - offsetY;
  
  // We return a simple javascript object (a hash) with x and y defined
  return {x: mx, y: my};
}