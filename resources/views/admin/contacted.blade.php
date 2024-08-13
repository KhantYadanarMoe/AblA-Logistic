@extends('layout.admin')
@section('title', 'Contacted')
    @section('admin')
    <x-admin-contacted :contacteds="$contacteds"></x-admin-contacted>
    @endsection