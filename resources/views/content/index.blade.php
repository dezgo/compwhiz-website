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
            Location: Red Hill, ACT
        </p>
        <p>
            Email: <a href="mailto:web@computerwhiz.com.au">web@computerwhiz.com.au</a><br>
        </p>
        <p>
            Office: 02 6112 8025
        </p>
        <p>
            Mobile: 0474 029 265
        </p>
        <p>
            Book online: <a target="_blank" href="http://computerwhiz.simplybook.me/">http://computerwhiz.simplybook.me</a>
        </p>
        <p>
            Request a callback:

            @if ($message == '')
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
              <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                <label for="phone_number" class="col-sm-2 control-label">Number</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Number" value="{{ old('phone_number') }}">
                    @if ($errors->has('phone_number'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone_number') }}</strong>
                        </span>
                    @endif
                    </div>
                </div>
                <div class="form-group">
                <label for="best_time" class="col-sm-2 control-label">Best time</label>
                <div class="col-sm-8">
                    <select class="form-control" name="best_time" id="best_time">
                        <option></option>
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
                      <button type="submit" class="btn btn-default">Request</button>
                  </div>
              </div>
            </form>
            @else
            <div class="alert alert-success" role="alert">
              {{ $message }}
            </div>
            @endif
        </p>
        </div>
        <div class="col-md-4">
            <img width="320" height="320" src="{{asset('/images/call-center-1027585_640.jpg')}}">
        </div>
    </div>
@stop
