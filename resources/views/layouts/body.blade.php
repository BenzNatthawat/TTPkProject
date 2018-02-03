<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>@yield('title')</title>
	
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/sty.css">

	<script src="/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<!-- date-time -->
	<link rel="stylesheet" type="text/css" href="/css/jquery.datetimepicker.css"/>
	<script src="/js/jquery.datetimepicker.full.js"></script>
	<!-- icon -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<!-- radio -->
	<link rel="stylesheet" href="/css/font-awesome.css">
	<link rel="stylesheet" href="/css/build.css">
	<!-- <link rel="stylesheet" href="/bower_components/Font-Awesome/css/font-awesome.css"/> -->
	<!-- browse -->
	<script src="/js/bootstrap-filestyle.js"></script>
	
	<style>
		.bgbody  {
		      background: url("/images/bghome.jpg") no-repeat center center fixed; 
			  -webkit-background-size: cover;
			  -moz-background-size: cover;
			  -o-background-size: cover;
			  background-size: cover;
		}
		table {
		    font-family: arial, sans-serif;
		    border-collapse: collapse;
		    width: 100%;
		}

		td, th {
		    border: 1px solid #dddddd;
		    text-align: left;
		}

		tr:nth-child(even) {
		    background-color: #dddddd;
		}
	</style>

</head>
<body class="bgbody">
	<div class="container">
		<div class="row">
		<div class="col-md-12 col-md-offset-0">
			<div class="@yield('bgmenu')">

				<nav class="navbar navbar-toggleable-md navbar-inverse">
					<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<ul class="navbar-nav mr-auto">
						<a class="navbar-brand" href="/home">TTPk</a>
					</ul>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item @yield('home')">
								<a class="nav-link" href="/home">Home</a>
							</li>
							<li class="nav-item @yield('activity')">
								<a class="nav-link" href="/activity">activity</a>
							</li>
							<li class="nav-item @yield('package')">
								<a class="nav-link" href="/package">package</a>
							</li>
							<li class="nav-item @yield('shuttle')">
								<a class="nav-link" href="/shuttle">shuttle</a>
							</li>
							<!-- <li class="nav-item @yield('Disabled')">
								<a class="nav-link disabled" href="#">Disabled</a>
							</li> -->
						</ul>
						<!-- <form class="form-inline my-2 my-lg-0">
						<input class="form-control mr-sm-2" type="text" placeholder="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
						</form> -->
						<div class="form-inline my-2 my-lg-0">
							<ul class="navbar-nav mr-auto">
								@guest
									<li class="nav-item @yield('Signin')">
										<a class="navbar-brand" href="{{ route('login') }}"><i class="material-icons"style="font-size:20px;">person</i> Login</a>
									</li>
									<li class="nav-item @yield('Register')">
										<a class="navbar-brand" href="{{ route('register') }}"><i class="material-icons"style="font-size:20px;">person_add</i> Register</a>
									</li>
								@else
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle navbar-brand" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->roles->role_name }} {{ Auth::user()->user_name }}</a>
										
										<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
											<a class="dropdown-item" href="#">View Profile</a>
											<a class="dropdown-item" href="#">Edit Profile</a>
											<a class="dropdown-item" href="#">Schedule</a>
											<a class="dropdown-item" href="{{ route('logout') }}"
		                                            onclick="event.preventDefault();
		                                                     document.getElementById('logout-form').submit();">
		                                            Logout
		                                        </a>

		                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		                                            {{ csrf_field() }}
		                                        </form>
										</div>
									</li>
		                        @endguest
							</ul>
						</div>
					</div>
				</nav>

			</div>
		</div>
		</div>
	</div>

	<div>

			@yield('content')

	</div>
	
</body>
<script>
	$('#input11').filestyle({
		text : 'Browse',
		btnClass : 'btn-danger'
	});

	$('#datetimepicker_dark').datetimepicker({
		// theme:'dark',
		step:10
	});
	$('#datetimepicker_dark1').datetimepicker({
		// theme:'dark',
		step:10
	});

	function disable() {
	    document.getElementById("myRadio").disabled = true;
	}

	function undisable() {
	    document.getElementById("myRadio").disabled = false;
	}

</script>
</html>