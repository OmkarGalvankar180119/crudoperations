@extends('layouts.app')
<!-- <body style="background-image: url('{{ url('/global/images/background_main.jpg') }}');"> -->
@section('content')
<section class="register-container"  style="background-image: url('{{ url('/global/images/background_main.jpg') }}');">
<div class="main-form">
<form method="POST" action="{{ url('user_register') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class= form-content">
        <h2>Register</h2>
        <p>Please fill in this form to create an account.</p>

        <div class="main-block">
            <label for="name"><b>Name</b></label>
            <input type="text" placeholder="Enter Name" name="name" required>
            <span class="help-block" id="amount_error">{{ $errors->first('name') }}</span>
        </div>

        <div class="main-block">
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>
            <span class="help-block" id="amount_error">{{ $errors->first('email') }}</span>
        </div>

        <div class="main-block">
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
            <span class="help-block" id="amount_error">{{ $errors->first('password') }}</span>
        </div>

        <div class="main-block">
            <label for="psw-repeat"><b>Confirm Password</b></label>
            <input type="password" placeholder="Repeat Password" name="confirm_password" required>
            <span class="help-block" id="amount_error">{{ $errors->first('confirm_password') }}</span>
        </div>

        <button type="submit" class="registerbtn">Register</button>

        <a class="psw " href="{{ url('/') }}">Sign in</a>

        @if($errors->has('wrong'))
            <span class="help-block">{{ $errors->first('wrong') }}</span>
        @elseif(Session::get('success'))
            <span class="success">{{ Session::get('success') }}</span>
        @endif


    </div>

</form>
</div>
</section>
@stop

