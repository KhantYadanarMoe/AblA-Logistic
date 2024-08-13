@extends('layout.user-pf')
@section('title', 'Profile')
        @section('user-data')
          <x-user-data-form :user="$user" :info="$info"></x-user-data-form>
        @endsection
