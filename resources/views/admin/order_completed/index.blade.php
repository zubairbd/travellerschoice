@extends('layouts.admin', [
  'page_header' => 'Completed Orders',
  'dash' => '',
  'users' => '',
  'product' => '',
  'disc' => '',
  'comorder' => 'active',
  'pandorder' => '',
  'pay' => '',
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
   
    <div class="content-block box">
      <div class="box-body table-responsive">
        <table id="example1" class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Policy No</th>
              <th>Insurance Name</th>
              <th>Passport</th>
              <th>Effective</th>
              <th>Destination</th>
              <th>Payment</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @if ($insurances)
              @php($n = 1)
              @foreach ($insurances as $key => $insurance)
                <tr>
                  <td>
                    {{$n}}
                    @php($n++)
                  </td>
                  <td>{{$insurance->policy_number}}</td>
                  <td>{{$insurance->name}}</td>
                  <td>{{$insurance->pp_number}}</td>
                  <td>{{date('d/m/Y', strtotime($insurance->effective_date))}}</td>
                  <td>{{$insurance->destination}}</td>
                  <td>
                    @if (!empty($insurance->payments->insurance))
                    <span class="btn btn-success btn-xs">Paid</span>
                    @else
                    <span class="btn btn-danger btn-xs">Unpaid</span>
                    @endif
                  </td>
                  <td>
                    {{-- <label class="switch">
                      <input type="checkbox">
                      <span class="slider round"></span>
                    </label> --}}
                    {{-- <input type="checkbox" checked data-toggle="toggle" data-on="" data-off="" data-onstyle="success" data-offstyle="danger" data-style="ios"> --}}
                    <input class="toggle-class" type="checkbox" data-size="mini" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" id="insStatus" data-id="{{$insurance->id}}" {{ $insurance->status ? 'checked' : '' }}>
                  </td>
                  <td>
                    
                    @if (!empty($insurance->payments->insurance_id))
                        @if ($insurance->insurance_type == 'Worldtrips')
                        <a href="{{route('admin.insurance.worltrip',$insurance->policy_number)}}" class="btn btn-info btn-xs"><i class="fa fa-print"></i> Print</a>
                        @elseif ($insurance->insurance_type == 'WeCare')
                        <a href="{{route('admin.insurance.wecare',$insurance->policy_number)}}" class="btn btn-info btn-xs"><i class="fa fa-print"></i> Print</a>
                        @endif
                        
                    @else 
                        <span class="btn btn-danger btn-xs">Panding</span>
                    @endif
                  <!-- Edit Button -->
                  <a type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#{{$insurance->id}}EditModal"><i class="fa fa-edit"></i> Edit</a>
                    <!-- Delete Button -->
                    <a type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#{{$insurance->id}}deleteModal"><i class="fa fa-close"></i> Delete</a>
                    <div id="{{$insurance->id}}deleteModal" class="delete-modal modal fade" role="dialog">
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
                            {!! Form::open(['method' => 'DELETE', 'action' => ['\App\Http\Controllers\Admin\CompletedOrderController@destroy', $insurance->id]]) !!}
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
                <div id="{{$insurance->id}}EditModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Insurance </h4>
                      </div>
                      {!! Form::model($insurance, ['method' => 'PATCH', 'action' => ['\App\Http\Controllers\Admin\CompletedOrderController@update', $insurance->id]]) !!}
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                {!! Form::label('name', 'Name') !!}
                                <span class="required">*</span>
                                {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter your name']) !!}
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                              </div>
                              <div class="form-group{{ $errors->has('pp_number') ? ' has-error' : '' }}">
                                {!! Form::label('pp_number', 'Passport No') !!}
                                <span class="required">*</span>
                                {!! Form::text('pp_number', null, ['class' => 'form-control', 'placeholder' => 'eg: AB1234567', 'required' => 'required']) !!}
                                <small class="text-danger">{{ $errors->first('pp_number') }}</small>
                              </div>
                              <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                                {!! Form::label('dob', 'Date of birth') !!}
                                <span class="required">*</span>
                                {!! Form::text('dob', null, ['class' => 'form-control datepicker', 'id' => 'dob', 'placeholder' => '01/01/1997', 'required' => 'required']) !!}
                                <small class="text-danger">{{ $errors->first('dob') }}</small>
                              </div>
                              <div class="form-group{{ $errors->has('policy_number') ? ' has-error' : '' }}">
                                {!! Form::label('policy_number', 'Policy Number') !!}
                                <span class="required">*</span>
                                {!! Form::text('policy_number', null, ['class' => 'form-control', 'placeholder' => 'eg: AB1234567', 'required' => 'required']) !!}
                                <small class="text-danger">{{ $errors->first('policy_number') }}</small>
                              </div>
                              <div class="form-group{{ $errors->has('updated_at') ? ' has-error' : '' }}">
                                {!! Form::label('updated_at', 'Issue Date') !!}

                                {!! Form::text('updated_at', null, ['class' => 'form-control datepicker', 'id' => 'updated_at', 'placeholder' => 'eg: 01/02/2021']) !!}
                                <small class="text-danger">{{ $errors->first('updated_at') }}</small>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group{{ $errors->has('destination') ? ' has-error' : '' }}">
                                {!! Form::label('destination', 'Destination') !!}

                                {!! Form::select('destination', ['Saudi Arabia' => 'Saudi Arabia', 'Oman'=>'Oman', 'United Arab Emirates'=>'United Arab Emirates', 'Qatar'=>'Qatar', 'Kuwait'=>'Kuwait'], null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                                <small class="text-danger">{{ $errors->first('destination') }}</small>
                              </div>

                              <div class="form-group{{ $errors->has('effective_date') ? ' has-error' : '' }}">
                                {!! Form::label('effective_date', 'Effective Date') !!}

                                {!! Form::text('effective_date', null, ['class' => 'datepicker form-control', 'id' => 'effective_date', 'placeholder' => 'DD/MM/YY']) !!}
                                <small class="text-danger">{{ $errors->first('effective_date') }}</small>
                              </div>

                              <div class="form-group{{ $errors->has('termination_date') ? ' has-error' : '' }}">
                                {!! Form::label('termination_date', 'Termination Date') !!}

                                {!! Form::text('termination_date', null, ['class' => 'form-control datepicker', 'id' => 'termination_date', 'placeholder' => 'eg: 01/02/2021']) !!}
                                <small class="text-danger">{{ $errors->first('termination_date') }}</small>
                              </div>
                              
                              

                              <div class="form-group{{ $errors->has('insurance_type') ? ' has-error' : '' }}">
                                {!! Form::label('insurance_type', 'Insurance Type') !!}
            
                                {!! Form::select('insurance_type', $products, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                                <small class="text-danger">{{ $errors->first('insurance_type') }}</small>
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
  

  // $(function() {
  //   $('.toggle-class').change(function() {
  //       var status = $(this).prop('checked') == true ? 1 : 0; 
  //       var Insurance_id = $(this).data('id'); 
         
  //       $.ajax({
  //           type: "GET",
  //           dataType: "json",
  //           url: 'Insurance/status',
  //           data: {'status': status, 'Insurance_id': Insurance_id},
  //           success: function(data){
  //             console.log(data);
  //             if(data.status == 'success') {
              
  //           }else{
  //               alert('error');
  //               console.log(msg);
  //           }
  //           }
  //       });
  //   })
  // })

  // $('body').on('change', '#insStatus', function(){
  //   var id = $(this).attr('data-id');
  //   if(this.checked){
  //     var status = 1;
  //   }else{
  //     var status = 0;
  //   }
  //   console.log(status);
  //   // $.ajax({
  //   //   method: "get",
  //   //   url: "Insurance/status/"+id+"/"+status,
  //   //   success: function (response) {
  //   //     console.log(response);
  //   //   }
  //   // });
  //   });

    
  $('body').on('change', '#insStatus', function(){
    var id = $(this).attr('data-id');
    if(this.checked){
      var status = 1;
    }else{
      var status = 0;
    }
    
    $.ajax({
      method: "get",
      url: "orders-completed/status/"+id+"/"+status,
      success: function (response) {
        console.log(response);
      }
    });
  });



</script>

@endsection
