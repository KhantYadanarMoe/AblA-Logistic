@extends('layout.user-pf')
@section('title', 'Wishlist')
    @section('user-data')
          <x-wished-products :wishlists="$wishlists"></x-wished-products>
        @endsection