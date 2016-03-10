// initial stuff to do when page loads
function initial_stuff() {
	fixConsole();
	loadImages();
}

function loadImages() {
	globals.gImage = new Image();
	globals.gImage.src = 'dominos.png';
	globals.gImage.onload = function() { loadJSON(); }
}

function loadJSON()
{
	var url = "dominos.json";
	
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		globals.xmlhttp=new XMLHttpRequest();
		globals.xmlhttp.abort();
		globals.xmlhttp.onreadystatechange = GotAsyncData;
		globals.xmlhttp.open("GET", url, true);
		globals.xmlhttp.send(null);
	}
	else
	{// code for IE6, IE5
		//globals.xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		globals.xmlhttp=new ActiveXObject("MSXML2.XMLHTTP.3.0");
		if (globals.xmlhttp) {
			globals.xmlhttp.abort();
			globals.xmlhttp.onreadystatechange = GotAsyncData;
			globals.xmlhttp.open("GET", url, true);
			globals.xmlhttp.send();
		}
	}

}

// GotAsyncData is the read callback for the above XMLHttpRequest() call.
// This routine is not executed until data arrives from the request.
// We update the "fifo_data" area on the page when data does arrive.
function GotAsyncData() {
	// only if xmlhttp shows "loaded"
	if (globals.xmlhttp.readyState != 4) return;
	
	// for when we're calling this page from the web
	if (globals.xmlhttp.statusText != "") {
		if (globals.xmlhttp.status != 200) return;
	
	// calling it locally, status seems to stay as zero, not 200
	} else {
		if (globals.xmlhttp.status != 0) return;
	}
	
	parseAtlas();
	init();
}

function parseAtlas() {
	var parsed = JSON.parse(globals.xmlhttp.responseText);
	
	for(var key in parsed.frames) {
		globals.gSpriteSheet[parsed.frames[key].filename] = parsed.frames[key];
	}
}

function init() {
	var HEADER_HEIGHT = 50;
	var FOOTER_HEIGHT = 50;
	var SIDEBAR_WIDTH = 100;

	if (!isCanvasSupported()) {
		document.getElementById('body').innerText = "Your browser doesn't support HTML5 - try Chrome!";
		return;
	}

	if (navigator.sayswho[0] != 'Chrome') {
		alert("It appears you're using " + navigator.sayswho[0] + ", but this game was developed and tested using Chrome (v26.0.1410.43) - it may not work!");
	}
	
	parseAtlas();
	
	var ctx; var sprite;
	
	// header
	var header = document.getElementById('cnvHeader');
	header.width = window.innerWidth-SIDEBAR_WIDTH;
	header.height = HEADER_HEIGHT;
	ctx = header.getContext('2d');
	sprite = globals.gSpriteSheet['wood.jpeg'];
	console.log('draw header background');
	for (var i=0; i<Math.ceil(window.innerWidth/sprite.frame.w); i++) {
		ctx.drawImage(globals.gImage,sprite.frame.x,sprite.frame.y,sprite.frame.w,HEADER_HEIGHT,i*sprite.frame.w,0,sprite.frame.w,HEADER_HEIGHT );
	}
	console.log('draw header background - done');
	ctx.fillStyle = "#FFFFFF";
  ctx.font = "bold 24px Verdana";
  ctx.fillText("HTML5 Dominos Game", 100, 30);
  
	// footer
	var footer = document.getElementById('cnvFooter');
	footer.width = window.innerWidth-SIDEBAR_WIDTH;
	footer.height = FOOTER_HEIGHT;
	ctx = footer.getContext('2d');
	sprite = globals.gSpriteSheet['wood.jpeg'];
	for (var i=0; i<Math.ceil(window.innerWidth/sprite.frame.w); i++)
		ctx.drawImage(globals.gImage,sprite.frame.x,sprite.frame.y,sprite.frame.w,FOOTER_HEIGHT,i*sprite.frame.w,0,sprite.frame.w,FOOTER_HEIGHT );

	// sidebar
	var sideBar = document.getElementById('cnvSideBar');
	sideBar.width = SIDEBAR_WIDTH;
	sideBar.height = window.innerHeight;
	ctx = sideBar.getContext('2d');
	sprite = globals.gSpriteSheet['wood.jpeg'];
	ctx.drawImage(globals.gImage,sprite.frame.x,sprite.frame.y,SIDEBAR_WIDTH,sprite.frame.h,0,0,SIDEBAR_WIDTH,window.innerHeight);

	ctx.fillStyle = "#FFFFFF";
	ctx.font = "normal 12px Verdana";

	// draw New Game button
	sprite = globals.gSpriteSheet['new_game.png'];
	globals.gNewGameBtn.w = SIDEBAR_WIDTH - 20;
	globals.gNewGameBtn.h = sprite.frame.h;
	ctx.drawImage(globals.gImage,sprite.frame.x,sprite.frame.y,sprite.frame.w,sprite.frame.h,globals.gNewGameBtn.x,globals.gNewGameBtn.y,globals.gNewGameBtn.w,globals.gNewGameBtn.h);
	
	// draw Turn button
	sprite = globals.gSpriteSheet['start_turn.png'];
	globals.gTurnBtn.w = SIDEBAR_WIDTH - 20;
	globals.gTurnBtn.h = sprite.frame.h;
	ctx.drawImage(globals.gImage,sprite.frame.x,sprite.frame.y,sprite.frame.w,sprite.frame.h,globals.gTurnBtn.x,globals.gTurnBtn.y,globals.gTurnBtn.w,globals.gTurnBtn.h);
	
	// main game area
	var cnvGame = document.getElementById('cnvGame');
	ctx = cnvGame.getContext('2d');
	sprite = globals.gSpriteSheet['green.png'];
	cnvGame.width = window.innerWidth - cnvSideBar.width;
	cnvGame.height = window.innerHeight - cnvHeader.height - cnvFooter.height;
	ctx.clearRect(0,0,cnvGame.width,cnvGame.height);	
	ctx.drawImage(globals.gImage,sprite.frame.x,sprite.frame.y,sprite.frame.w,sprite.frame.h,0,0,cnvGame.width,cnvGame.height);
}
