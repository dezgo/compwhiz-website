@extends('master')

@section('content')
<img src='/images/logo.png' />
<h1>Running the Quick Support module</h1>
<p>
Step 1: Click the below link:<br />
<a target="qs" href="http://get.teamviewer.com/computerwhiz_qs">
    http://get.teamviewer.com/computerwhiz_qs</a>
</p>
<iframe style="visibility:hidden;display:none" name="qs"></iframe>

<p id='HelpIE' style="visibility:hidden;display:none">
    Step 2: Watch for a message like this appear at the bottom of your screen<br /><br />
    <img src='/images/ie11-1.png' /><br /><br />
    Step 3: Click run and wait for it to finish. Next you'll see a message like this<br /><br />
    <img src='/images/ie11-2.png' /><br /><br />
    Step 4: Click 'Yes' and you should then see the Quick Support module<br /><br />
    <img src='/images/teamviewer_qs_win.png' /><br /><br />
    After a few seconds, the session code and your name boxes will be filled in<br />
</p>
<p id='HelpChrome' style="visibility:hidden;display:none">
    Step 2: Watch for a message like this appear at the bottom of your screen<br /><br />
    <img src='/images/chrome-1.png' /><br /><br />
    Step 3: Click run and wait for it to finish. Next you'll see a message like this<br /><br />
    <img src='/images/chrome-2.png' /><br /><br />
    Step 4: Click 'Yes' and you should then see the Quick Support module<br /><br />
    <img src='/images/teamviewer_qs_win.png' /><br /><br />
    After a few seconds, the session code and your name boxes will be filled in<br />
</p>
<p id='HelpEdge' style="visibility:hidden;display:none">
    Step 2: Watch for a message like this appear at the bottom of your screen<br /><br />
    <img src='/images/edge-1.png' /><br /><br />
    Step 3: Once the download has finished, you'll see a message like this<br /><br />
    <img src='/images/edge-2.png' /><br /><br />
    Step 4: Click 'Run' and you should then see the Quick Support module<br /><br />
    <img src='/images/teamviewer_qs_win.png' /><br /><br />
    After a few seconds, the session code and your name boxes will be filled in<br />
</p>
<p id='HelpFirefox' style="visibility:hidden;display:none">
    Step 2: A message like this will appear asking you what to do<br /><br />
    <img src='/images/firefox-1.png' /><br /><br />
    Step 3: Click 'Save File'. You'll then see a progress icon at the top-right corner of your screen. If
    you click it, you'll see the support module downloading<br /><br />
    <img src='/images/firefox-2.png' /><br /><br />
    Step 4: Once finished, that progress icon will change to a down-arrow and flash blue.<br /><br />
    <img src='/images/firefox-3.png' /><br /><br />
    Step 5: Click the filename above to run it.<br /><br />
    <img src='/images/firefox-4.png' /><br /><br />
    Step 6: Confirm that you want to run it by clicking 'Run', and you should see the
    remote support module appear (please be patient, it can take some time).<br /><br />
    <img src='/images/teamviewer_qs_win.png' /><br /><br />
    After a few seconds, the session code and your name boxes will be filled in<br />
</p>
<p>
    If you have any trouble, we might want to know what browser you're using
    (hint: it's <span id='browser_version'></span>)
</p>

@stop

@section('footer')
<script language="javascript" src="js/bowser.js"></script>
<script language="javascript">
    var browser_version = bowser.name + ' version ' + bowser.version;
    document.getElementById('browser_version').innerHTML = browser_version;
    if (bowser.name == 'Internet Explorer') {
        document.getElementById('HelpIE').style.display = '';
        document.getElementById('HelpIE').style.visibility = '';
    }
    else if (bowser.name == 'Chrome') {
        document.getElementById('HelpChrome').style.display = '';
        document.getElementById('HelpChrome').style.visibility = '';
    }
    else if (bowser.name == 'Microsoft Edge') {
        document.getElementById('HelpEdge').style.display = '';
        document.getElementById('HelpEdge').style.visibility = '';
    }
    else if (bowser.name == 'Firefox') {
        document.getElementById('HelpFirefox').style.display = '';
        document.getElementById('HelpFirefox').style.visibility = '';
    }
</script>
@stop
