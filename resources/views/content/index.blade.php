@extends('layouts.master')

@section('header')
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
	<div class="container">
		<img src="/images/spacer.png" height="60px"><br>
	    <div class="row">
	        <div class="col-md-5">
				<img width="100%" src="/images/collage.png" />
				<img src="/images/spacer.png" height="80px"><br />
			</div>
	        <div class="col-md-5" valign="top">
	        <h1>Hi!</h1>
	        I'm Derek Gillett, the owner of Computer Whiz - Canberra. My goal is
			to provide an approachable, friendly, I.T. support service to home &amp;
			business users in Canberra and Queanbeyan.<Br>
            <br>
			<b>Dislike calling technical support?</b>
			You're not alone. Lots of people feel nervous ringing that tech support
			number, like when the internet just won't work. You want it sorted,
			but you're worried you won't understand them when they tell you how
			to fix it in their own special I.T. language. So call me instead!
			You'll love the
			difference some patience backed with decades of experience brings.<br />
			<Br />
			<b>Who are you anyway?</b>
            Here's my background. I've been fascinated by computers since I got
			my first Commodore 64 back in
			the mid '80s. Since then I've spent LOTS of time with them. Subsequently
			I know LOTS about them. I can build a PC from parts, install the
			operating system, and install and configure all the software. I have
			done programming, I know all about Excel and macros. I've developed
			a cloud-based invoicing system (<a target="_blank" href="https://invoicingzen.com">
			InvoicingZen.com</a> which I encourage you to check out!). I've worked
			in the corporate world on huge systems like SAP, as a web developer,
			a database developer, and many years as a consultant.<br />
			<br />
	        </div>
	    </div>
		<div class="row">
			<div class="col-md-12">
				<b>I think I'll just spend the extra on a big I.T. support company</b>
				If you are a big business who needs a team of technicians available
				full time, then that's probably best - I'm just one guy. If that's
				not you, please don't. You'll get a junior technician at a premium
				price. You'll get lots of advice, but who's interests will it serve?
				Maybe they'll suggest you pay a monthly fee to have a server. Do you
				really need one? Or do they just want the recurring income stream?
				Maybe they'll suggest a website / hosting plan - great idea! But
				how reliable will it be? I provide a 99.99% uptime
				guarantee, and monitoring in place to tell you immediately if
				something on there changes, or it goes down. Will they offer that?
				<br /><Br />
				<b>This other guy looks like he'll be cheaper</b>
				Just remember, you get what you pay for :)<br />
				<br />
				<b>Still Unsure?</b> That's understandable. Others have come to me with a healthy
				level of skepticism and came away pleased with the experience.
				<a target="_blank" href="https://www.google.com.au/maps/place/Computer+Whiz+-+Canberra/@-35.3387677,148.8454586,10z/data=!3m1!4b1!4m2!3m1!1s0x6b17b47cd8e20085:0x8df60a2a3e0c88a3"
				>Have a look</a> at some reviews they have given.<br />
				<Br />
			<img src="/images/spacer.png" height="80px">

			</div>
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
<img src="/images/spacer.png" height="20px"><br />
<div class="services">
	<div class="container">
		<img src="/images/spacer.png" height="60px"><br>
	    <div class="row">
	        <div class="col-md-3">
				<div class="services-box" data-toggle="popover" data-placement="bottom"
					data-content="
					Malware, short for malicious software, is software used to disrupt computer operations,
					gather sensitive information, gain access to private computer systems, or
					display unwanted advertising. We use specialised software designed to detect and elimate
					many types of malware, and can leave that software on your computer for later
					ad-hoc scanning.
					">
					<div class="vcenter">
	           			Malware / Virus Removal
					</div>
				</div>
		    </div>
			<div class="col-md-3">
				<div class="services-box" data-toggle="popover" data-placement="bottom"
					data-content="
					Computers, whether running alone or on a network, need regular maintenane to keep
					them running smoothly. Low disk space, data corruption, network latency, and
					many other factors can cause unnecessary delays, reduction in productivity,
					and increases the risk of data corruption and/or loss.
					">
					<div class="vcenter">
	           			Regular PC/Network Health Checks
		            </div>
				</div>
		    </div>
			<div class="col-md-3">
				<div class="services-box" data-toggle="popover" data-placement="bottom"
					data-content="
					For any business, whether a startup, or an established enterprise, a website
					is a must-have. It offers a quick way for your customers to
					find out what services you offer, and to contact you. It's also a very
					cost effective marketing tool giving your business access to
					the global market for a fraction of the cost of traditional advertising
					mediums.
					">
					<div class="vcenter">
	           			A Secure &amp; Functional Website
					</div>
				</div>
		    </div>
			<div class="col-md-3">
				<div class="services-box" data-toggle="popover" data-placement="bottom"
					data-content="
					Disaster recovery (DR) involves a set of policies and procedures to enable
					the recovery or continuation of vital technology infrastructure and
					systems following a natural or human-induced disaster.
					Disaster recovery focuses on the IT or technology systems supporting
					critical business functions. Unlike paper-based systems, computer-based
					systems are brittle meaning that a minor issue can cause serious data-loss, so
					a robust disaster recovery plan that can be followed in these situations
					is vital.
					">
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
				<div class="services-box" data-toggle="popover" data-placement="bottom"
					data-content="
					A computer virus is defined as a program which can automatically
				    spread to other computer systems. Antivirus software is computer software
					used to prevent, detect and remove computer viruses. It is extremely
					important to have up-to-date high quality antivirus software installed
					on all computers in your network.
					">
					<div class="vcenter">
		           		Up-To_date Antivirus Software
					</div>
	            </div>
		    </div>
			<div class="col-md-3">
				<div class="services-box" data-toggle="popover" data-placement="bottom"
					data-content="
					From basic navigation in Microsoft Windows, to writing Excel macros, there are
					so many ways to use a computer, but to really get the most out of
					your investment requires a commitment to learning. Chances are, the software
					you use on a daily basis has a wealth of functionality you don't use,
					but which could make your life easier. There is also an incredible
					range of software available nowadays, often free of charge, which may
					be a perfect fit for your requirements.
					">
					<div class="vcenter">
		           		User/Staff Training
					</div>
	            </div>
		    </div>
			<div class="col-md-3">
				<div class="services-box" data-toggle="popover" data-placement="bottom"
					data-content="
					Let's face it, backup is often only really examined closely when something
					goes wrong. Maybe a hard drive fails, data is accidently deleted, or you
					just need to retrieve an old version of a document. Having a reliable backup
					system is essential, as is a system to ensure your backups continue to
					operate.
					">
					<div class="vcenter">
		           		High Quality Backup System
					</div>
	            </div>
		    </div>
			<div class="col-md-3">
				<div class="services-box" data-toggle="popover" data-placement="bottom"
					data-content="
					When considering the purchase of new hardware, it's important to consider
					many factors. How long do you expect / need it to last? What type of
					applications will you be running? How much local storage will you use?
					What type of CPU is best? What areas of the computer would it make sense
					to spend more on to get the biggest bang for your buck? What about your
					existing data, how will that get onto the new computer(s)? Will you make
					the purchase yourself, or outsource the process.
					">
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
	            <b><u>Want remote support?</u></b></p>
				<a class="btn btn-primary" role="button" target="qs" href="http://get.teamviewer.com/computerwhiz_qs">
	                    Get Support Now</a>
						<br /><br />
	            <p>
	            <b><u>Need help?</u></b></p>
	            <a href='/remote-support-help'>Follow our instructions</a>

				<iframe style="visibility:hidden;display:none" name="qs"></iframe>
	        </div>
	        <div class="col-md-1">&nbsp;</div>
	    </div>
		<img src="/images/spacer.png" height="40px"><br />
	</div>
</div>

<img src="/images/spacer.png" height="20px"><br />
<div align="center">
    <a href="#contact"><img src="/images/arrow.png"></a>
</div>
<img src="/images/spacer.png" height="20px"><br />

<a name="contact"></a>
<h1 align="center">Contact</h1>
<img src="/images/spacer.png" height="20px"><br />
<div class="contact">
	<div class="container textMedium">
		<img src="/images/spacer.png" height="60px"><br>
		Location: <a class='contact' href='https://www.google.com.au/maps/place/Computer+Whiz+-+Canberra/@-35.3387677,148.8454586,10z/data=!3m1!4b1!4m2!3m1!1s0x6b17b47cd8e20085:0x8df60a2a3e0c88a3'>Red Hill, ACT</a><br>
		<br>
		<b>Email: <a class="contact" href="mailto:web@computerwhiz.com.au">web@computerwhiz.com.au</a><br>
		<br>
		Office: 02 6112 8025<br>
		Mobile: 0474 029 265<br>
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
		<div class="form-group">
			<label for="name" class="col-sm-4 control-label">Name</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ old('name') }}">
				@if ($errors->has('name'))
				<span class="help-block">
					<strong class="contact">{{ $errors->first('name') }}</strong>
				</span>
				@endif
			</div>
			<div class="col-sm-4">&nbsp;</div>
		</div>


		<div class="form-group">
			<label for="contact_method" class="col-sm-4 control-label">Preferred Contact Method</label>
			<div class="col-sm-4 text-left">
					<label>
						<input type="radio" name="contact_method" id="contact_method_phone" value="phone"
							{{ (old('contact_method') == 'phone' ? 'checked' : '') }}>
						Phone
					</label>
					&nbsp;&nbsp;&nbsp;&nbsp;
					<label>
						<input type="radio" name="contact_method" id="contact_method_email" value="email"
						{{ (old('contact_method') == 'email' ? 'checked' : '') }}>
						Email
					</label>
			</div>
			<div class="col-sm-4">&nbsp;</div>
		</div>

		<div class="form-group" id="email_form_group">
			<label for="email" class="col-sm-4 control-label">Email</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
				@if ($errors->has('email'))
				<span class="help-block">
					<strong class="contact">{{ $errors->first('email') }}</strong>
				</span>
				@endif
			</div>
			<div class="col-sm-4">&nbsp;</div>
		</div>

		<div id="phone_form_group">
			<div class="form-group">
				<label for="phone_number" class="col-sm-4 control-label">Phone Number</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Phone Number" value="{{ old('phone_number') }}">
					@if ($errors->has('phone_number'))
						<span class="help-block">
							<strong class="contact">{{ $errors->first('phone_number') }}</strong>
						</span>
					@endif
				</div>
				<div class="col-sm-4">&nbsp;</div>
			</div>

			<div class="form-group">
				<label for="best_time" class="col-sm-4 control-label">Best time</label>
				<div class="col-sm-4">
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
				<div class="col-sm-4">&nbsp;</div>
			</div>
		</div>

		<div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
			<label for="message" class="col-sm-4 control-label">Message</label>
			<div class="col-sm-4">
				<textarea class="form-control" name="message" id="message" cols='30' rows='3'>{{ old('message') }}</textarea>
				@if ($errors->has('message'))
				<span class="help-block">
					<strong>{{ $errors->first('message') }}</strong>
				</span>
				@endif
			</div>
			<div class="col-sm-4">&nbsp;</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-4 col-sm-4">
				<button id="btnSubmit" type="submit" class="btn btn-default">Request</button>
			</div>
			<div class="col-sm-4">&nbsp;</div>
		</div>
		</form>
@else
		<img src="/images/spacer.png" height="40px"><br />
		<div class="alert services" role="alert">
			<span style="color: black">{{ session('message') }}</span>
		</div>

	</div>
@endif
	<img src="/images/spacer.png" height="40px"><br />
</div>

@stop

@section('footer')
<script language="javascript">
$("[data-toggle=popover]").popover({ trigger: "hover" });

function showContactMethod(contact_method)
{
	if (contact_method == 'phone')	{
		var show = 'phone_form_group';
		var hide = 'email_form_group';
	}
	else {
		var hide = 'phone_form_group';
		var show = 'email_form_group';
	}
	document.getElementById(show).style.visibility = '';
	document.getElementById(show).style.display = '';
	document.getElementById(hide).style.visibility = 'hidden';
	document.getElementById(hide).style.display = 'none';
}

showContactMethod('{{ old('contact_method') }}');

$(document).ready(function(){
	$("#contact_method_phone").click(function(element){
		showContactMethod('phone');
    });
	$("#contact_method_email").click(function(element){
		showContactMethod('email');
    });
});

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
