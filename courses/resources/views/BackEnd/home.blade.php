@extends('Layout.app')

@section('title')
    Home Dashboard
    @endsection
@section('content')
    @component('Layout.navbar')

        @slot('page')
            Dashboard
        @endslot
    @endcomponent


    @include('BackEnd.shared.home.statistics')
    @include('BackEnd.shared.home.comments')


    @endsection