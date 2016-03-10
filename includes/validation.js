function validateEmail(sEmail)
{
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (re.test(sEmail) == false) {
	  alert("The e-mail address you entered appears to be invalid");
	  return false;
  	}
  	return true;
}

function validateRequired(sField, sMsg) {
	if (sField==null || sField=="") {
		alert(sMsg);
		return false;
	}
	return true;
}

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34497064-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
  