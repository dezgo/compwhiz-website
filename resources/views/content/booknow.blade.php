@extends('layouts.master')

@section('header')
<div class="container">

    <h1>Request a booking</h1>
@if (session()->has('message'))
<div class="alert services" role="alert">
    <span style="color: black">{{ session('message') }}</span>
</div>
@else

    <form method="POST" action="/booknow">
        {!! csrf_field() !!}

        <div class="row form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
            <label for="first_name" class="col-md-3 control-label">First Name</label>

            <div class="col-md-4">
                <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}"
                    placeholder="First Name">

                @if ($errors->has('first_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="row form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
            <label for="last_name" class="col-md-3 control-label">Last Name</label>

            <div class="col-md-4">
                <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}"
                    placeholder="Last Name">

                @if ($errors->has('last_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="row form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
            <label for="phone_number" class="col-md-3 control-label">Phone Number</label>

            <div class="col-md-4">
                <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}"
                    placeholder="Phone Number">

                @if ($errors->has('phone_number'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone_number') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="row form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-3 control-label">Email Address</label>

            <div class="col-md-4">
                <input type="text" class="form-control" name="email" value="{{ old('email') }}"
                    placeholder="Email Address">

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="row form-group{{ $errors->has('contact_method') ? ' has-error' : '' }}">
            <label for="contact_method" class="col-md-3 control-label">Preferred Contact Method</label>
            <div class="col-md-4 text-left">
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
        </div>

        <div class="row form-group{{ $errors->has('preferred_date') ? ' has-error' : '' }}">
            <label for="preferred_date" class="col-md-3 control-label">Preferred Date</label>

            <div class="col-md-4">
                <input type="text" class="form-control" name="preferred_date" id="preferred_date" value="{{ old('preferred_date') }}"
                    placeholder="Preferred Date">

                @if ($errors->has('preferred_date'))
                    <span class="help-block">
                        <strong>{{ $errors->first('preferred_date') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="row form-group{{ $errors->has('preferred_time') ? ' has-error' : '' }}">
            <label for="preferred_time" class="col-md-3 control-label">Preferred Time</label>

            <div class="col-md-4">
                <input type="text" class="form-control" name="preferred_time" id="preferred_time" value="{{ old('preferred_time') }}"
                    placeholder="Preferred Time">

                @if ($errors->has('preferred_time'))
                    <span class="help-block">
                        <strong>{{ $errors->first('preferred_time') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="row form-group{{ $errors->has('support_method') ? ' has-error' : '' }}">
            <label for="support_method" class="col-md-3 control-label">Preferred Support Method</label>
            <div class="col-md-4 text-left">
                <label>
                    <input type="radio" name="support_method" id="support_method_onsite" value="onsite"
                        {{ (old('support_method') == 'onsite' ? 'checked' : '') }}>
                    Onsite
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    <input type="radio" name="support_method" id="support_method_remote" value="remote"
                    {{ (old('support_method') == 'remote' ? 'checked' : '') }}>
                    Remote
                </label>
            </div>
        </div>

        <div class="row form-group{{ $errors->has('message') ? ' has-error' : '' }}">
            <label for="message" class="col-md-3 control-label">Message</label>

            <div class="col-md-4">
                <textarea class="form-control" name="message" id="message" rows="3"
                >{{ old('message') }}</textarea>

                @if ($errors->has('message'))
                    <span class="help-block">
                        <strong>{{ $errors->first('message') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="row form-group{{ $errors->has('voucher_code') ? ' has-error' : '' }}">
            <label for="preferred_time" class="col-md-3 control-label">Voucher Code</label>

            <div class="col-md-4">
                <input type="text" class="form-control" name="voucher_code" id="voucher_code" value="{{ old('voucher_code') }}"
                    placeholder="Voucher Code">

                @if ($errors->has('voucher_code'))
                    <span class="help-block">
                        <strong>{{ $errors->first('voucher_code') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="row form-group">
			<div class="col-sm-offset-3 col-sm-4">
				<button id="btnSubmit" type="submit" class="btn btn-success">Request a booking</button>
			</div>
        </div>
    </form>
    Please complete the above form and we'll be in touch ASAP.
</div>
@endif

@stop

@section('footer')
<script type="text/javascript">
$('#pref_date').datepicker({
    dateFormat: 'dd-mm-yy'
});
</script>
@stop
