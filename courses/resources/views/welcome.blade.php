@extends('layouts.app')
@section('title')
    Home
@endsection

@section('content')
    <div class="section section-buttons">

        <div class="container">

            <div class="title">
                @if(request()->has('search') && request()->search != '')
                    <h2><b>{{request()->search}}</b> results</h2>
                    @else
                        <h2>Latest Videos</h2>
                @endif

            </div>
            @include('FrontEnd.shared.video-row')

        </div>
    </div>
    <div class="section section-dark text-center">
        <div class="container">
            <h2 class="title">Our Statistics</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-profile card-plain">
                        <div class="card-avatar">
                                <div class="author">
                                    <h1 class="card-title">{{$videosCount}}</h1>
                                </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-category">Videos</h5>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-profile card-plain">
                        <div class="card-avatar">
                                <div class="author">
                                    <h1 class="card-title">{{$tagsCount}}</h1>
                                </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-category">Tags</h5>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-profile card-plain">
                        <div class="card-avatar">
                                <div class="author">
                                    <h1 class="card-title">{{$skillsCount}}</h1>
                                </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-category">skills</h5>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection



