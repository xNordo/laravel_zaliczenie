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
                <li class="nav-item"><a class="nav-link" href="{{ URL::to('practitioners') }}">View All practitioners</a></li>
                <li class="nav-item"><a class="nav-link active" href="{{ URL::to('practitioners/create') }}">Create a practitioner</a>
            </ul>
        </header>
    </div>

    <h1 class="h3 mb-3 fw-normal">Create education history</h1>
    <div class="row g-5">
        {{ HTML::ul($errors->all()) }}

        {{ Form::open(array('url' => sprintf('practitioners/%d/education_histories', $practitionerId))) }}

        <div class="row">
            <div class="col">
                {{ Form::label('degree', 'Degree') }}
                {{ Form::text('degree', Request::old('degree'), array('class' => 'form-control')) }}
            </div>

            <div class="col">
                {{ Form::label('specialisation', 'Specialisation') }}
                {{ Form::text('specialisation', Request::old('specialisation'), array('class' => 'form-control')) }}
            </div>
        </div>

        <div>
            {{ Form::checkbox('certificate', Request::old('certificate')) }}
            {{ Form::label('certificate', 'Certificate') }}
        </div>


        {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}
    </div>

</main>
</div>
</body>
</html>
