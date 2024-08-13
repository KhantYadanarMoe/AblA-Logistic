@extends('layout.admin')
@section('title', 'Dashboard')
    @section('admin')
    <x-admin-dashboard :orders="$orders" :contacts="$contacts" :user="$user" :completed="$completed" :total="$total" :products="$products"></x-admin-dashboard>
    @endsection