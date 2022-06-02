@extends('layouts.admin', [
  'page_header' => 'Students',
  'dash' => '',
  'users' => '',
  'pass' => '',
  'ins' => '',
  'pay' => 'active',
  'sett' => ''
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
      <button type="button" class="btn btn-wave" data-toggle="modal" data-target="#createModal">Add Passenger</button>
      <button type="button" class="btn btn-wave" data-toggle="modal" data-target="#importPayment">Import Payment</button>
      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#AllDeleteModal">Delete All Passengers</button>
      <a href="{{route('admin.passengers.create')}}" class="btn btn-warning">Create</a>
    </div>
      <!-- Import Payment Modal -->
      <div id="importPayment" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Import Payment (Excel File With Exact Header of DataBase Field)</h4>
            </div>
            {!! Form::open(['method' => 'POST', 'action' => '\App\Http\Controllers\PassengerController@paymentImportExcelToDB', 'files' => true]) !!}
              <div class="modal-body">
                {{-- {!! Form::hidden('topic_id', $topic->id) !!} --}}
                <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                  {!! Form::label('file', 'Import Payment Via Excel File', ['class' => 'col-sm-3 control-label']) !!}
                  <span class="required">*</span>
                  <div class="col-sm-9">
                    {!! Form::file('file', ['required' => 'required']) !!}
                    <p class="help-block">Only Excel File (.CSV and .XLS)</p>
                    <small class="text-danger">{{ $errors->first('file') }}</small>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <div class="btn-group pull-right">
                  {!! Form::reset("Reset", ['class' => 'btn btn-default']) !!}
                  {!! Form::submit("Import", ['class' => 'btn btn-wave']) !!}
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
              <th>Passenger Name</th>
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
                  <td>{{$payment->passenger->policy_number}}</td>
                  <td>{{$payment->passenger->name}}</td>
                  <td>{{$payment->passenger->pp_number}}</td>
                  <td>{{$payment->account_number}}</td>
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
                            {!! Form::open(['method' => 'DELETE', 'action' => ['\App\Http\Controllers\PaymentController@destroy', $payment->id]]) !!}
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
                    {!! Form::model($payment, ['method' => 'PATCH', 'action' => ['\App\Http\Controllers\PaymentController@update', $payment->id]]) !!}
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

                              {!! Form::select('payment_type', ['Bkash' => 'Bkash', 'Rocket'=>'Rocket', 'Nagad'=>'Nagad', 'Upay'=>'Upay', 'Ucash'=>'Ucash'], null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                              <small class="text-danger">{{ $errors->first('payment_type') }}</small>
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
  $('#ch1').click(function(){
    $('#pass').show();
  });

  $('#ch2').click(function(){
    $('#pass').hide();
  });

//jQuery Datepicker adding days
$(document).ready(function() {
    $("#effective_date").datepicker({
        changeMonth: true,
        showOtherMonths: true,
        selectOtherMonths: true,
        format: "dd/mm/yyyy",
        autoclose: true,
        onSelect: function(selectedDate) {
            //$("#cal4").datepicker("setDate", selectedDate);
            var date = $(this).datepicker("getDate");
            date.setDate(date.getDate() + 29);
            $("#termination_date").datepicker("setDate", date);
            $("#termination_date").datepicker( "option", "minDate", selectedDate );
        }
    });
    $("#termination_date").datepicker({
      
        showOtherMonths: true,
        selectOtherMonths: true,
        format: "dd/mm/yyyy",
        autoclose: true,
        onSelect: function(selectedDate) {
            $("#effective_date").datepicker( "option", "maxDate", selectedDate );
        }
    });

    $("#dob").datepicker({
      changeMonth: true,
      changeYear: true,
      format: "dd/mm/yyyy",
      autoclose: true,
      yearRange: '1950:2000',
  });


    
  $('body').on('change', '#insStatus', function(){
    var id = $(this).attr('data-id');
    if(this.checked){
      var status = 1;
    }else{
      var status = 0;
    }
    
    $.ajax({
      method: "get",
      url: "passenger/status/"+id+"/"+status,
      success: function (response) {
        console.log(response);
      }
    });
  });

});

</script>

@endsection
