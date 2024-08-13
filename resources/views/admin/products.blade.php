@extends('layout.admin')
@section('title', 'Products')
    @section('admin')
    <x-admin-products :products="$products"></x-admin-products>
    @endsection