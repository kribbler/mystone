@extends('templates.two-column-left')

@section('left-column')
    <ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">
        <li class="list-group-item active">
            <a href="{{ url('admin') }}"><i class="fa fa-bar-chart-o"></i> Overall</a>
        </li>
        <li class="list-group-item">
            <a href="{{ url('admin/contacts') }}"><i class="fa fa-cubes"></i> Contact Forms</a>
        </li>
        <li class="list-group-item">
            <a href="{{ url('admin/upload') }}"><i class="fa fa-upload"></i> Upload</a>
        </li>

        <li class="list-group-item">
            <a href="{{ url('admin/imports') }}"><i class="fa fa-upload"></i> Imports</a>
        </li>

        <li class="list-group-item">
            <a href="{{ url('admin/policies') }}"><i class="fa fa-upload"></i> Policies</a>
        </li>
    </ul>
@stop

@section('right-column')
    <p>Placeholder</p>
@stop