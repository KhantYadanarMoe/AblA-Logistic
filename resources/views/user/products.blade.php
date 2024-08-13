@extends('layout.user')
@section('title', 'Products')
    @section('content')
        <x-user-nav></x-user-nav>

        <div class="products-hero"></div>

        <x-products-search></x-products-search>

        <x-products-all :products="$products"></x-products-all>

        <x-user-footer></x-user-footer>
    @endsection