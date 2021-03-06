@extends('layouts.index')

@section('content')

    <h2>Categories</h2>

    <div class="col-sm-6">

{{ Form::open(['method'=>'POST','action'=>'AdminCategoriesController@store'])}}

       <div class = "form-group">
           {{Form::label('name', 'Name')}}
           {{ Form::text('name',null,['class'=>'form-control'])}}
       </div>

           <div class ="form-group">
           {{Form::submit('Create Category',['class'=>'btn btn-primary'])}}
           </div>

       {{ Form::close()}}

    </div>






    <div class="col-sm-6">

        @if($categories)

<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Created Date</th>
      </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
      <tr>
        <td>{{$category->id}}</td>
        <td><a href="{{action('AdminCategoriesController@edit',$category->id)}}"> {{$category->name}}</a></td>

        <td>{{$category->created_at ? $category->created_at->diffForhumans():'no date'}}</td>
      </tr>
        @endforeach
    </tbody>
  </table>
        @endif
    </div>





    @stop
