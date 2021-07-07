@extends('/layouts.app')
@section('content')
<div class='container'>

<h1>All the sharks</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>shark Level</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
        @foreach($sharks as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->shark_level }}</td>

                <!-- we will also add show, edit, and delete buttons -->
                <td>

                    <!-- delete the shark (uses the destroy method DESTROY /sharks/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                    <!-- show the shark (uses the show method found at GET /sharks/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('sharks/' . $value->id) }}">Show this shark</a>

                    <!-- edit this shark (uses the edit method found at GET /sharks/{id}/edit -->
                    <a class="btn btn-small cd-blue " href="{{ URL::to('sharks/' . $value->id . '/edit') }}">Edit this shark</a>
            <form action="{{URL::to('sharks', $value->id) }}" method="POST">
            @csrf
            @method("DELETE")
            <button type="submit" class="btn btn-small btn-danger ">Delete</button>
            </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
@endsection
</body>
</html>
