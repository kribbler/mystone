@extends('templates.master')

@section('main-banner')
    <!-- Main Banner Place Holder -->
@stop

@section('main-content')
    <div class="error-template">
        <div class="well">
            <h1>Oops!</h1>
            <h2>{{ $error_title }}</h2>
            <br>
            {{ $error_message }}
            <br><br>
             If the problem continues to persist please <a href="{{ url('contact') }}">contact us</a>.
        </div>
    </div>
@stop