
<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-primary">
            <div class="row">
                <div class="col-md-8">
                    <h4 class="card-title ">Comments of this video</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="comment">
                    <thead class=" text-primary">
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Comment
                        </th>
                        <th>
                            User Name
                        </th>
                        <th>
                            Created at
                        </th>
                        <th class="text-right">
                            Control
                        </th>
                    </tr></thead>
                    <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <td>{{$comment->id}} </td>
                            <td>{{$comment->comment}} </td>
                            <td>{{$comment->user->name}} </td>
                            <td>{{$comment->created_at}} </td>
                            <td class="td-actions text-right">

                                <button type="submit" rel="tooltip"
                                        onclick="$(this).next('form').slideToggle()"
                                        class="btn btn-white btn-link btn-sm" data-original-title="Edit comment">
                                    <i class="material-icons">edit</i>
                                </button>
                                <form id='form' action="{{route('comment.update' , ['id' => $comment->id] )}}" style="display: none" method="post">
                                    {{csrf_field()}}
                                    @include('BackEnd.comments.form')
                                    <input type="hidden" value="{{$rows->id}}" name="video_id">

                                    <button type="submit" class="btn btn-primary pull-right">Update</button>
                                    <div class="clearfix"></div>
                                </form>


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
