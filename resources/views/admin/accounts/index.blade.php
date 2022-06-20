@extends('layouts.admin', [
  'page_header' => 'Account List',
  'dash' => '',
  'users' => '',
  'product' => '',
  'disc' => '',
  'comorder' => '',
  'pandorder' => '',
  'pay' => '',
  'acc' => 'active',
  'wallet' => ''
])

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"/>
<style>
  .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20rem; }
  .toggle.ios .toggle-handle { border-radius: 20rem; }
</style>
@endsection
@section('content')
@include('message')
  @if ($auth->role == 'A')
    <div class="margin-bottom">
      <button type="button" class="btn btn-wave" data-toggle="modal" data-target="#createModal">Add Account</button>

    </div>
   
    <!-- Create Modal -->
    <div id="createModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Account</h4>
          </div>
          {!! Form::open(['method' => 'POST', 'action' => '\App\Http\Controllers\Admin\AccountController@store']) !!}
            <div class="modal-body">
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group{{ $errors->has('account_name') ? ' has-error' : '' }}">
                    {!! Form::label('account_name', 'Account Name') !!}
                    <span class="required">*</span>
                    {!! Form::text('account_name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter product name']) !!}
                    <small class="text-danger">{{ $errors->first('account_name') }}</small>
                  </div>
                  
                  <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                    {!! Form::label('user_id', 'User') !!}

                    {!! Form::select('user_id', $users, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('user_id') }}</small>
                  </div>

                  <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                    {!! Form::label('status', 'Status') !!}

                    {!! Form::select('status', [1 => 'Active', 0 => 'Inactive'], null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('status') }}</small>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <div class="btn-group pull-right">
                {!! Form::reset("Reset", ['class' => 'btn btn-default']) !!}
                {!! Form::submit("Add", ['class' => 'btn btn-wave']) !!}
              </div>
            </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="content-block box">
          <div class="box-body table-responsive">
            <table id="products" class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Account Name</th>
                  <th>Account Number</th>
                  <th>Username</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @if ($accounts)
                  @php($n = 1)
                  @foreach ($accounts as $key => $account)
                    <tr>
                      <td>
                        {{$n}}
                        @php($n++)
                      </td>
                      <td>{{$account->account_name}}</td>
                      <td>{{$account->account_number}}</td>
                      <td>{{$account->user->username}}</td>
                      <td><button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#{{$account->id}}accountActiveModal">{{$account->status == 0 ? 'Inactive' : 'Active'}}</button></td>
                      
                      <td>
                        <!-- Edit Button -->
                        <a type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#{{$account->id}}EditModal"><i class="fa fa-edit"></i> Edit</a>
                        <!-- Delete Button -->
                        <a type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#{{$account->id}}deleteModal"><i class="fa fa-close"></i> Delete</a>
                        <div id="{{$account->id}}deleteModal" class="delete-modal modal fade" role="dialog">
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
                                {!! Form::open(['method' => 'DELETE', 'action' => ['\App\Http\Controllers\Admin\AccountController@destroy', $account->id]]) !!}
                                    {!! Form::reset("No", ['class' => 'btn btn-gray', 'data-dismiss' => 'modal']) !!}
                                    {!! Form::submit("Yes", ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <!-- account Active model -->
                    <div id="{{$account->id}}accountActiveModal" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Account </h4>
                          </div>
                          {!! Form::model($account, ['method' => 'PATCH', 'action' => ['\App\Http\Controllers\Admin\AccountController@accountActive', $account->id]]) !!}
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-8">
                                  <div class="form-group{{ $errors->has('account_name') ? ' has-error' : '' }}">
                                    {!! Form::label('account_name', 'Account Name') !!}
                                    <span class="required">*</span>
                                    {!! Form::text('account_name', null, ['class' => 'form-control', 'readonly']) !!}
                                    <small class="text-danger">{{ $errors->first('account_name') }}</small>
                                  </div>
                                  
                                  <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                                    {!! Form::label('user_id', 'User') !!}
                
                                    {!! Form::select('user_id', $users, null, ['class' => 'form-control select2', 'disabled']) !!}
                                    <small class="text-danger">{{ $errors->first('user_id') }}</small>
                                  </div>
                
                                  <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                    {!! Form::label('status', 'Status') !!}
                
                                    {!! Form::select('status', [1 => 'Active'], null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                                    <small class="text-danger">{{ $errors->first('status') }}</small>
                                  </div>
                                  
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <div class="btn-group pull-right">
                                {!! Form::submit("Update", ['class' => 'btn btn-wave']) !!}
                              </div>
                            </div>
                          {!! Form::close() !!}
                        </div>
                      </div>
                    </div>
                    <!-- edit model -->
                    <div id="{{$account->id}}EditModal" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Account </h4>
                          </div>
                          {!! Form::model($account, ['method' => 'PATCH', 'action' => ['\App\Http\Controllers\Admin\AccountController@update', $account->id]]) !!}
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-8">
                                  <div class="form-group{{ $errors->has('account_name') ? ' has-error' : '' }}">
                                    {!! Form::label('account_name', 'Account Name') !!}
                                    <span class="required">*</span>
                                    {!! Form::text('account_name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter product name']) !!}
                                    <small class="text-danger">{{ $errors->first('account_name') }}</small>
                                  </div>
                                  
                                  <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                                    {!! Form::label('user_id', 'User') !!}
                
                                    {!! Form::select('user_id', $users, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                                    <small class="text-danger">{{ $errors->first('user_id') }}</small>
                                  </div>
                
                                  <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                    {!! Form::label('status', 'Status') !!}
                
                                    {!! Form::select('status', [1 => 'Active', 0 => 'Inactive'], null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                                    <small class="text-danger">{{ $errors->first('status') }}</small>
                                  </div>
                                  
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <div class="btn-group pull-right">
                                {!! Form::submit("Update", ['class' => 'btn btn-wave']) !!}
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
  @endif
@endsection
@section('scripts')
<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<script>


  $('body').on('change', '#insStatus', function(){
    var id = $(this).attr('data-id');
    if(this.checked){
      var status = 1;
    }else{
      var status = 0;
    }
    
    $.ajax({
      method: "get",
      url: "panding-orders/status/"+id+"/"+status,
      success: function (response) {
        console.log(response);
      }
    });
  });


  $('#products').DataTable({
      "sDom": "<'row'><'row'<'col-md-4'l><'col-md-4'B><'col-md-4'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
      buttons: [
            
            
          ]
    });

</script>

@endsection
