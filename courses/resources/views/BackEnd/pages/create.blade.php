@extends('Layout.app')

@php
    $title = 'Page';
    $route = 'pages';

@endphp

@section('title')
    Create {{$title}}
@endsection
@section('content')
    @component('Layout.navbar')

        @slot('page')
            Create {{$title}}
        @endslot
    @endcomponent


    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Create {{$title}}</h4>
            </div>
            <div class="card-body">
                <form action="{{route($route.'.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">{{$title}} Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">{{$title}} Meta Keywords </label>
                                <input type="text" name="meta_keywords" class="form-control @error('meta_keywords') is-invalid @enderror">
                                @error('meta_keywords')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">{{$title}} Meta Description </label>
                                <textarea cols="15" rows="5" name="meta_des" class="form-control @error('meta_des') is-invalid @enderror"></textarea>
                                @error('meta_des')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">{{$title}} Description </label>
                                <textarea cols="15" rows="5" name="des" class="form-control @error('des') is-invalid @enderror"></textarea>
                                @error('des')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Create</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>

@endsection