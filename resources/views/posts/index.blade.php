@extends('layouts.master')

@section('content')

	@if(Auth::check())
	
		<div class="createPostBtn"><a href="{{ action('PostsController@create') }}"> Create a New Post!</a></div>
	@endif
	<div class="postContainerHolder">
	@foreach($posts as $post)
		<div class="postContainer">
			<p> Written at: {{ $post->created_at->diffForHumans() }}</p>
			<h3><a href=" {{ action('PostsController@show', $post->id) }}">{{$post->title}}</a></h3>
			<p class="postContent">{{ $post->content }}</p>
			<div class="likesBox">
				<div class="like"></div>
				<div class="boo"></div>
			</div>
			<h4>URL:</h4>
			<p>{{ $post->url }}</p>
			<p> Written By: {{ $post->user->name }}</p>
			@if($post->created_at !== $post->updated_at)
				<p> Edited at: {{ $post->updated_at }}</p>
			@endif
			<br>
		</div>
	@endforeach
	</div>
	<!-- auth::check == if someone is logged in .... do this else ... -->
	
	<div class="pageChoice">
	<!-- used for the page selector -->
		{!! $posts->render() !!}
	</div>

	<!-- Output the information for the post on the page -->

@stop
