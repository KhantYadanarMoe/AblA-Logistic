@extends('layout.user')
    @section('title', 'About')
    @section('content')
    <x-user-nav></x-user-nav>

    <x-about-hero></x-about-hero>

    <x-about-main></x-about-main>

    <x-what-we-do></x-what-we-do>

    <x-about-quote></x-about-quote>

    @endsection