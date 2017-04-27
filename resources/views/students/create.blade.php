//information stored on the pages 

//extends means that your master blades "@yield('content')  //Edit the post create view and make it extend from the master layout.
@extends('layouts.master')
//look at the table and make the sub contents of content based off of the rows in the table 

@section('content')
<div class="inputClass">
<form action="{{action('StudentsController@store')}}">
{{ method_field('PUT')}}
	<form action="/students/store">
		<div class="form-group">
			<label for="first_name">First Name</label>
			<input type="text"
			 id="first_name" 
			 name="first_name"
			 value="{{ old('first_name')}}"
			class="form-control">
		</div>
		<div class="form-group">
			<label for="description">Description</label>
			<input type="text"
			 id="description"
			 name="description"
			 value="{{ old('description')}}"
			class="form-control">
		</div>
		<div class="form-group">
			<label for="subscribed">Subscribe to newsletter</label>
			<input type="checkbox"
			 id="subscribed" 
			 name="subscribed"
			 value="{{ old('subscribed')}}"
			class="form-control">
		</div>
	 	<div class="form-group">
			<label for="school_name">School Name</label>
			<input type="text"
			 id="school_name"
			name="school_name"
			value="{{ old('school_name')}}"
			class="form-control">
		</div>
			<input type="submit" class="btn btn-default" value="create student">
		</form>
	</form>
</div>
@stop