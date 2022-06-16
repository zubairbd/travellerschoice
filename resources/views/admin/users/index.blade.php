@extends('layouts.admin-master')@section('dashboard')current-menu-item @endsection
@section('admin.user') active @endsection
@section('styles')
<!-- Custom styles for this page -->
<link href="{{asset('frontend')}}/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<style>
    
</style>
@endsection
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User List</h1>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#createModal">Add User</button>
      
    </div>
    
    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}
        </div>
    @endif
    <!-- Create Modal -->
    <div id="createModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Add User</h4>
            </div>
            {!! Form::open(['method' => 'POST', 'action' => '\App\Http\Controllers\Admin\UsersController@store']) !!}
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                      {!! Form::label('name', 'User Name') !!}
                      <span class="required">*</span>
                      {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter Your Name']) !!}
                      <small class="text-danger">{{ $errors->first('name') }}</small>
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                      {!! Form::label('email', 'Email address') !!}
                      <span class="required">*</span>
                      {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'eg: info@examlpe.com', 'required' => 'required']) !!}
                      <small class="text-danger">{{ $errors->first('email') }}</small>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                      {!! Form::label('password', 'Password') !!}
                      <span class="required">*</span>
                      {!! Form::password('password', ['class' => 'form-control', 'placeholder'=>'Enter Your Password', 'required' => 'required']) !!}
                      <small class="text-danger">{{ $errors->first('password') }}</small>
                    </div>
                    <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                        {!! Form::label('role', 'User Role') !!}
                        <span class="required">*</span>
                        {!! Form::select('role', ['U' => 'User', 'AG'=>'Agent', 'A'=>'Administrator'], null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('role') }}</small>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                      {!! Form::label('mobile', 'Mobile No.') !!}
                      <span class="required">*</span>
                      {!! Form::text('mobile', null, ['class' => 'form-control', 'placeholder' => 'eg: +91-123-456-7890', 'required' => 'required']) !!}
                      <small class="text-danger">{{ $errors->first('mobile') }}</small>
                    </div>
                    <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                      {!! Form::label('city', 'Enter City') !!}
                      {!! Form::text('city', null, ['class' => 'form-control', 'placeholder'=>'Enter Your City']) !!}
                      <small class="text-danger">{{ $errors->first('city') }}</small>
                    </div>
                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                      {!! Form::label('address', 'Address') !!}
                      {!! Form::textarea('address', null, ['class' => 'form-control', 'rows'=>'5', 'placeholder' => 'Enter Your address']) !!}
                      <small class="text-danger">{{ $errors->first('address') }}</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <div class="btn-group pull-right">
                  {!! Form::reset("Reset", ['class' => 'btn btn-secondary']) !!}
                  {!! Form::submit("Add", ['class' => 'btn btn-info']) !!}
                </div>
              </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        {{-- <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Insurance List</h6>
        </div> --}}
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                          <th>#</th>
                          <th>User Name</th>
                          <th>Email</th>
                          <th>Mobile No.</th>
                          <th>City</th>
                          <th>Address</th>
                          <th>User Role</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if ($users)
                          @php($n = 1)
                          @foreach ($users as $key => $user)
                            <tr>
                              <td>
                                {{$n}}
                                @php($n++)
                              </td>
                              <td>{{$user->name}}</td>
                              <td>{{$user->email}}</td>
                              <td>{{$user->mobile}}</td>
                              <td>{{$user->city}}</td>
                              <td>{{$user->address}}</td>
                              <td>
                                
                                @if($user->role == 'U') 
                                User
                                @elseif($user->role == 'AG')
                                Agent
                                @else
                                -
                                @endif
            
                              
                              </td>
                              <td>
                                <!-- Edit Button -->
                                <a type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#{{$user->id}}EditModal"><i class="fa fa-edit"></i> Edit</a>
                                <!-- Delete Button -->
                                <a type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-close"></i> Delete</a>
                                <div id="deleteModal" class="delete-modal modal fade" role="dialog">
                                  <!-- Delete Modal -->
                                  <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <div class="delete-icon"></div>
                                      </div>
                                      <div class="modal-body text-center">
                                        <h4 class="modal-heading">Are You Sure ?</h4>
                                        <p>Do you really want to delete these records? This process cannot be undone.</p>
                                      </div>
                                      <div class="modal-footer">
                                        {!! Form::open(['method' => 'DELETE', 'action' => ['\App\Http\Controllers\Admin\UsersController@destroy', $user->id]]) !!}
                                            {!! Form::reset("No", ['class' => 'btn btn-gray', 'data-dismiss' => 'modal']) !!}
                                            {!! Form::submit("Yes", ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <!-- edit model -->
                            <div id="{{$user->id}}EditModal" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Edit User </h4>
                                    </div>
                                    {!! Form::model($user, ['method' => 'PATCH', 'action' => ['\App\Http\Controllers\Admin\UsersController@update', $user->id]]) !!}
                                      <div class="modal-body">
                                        <div class="row">
                                          <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                              {!! Form::label('name', 'Name') !!}
                                              <span class="required">*</span>
                                              {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter your name']) !!}
                                              <small class="text-danger">{{ $errors->first('name') }}</small>
                                            </div>
                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                              {!! Form::label('email', 'Email address') !!}
                                              <span class="required">*</span>
                                              {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'eg: info@example.com', 'required' => 'required']) !!}
                                              <small class="text-danger">{{ $errors->first('email') }}</small>
                                            </div>
                                            {{-- <label for="">Change Password: </label>
                                            <input type="checkbox" name="changepass"> --}}
                                            {{-- <input type="radio" value="1" name="changepass" id="ch1">&nbsp;Yes
                                             <input type="radio" value="0" name="changepass" checked id="ch2">&nbsp;No --}}
                                             <br>
                                            <div id="pass" class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                              {!! Form::label('password', 'Password') !!}
                                              <span class="required">*</span>
              
                                              <input class="form-control" type="password" value="" placeholder="Enter new password" name="password">
                                              <small class="text-danger">{{ $errors->first('password') }}</small>
                                            </div>
              
                                            <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                                                {!! Form::label('role', 'User Role') !!}
              
                                                {!! Form::select('role', ['U' => 'User', 'AG'=>'Agent', 'A'=>'Administrator'], null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                                                <small class="text-danger">{{ $errors->first('role') }}</small>
                                            </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                              {!! Form::label('mobile', 'Mobile No.') !!}
              
                                              {!! Form::text('mobile', null, ['class' => 'form-control', 'placeholder' => 'eg: +91-123-456-7890']) !!}
                                              <small class="text-danger">{{ $errors->first('mobile') }}</small>
                                            </div>
                                            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                              {!! Form::label('city', 'Enter City') !!}
                                              {!! Form::text('city', null, ['class' => 'form-control', 'placeholder'=>'Enter Your City']) !!}
                                              <small class="text-danger">{{ $errors->first('city') }}</small>
                                            </div>
                                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                              {!! Form::label('address', 'Address') !!}
                                              {!! Form::textarea('address', null, ['class' => 'form-control', 'rows'=>'5', 'placeholder' => 'Enter Your Address']) !!}
                                              <small class="text-danger">{{ $errors->first('address') }}</small>
                                            </div>
              
                                          </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <div class="btn-group pull-right">
                                          {!! Form::submit("Update", ['class' => 'btn btn-info']) !!}
                                        </div>
                                      </div>
                                    {!! Form::close() !!}
                                  </div>
                                </div>
                              </div>
                          @endforeach
                        @endif
                      </tbody>
                    
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
@section('scripts')
    <!-- Page level plugins -->
    <script src="{{asset('frontend')}}/assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('frontend')}}/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('frontend')}}/assets/js/demo/datatables-demo.js"></script>
    <script>
        $('#ch1').click(function(){
            $('#pass').show();
        });

        $('#ch2').click(function(){
            $('#pass').hide();
        });
        
    </script>
@endsection