@extends('layouts.main-layout')


@section('content')
<div class="row justify-content-start">

    <div class="col-12 mb-3 text-center">
        <h1>Contact Us</h1>
    </div>

    @if(Session::has('mail_sent'))
        <div class="sucsess">
            <?=Session::get('mail_sent')?>
        </div>
    @endif

    <form class="form-horizontal mb-5 col-6" method="POST" action="/contact">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

            <label for="name" class="control-label"><strong>Name</strong></label>
            <span class="required">*</span>
            <div class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </div>
            <input id="name" type="text" name="name" placeholder="Your Name" class="form-control" value="{{ old('name') }}" required autofocus>

        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="control-label"><strong>E-Mail Address</strong></label>
            <span class="required">*</span>
            <div class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </div>
            <input id="email" type="email" placeholder="exemple@gmail.com" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            <label for="message" class="control-label"><strong>Phone</strong></label>
            <div class="help-block">
                  <strong>{{ $errors->first('phone') }}</strong>
            </div>
            <input id="phone" type="tel"  placeholder="+380533052211" name="phone" class="form-control" value="{{ old('phone') }}" required autofocus>
        </div>

        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
            <label for="message" class="control-label"><strong>Message</strong></label>
            <span class="required">*</span>
            <div class="help-block">
                  <strong>{{ $errors->first('message') }}</strong>
            </div>
            <textarea name="message" id="message" placeholder="Your Message"  cols="30" rows="10" class="form-control" required autofocus>{{ old('message') }}</textarea>
        </div>

        <input type="submit" value="Send" class="btn">
    </form>

    <div class="col-6">
        <div id="map" class="mb-3"></div>
        <h4>We are here</h4>
        <p>1234 Heaven Stress, Beverly Hill OldYork- United State of Lorem</p>
    </div>

</div>
@endsection
