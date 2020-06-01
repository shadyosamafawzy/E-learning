@extends('Layout.app')

@php
    $title = 'Video';
       $route = 'videos';

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

    <div class="row">

    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Create {{$title}}</h4>

            </div>


        </div>
        <div class="card-body">
            <form action="{{route($route.'.update' , with($rows->id))}}" method="post" enctype="multipart/form-data">
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






                    <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">{{$title}} Url</label>
                            <input type="url" name="youtube" value="{{isset($rows) ? $rows->youtube : ''}}" class="form-control @error('youtube') is-invalid @enderror">
                            @error('youtube')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                            <label >{{$title}} Image</label>
                            <input type="file" name="image" >
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">{{$title}} Status</label>
                            <select name="published" class="form-control @error('published') is-invalid @enderror" >
                                <option value="1" {{isset($ows) && $rows->published == 1 ? 'selected' : ''}}>Published</option>
                                <option value="0" {{isset($ows) && $rows->published == 0 ? 'selected' : ''}}>Hidden</option>
                            </select>
                            @error('youtube')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">{{$title}} Category</label>
                            <select name="cat_id" class="form-control @error('cat_id') is-invalid @enderror" >
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{isset($ows) && $rows->cat_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('youtube')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">{{$title}} Skills</label>
                            <select name="skills[]" class="form-control @error('skills[]') is-invalid @enderror" multiple>
                                @foreach($skills as $skill)
                                    <option value="{{$skill->id}}" {{in_array($skill->id , $selectedSkills) ? 'selected' : ''}}>{{$skill->name}}</option>
                                @endforeach
                            </select>
                            @error('skills')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">{{$title}} Tags</label>
                            <select name="tags[]" class="form-control @error('tags[]') is-invalid @enderror" multiple>
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}" {{in_array($tag->id , $selectedTags) ? 'selected' : ''}}>{{$tag->name}}</option>
                                @endforeach
                            </select>
                            @error('tags')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>



                    <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">{{$title}} Meta Keywords </label>
                            <input type="text" name="meta_keywords" value="{{isset($rows) ? $rows->meta_keywords : ''}}" class="form-control @error('meta_keywords') is-invalid @enderror">
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
                            <textarea cols="15" rows="5" name="meta_des" class="form-control @error('meta_des') is-invalid @enderror">{{isset($rows) ? $rows->meta_des : ''}}</textarea>
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
                            <textarea cols="15" rows="5" name="des" class="form-control @error('des') is-invalid @enderror">{{isset($rows) ? $rows->des : ''}}</textarea>
                            @error('des')
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
        <div class="col-md-4">

            <div class="card-body">
                @php  $url = getYoutubeId($rows->youtube) @endphp
                @if($url)
                <iframe width="250"  src="https://www.youtube.com/embed/{{$url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                @endif
                <img src="{{url('uploads/'.$rows->image)}}" width="250">
            </div>
            @include('BackEnd.comments.create')

        </div>


    </div>

    @include('BackEnd.comments.index')

@endsection