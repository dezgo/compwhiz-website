@extends('master')

@section('content')
<div class="home" align="middle">
	<img src="/images/spacer.png" height="300px"><br />
    <img src="/images/home_buttons.png" width="303" height="517" border="0" usemap="#cwhomemap" />
    <map name="cwhomemap">
      <area shape="rect" coords="97,272,197,297" href="#mission" alt="Mission">
      <area shape="rect" coords="92,345,203,368" href="#services" alt="Services">
      <area shape="rect" coords="99,417,199,439" href="#contact" alt="Contact">
      <area shape="rect" coords="115,480,173,521" href="#mission" alt="Down">
    </map>
<br />
	<img src="/images/spacer.png" height="80px">
</div>
<br />
<a name="mission"></a>
<div class="mission">
    <div class="row">
        <div class="col-md-5"><img width="100%" src="/images/collage.png" /></div>
        <div class="col-md-5" valign="top">
        <h1>Mission</h1>
        Hi, I'm Derek Gillett and I run Computer Whiz - Canberra. My goal is to provide a high-quality,
                timely, professional IT support services for small to medium sized businesses and home users in Canberra and Queanbeyan.<Br>
                <br>
                High-quality, because I have over 20 years experience in the I.T. field. I've run I.T. support
                businesses both locally and interstate as well as worked as an independent consultant, and with
                a large Canberra firm.<br>
                <br>
                And timely because prompt service is important. You have a business to run, and when things go
                amiss, you need to quickly get back up and running.<br>
	<img src="/images/spacer.png" height="80px">
        </div>
    </div>
</div>
<img src="/images/spacer.png" height="20px"><br />
<div align="center">
    <a href="#services"><img src="/images/arrow.png"></a>
</div>
<img src="/images/spacer.png" height="20px"><br />

<a name="services"></a>
<h1 align="center">Services</h1>
	<img src="/images/spacer.png" height="20px"><br>
<div class="services">
	<img src="/images/spacer.png" height="80px"><br>
    <div class="row">
        <div class="col-md-3">
			<div class="services-box">
				<div class="vcenter">
           			Malware / Virus Removal
				</div>
			</div>
	    </div>
		<div class="col-md-3">
			<div class="services-box">
				<div class="vcenter">
           			Regular PC/Network Health Checks
	            </div>
			</div>
	    </div>
		<div class="col-md-3">
			<div class="services-box">
				<div class="vcenter">
           			A Secure &amp; Functional Website
				</div>
			</div>
	    </div>
		<div class="col-md-3">
			<div class="services-box">
				<div class="vcenter">
           			Robust Disaster Recovery Plan
				</div>
            </div>
	    </div>
    </div>
    <div class="row">
	&nbsp;
    </div>
    <div class="row">
		<div class="col-md-3">
			<div class="services-box">
				<div class="vcenter">
	           		Up-To_date Antivirus Software
				</div>
            </div>
	    </div>
		<div class="col-md-3">
			<div class="services-box">
				<div class="vcenter">
	           		Staff Training
				</div>
            </div>
	    </div>
		<div class="col-md-3">
			<div class="services-box">
				<div class="vcenter">
	           		High Quality Backup System
				</div>
            </div>
	    </div>
		<div class="col-md-3">
			<div class="services-box">
				<div class="vcenter">
	           		Advice When Purchasing New Hardware
				</div>
            </div>
	    </div>
    </div>

    <div class="row">
        <div class="col-md-1">&nbsp;</div>
        <div class="col-md-4">
            <h3>We support different platforms</h3>
            <ul>
                <li>Desktop / Laptop computers (PC and Mac)</li>
                <li>Mobiles / Tablets (iOS and Android)</li>
                <li>Servers / Network Infrastructure</li>
            </ul>
        </div>
        <div class="col-md-2">&nbsp;</div>
        <div class="col-md-4">
            <h3>Remote support</h3>
            <p>
            <b><u>Want remote support now?</u></b>
			Run the <a target="qs" href="http://get.teamviewer.com/computerwhiz_qs">
                    Computer Whiz - Canberra Quick Support module</a>, then give us a call
                    and we can login and take a look.
            </p>
            <p>
            <b><u>Need help</u></b>
            You can <a href='/remote-support-help'>follow our instructions</a>
            </p>
			<iframe style="visibility:hidden;display:none" name="qs"></iframe>
        </div>
        <div class="col-md-1">&nbsp;</div>
    </div>
	<img src="/images/spacer.png" height="40px"><br />
</div>
	<img src="/images/spacer.png" height="40px"><br />
    <div align="center">
		<a href="#contact"><img src="/images/arrow.png"></a>
    </div>
	<img src="/images/spacer.png" height="40px"><br />


<a name="contact"></a>
<h1 align="center">Contact</h1>
	<img src="/images/spacer.png" height="40px"><br />
<div class="contact textMedium">
	<img src="/images/spacer.png" height="40px"><br />
Location: Red Hill, ACT<br>
<br>
<b>Email: <a class="contact" href="mailto:web@computerwhiz.com.au">web@computerwhiz.com.au</a><br>
<br>
Office: 02 6112 8025<br>
Mobile: 0474 029 265<br>
<br>
Book Online: </b> <a target="_blank" class="contact" href="http://computerwhiz.simplybook.me/">http://computerwhiz.simplybook.me</a><br>
<br>
</div>

@if (!session()->has('message'))

<div class="contact textBig">
	<img src="/images/bubble.png">
	<b>Request a callback</b>
</div>

<div class="contact">
	<form class="form-horizontal" action="/callback" method="post">
		{{ csrf_field() }}
	  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
		<label for="name" class="col-sm-2 control-label">Name</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ old('name') }}">
			@if ($errors->has('name'))
				<span class="help-block">
					<strong>{{ $errors->first('name') }}</strong>
				</span>
			@endif
		</div>
	  </div>
	  <div class="form-group">
		<label for="phone_number" class="col-sm-2 control-label">Phone Number</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Phone Number" value="{{ old('phone_number') }}">
			@if ($errors->has('phone_number'))
				<span class="help-block">
					<strong class="contact">{{ $errors->first('phone_number') }}</strong>
				</span>
			@endif
			</div>
		</div>
		<div class="form-group">
		<label for="best_time" class="col-sm-2 control-label">Best time</label>
		<div class="col-sm-8">
			<select class="form-control" name="best_time" id="best_time">
				<option value=''></option>
				<option{{ old('best_time') == '8:00 AM' ? ' selected' : '' }} value="8:00 AM">8:00 AM</option>
				<option{{ old('best_time') == '9:00 AM' ? ' selected' : '' }} value="9:00 AM">9:00 AM</option>
				<option{{ old('best_time') == '10:00 AM' ? ' selected' : '' }} value="10:00 AM">10:00 AM</option>
				<option{{ old('best_time') == '11:00 AM' ? ' selected' : '' }} value="11:00 AM">11:00 AM</option>
				<option{{ old('best_time') == '12:00 PM' ? ' selected' : '' }} value="12:00 PM">12:00 PM</option>
				<option{{ old('best_time') == '1:00 PM' ? ' selected' : '' }} value="1:00 PM">1:00 PM</option>
				<option{{ old('best_time') == '2:00 PM' ? ' selected' : '' }} value="2:00 PM">2:00 PM</option>
				<option{{ old('best_time') == '3:00 PM' ? ' selected' : '' }} value="3:00 PM">3:00 PM</option>
				<option{{ old('best_time') == '4:00 PM' ? ' selected' : '' }} value="4:00 PM">4:00 PM</option>
				<option{{ old('best_time') == '5:00 PM' ? ' selected' : '' }} value="5:00 PM">5:00 PM</option>
				<option{{ old('best_time') == '6:00 PM' ? ' selected' : '' }} value="6:00 PM">6:00 PM</option>
				<option{{ old('best_time') == '7:00 PM' ? ' selected' : '' }} value="7:00 PM">7:00 PM</option>
				<option{{ old('best_time') == '8:00 PM' ? ' selected' : '' }} value="8:00 PM">8:00 PM</option>
			</select>
		</div>
	  </div>
	  <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
		<label for="message" class="col-sm-2 control-label">Message</label>
		<div class="col-sm-8">
			<textarea class="form-control" name="message" id="message" cols='30' rows='3'>{{ old('message') }}</textarea>
			@if ($errors->has('message'))
				<span class="help-block">
					<strong>{{ $errors->first('message') }}</strong>
				</span>
			@endif
		</div>
	  </div>
	  <div class="form-group">
		  <div class="col-sm-offset-2 col-sm-8">
			  <button id="btnSubmit" type="submit" class="btn btn-default">Request</button>
		  </div>
	  </div>
	</form>
	@else
	<br />
	<div class="alert alert-success" role="alert">
	  {{ session('message') }}
	</div>

	<img src="/images/spacer.png" height="40px"><br />
</div>
@endif
<img src="/images/spacer.png" height="40px"><br />

    <!-- <form class="form-horizontal"  name="insightly_web_to_lead" action="https://compwhiz.insight.ly/WebToLead/Create" method="post">
        <input type="hidden" name="formId" value="ing2N5NnCbpS+aW0FxIRVQ=="/>
        <input type="hidden" id="insightly_ResponsibleUser" name="ResponsibleUser" value="529776"/><br/>
        <input type="hidden" id="insightly_LeadSource" name="LeadSource" value="898205"/><br/>

        <div class="form-group">
            <label for="insightly_firstName" class="col-sm-2 control-label">First Name: </label>
            <div class="col-sm-8">
                <input class="form-control" id="insightly_FirstName" name="FirstName" type="text"/>
            </div>
        </div>

        <div class="form-group">
            <label for="insightly_lastName" class="col-sm-2 control-label">Last Name: </label>
            <div class="col-sm-8">
                <input class="form-control" id="insightly_LastName" name="LastName" type="text"/>
            </div>
        </div>

        <div class="form-group">
            <label for="insightly_organization" class="col-sm-2 control-label">Organization: </label>
            <div class="col-sm-8">
                <input class="form-control" id="insightly_Organization" name="OrganizationName" type="text"/>
            </div>
        </div>

        <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email: </label>
            <div class="col-sm-8">
                <input class="form-control" id="insightly_Email" name="email" type="text"/>
            </div>
        </div>

        <div class="form-group">
            <label for="phone" class="col-sm-2 control-label">Phone: </label>
            <div class="col-sm-8">
                <input class="form-control" id="insightly_Phone" name="phone" type="text"/>
            </div>
        </div>

        <div class="form-group">
            <label for="phone" class="col-sm-2 control-label">Message: </label>
            <div class="col-sm-8">
                <textarea class="form-control" name="Description" id="insightly_Description" cols='30' rows='3'></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
                <input class="btn btn-default" type="submit" value="Submit"/>
            </div>
        </div>
    </form> -->

@stop

@section('footer')
<script language="javascript">
$(function() {
  $('[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});
</script>
@stop
