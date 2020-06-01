@extends('layouts.app')
@section('title' , 'Skill')

@section('content')
    <div class="section section-buttons">

        <div class="container">

            <div class="title">
                <h1>{{$skill->name}}</h1>
            </div>
            @include('FrontEnd.shared.video-row')

        </div>
    </div>



@endsection