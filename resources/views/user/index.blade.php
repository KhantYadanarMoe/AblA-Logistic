@extends('layout.user')
@section('title', 'Home')
@section('content')
    <x-user-nav></x-user-nav>

    <x-user-hero></x-user-hero>

    <x-user-banner></x-user-banner>

    <x-user-about></x-user-about>

    <x-user-best-seller :randoms="$randoms"></x-user-best-seller>

    <x-user-how-we-work></x-user-how-we-work>

    <x-user-contact></x-user-contact>

    <x-user-footer></x-user-footer>
    
    @endsection