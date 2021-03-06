@extends('layouts.index')

@section('content')


    <table class="table">
        <thead>
          <tr>
              <th>Id</th>
              <th>Photo</th>
              <th>User</th>
              <th>Category</th>
              <th>Title</th>
              <th>Body</th>
              <th>Created</th>
              <th>Updated</th>
          </tr>
        </thead>

        @if($posts)
            @foreach($posts as $post)

        <tbody>
          <tr>
              <td>{{$post->id}}</td>
              <td><img height="50" src="{{$post->photo_id ? $post->photo->file:'http://placehold.it/400X400'}}"></td>
              <td><a href="{{action('AdminPostsController@edit',$post->id)}}"> {{$post->user->name}}</a></td>
              <td>{{$post->category ? $post->category->name :'Uncategorized'}}</td>
              <td>{{$post->title}}</td>
              <td>{{str_limit($post->body,40)}}</td>
              <td>{{$post->created_at->diffForhumans()}}</td>
              <td>{{$post->updated_at->diffForhumans()}}</td>


          </tr>
@endforeach
        @endif

        </tbody>
      </table>

@stop
