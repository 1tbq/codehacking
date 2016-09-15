

@extends('layouts.index')






            @section('content')

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


                    <td><img height="60px" src="{{$user->photo ? $user->photo->file:'no user photo'}}"alt=""></td>
                    


                    <td>{{$user->name}}</td>
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
