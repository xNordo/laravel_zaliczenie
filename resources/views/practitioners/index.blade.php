<!DOCTYPE html>
<html>
<head>
    <title>practitioner App</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('practitioners') }}">practitioner Alert</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('practitioners') }}">View All practitioners</a></li>
            <li><a href="{{ URL::to('practitioners/create') }}">Create a practitioner</a>
        </ul>
    </nav>

    <h1>All the practitioners</h1>

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
            <td>practitioner Level</td>
            <td>Actions</td>
        </tr>
        </thead>
        <tbody>
        @foreach($practitioners as $key => $practitioner)
            <tr>
                <td>{{ $practitioner->id }}</td>
                <td>{{ $practitioner->name }}</td>
                <td>{{ $practitioner->email }}</td>
                <td>{{ $practitioner->practitioner_level }}</td>

                <!-- we will also add show, edit, and delete buttons -->
                <td>

                    <!-- delete the practitioner (uses the destroy method DESTROY /practitioners/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                    <!-- show the practitioner (uses the show method found at GET /practitioners/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('practitioners/' . $practitioner->id) }}">Show this practitioner</a>

                    <!-- edit this practitioner (uses the edit method found at GET /practitioners/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('practitioners/' . $practitioner->id . '/edit') }}">Edit this practitioner</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
</body>
</html>
