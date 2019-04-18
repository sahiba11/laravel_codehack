@extends('layouts.admin')

@section('content')

<h1>posts</h1>

<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>photo</th>
        <th>user</th>
        <th>category</th>   
        <th>title</th>
        <th>body</th>
        <th>created</th>
        <th>updated</th>
      </tr>
    </thead>
    <tbody>
    	@if($posts)
    	  @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td><img height="50" src="{{$post->photo ? $post->photo->file : '/images/nopic.png'}}" alt=""></td>
                <td><a href="{{route('admin.posts.edit',$post->id)}}">{{$post->user->name}}</a></td>
                <td>{{$post->category ? $post->category->name : 'uncategorized'}}</td>
                <td>{{$post->title}}</td>
                <td>{{str_limit($post->body,20)}}</td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
            </tr>
          @endforeach
        @endif
    </tbody>
</table>








@stop