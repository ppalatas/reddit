@extends('layouts.master')

@section('content')

<div class="showPost">
	{!! csrf_field()!!}
	<div class="postContainerHolder">
		<div class="postContainer">
			<h3>{{$post->title}}</h3>
			<p class="postContent">{{ $post->content }}</p>
			<h4>URL:</h4>
			<p>{{ $post->url }}</p>
			<p> Written at: {{ $post->created_at->diffForHumans() }}</p>
			<a href="{{ action('PostsController@edit', $post->id) }}">Edit this post</a>
			@if($post->created_at !== $post->updated_at)
				<p> Edited at: </p>
			@endif
			<br>
		</div>
	</div>
</div>
@stop