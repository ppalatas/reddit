@extends('layouts.master')

@('content')

<div class="inputClass">
	<form method="post" action="{{action('userController@store')}}">
	{!! csrf_field() !!}
		
		<div class="form-group">
			<label for="name">Name</label>
			<input 
				type="text"
				class="form-control"
				id="name"
				name="name"
				value="{{old('name')}}"
			>
		</div>
	</form>
</div>