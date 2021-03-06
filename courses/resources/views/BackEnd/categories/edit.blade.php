@extends('Layout.app')

@php
    $title = 'Category';
       $route = 'categories';

@endphp

@section('title')
   Edit {{$title}}
@endsection
@section('content')
    @component('Layout.navbar')

        @slot('page')
            Edit {{$title}}
        @endslot
    @endcomponent


    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Create {{$title}}</h4>
            </div>
            <div class="card-body">
                <form action="{{route($route.'.update' , with($rows->id))}}" method="post">
                    @method('PUT')
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Name</label>
                                <input type="text" name="name" value="{{isset($rows) ? $rows->name : ''}}" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Meta Keywords</label>
                                <input type="text" name="meta_keywords" value="{{isset($rows) ? $rows->meta_keywords : ''}}" class="form-control @error('meta_keywords') is-invalid @enderror">
                                @error('meta_keywords')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Meta Description</label>
                                <textarea name="meta_des" cols="20" rows="5" class="form-control @error('meta_des') is-invalid @enderror">{{isset($rows) ? $rows->meta_des : ''}}</textarea>
                                @error('meta_des')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Update</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>

@endsection