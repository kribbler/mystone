@extends('admin_dashboard.admin')

@section('right-column')
    <div>
        <div>
            <h2>View Contact Form Submission</h2>
            <strong>Name: </strong><p>{{ $contact->name }}</p>
            <strong>Email: </strong><p>{{ $contact->email }}</p>
            <strong>Message: </strong><p>{{ $contact->message }}</p>
        </div>
    </div>
@stop