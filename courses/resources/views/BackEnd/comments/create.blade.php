<form action="{{route('comment.store')}}" method="post">
    {{csrf_field()}}
@include('BackEnd.comments.form')
    <input type="hidden" value="{{$rows->id}}" name="video_id">

<button type="submit" class="btn btn-primary pull-right">Add</button>
<div class="clearfix"></div>
</form>