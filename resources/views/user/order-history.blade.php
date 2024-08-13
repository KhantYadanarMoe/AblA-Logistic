@extends('layout.user-pf')
@section('title', 'Order History')
        @section('user-data')
          <x-user-order-history :orders="$orders" :completeds="$completeds"></x-user-order-history>
        @endsection