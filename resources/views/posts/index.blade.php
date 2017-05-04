@extends('layouts.master')

@section('content')

	@if(Auth::check())
	
		<div class="createPostBtn"><a href="{{ action('PostsController@create') }}"> Create a New Post!</a></div>
	@endif
	@foreach($posts as $post)
	<div class="postContainerHolder">
		<div class="postContainer">
			<p class="writtenBy"> Written By: <br><h4>{{ $post->user->name }}</h4></p>
			<p> At: {{ $post->created_at->diffForHumans() }}</p>
			<h3><a href=" {{ action('PostsController@show', $post->id) }}">{{$post->title}}</a></h3>
			<p class="postContent">{{ $post->content }}</p>
			<h4>URL:</h4>
			<p>{{ $post->url }}</p>
			<div class="likesBox">
				<form method="post" action="{{ action('PostsController@vote', $post->id) }}">
					{!! csrf_field() !!}
					<button class="like" name="vote" value="1"></button>
					<button class="boo" name="vote" value="-1"></button>
				</form>
			</div>
			<p class="votes">Votes: {{ $post->getVotes() }} </p>
			@if($post->created_at !== $post->updated_at)
				<p class="edited"> Edited at: <em>{{ $post->updated_at }}</em></p>
			@endif
			<br>
		</div>
	</div>
	@endforeach
	<!-- auth::check == if someone is logged in .... do this else ... -->
	
	<div class="pageChoice">
	<!-- used for the page selector -->
		{!! $posts->render() !!}
	</div>

	<!-- Output the information for the post on the page -->

	<!-- model for voting, linking foreign keys to post because each post has a voting option  -->

@stop
