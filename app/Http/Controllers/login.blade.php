@extends('layouts.master')

@('content')

<div class="inputClass">
	<form method="post" action="{{action('userController@store')}}">
	{!! csrf_field() !!}
		
		<div class="form-group">
			<label for="email">Email</label>
			<input 
				type="text"
				class="form-control"
				id="email"
				name="email"
				value="{{old('email')}}"
			>
		</div>
		<div class="form-group">
			<label for="password">password</label>
			<input
				type="password"
				class="form-control"
				name="password"
				id="password"
				value="{{old('password')}}"
	</form>
</div>