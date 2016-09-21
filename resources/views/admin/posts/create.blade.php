@extends('layouts.index')

@section('content')

 <div class="row">
   {{ Form::open(['method'=>'POST','action'=>'AdminPostsController@store','files'=>true])}}


       <div class = "form-group">
           {{Form::label('title', 'Title')}}
           {{ Form::text('title',null,['class'=>'form-control'])}}
       </div>

   <div class = "form-group">
        {{ Form::label('category_id', 'Category')}}
        {{ Form::select('category_id',[''=>'Choose Category']+$categories,null,['class'=>'form-control'])}}
   </div>

   <div class = "form-group">
       {{Form::label('photo_id', 'Photo')}}
       {{Form::file('photo_id',null,['class'=>'form-control'])}}
   </div>

   <div class = "form-group">
       {{Form::label('body', 'Description:')}}
       {{Form::textarea('body',null,['class'=>'form-control','rows'=>6])}}
   </div>

           <div class ="form-group">
           {{Form::submit('Create Post',['class'=>'btn btn-primary'])}}
           </div>

       {{ Form::close()}}
   </div>

{{--we should add this error functionality from outside from another file --}}
<div class="row">
       @if (count($errors) > 0)
               <div class="alert alert-danger">
                   <ul>
                       @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                       @endforeach
                   </ul>
               </div>
       @endif
</div>

@stop
