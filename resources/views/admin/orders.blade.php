@extends('layout.admin')
@section('title', 'Orders')
    @section('admin')
    <x-admin-orders :orders="$orders"></x-admin-orders>
    @endsection