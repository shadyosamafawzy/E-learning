<div class="row">
    @foreach($videos as $video)

        <div class="col-lg-4">
            @include('FrontEnd.shared.card')
        </div>
    @endforeach

</div>