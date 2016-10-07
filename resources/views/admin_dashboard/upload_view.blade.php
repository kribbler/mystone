@extends('admin_dashboard.admin')

@section('right-column')
  <div class="container-fluid content">
    <div class="row margin-bottom-30">
      @if (Session::has("message"))
        {{ Session::get("message") }}
      @endif
      <hr />

      <form action="add" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="file" class="btn-file">
        <button type="submit" class="btn-u">Upload file</button>
      </form>

    </div>
  </div>
@stop