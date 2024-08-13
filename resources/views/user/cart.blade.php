@extends('layout.user')
@section('title', 'Your Cart')
@section('content')
    <x-user-nav></x-user-nav>

    <x-cart-data :carts="$carts"></x-cart-data>

    @endsection
