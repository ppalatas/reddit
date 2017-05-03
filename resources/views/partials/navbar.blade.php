
<div id="navBar">
	<ul>
		<li class="siteName navBarBoxLeft">Blogspot</li>
		@if(Auth::check())
		
			<li class="navbarBoxesRight"><a href="{{ action ('Auth\AuthController@getLogout') }}">Logout</a></li>
			<li class="navbarBoxesRight">Welcome back!</li>
			<div class="createPostBtn"></div>
		@else 
			<li class=" navbarBoxesRight"><a href="{{ action('Auth\AuthController@getLogin')}}">Login</a></li>
			<li class=" navbarBoxesRight"><a href="{{ action('Auth\AuthController@getRegister')}}">Register</a></li>
		
		@endif
		<form method="get" action="{{ action('PostsController@index')}}">
			<input name="search" type="text" class="searchInput" placeholder="Search For A Post">
			<button class="search" type="submit">Search</button>
		</form>
	</ul>
</div>
