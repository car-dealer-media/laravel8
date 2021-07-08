@extends('/layouts.app')
@section('content')
<div class='container'>
<h1>Create a shark</h1>
<!-- if there are creation errors, they will show here -->
	<form method="POST" action="/sharks">
	    @csrf
	    <div class="form-group">
			<label for="name">Shark Title</label>
			<input id="name" name="name"  type="text" class="form-control @error('name') is-invalid @enderror">
			@error('name')
				<div class="alert alert-danger">{{ $message }}</div>
			@enderror
	    </div>

	    <div class="form-group">
			<label for="email">Email address</label>
			<input name="email" id="email" type="email" class="form-control @error('email', 'login') is-invalid @enderror">
	    </div>

	    <div class="form-group">
			<label for='shark_level'>Shark Level</label>
			<select name="shark_level" id="sharks" class='form-select'>
			<option selected>Select a level</option>
			<option value="1">Basking Shark</option>
			<option value="2">Hammerhead Shark</option>
			<option value="3">Great White Shark</option>
			</select>
		</div>
		<div class="col-auto">
			<button type="submit" class="btn btn-primary mb-3">Confirm Shark</button>
		</div>

	</form>
</div>
@endsection