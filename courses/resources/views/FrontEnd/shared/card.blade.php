<div class="card" style="width: 20rem;">
    <img class="card-img-top" data-src="holder.js/100px180/" alt="{{$video->name}}" style="height: 180px; width: 100%; display: block;" src="{{url('uploads/'.$video->image)}}" data-holder-rendered="true">
    <div class="card-body">
        <h4 class="card-title">{{$video->name}}</h4>
        <p style="
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap" class="card-text">
            {{$video->des}}
        </p>
        <small>{{$video->created_at}}</small><br>
        <a href="{{url('video/'.$video->id)}}" class="btn btn-primary">More details</a>
    </div>
</div>