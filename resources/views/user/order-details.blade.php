@extends('layout.user-pf')
@section('title', 'Order Details')
    @section('user-data')
    <x-user-order-details :order="$order" :items="$items"></x-user-order-details>
    @endsection