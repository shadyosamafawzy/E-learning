@extends('Layout.app')

@php
    $title = 'User';
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
                <form action="{{route('users.update' , with($rows->id))}}" method="post">
                    @method('PUT')
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Name</label>
                                <input type="text" name="name" value="{{isset($rows) ? $rows->name : ''}}" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">{{$title}} Permission</label>
                                <select name="group" class="form-control @error('group') is-invalid @enderror" >
                                    <option value="user" {{isset($rows) && $rows->group == 'user' ? 'selected' : ''}}>user</option>
                                    <option value="admin" {{isset($rows) && $rows->group == 'admin' ? 'selected' : ''}}>admin</option>
                                </select>
                                @error('group')
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
                                <input type="email" name="email" value="{{isset($rows) ? $rows->email : ''}}" class="form-control @error('email') is-invalid @enderror">
                                @error('email')
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