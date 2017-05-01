@extends('layouts.master')

@section('content')

<div class="inputClass">
	<form method="post" action="{{action('Auth\AuthController@getLogin')}}">
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
			>
			<input type="submit" class="btn btn-primary" value="login">
	</form>
</div>

@stop