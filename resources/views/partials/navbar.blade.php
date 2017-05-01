
<div id="navBar">
	<ul>
		<li class="siteName navBarBoxLeft">Blogspot</li>
		@if(Auth::check())
		
			<li class="navbarBoxesRight"><a href="{{ action ('Auth\AuthController@getLogout') }}">Logout</a></li>
			
			<div class="createPostBtn"></div>
		@else 
			<li class=" navbarBoxesRight"><a href="{{ action('Auth\AuthController@getLogin')}}">Login</a></li>
			<li class=" navbarBoxesRight"><a href="{{ action('Auth\AuthController@getRegister')}}">Register</a></li>
		
		@endif
	</ul>
</div>
