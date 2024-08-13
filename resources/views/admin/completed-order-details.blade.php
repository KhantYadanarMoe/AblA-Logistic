@extends('layout.admin')
@section('title', 'Orders')
    @section('admin')
    <x-admin-completed-order-details :order="$order"></x-admin-completed-order-details>
    @endsection