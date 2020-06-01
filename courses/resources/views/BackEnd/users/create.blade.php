@extends('Layout.app')

@php
    $title = 'User';
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
                <form action="{{route('users.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
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
                                <label class="bmd-label-floating">Password</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                @error('password')
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
                                <label class="bmd-label-floating">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">{{$title}} Permission</label>
                            <select name="group" class="form-control @error('group') is-invalid @enderror" >
                                <option value="admin">admin</option>
                                <option value="user">user</option>
                            </select>
                            @error('group')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Create</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>

@endsection