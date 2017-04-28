@extends('layouts.master')

@section('content')

<div class="inputClass">
	<form action="{{ action('PostsController@store') }}" method="POST">
	{!! csrf_field()!!}

		<form action="posts/store">
			<div class="form-group">
				<label for="title">Title</label>
				<input 
					type="text"
					class="form-control"
					id="title"
					name="title"
					value="{{old('title')}}"
				>
			</div>
			<div class="form-group">
				<label for="content">Content</label>
				<textarea 
					type="text"
					cols="40" 
	       			rows="5" 
					class="form-control"
					id="content"
					name="content"
				>{{old('content')}}</textarea>
			</div>
			<div class="form-group">
				<label for="url">Share your URL!</label>
				<input 
					type="text"
					class="form-control"
					id="url"
					name="url"
					value="{{old('url')}}"
				>
			</div>
			<input type="submit" class="btn btn-default" value="create post">
		</form>
	</form>
</div>
@stop