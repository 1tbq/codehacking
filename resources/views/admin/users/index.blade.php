

@extends('layouts.index')


@section('sidebar')



    <div class="row">
        <div class="col-md-6">

            @section('content')

    <table class="table table-responsive">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Created</th>
            <th>Updated</th>

        </tr>
        </thead>
        <tbody>

        @if($users)

            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach

        @endif
        @stop
        </tbody>
    </table>


    </div>
    </div>

