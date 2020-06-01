<form action="{{route($routeName.'.destroy' , with($row->id))}}" method="post">
    {{method_field('delete')}}
    {{csrf_field()}}
    <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove {{$title}}">
        <a href=""> <i class="material-icons">close</i></a>
    </button>
</form>