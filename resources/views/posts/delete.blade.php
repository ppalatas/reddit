@extend('layouts.master')

@section('content')
<div class="inputClass">
	<form action="{{ action('PostsController@destroy') }}" method="POST">
	{!! csrf_field()!!}
	{{ method_field('PUT')}}
		<form action="posts/destroy">
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
				<input 
					type="text"
					class="form-control"
					id="content"
					name="content"
					value="{{old('content')}}"
				>
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
		<input type="submit" class="btn btn-danger" value="delete">Delete</form>
		{{!! method_field('delete') !!}}
	</form>
</div>