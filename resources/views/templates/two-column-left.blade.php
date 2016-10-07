@extends('templates.master')

@section('main-content')
    <div class="col-md-3 md-margin-bottom-40">
        @yield('left-column')
    </div>
    <div class="col-md-9">
        @yield('right-column')
    </div>
@stop