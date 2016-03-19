@extends('master')

@section('content')

<h1>Customer Info</h1>
@if (!session()->has('message'))
<form class="form-horizontal" action="/customerinfo" method="post">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
      <label for="name" class="col-sm-2 control-label">Name</label>
      <div class="col-sm-8">
          <input type="text" class="form-control" name="name" id="name" placeholder="e.g. Joe Bloggs" value="{{ old('name') }}">
          @if ($errors->has('name'))
              <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
              </span>
          @endif
      </div>
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
      <label for="email" class="col-sm-2 control-label">Email</label>
      <div class="col-sm-8">
          <input type="text" class="form-control" name="email" id="email" placeholder="e.g. joe@hotmail.com" value="{{ old('email') }}">
          @if ($errors->has('email'))
              <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
      </div>
    </div>

  <div class="form-group{{ $errors->has('device') ? ' has-error' : '' }}">
    <label for="device" class="col-sm-2 control-label">Device</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="device" id="device" placeholder="e.g. Toshiba laptop" value="{{ old('device') }}">
        @if ($errors->has('device'))
            <span class="help-block">
                <strong>{{ $errors->first('device') }}</strong>
            </span>
        @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('device_age') ? ' has-error' : '' }}">
    <label for="device_age" class="col-sm-2 control-label">Device Age</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="device_age" id="device_age" placeholder="e.g. Purchased from Dick Smith 22/11/2015" value="{{ old('device_age') }}">
        @if ($errors->has('device_age'))
            <span class="help-block">
                <strong>{{ $errors->first('device_age') }}</strong>
            </span>
        @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('operating_system') ? ' has-error' : '' }}">
    <label for="operating_system" class="col-sm-2 control-label">Operating System</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="operating_system" id="operating_system" placeholder="e.g. Windows 8.1 64bit" value="{{ old('operating_system') }}">
        @if ($errors->has('operating_system'))
            <span class="help-block">
                <strong>{{ $errors->first('operating_system') }}</strong>
            </span>
        @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('antivirus') ? ' has-error' : '' }}">
    <label for="antivirus" class="col-sm-2 control-label">Antivirus</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="antivirus" id="antivirus" placeholder="e.g. Kaspersky Internet Security 2015" value="{{ old('antivirus') }}">
        @if ($errors->has('antivirus'))
            <span class="help-block">
                <strong>{{ $errors->first('antivirus') }}</strong>
            </span>
        @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('browser') ? ' has-error' : '' }}">
    <label for="browser" class="col-sm-2 control-label">Preferred Browser</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="browser" id="browser" placeholder="e.g. Microsoft Edge" value="{{ old('browser') }}">
        @if ($errors->has('browser'))
            <span class="help-block">
                <strong>{{ $errors->first('browser') }}</strong>
            </span>
        @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('mail_client') ? ' has-error' : '' }}">
    <label for="mail_client" class="col-sm-2 control-label">Preferred Email Client</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="mail_client" id="mail_client" placeholder="e.g. Windows Live Mail" value="{{ old('mail_client') }}">
        @if ($errors->has('mail_client'))
            <span class="help-block">
                <strong>{{ $errors->first('mail_client') }}</strong>
            </span>
        @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('backup') ? ' has-error' : '' }}">
    <label for="backup" class="col-sm-2 control-label">Backup</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="backup" id="backup" placeholder="e.g. None" value="{{ old('backup') }}">
        @if ($errors->has('backup'))
            <span class="help-block">
                <strong>{{ $errors->first('backup') }}</strong>
            </span>
        @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('passwords') ? ' has-error' : '' }}">
    <label for="passwords" class="col-sm-2 control-label">Passwords</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="passwords" id="passwords" placeholder="e.g. Lastpass" value="{{ old('passwords') }}">
        @if ($errors->has('passwords'))
            <span class="help-block">
                <strong>{{ $errors->first('passwords') }}</strong>
            </span>
        @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('office') ? ' has-error' : '' }}">
    <label for="office" class="col-sm-2 control-label">Office</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="office" id="office" placeholder="e.g. Libreoffice (limited use of Word, doesn't use outlook at all)" value="{{ old('office') }}">
        @if ($errors->has('office'))
            <span class="help-block">
                <strong>{{ $errors->first('office') }}</strong>
            </span>
        @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('other_info') ? ' has-error' : '' }}">
    <label for="other_info" class="col-sm-2 control-label">Other Info</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="other_info" id="other_info" placeholder="e.g. Uses X software package" value="{{ old('other_info') }}">
        @if ($errors->has('other_info'))
            <span class="help-block">
                <strong>{{ $errors->first('other_info') }}</strong>
            </span>
        @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('internet') ? ' has-error' : '' }}">
    <label for="internet" class="col-sm-2 control-label">Internet</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="internet" id="internet" placeholder="e.g. Optus 4G dongle" value="{{ old('internet') }}">
        @if ($errors->has('internet'))
            <span class="help-block">
                <strong>{{ $errors->first('internet') }}</strong>
            </span>
        @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('printer') ? ' has-error' : '' }}">
    <label for="printer" class="col-sm-2 control-label">Printer</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="printer" id="printer" placeholder="e.g. Canon MG4560" value="{{ old('printer') }}">
        @if ($errors->has('printer'))
            <span class="help-block">
                <strong>{{ $errors->first('printer') }}</strong>
            </span>
        @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('last_visit') ? ' has-error' : '' }}">
    <label for="last_visit" class="col-sm-2 control-label">Last Visit</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="last_visit" id="last_visit" placeholder="e.g. 1 Jan 1957" value="{{ old('last_visit') }}">
        @if ($errors->has('last_visit'))
            <span class="help-block">
                <strong>{{ $errors->first('last_visit') }}</strong>
            </span>
        @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('visit_reason') ? ' has-error' : '' }}">
    <label for="visit_reason" class="col-sm-2 control-label">Reason for visit</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="visit_reason" id="visit_reason" placeholder="e.g. Remove malware / setup printer" value="{{ old('visit_reason') }}">
        @if ($errors->has('visit_reason'))
            <span class="help-block">
                <strong>{{ $errors->first('visit_reason') }}</strong>
            </span>
        @endif
    </div>
  </div>

  <div class="form-group">
      <div class="col-sm-offset-2 col-sm-8">
          <button type="submit" class="btn btn-default">Submit</button>
      </div>
  </div>
</form>
@else
<div class="alert alert-success" role="alert">
  {{ session('message') }}
</div>
@endif
@stop
