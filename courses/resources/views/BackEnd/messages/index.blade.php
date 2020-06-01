

@extends('Layout.app')

@php
    $title = 'Messages';
    $route = strtolower($title);

@endphp

@section('title')
    {{$title}}
@endsection
@section('content')
    @component('Layout.navbar')

        @slot('page')
            {{$title}}
        @endslot
    @endcomponent

    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card-title ">All Messages</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Message
                            </th>
                            <th class="text-right">
                                Control
                            </th>
                        </tr></thead>
                        <tbody>
                        @foreach($rows as $row)
                            <tr>
                                <td>{{$row->id}} </td>
                                <td>{{$row->name}} </td>
                                <td>{{$row->email}} </td>
                                <td>{{$row->message}} </td>
                                <td class="td-actions text-right">
                                    @include('BackEnd.shared.buttons.delete',['routeName' => $route])
                                    <button type="submit" rel="tooltip"
                                            onclick="$(this).next('form').slideToggle()"
                                            class="btn btn-white btn-link btn-sm" data-original-title="Reply">
                                        <i class="material-icons">reply</i>
                                    </button>

                                    <form action="{{route('message.reply' , ['id' => $row->id])}}"  method="post" class="form-group" style="display: none">
                                        {{csrf_field()}}
                                        <label>Reply this message</label>
                                        <input type="text" name="replyMessage" class="form-control"/>
                                        <button type="submit" class="btn btn-primary pull-right">Send</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!!  $rows->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection



