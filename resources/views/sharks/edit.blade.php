@extends('/layouts.app')
@section('content')
<div class='container'>
    <h1>Edit {{ $shark->name }}</h1>
 
    <form method="POST" action="/sharks/{{$shark->id}}">
		@method('PATCH')
              @csrf
              <div class="form-group">
                  <label for="name">Shark Title</label>
 
                <input id="name" name="name"  type="text" class="form-control @error('name') is-invalid @enderror" value="{{$shark->name}}">
		            <input id='id' name="id" type='hidden' value="{{$shark->id}}"
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email address</label>
                <input name="email" id="email" type="email" class="form-control @error('email', 'login') is-invalid @enderror" value="{{$shark->email}}">
            </div>

            <div class="form-group">
                <label for='shark_level'>Shark Level</label>
                <select name="shark_level" id="sharks" class='form-select'>
                  <option selected>Select a level</option>
                  <option value="1" {{$shark->shark_level=='1'?'selected':''}}>Basking Shark</option>
                  <option value="2" {{$shark->shark_level=='2'?'selected':''}}>Hammerhead Shark</option>
                  <option value="3" {{$shark->shark_level=='3'?'selected':''}}>Great White Shark</option>
                </select>
	    </div>
      <div class="form-group" style="margin-top: 24px;">
        <input type="submit" class="btn btn-success" value="Update">
      </div>
    </form>
</div>
@endsection