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

    <h1>Create a practitioner</h1>

    <!-- if there are creation errors, they will show here -->

    {{ Form::open(array('url' => 'practitioners')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', Request::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('surname', 'Surname') }}
        {{ Form::text('surname', Request::old('surname'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', Request::old('email'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('cdv_email', 'CDV Email') }}
        {{ Form::email('cdv_email', Request::old('cdv_email'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('phoneNo', 'Phone number') }}
        {{ Form::number('phoneNo', Request::old('phoneNo'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('cv', 'CV') }}
        {{ Form::textarea('cv', Request::old('cv'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('practitioner_card', 'Practitioner Card') }}
        {{ Form::text('practitioner_card', Request::old('practitioner_card'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('thesis', 'Thesis') }}
        {{ Form::number('thesis', Request::old('thesis'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('commercial_projects_hours', 'Commercial projects hours') }}
        {{ Form::number('commercial_projects_hours', Request::old('commercial_projects_hours'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('linkedin', 'Linkedin') }}
        {{ Form::text('linkedin', Request::old('linkedin'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('commercial_experience_years', 'Commercial experience years') }}
        {{ Form::number('commercial_experience_years', Request::old('commercial_experience_years'), array('class' => 'form-control')) }}
    </div>


    <div class="form-group">
        {{ Form::label('participation_in_finished_project', 'Participated in finished project') }}
        {{ Form::radio('participation_in_finished_project', Request::old('participation_in_finished_project'), array('class' => 'form-control')) }}
    </div>


    {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>
</body>
</html>
