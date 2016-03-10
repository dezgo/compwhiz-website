@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-8">
        Hi, I'm Derek Gillett and I run Computer Whiz - Canberra. My goal is to provide a high-quality,
        timely, professional service to small businesses in Canberra and Queanbeyan.<Br>
        <br>
        High-quality, because I have over 20 years experience in the I.T. field. I've run I.T. support
        businesses both locally and interstate as well as worked as an independent consultant, and with
        a large Canberra firm.<br>
        <br>
        And timely because prompt service is important. You have a business to run, and when things go
        amiss, you need to quickly get back up and running.<br>
        <br>
        </div>
        <div class="col-md-4">
            <img src="{{asset('/images/selfie_bw.jpg')}}">
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <img src="{{asset('/images/phone-1160874_640-small.png')}}">
        </div>
        <div class="col-md-8">
        <h2>Services</h2>
        <p>
            Aging technology, but unsure what to do? A business of any size needs lots of I.T. support. Things like:
        </p>
            <ul>
                <li>Up-to-date antivirus software</li>
                <li>Advice / assistance when purchasing new hardware</li>
                <li>A robust disaster recovery plan</li>
                <li>Staff training</li>
                <li>Malware / virus removal</li>
                <li>Regular PC/network health checks</li>
                <li>A high quality backup system</li>
                <li>Simple remote support for quick resolution to simple issues</li>
            </ul>
        <p>
            Plus, you may have a lot of different types of hardware, such as:
        </p>
            <ul>
                <li>Desktop / Laptop computers (PC and Mac)</li>
                <li>Mobiles / Tablets (iOS and Android)</li>
                <li>Servers / network infrastructure</li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
        <h2>Contact</h2>
        <p>
            Email: <a href="mailto:web@computerwhiz.com.au">web@computerwhiz.com.au</a><br>
        </p>
        <p>
            Phone: 02 6112 8025 (direct to voicemail).
        </p>
        <p>
            Book online: <a target="_blank" href="http://computerwhiz.simplybook.me/">http://computerwhiz.simplybook.me</a>
        </p>
        </div>
        <div class="col-md-4">
            <img width="320" height="320" src="{{asset('/images/call-center-1027585_640.jpg')}}">
        </div>
    </div>
@stop
