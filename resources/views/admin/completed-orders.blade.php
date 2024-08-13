@extends('layout.admin')
@section('title', 'Orders')
    @section('admin')
    <x-admin-completed-orders :completeds="$completeds"></x-admin-completed-orders>
    @endsection