@extends('layout.admin')
@section('title', 'Contacts')
    @section('admin')
    <x-admin-contact :contacts="$contacts"></x-admin-contact>
    @endsection