@extends('layouts.admin')

@section('content')

<h1>Edit post</h1>

<div class="row">

<div class="col-sm-6">

	<img src="{{$post->photo ? $post->photo->file : '/images/nopic.png'}}" alt="" class="img responsive">

</div>

<div class="col-sm-9">

{!!Form::model($post,['method'=>'PATCH','action'=>['AdminPostsController@update',$post->id],'files'=>true])!!}

{{csrf_field()}}

<div class='form-group'>
	{!! Form::label('title','Title:') !!}
	{!! Form::text('title',null,['class'=>'form-control']) !!}
	
</div>

<div class='form-group'>
	{!! Form::label('category_id','Category:') !!}
	{!! Form::select('category_id',$categories,null,['class'=>'form-control']) !!}
</div>

<div class='form-group'>
	{!! Form::label('photo_id','Photo:') !!}
	{!! Form::file('photo_id',null,['class'=>'form-control']) !!}
</div>

<div class='form-group'>
	{!! Form::label('body','Description:') !!}
	{!! Form::textarea('body',null,['class'=>'form-control']) !!}
</div>


<div class='form-group'>
	{!! Form::submit('update post',['class'=>'btn btn-primary col-sm-6']) !!}
	
</div>

{!! Form::close() !!}

{!!Form::open(['method'=>'DELETE','action'=>['AdminPostsController@destroy',$post->id]])!!}

<div class='form-group'>
	{!! Form::submit('delete post',['class'=>'btn btn-danger col-sm-6']) !!}
	
</div>

{!! Form::close() !!}

</div>

</div>

<div class="row">
	@include('includes.form_error')
</div>

@stop