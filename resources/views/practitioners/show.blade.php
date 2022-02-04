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
                <li class="nav-item"><a class="nav-link" href="{{ URL::to('practitioners/create') }}">Create a practitioner</a>
            </ul>
        </header>
    </div>


    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <div class="row">
        <div class="col">
            <h3>Practitioner Details</h3>
            <table class="table table-striped table-bordered ">
                <tbody>
                <tr>
                    <th>Name</th>
                    <td>{{ $practitioner->name }}</td>
                </tr>
                <tr>
                    <th>Surname</th>
                    <td>{{ $practitioner->surname }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $practitioner->email }}</td>
                </tr>
                <tr>
                    <th>CDV Email</th>
                    <td>{{ $practitioner->cdv_email }}</td>
                </tr>
                <tr>
                    <th>Phone number</th>
                    <td>{{ $practitioner->phoneNo }}</td>
                </tr>
                <tr>
                    <th>CV</th>
                    <td>{{ $practitioner->cv }}</td>
                </tr>
                <tr>
                    <th>Practitioner card</th>
                    <td>{{ $practitioner->practitioner_card }}</td>
                </tr>
                <tr>
                    <th>Thesis</th>
                    <td>{{ $practitioner->thesis }}</td>
                </tr>
                <tr>
                    <th>Commercial projects hours</th>
                    <td>{{ $practitioner->commercial_projects_hours }}</td>
                </tr>
                <tr>
                    <th>linkedin</th>
                    <td>{{ $practitioner->linkedin }}</td>
                </tr>
                <tr>
                    <th>Commercial experience years</th>
                    <td>{{ $practitioner->commercial_experience_years }}</td>
                </tr>
                <tr>
                    <th>Publications</th>
                    <td>{{ $practitioner->publications }}</td>
                </tr>
                <tr>
                    <th>Participated in finished project</th>
                    <td>
                        @if($practitioner->participation_in_finished_project)
                            Yes
                        @else
                            No
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Managed team</th>
                    <td>
                        @if($practitioner->team_management)
                            Yes
                        @else
                            No
                        @endif
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col">
            <div class="row">
                <div class="col">
                    <h3>Education History</h3>
                </div>
                <div class="col-6">
                    <a class="btn btn-success btn-md" href="{{ URL::to(sprintf('practitioners/%d/education_histories/create/', $practitioner->id)) }}">Add new</a>
                </div>
            </div>
            <table class="table table-striped table-bordered ">
                <thead>
                <tr>
                    <th scope="col">Degree</th>
                    <th scope="col">Specialisation</th>
                    <th scope="col">Certificate</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($practitioner->educationHistories as $educationHistory)
                    <tr>
                        <td> {{ $educationHistory->degree }} </td>
                        <td> {{ $educationHistory->specialisation }} </td>
                        <td>
                            @if($educationHistory->certificate)
                                Yes
                            @else
                                No
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-small btn-info btn-sm" href="{{ URL::to(sprintf('practitioners/%s/education_histories/%d/edit/', $practitioner->id, $educationHistory->id)) }}">Edit</a>
                            {{ Form::open(array('url' => sprintf('practitioners/%s/education_histories/%d/', $practitioner->id, $educationHistory->id), 'class' => 'pull-right')) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-small btn-danger btn-sm', 'style' => 'margin-top: 4px;')) }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
                <tr>

                </tr>
                </tbody>
            </table>
        </div>
    </div>

</main>
</div>
</body>
</html>
