// By Simon Sarris
// www.simonsarris.com
// sarris@acm.org
//
// Last update December 2011
//
// Free to use and distribute at will
// So long as you are nice to people, etc

// Constructor for Domino objects to hold data for all drawn objects.
// For now they will just be defined as rectangles.
function Domino(top, bottom, x, y, orientation) {
	if (top < 0 || top > 6 || bottom < 0 || bottom > 6)
		console.log("top and bottom must be between 0 and 6");
	else {
		this.top = top;
		this.bottom = bottom;
	}
	
	this.homeX = null;
	this.homeY = null;
	
	this.x = x || 0;
	this.y = y || 0;
	
	this.w = globals.dimg_w * globals.dimg_scale;
	this.h = globals.dimg_h * globals.dimg_scale;
	
	this.hidden = true;
	this.inPlay = false;
	this.orientation = orientation;
}

Domino.prototype.setHome = function() {
	this.homeX = this.x;
	this.homeY = this.y;
}

Domino.prototype.rotate = function() {
	this.orientation++;
	this.orientation = this.orientation % 4;
}
	
Domino.prototype.draw = function(ctx, hidden, sel) {
	var snapDistance = 16;

	if (this.top < 0)
		console.log("Can't draw domino - it hasn't been rolled yet");
	else {
		// check if we're close to the domino's home position - if we are, snap to it
		if (sel && (this == sel)) {
			var dist = Math.sqrt(Math.pow(Math.abs(sel.x - this.homeX),2) + Math.pow(Math.abs(sel.y - this.homeY),2));
			if (dist < snapDistance) {
				this.x = this.homeX;
				this.y = this.homeY;
        globals.gameObj.selectedDomino = null;
				this.inPlay = false;
			} else
				this.inPlay = true;
				this.x = Math.round(this.x / snapDistance,0) * snapDistance;
				this.y = Math.round(this.y / snapDistance,0) * snapDistance;
			
		}
		
		ctx.translate(this.x + this.w/2, this.y + this.h/2);
		ctx.rotate(this.orientation * Math.PI/2);
		if (this.hidden == true) {
			var sprite = globals.gSpriteSheet['black.png'];
		} else {
			var sprite = globals.gSpriteSheet['Domino'+this.bottom + this.top+'.png'];
		}
		ctx.drawImage(globals.gImage, sprite.frame.x, sprite.frame.y, sprite.frame.w, sprite.frame.h, -this.w/2, -this.h/2, this.w, this.h);
		ctx.rotate(-this.orientation * Math.PI/2);
		ctx.translate(-this.x - this.w/2, -this.y - this.h/2);
	}
}

// Determine if a point is inside the domino's bounds
Domino.prototype.contains = function(mx, my) {
	// All we have to do is make sure the Mouse X,Y fall in the area between
	// the domino's X and (X + Height) and its Y and (Y + Height)
	var diff = (this.h-this.w)/2;
	if (this.orientation % 2 == 0)
		return  (this.x <= mx) && (this.x + this.w >= mx) &&
						(this.y <= my) && (this.y + this.h >= my);
	else
		return  (this.x - diff <= mx) && (this.x + this.w + diff >= mx) &&
						(this.y + diff <= my) && (this.y + this.h - diff >= my);
}
