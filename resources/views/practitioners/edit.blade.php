<!DOCTYPE html>
<html>
<head>
    <title>practitioner App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <main>
        <div class="container">
            <header class="d-flex justify-content-center py-3">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link" href="{{ URL::to('practitioners') }}">View All practitioners</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ URL::to('practitioners/create') }}">Create a practitioner</a>
                </ul>
            </header>
        </div>

        <h1 class="h3 mb-3 fw-normal">Edit a practitioner</h1>
        <div class="row g-5">
            <!-- if there are creation errors, they will show here -->
            {{ HTML::ul($errors->all()) }}

            {{ Form::model($practitioner, ['route' => ['practitioners.update', $practitioner->id], 'method' => 'PUT']) }}

            <div class="row">
                <div class="col">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', $practitioner->name, array('class' => 'form-control')) }}
                </div>

                <div class="col">
                    {{ Form::label('surname', 'Surname') }}
                    {{ Form::text('surname', $practitioner->surname, array('class' => 'form-control')) }}
                </div>
            </div>

            <div class="row">
                <div class="col">
                    {{ Form::label('email', 'Email') }}
                    {{ Form::email('email', $practitioner->email, array('class' => 'form-control')) }}
                </div>

                <div class="col">
                    {{ Form::label('cdv_email', 'CDV Email') }}
                    {{ Form::email('cdv_email', $practitioner->cdv_email, array('class' => 'form-control')) }}
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    {{ Form::label('phoneNo', 'Phone number') }}
                    {{ Form::number('phoneNo', $practitioner->phoneNo, array('class' => 'form-control')) }}
                </div>

                <div class="col-md-8">
                    {{ Form::label('linkedin', 'Linkedin') }}
                    {{ Form::text('linkedin', $practitioner->linkedin, array('class' => 'form-control')) }}
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('cv', 'CV') }}
                {{ Form::textarea('cv', $practitioner->cv, array('class' => 'form-control', 'style' => "height: 100px")) }}
            </div>
            <div class="row">
                <div class="col-md-4">
                    {{ Form::label('practitioner_card', 'Practitioner Card') }}
                    {{ Form::text('practitioner_card', $practitioner->practitioner_card, array('class' => 'form-control')) }}
                </div>

                <div class="col-md-1">
                    {{ Form::label('thesis', 'Thesis') }}
                    {{ Form::number('thesis', $practitioner->thesis, array('class' => 'form-control')) }}
                </div>

                <div class="col-md-2">
                    {{ Form::label('commercial_projects_hours', 'Commercial projects hours') }}
                    {{ Form::number('commercial_projects_hours', $practitioner->commercial_projects_hours, array('class' => 'form-control')) }}
                </div>

                <div class="col-md-3">
                    {{ Form::label('commercial_experience_years', 'Commercial experience years') }}
                    {{ Form::number('commercial_experience_years', $practitioner->commercial_experience_years, array('class' => 'form-control')) }}
                </div>

                <div class="col-md-2">
                    {{ Form::label('publications', 'Publications') }}
                    {{ Form::number('publications', $practitioner->phoneNo, array('class' => 'form-control')) }}
                </div>
            </div>

            <div>
                {{ Form::checkbox('participation_in_finished_project', null, $practitioner->participation_in_finished_project) }}
                {{ Form::label('participation_in_finished_project', 'Participated in finished project') }}
            </div>

            <div>
                {{ Form::checkbox('team_management', null, $practitioner->team_management) }}
                {{ Form::label('team_management', 'Managed a team') }}
            </div>


            {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}
        </div>

    </main>
</div>
</body>
</html>
