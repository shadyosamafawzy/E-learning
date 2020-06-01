<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Latest Comments</h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover">
                    <thead class="text-warning">
                    <tr><th>ID</th>
                        <th>Name</th>
                        <th>Comment</th>
                        <th>Video</th>
                        <th>Date</th>
                        <th>Control</th>
                    </tr></thead>
                    <tbody>
                    @foreach($comments as $comment)

                        <tr>
                        <td>{{$comment->id}}</td>
                        <td>
                            <a href="{{url('admin/users/'.$comment->user->id.'/edit ')}}">
                                {{$comment->user->name}}
                            </a>
                        </td>
                        <td>{{$comment->comment}}</td>
                        <td>
                            <a href="{{url('admin/videos/'.$comment->video->id.'/edit ')}}">
                            {{$comment->video->name}}
                            </a>
                        </td>
                        <td>{{$comment->created_at}}</td>
                        <td>
                            <form action="{{route('comment.destroy' , with($comment->id))}}" method="post">
                                {{method_field('delete')}}
                                {{csrf_field()}}
                                <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove comment">
                                    <i class="material-icons">close</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>