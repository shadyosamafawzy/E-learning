@extends('Layout.app')

@php
$title = 'Pages';
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
                        <h4 class="card-title ">All {{$title}}</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="{{route($route.'.create')}}" class="btn btn-white btn-round">Add {{$title}}</a>
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
                                Meta description
                            </th>
                            <th>
                                Meta keywords
                            </th>
                            <th>
                                Description
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
                           <td>{{$row->meta_des}} </td>
                           <td>{{$row->meta_keywords}} </td>
                           <td>{{$row->des}} </td>
                                <td class="td-actions text-right">
                                   @include('BackEnd.shared.buttons.edit',['routeName' => $route])
                                   @include('BackEnd.shared.buttons.delete',['routeName' => $route])


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