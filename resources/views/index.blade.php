<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 7 PDF Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-3">Laravel HTML to PDF Example</h2>
        <div class="d-flex justify-content-end mb-4">
            <a class="btn btn-primary" href="{{ URL::to('/employee/pdf') }}">Export to PDF</a>
        </div>
        
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-danger">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">DOB</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Insurances ?? '' as $data)
                <tr>
                    <th scope="row">{{ $data->id }}</th>
                    <td>{{ $data->policy_number }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->pp_number }}</td>
                    <td>{{ $data->dob }}</td>
                    <td>
                        <a href="{{route('employee.edit',$data->id)}}" class="btn btn-primary">View</a>
                        <a href="{{route('employee.show',$data->id)}}" class="btn btn-warning">Download</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
    
</body>

</html>