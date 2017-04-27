@extends('layouts.master')

@section('content')

	@foreach($posts as $post)

<div class="postContainerHolder">
	<div class="postContainer">
		<h3>{{$post->title}}</h3>
		<p>{{ $post->content }}</p>
		<h4>URL:</h4>
		<p>{{ $post->url }}</p>
		<p class="datePosted"> Written at: {{ $post->created_at->diffForHumans() }}</p>
		<br>
	</div>
</div>
	@endforeach

	<!-- Output the information for the post on the page -->
	{!! $posts->render() !!}

@stop
