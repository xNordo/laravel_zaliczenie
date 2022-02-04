<!DOCTYPE html>
<html>
<head>
    <title>Practitioners Management App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="container">
<main>
    <div class="container">
        <header class="d-flex justify-content-center py-3">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="{{ URL::to('practitioners') }}">View All practitioners</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ URL::to('practitioners/create') }}">Create a practitioner</a>
            </ul>
        </header>
    </div>

    <h1>All practitioners</h1>

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Surname</td>
            <td>Email</td>
            <td>CDV Email</td>
            <td>Actions</td>
        </tr>
        </thead>
        <tbody>
        @foreach($practitioners as $key => $practitioner)
            <tr>
                <td>{{ $practitioner->id }}</td>
                <td>{{ $practitioner->name }}</td>
                <td>{{ $practitioner->surname }}</td>
                <td>{{ $practitioner->email }}</td>
                <td>{{ $practitioner->cdv_email}}</td>

                <td>

                    <a class="btn btn-small btn-success btn-sm" href="{{ URL::to('practitioners/' . $practitioner->id) }}">Details</a>
                    <a class="btn btn-small btn-info btn-sm" href="{{ URL::to('practitioners/' . $practitioner->id . '/edit') }}">Edit</a>
                    {{ Form::open(array('url' => 'practitioners/' . $practitioner->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-small btn-danger btn-sm', 'style' => 'margin-top: 4px;')) }}
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</main>
</div>
</body>
</html>
