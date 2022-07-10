@extends('layouts.app')

@section('content')
<style>
    body {
        font-family: 'Open Sans', sans-serif;
        background: #3498db;
        margin: 0 auto 0 auto;
        width: 100%;
        text-align: center;
        margin: 20px 0px 20px 0px;
    }

    p {
        font-size: 12px;
        text-decoration: none;
        color: #ffffff;
    }

    h1 {
        font-size: 1.5em;
        color: #525252;
    }

    .box {
        background: white;
        width: 300px;
        border-radius: 6px;
        margin: 0 auto 0 auto;
        padding: 0px 0px 70px 0px;
        border: #2980b9 4px solid;
    }

    .email {
        background: #ecf0f1;
        border: #ccc 1px solid;
        border-bottom: #ccc 2px solid;
        padding: 8px;
        width: 250px;
        color: #AAAAAA;
        margin-top: 10px;
        font-size: 1em;
        border-radius: 4px;
    }

    .password {
        border-radius: 4px;
        background: #ecf0f1;
        border: #ccc 1px solid;
        padding: 8px;
        width: 250px;
        font-size: 1em;
    }

    .btn {
        background: #2ecc71;
        width: 270px;
        padding-top: 5px;
        padding-bottom: 5px;
        color: white;
        border-radius: 4px;
        border: #27ae60 1px solid;

        margin-top: 20px;
        margin-bottom: 20px;
        float: left;
        margin-left: 16px;
        font-weight: 800;
        font-size: 0.8em;
    }

    .btn:hover {
        background: #2CC06B;
    }
</style>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>

<img src="../assets/img/smslogo.png" alt="img" width="300"/>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="box">
        <h1>Account Login</h1>

        <input type="email" name="email" placeholder="E-mail" onFocus="field_focus(this, 'email');" onblur="field_blur(this, 'email');" class="email @error('email') is-invalid @enderror" value="{{ old('email') }}" required" />

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <input type="password" id="password" name="password" placeholder="Password" onFocus="field_focus(this, 'email');" onblur="field_blur(this, 'email');" class="email " />

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <button type="submit" class="btn">
            Sign In
        </button>
    </div>

</form>
@if (Route::has('password.request'))
<p>Forgot your password? <a href="{{ route('password.request') }}" style="color:#f1c40f;">Click Here!</a></p>
@endif

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
@endsection