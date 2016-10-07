@extends('templates.master')

@section('main-content')
<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">


    <form method="POST" action="/auth/register" class="reg-page">
        {!! csrf_field() !!}
        <div class="reg-header">
            <h2>Register a new account</h2>
            <p>Already Signed Up? Click <a href="{{ url('auth/login') }}" class="color-green">Sign In</a> to login your account.</p>
        </div>

        <label>Full Name</label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control margin-bottom-20">

        <label>Email Address <span class="color-red">*</span></label>
        <input type="email" name="email" value="{{ old('email') }}" class="form-control margin-bottom-20">

        <div class="row">
            <div class="col-sm-6">
                <label>Password <span class="color-red">*</span></label>
                <input type="password" name="password" class="form-control margin-bottom-20">
            </div>
            <div class="col-sm-6">
                <label>Confirm Password <span class="color-red">*</span></label>
                <input type="password" name="password_confirmation" class="form-control margin-bottom-20">
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-lg-6 checkbox">
                <label>
                    <input type="checkbox">
                    I agree to the <a href="page_terms.html" class="color-green">Terms and Conditions</a>
                </label>
            </div>
            <div class="col-lg-6 text-right">
                <button type="submit" class="btn-u">Register</button>
            </div>
        </div>
    </form>
</div>
@stop



