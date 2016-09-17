

@extends('layouts.index')






            @section('content')


                @if(Session::has('deleted_user'))

                    <p class="bg-danger" >{{session('deleted_user')}}</p>
                    @endif

    <table class="table table-responsive">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>

        </tr>
        </thead>
        <tbody>

        @if($users)

            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>

                    <td><img height="50px" width="50px" src="{{$user->photo ? $user->photo->file:'http://placehold.it/50X50'}}"alt="" ></td>

                    <td><a href="{{action('AdminUsersController@edit',$user->id)}}"> {{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role ? $user->role->name:'User has no role'}}</td>
                    <td>{{$user->is_active==1?'Acitve':'No'}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach


        @endif

        </tbody>

    </table>


@endsection
