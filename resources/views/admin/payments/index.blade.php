@extends('layouts.admin', [
  'page_header' => 'Payments',
  'dash' => '',
  'users' => '',
  'product' => '',
  'disc' => '',
  'comorder' => '',
  'pandorder' => '',
  'pay' => 'active',
  'acc' => '',
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
      <button type="button" class="btn btn-wave" data-toggle="modal" data-target="#createModal">Add Insurance</button>
      <button type="button" class="btn btn-wave" data-toggle="modal" data-target="#importPayment">Import Payment</button>
      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#AllDeleteModal">Delete All Insurances</button>
      <a href="{{route('admin.payments.create')}}" class="btn btn-warning">Create Payment</a>
    </div>
    <!-- Create Modal -->
    <div id="createModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Product</h4>
          </div>
          {!! Form::open(['method' => 'POST', 'action' => '\App\Http\Controllers\Admin\PaymentsController@store']) !!}
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {!! Form::label('name', 'Product Name') !!}
                    <span class="required">*</span>
                    {!! Form::text('name', null, ['class' => 'form-control typeahead', 'required' => 'required', 'placeholder' => 'Enter product name']) !!}
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                  </div>
                  
                  <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'rows'=>'5', 'placeholder' => 'Enter Your address']) !!}
                    <small class="text-danger">{{ $errors->first('description') }}</small>
                  </div>

                </div>
                <div class="col-md-6">
                  <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                    {!! Form::label('price', 'Price') !!}
                    <span class="required">*</span>
                    {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'eg: 1234', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('price') }}</small>
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
    
    <div class="content-block box">
      <div class="box-body table-responsive">
        <table id="example1" class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Policy No</th>
              <th>Insurance Name</th>
              <th>Passport</th>
              <th>Pay From</th>
              <th>Pay Type</th>
              <th>Payment Date</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @if ($payments)
              @php($n = 1)
              @foreach ($payments as $key => $payment)
                <tr>
                  
                  <td>
                    {{$n}}
                    @php($n++)
                  </td>
                  <td>{{$payment->insurance->policy_number}}</td>
                  <td>{{$payment->insurance->name}}</td>
                  <td>{{$payment->insurance->pp_number}}</td>
                  <td>{{$payment->user->name}}</td>
                  <td>{{$payment->payment_type}}</td>
                  <td>{{$payment->created_at->format('F d, Y - h:m a')}}</td>
     
                  <td>
                   
                    <!-- Edit Button -->
                    <a type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#{{$payment->id}}EditModal"><i class="fa fa-edit"></i> Edit</a>
                    <!-- Delete Button -->
                    <a type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#{{$payment->id}}deleteModal"><i class="fa fa-close"></i> Delete</a>
                    <div id="{{$payment->id}}deleteModal" class="delete-modal modal fade" role="dialog">
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
                            {!! Form::open(['method' => 'DELETE', 'action' => ['\App\Http\Controllers\Admin\PaymentsController@destroy', $payment->id]]) !!}
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
               <div id="{{$payment->id}}EditModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Edit Payment </h4>
                    </div>
                    {!! Form::model($payment, ['method' => 'PATCH', 'action' => ['\App\Http\Controllers\Admin\PaymentsController@update', $payment->id]]) !!}
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group{{ $errors->has('account_number') ? ' has-error' : '' }}">
                              {!! Form::label('account_number', 'Mobile Banking Number') !!}

                              {!! Form::text('account_number', null, ['class' => 'form-control', 'id' => 'account_number', 'placeholder' => '']) !!}
                              <small class="text-danger">{{ $errors->first('account_number') }}</small>
                            </div>

                            <div class="form-group{{ $errors->has('payment_type') ? ' has-error' : '' }}">
                              {!! Form::label('payment_type', 'Destination') !!}

                              {!! Form::select('payment_type', ['Wallet' => 'Wallet', 'Bkash' => 'Bkash', 'Rocket'=>'Rocket', 'Nagad'=>'Nagad', 'Upay'=>'Upay', 'Ucash'=>'Ucash'], null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                              <small class="text-danger">{{ $errors->first('payment_type') }}</small>
                            </div>

                          </div>
                          <div class="col-md-6">
                            <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                              {!! Form::label('amount', 'Amount') !!}

                              {!! Form::text('amount', null, ['class' => 'form-control', 'id' => 'amount', 'placeholder' => '']) !!}
                              <small class="text-danger">{{ $errors->first('amount') }}</small>
                            </div>

                            <div class="form-group{{ $errors->has('policy_number') ? ' has-error' : '' }}">
                              {!! Form::label('policy_number', 'Policy Number') !!}

                              {!! Form::text('policy_number', 'policy_number.id', ['class' => 'form-control', 'id' => 'policy_number', 'placeholder' => '']) !!}
                              <small class="text-danger">{{ $errors->first('policy_number') }}</small>
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
  @endif
@endsection
@section('scripts')
<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" ></script> --}}
<script>

//jQuery Datepicker adding days

</script>

@endsection
