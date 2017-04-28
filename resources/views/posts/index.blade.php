@extends('layouts.master')

@section('content')

	@foreach($posts as $post)

<div class="postContainerHolder">
	<div class="postContainer">
		<h3>{{$post->title}}</h3>
		<p class="postContent">{{ $post->content }}</p>
		<h4>URL:</h4>
		<p>{{ $post->url }}</p>
		<p> Written at: {{ $post->created_at->diffForHumans() }}</p>
		@if($post->created_at !== $post->updated_at)
			<p> Edited at: </p>
		@endif
		<br>
	</div>
</div>
	@endforeach
	
	<div class="pageChoice">
	<!-- used for the page selector -->
		{!! $posts->render() !!}
	</div>

	<!-- Output the information for the post on the page -->

@stop
