function saveState(state) {
    window.localStorage.setItem("gameState", JSON.stringify(state));
}
 
function restoreState() {
    var state = window.localStorage.getItem("gameState");
    if (state) {
        return JSON.parse(state);
    } else {
        return null;
    }
}

function isCanvasSupported(){
  var elem = document.createElement('canvas');
  return !!(elem.getContext && elem.getContext('2d'));
}

navigator.sayswho= (function(){
    var N= navigator.appName, ua= navigator.userAgent, tem;
    var M= ua.match(/(opera|chrome|safari|firefox|msie)\/?\s*(\.?\d+(\.\d+)*)/i);
    if(M && (tem= ua.match(/version\/([\.\d]+)/i))!= null) M[2]= tem[1];
    M= M? [M[1], M[2]]: [N, navigator.appVersion, '-?'];

    return M;
})();

/**
 * Call once at beginning to ensure your app can safely call console.log() and
 * console.dir(), even on browsers that don't support it.  You may not get useful
 * logging on those browers, but at least you won't generate errors.
 * 
 * @param  alertFallback - if 'true', all logs become alerts, if necessary. 
 *   (not usually suitable for production)
 */
function fixConsole(alertFallback)
{    
    if (typeof console === "undefined")
    {
        console = {}; // define it if it doesn't exist already
    }
    if (typeof console.log === "undefined") 
    {
        if (alertFallback) { console.log = function(msg) { alert(msg); }; } 
        else { console.log = function() {}; }
    }
    if (typeof console.dir === "undefined") 
    {
        if (alertFallback) 
        { 
            // THIS COULD BE IMPROVED… maybe list all the object properties?
            console.dir = function(obj) { alert("DIR: "+obj); }; 
        }
        else { console.dir = function() {}; }
    }
}