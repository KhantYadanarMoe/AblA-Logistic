@extends('layout.admin')
@section('title', 'Order Details')
    @section('admin')
    <x-admin-order-details :order="$order" :items="$items"></x-admin-order-details>
    @endsection