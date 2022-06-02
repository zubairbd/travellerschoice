<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Demo in Laravel 7</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  </head>
  <body>
      <div class="header">
          <div class="container">
              <div class="row">
                  <div class="col-md-6">
                      <div class="logo">
                          <img src="{{public_path('images/worldtrips.jpg')}}" astyle="width: 100px; height: 100px">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="logo">
                          <h2>hi</h2>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    <table class="table table-bordered">
    <thead>
      <tr class="table-danger">
        <td>Name</td>
        <td>Email</td>
        <td>Phone Number</td>
        <td>DOB</td>
      </tr>
      </thead>
      <tbody>
        @foreach ($employee as $data)
        <tr>
            <td>{{ $data->name }}</td>
            <td>{{ $data->email }}</td>
            <td>{{ $data->phone_number }}</td>
            <td>{{ $data->dob }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </body>
</html>