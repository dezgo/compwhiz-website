function Hand(pdominoSet) {
	this.dominos = [];
	this.dominoSet = pdominoSet;
	this.playerNum = -1;
	this.ctx = this.dominoSet.canvas.getContext('2d');
}

Hand.prototype.pickupRandom = function(numDominos) {
	var margin = 2;
	for (var i=0; i<numDominos; i++) {
		var domino = this.dominoSet.pickRandom();
		var offsetX = 0; var offsetY = 0;
		switch (this.playerNum) {
			case 0: offsetX = margin; offsetY = margin; break;
			case 1: offsetX = margin; offsetY = this.dominoSet.canvas.height - globals.dimg_h * globals.dimg_scale - margin; break;
			case margin: offsetX = this.dominoSet.canvas.width - (globals.dimg_w * globals.dimg_scale + 5) * 7 - margin; offsetY = margin; break;
			case 3: offsetX = this.dominoSet.canvas.width - (globals.dimg_w * globals.dimg_scale + 5) * 7 - margin; offsetY = margin; offsetY = this.dominoSet.canvas.height - globals.dimg_h * globals.dimg_scale; break;
		}
		domino.x = offsetX + (domino.w+5) * this.dominos.length;
		domino.y = offsetY;
		domino.setHome();
		this.dominos.push(domino);
	}
}

Hand.prototype.hasDomino = function(top,bottom) {
	for (var domino in this.dominos) {
		if (this.dominos[domino].top == top && this.dominos[domino].bottom == bottom)
			return true;
	}
	return false;
}

Hand.prototype.placeDomino = function(top,bottom,posX,posY) {
	var found = false;

	for (var domino in this.dominos) {
		if (domino.top == top && domino.bottom == bottom) {
			domino.x = posX;
			domino.y = posY;
			found = true;
		}
	}
	
	if (found == false) {
		console.log('domino not found in hand');
	}
}