@extends('templates.master')

@section('breadcrumbs')
    @include('templates/breadcrumbs', array('title' => 'Login'))
@stop

@section('main-content')
<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
    <form method="POST" action="/auth/login" class="reg-page">
        {!! csrf_field() !!}
        <div class="reg-header">
            <h2>Login to your account</h2>
        </div>

        <div class="input-group margin-bottom-20">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Username" class="form-control">
        </div>
        <div class="input-group margin-bottom-20">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input type="password" name="password" id="password" type="password" placeholder="Password" class="form-control">
        </div>

        <div class="row">
            <div class="col-md-6 checkbox">
                <label><input type="checkbox" name="remember"> Stay signed in</label>
            </div>
            <div class="col-md-6">
                <button class="btn-u pull-right" type="submit">Login</button>
            </div>
        </div>

        <hr>

        <h4>Forget your Password ?</h4>
        <p>no worries, <a class="color-green" href="#">click here</a> to reset your password.</p>
    </form>
</div>
@stop