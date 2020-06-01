@extends('layouts.app')
@section('title' , $video->name)

@section('content')
    <div class="section section-buttons">

        <div class="container">

            <div class="title">
                <h1>{{$video->name}}</h1>
            </div>

            <div class="row">
                <div class="col-md-12">
                    @php  $url = getYoutubeId($video->youtube) @endphp
                    @if($url)
                        <iframe width="100%" height="500"  src="https://www.youtube.com/embed/{{$url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-1">

                        <p>
                            <i class="nc-icon nc-single-02"></i>
                            {{$video->name}}
                        </p>


                </div>
                <div class="col-md-3">
                    <p>
                        <i class="nc-icon nc-calendar-60"></i>
                        {{$video->created_at}}
                    </p>
                </div>
                <div class="col-md-1">
                    <p>
                        <i class="nc-icon nc-single-copy-04"></i>
                        <a href="{{url('category/'.$video->cat->id)}}">{{$video->cat->name}}</a>
                    </p>
                </div>
                <div class="col-md-3">

                    <strong>Tags</strong>
                    <p>
                        @foreach($video->tags as $tag)
                            <a href="{{url('tag/'.$tag->id)}}">
                            <span class="badge badge-pill badge-default"> {{$tag->name}}</span>
                            </a>
                        @endforeach

                    </p>
                </div>
                <div class="col-md-3">
                    <strong>Skills</strong>

                    <p>
                        @foreach($video->skills as $skill)
                            <a href="{{url('skill/'.$tag->id)}}">
                            <span class="badge badge-pill badge-success"> {{$skill->name}}</span>
                            </a>
                        @endforeach

                    </p>
                </div>
            </div>

                <div class="col-md-12">

                    <p>
                        {{$video->des}}
                    </p>
                </div>
            <br>
            <br>
            <br>
            <div class="row" id="comments">
                <div class="col-md-12">
                    <div class="card text-left">
                        <div class="card-header card-header-rose">
                            @php($comments = $video->comments)
                            <h5>Comments ({{count($comments)}})</h5>
                        </div>
                        <div class="card-body">
                            @foreach($comments as $comment)

                           <div class="row">
                               <div class="col-md-8">
                                   <p class="card-text">
                                       <i class="nc-icon nc-single-02"></i> :
                                       {{$comment->user->name}}
                                   </p>
                               </div>
                               <div class="col-md-4 text-right">
                                   <p class="card-text">
                                       <i class="nc-icon nc-calendar-60"></i>
                                       {{$comment->created_at}}
                                   </p>
                                       @if(!empty(auth()->user()->id) &&auth()->user()->id == $comment->user->id)
                                       <button type="submit" rel="tooltip"
                                               onclick="$(this).next('form').slideToggle(600)"
                                               class="btn btn-white btn-link btn-sm" data-original-title="Edit comment">
                                        <a><i class="nc-icon nc-credit-card"></i></a>
                                       </button>

                                       <form class="form-group" action="{{url('comment/'.$comment->id)}}" method="post" style="display: none">
                                           {{csrf_field()}}
                                           <textarea class="form-control" name="comment" rows="3">{{$comment->comment}}</textarea>
                                           <button class="btn" type="submit">Edit</button>
                                       </form>
                                   @endif
                               </div>
                               </div>
                            <p class="card-text">
                                {{$comment->comment}}
                            </p>

                                @if(!$loop->last)
                                    <hr>
                                @endif
                                @endforeach
                        </div>
                    </div>

                </div>
            </div>
            @if(auth()->user())

                <form class="form-group" action="{{url('comment/create/'.$video->id)}}" method="post" >
                    {{csrf_field()}}
                    <label>Add comment</label>
                    <textarea class="form-control" name="comment" rows="3"></textarea><br>
                    <button class="btn" type="submit">Add comment</button>
                </form>
                @endif
        </div>
    </div>



@endsection