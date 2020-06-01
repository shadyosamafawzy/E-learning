@extends('layouts.app')
@section('title' , 'Tag')

@section('content')
    <div class="section section-buttons">

        <div class="container">

            <div class="title">
                <h1>{{$tag->name}}</h1>
            </div>
            @include('FrontEnd.shared.video-row')

        </div>
    </div>



@endsection