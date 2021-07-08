<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Shark Application') }}</title>
	<!-- fonts and css -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> 
	<style>
		body {
			font-family: 'Nunito', sans-serif;
		}
		.cd-blue{
			background-color: #2E3192;
			color: aliceblue;
		}
		.cd-red{
			background-color: #D51317;
			color: aliceblue;
		}
		#D51317
	</style>
</head>
<body>
	<div class='container'>
	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <div class="container-fluid">
	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="{{ URL::to('sharks')}}">Sharks</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="{{ URL::to('sharks/create') }}">Create a shark</a>
				</li>
			</ul>
			<form class="d-flex" action="/search" method="GET">
				<input class="form-control me-2" id='search' name='str' type="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success" type="submit">Search</button>
			</form>
	    </div>
	  </div>
	</div>
	<!-- Default Vue Content -->
    <div id="app">
	<!-- Main Content -->
        <main class="py-4">
            @yield('content')
        </main>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>