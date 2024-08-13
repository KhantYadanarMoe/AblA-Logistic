@extends('layout.admin')
@section('title', 'Users')
    @section('admin')
    <x-admin-users :users="$users"></x-admin-users>
    @endsection