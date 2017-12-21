<nav class="navbar navbar-inverse">
	<div class="container">
		<div class="navbar-header">

			<!-- Collapsed Hamburger -->
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
				<span class="sr-only">Toggle Navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

			<!-- Branding Image -->
			<a class="navbar-brand" href="{{ url('/dashboard') }}">
				{{ config('app.name', 'Laravel') }}
			</a>
		</div>

		<div class="collapse navbar-collapse" id="app-navbar-collapse">
			<!-- Left Side Of Navbar -->
			<ul class="nav navbar-nav">
				&nbsp;
			</ul>

			<ul class="nav navbar-nav">
				
				
				
			</ul>
			

			<!-- Right Side Of Navbar -->
			<ul class="nav navbar-nav navbar-right">
				<!-- Authentication Links -->
				@guest
				<li>
					<a href="{{ route('login') }}">Login</a>
				</li>
				<li>
					<a href="/keyCode">Register</a>
				</li>
				@else
				<li>
					<a href="/books">Books</a>
				</li>
				<li>
					<a href="/traininglist">Training List</a>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
						Blog
						<span class="caret"></span>
					</a>

					<ul class="dropdown-menu">
                    
					<li>
					<a href="/posts/create">Create Post</a>
				</li>
				<li>
					<a href="/posts">View Posts</a>
				</li>
					</ul>
				</li>
				<li><a href="/dashboard">Dashboard</a></li>

				<?php
					$user = auth()->user();

					if($user->manager == 1){
						echo "<li><a href=" . "/dashboardmanager" . ">Requests</a></li>";
					}
					else{
						echo "<li><a href=" . "/keyCodeForMan" . ">Graduate</a></li>";
					}
				?>

				<li>
					<a href="/survey">Survey</a>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
						{{ Auth::user()->name }}
						<span class="caret"></span>
					</a>

					<ul class="dropdown-menu">
                    
						<li>
							<a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
								Logout <i class="fa fa-sign-out" aria-hidden="true"></i>

							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>
						</li>
					</ul>
				</li>
				@endguest
			</ul>
		</div>
	</div>
</nav>