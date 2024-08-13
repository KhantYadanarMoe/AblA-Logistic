@extends('layout.user-pf')
@section('title', 'Order Details')
    @section('user-data')
    <x-user-completed-order-details :order="$order"></x-user-completed-order-details>
    @endsection