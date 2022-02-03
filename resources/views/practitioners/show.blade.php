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

    <h1>Showing {{ $practitioner->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $practitioner->name }}</h2>
        <p>
            <strong>Email:</strong> {{ $practitioner->email }}<br>
            <strong>Level:</strong> {{ $practitioner->practitioner_level }}
        </p>
    </div>

</div>
</body>
</html>
