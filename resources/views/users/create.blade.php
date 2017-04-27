@extends('layouts.master')

@section('content')
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
					id="password"
					name="password"
				>{{old('password')}}</textarea>
			</div>
			<div class="form-group">
				<label for="passwordConfirm">Confirm password</label>
				<input 
					type="password"
					class="form-control"
					id="passwordConfirm"
					name="passwordConfirm"
				>{{old('passwordConfirm')}}</textarea>
			</div>
			<input type="submit" class="btn btn-default" value="Log in">
		</form>
	</form>
</div>