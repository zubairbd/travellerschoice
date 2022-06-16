@extends('layouts.admin', [
  'page_header' => 'Completed Orders',
  'dash' => '',
  'users' => '',
  'product' => '',
  'disc' => 'active',
  'comorder' => '',
  'pandorder' => '',
  'pay' => '',
  'wallet' => ''
])

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"/>
<style>
  .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20rem; }
  .toggle.ios .toggle-handle { border-radius: 20rem; }
</style>
@endsection
@section('discounts')active @endsection
@section('content')
@include('message')
  @if ($auth->role == 'A')
    <div class="margin-bottom">
      <button type="button" class="btn btn-wave" data-toggle="modal" data-target="#createModal">Add Discount</button>

    </div>
   
    <!-- Create Modal -->
    <div id="createModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Discount</h4>
          </div>
          {!! Form::open(['method' => 'POST', 'action' => '\App\Http\Controllers\Admin\DiscountController@store']) !!}
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group{{ $errors->has('campaign_name') ? ' has-error' : '' }}">
                    {!! Form::label('campaign_name', 'Campaign Name') !!}
                    <span class="required">*</span>
                    {!! Form::text('campaign_name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter product name']) !!}
                    <small class="text-danger">{{ $errors->first('campaign_name') }}</small>
                  </div>
                  
                  <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                    {!! Form::label('role', 'Role') !!}

                    {!! Form::select('role', ['U' => 'Users', 'AG' => 'Agents'], null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('role') }}</small>
                  </div>

                </div>
                <div class="col-md-6">
                  <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                    {!! Form::label('amount', 'Amount') !!}
                    <span class="required">*</span>
                    {!! Form::text('amount', null, ['class' => 'form-control', 'placeholder' => 'eg: 1234', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('amount') }}</small>
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
                  <th>Campaign Name</th>
                  <th>Amount</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @if ($discounts)
                  @php($n = 1)
                  @foreach ($discounts as $key => $discount)
                    <tr>
                      <td>
                        {{$n}}
                        @php($n++)
                      </td>
                      <td>{{$discount->campaign_name}}</td>
                      <td>{{$discount->amount}}</td>
                      <td>{{$discount->role == 'U' ? 'User' : 'Agent'}}</td>
                      <td><button class="btn btn-warning btn-xs">{{$discount->status == 0 ? 'Inactive' : 'Active'}}</button></td>
                      
                      <td>
                        <!-- Edit Button -->
                        <a type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#{{$discount->id}}EditModal"><i class="fa fa-edit"></i> Edit</a>
                        <!-- Delete Button -->
                        <a type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#{{$discount->id}}deleteModal"><i class="fa fa-close"></i> Delete</a>
                        <div id="{{$discount->id}}deleteModal" class="delete-modal modal fade" role="dialog">
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
                                {!! Form::open(['method' => 'DELETE', 'action' => ['\App\Http\Controllers\Admin\DiscountController@destroy', $discount->id]]) !!}
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
                    <div id="{{$discount->id}}EditModal" class="modal fade" role="dialog">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Discount </h4>
                          </div>
                          {!! Form::model($discount, ['method' => 'PATCH', 'action' => ['\App\Http\Controllers\Admin\DiscountController@update', $discount->id]]) !!}
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group{{ $errors->has('campaign_name') ? ' has-error' : '' }}">
                                    {!! Form::label('campaign_name', 'Campaign Name') !!}
                                    <span class="required">*</span>
                                    {!! Form::text('campaign_name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter product name']) !!}
                                    <small class="text-danger">{{ $errors->first('campaign_name') }}</small>
                                  </div>
                                  
                                  <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                                    {!! Form::label('role', 'Role') !!}
                
                                    {!! Form::select('role', ['U' => 'Users', 'AG' => 'Agents'], null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                                    <small class="text-danger">{{ $errors->first('role') }}</small>
                                  </div>
                
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                                    {!! Form::label('amount', 'Amount') !!}
                                    <span class="required">*</span>
                                    {!! Form::text('amount', null, ['class' => 'form-control', 'placeholder' => 'eg: 1234', 'required' => 'required']) !!}
                                    <small class="text-danger">{{ $errors->first('amount') }}</small>
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
