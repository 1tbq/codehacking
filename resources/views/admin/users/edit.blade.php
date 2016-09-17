@extends('layouts.index')

@section('content')

    <h1>Edit Users</h1>

    <div class ="col-sm-2">

    <img src="{{$user->photo ? $user->photo->file:'http://placehold.it/400X400'}}" alt="" class="img-responsive img-rounded">

    </div>



            <div class="col-sm-9">

       {{ Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id],'files'=>true])}}

            <div class = "form-group">
                {!!Form::label('name', 'Name')!!}
                {!! Form::text('name',null,['class'=>'form-control'])!!}
            </div>

            <div class = "form-group">
                {!!Form::label('email', 'Email')!!}
                {!! Form::email('email',null,['class'=>'form-control'])!!}
            </div>

            <div class = "form-group">
                {!!Form::label('role_id', 'Role')!!}
                {{--we are bring the roles array from the controller and inserting it in the field--}}
                {!! Form::select('role_id',$roles,null,['class'=>'form-control'])!!}
            </div>

            <div class = "form-group">
                {!!Form::label('is_active', 'Status')!!}
                {!! Form::select('is_active',array(1=>'Active',0=>'Not Active'),null,['class'=>'form-control'])!!}
            </div>

            <div class = "form-group">
                {!!Form::label('photo_id', 'Photo')!!}
                {!! Form::file('photo_id',null,['class'=>'form-control'])!!}
            </div>

            <div class = "form-group">
                {!!Form::label('password', 'Password')!!}
                {!! Form::password('password',['class'=>'form-control'])!!}
            </div>

            <div class ="form-group">
                {!!Form::submit('Update User',['class'=>'btn btn-primary col-sm-6'])!!}
            </div>

                {{ Form::close() }}




               {{ Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id]])}}

                    <div class ="form-group">
                    {!!Form::submit('Delete Post',['class'=>'btn btn-danger col-sm-6'])!!}
                    </div>
                  {{--<!!Form::close()!!}--}}
                {{ Form::close() }}



    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



@endsection