function DominoSet(canvas) {
	this.dominos = [];	
	this.canvas = canvas;
}

DominoSet.prototype.createAll = function() {
	for (var top=0; top<7; top++)
		for (var bottom=top; bottom<7; bottom++) {
			domino = new Domino(top,bottom,0,0,0);
			this.dominos.push(domino);
		}

}

DominoSet.prototype.pickRandom = function() {
	return this.dominos.splice(Math.floor(Math.random() * this.dominos.length),1)[0];
}

