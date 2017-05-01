@extends('layouts.master')

@section('content')
<!-- <div class="inputClass"> -->
	<form method="post" action="{{action('AuthController@postregister')}}">
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
				@if ($errors->has('name'))
					{{$errors->first('name')}}
				@endif
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
				@if ($errors->has('email'))
					{{$errors->first('email')}}
				@endif
			</div>
			<div class="form-group">
				<label for="password">password</label>
				<input 
					type="password"
					class="form-control"
					id="password"
					name="password"
				>{{old('password')}}</textarea>
				
				@if ($errors->has('password'))
					{{$errors->first('password')}}
				@endif
			</div>
			<div class="form-group">
				<label for="passwordConfirm">Confirm password</label>
				<input 
					type="password"
					class="form-control"
					id="passwordConfirm"
					name="passwordConfirm"
				>{{old('passwordConfirm')}}</textarea>
				
				@if ($errors->has('password'))
					{{$errors->first('password')}}
				@endif
			</div>
			<input type="submit" class="btn btn-default" value="Register">
		</form>
<!-- </div> -->

@stop