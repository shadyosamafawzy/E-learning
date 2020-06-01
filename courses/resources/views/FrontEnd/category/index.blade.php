@extends('layouts.app')
@section('title' , 'Category')

@section('content')
    <div class="section section-buttons">

        <div class="container">

            <div class="title">
                <h1>{{$cat->name}}</h1>
            </div>
           @include('FrontEnd.shared.video-row')
        </div>
    </div>



@endsection