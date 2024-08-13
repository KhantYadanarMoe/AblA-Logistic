@extends('layout.user')
@section('title', 'Contact')
    @section('content')
    <x-user-nav></x-user-nav>

    <x-contact-hero></x-contact-hero>

    <x-contact-form></x-contact-form>

    <x-contact-banner></x-contact-banner>

    <x-contact-location></x-contact-location>

    <x-user-footer></x-user-footer>

    @endsection
