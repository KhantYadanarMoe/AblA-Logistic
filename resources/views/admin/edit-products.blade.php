@extends('layout.admin')
@section('title', 'Edit Products')
    @section('admin')
    <x-admin-edit-products :product="$product"></x-admin-edit-products>
    @endsection