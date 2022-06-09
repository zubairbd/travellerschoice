@extends('layouts.admin', [
  'page_header' => 'Students',
  'dash' => '',
  'users' => '',
  'pass' => '',
  'ins' => '',
  'pay' => '',
  'sett' => ''
])

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"/>
<style>
  .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20rem; }
  .toggle.ios .toggle-handle { border-radius: 20rem; }
</style>
@endsection
@section('pandingord')active @endsection
@section('content')
@include('message')
  @if ($auth->role == 'A')
    <div class="margin-bottom">
      <button type="button" class="btn btn-wave" data-toggle="modal" data-target="#createModal">Add Passenger</button>
      <button type="button" class="btn btn-wave" data-toggle="modal" data-target="#importPassenger">Import Passengers</button>
      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#AllDeleteModal">Delete All Passengers</button>
      <a href="{{route('admin.passengers.create')}}" class="btn btn-warning">Create</a>
    </div>
    <!-- All Delete Button -->
    <div id="AllDeleteModal" class="delete-modal modal fade" role="dialog">
      <!-- All Delete Modal -->
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="delete-icon"></div>
          </div>
          <div class="modal-body text-center">
            <h4 class="modal-heading">Are You Sure ?</h4>
            <p>Do you really want to delete "All these records"? This process cannot be undone.</p>
          </div>
          <div class="modal-footer">
            {!! Form::open(['method' => 'POST', 'action' => '\App\Http\Controllers\DestroyAllController@AllPassengerDestroy']) !!}
                {!! Form::reset("No", ['class' => 'btn btn-gray', 'data-dismiss' => 'modal']) !!}
                {!! Form::submit("Yes", ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
    <!-- Create Modal -->
    <div id="createModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Insurance</h4>
          </div>
          {!! Form::open(['method' => 'POST', 'action' => '\App\Http\Controllers\PassengerController@store']) !!}
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
                    {!! Form::text('pp_number', null, ['class' => 'form-control', 'placeholder' => 'eg: AB1234567', 'required' => 'required', 'maxlength'=> '9']) !!}
                    <small class="text-danger">{{ $errors->first('pp_number') }}</small>
                  </div>
                  <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                    {!! Form::label('dob', 'Date of birth') !!}
                    <span class="required">*</span>
                    {!! Form::text('dob', null, ['class' => 'form-control datepicker', 'id' => 'dob', 'placeholder' => '01/01/1997', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('dob') }}</small>
                  </div>
                  {{-- <div class="form-group{{ $errors->has('policy_number') ? ' has-error' : '' }}">
                    {!! Form::label('policy_number', 'Policy Number') !!}
                    <span class="required">*</span>
                    {!! Form::text('policy_number', null, ['class' => 'form-control', 'placeholder' => 'eg: AB1234567', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('policy_number') }}</small>
                  </div> --}}
                  <div class="form-group{{ $errors->has('insurance_type') ? ' has-error' : '' }}">
                    {!! Form::label('insurance_type', 'Insurance Type') !!}

                    {!! Form::select('insurance_type', ['Worldtrips' => 'Worldtrips', 'WeCare'=>'WeCare', 'Dubai Insurance'=>'DubaiInsurance'], null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('destination') }}</small>
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

                    {!! Form::text('termination_date', null, ['class' => 'form-control datepicker', 'id' => 'termination_date', 'placeholder' => 'DD/MM/YY']) !!}
                    <small class="text-danger">{{ $errors->first('termination_date') }}</small>
                  </div>
                 
                <div class="form-group{{ $errors->has('creator') ? ' has-error' : '' }}">
                    {!! Form::label('creator', 'User') !!}

                    {!! Form::select('creator', $users, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('creator') }}</small>
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
    <!-- Import Passenger Modal -->
  <div id="importPassenger" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Import Passengers (Excel File With Exact Header of DataBase Field)</h4>
        </div>
        {!! Form::open(['method' => 'POST', 'action' => '\App\Http\Controllers\PassengerController@importExcelToDB', 'files' => true]) !!}
          <div class="modal-body">
            {{-- {!! Form::hidden('topic_id', $topic->id) !!} --}}
            <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
              {!! Form::label('file', 'Import Passengers Via Excel File', ['class' => 'col-sm-3 control-label']) !!}
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
              <th>Effective</th>
              <th>Destination</th>
              <th>Payment</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @if ($passengers)
              @php($n = 1)
              @foreach ($passengers as $key => $passenger)
                <tr>
                  <td>
                    {{$n}}
                    @php($n++)
                  </td>
                  <td>{{$passenger->policy_number}}</td>
                  <td>{{$passenger->name}}</td>
                  <td>{{$passenger->pp_number}}</td>
                  <td>{{date('d/m/Y', strtotime($passenger->effective_date))}}</td>
                  <td>{{$passenger->destination}}</td>
                  <td>
                    @if (!empty($passenger->payments->passenger_id))
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
                    <input class="toggle-class" type="checkbox" data-size="mini" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" id="insStatus" data-id="{{$passenger->id}}" {{ $passenger->status ? 'checked' : '' }}>
                  </td>
                  <td>
                    <!-- Edit Button -->
                    <a type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#{{$passenger->id}}EditModal"><i class="fa fa-edit"></i> Edit</a>
                    <!-- Delete Button -->
                    <a type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#{{$passenger->id}}deleteModal"><i class="fa fa-close"></i> Delete</a>
                    <div id="{{$passenger->id}}deleteModal" class="delete-modal modal fade" role="dialog">
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
                            {!! Form::open(['method' => 'DELETE', 'action' => ['\App\Http\Controllers\PassengerController@destroy', $passenger->id]]) !!}
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
                <div id="{{$passenger->id}}EditModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Insurance </h4>
                      </div>
                      {!! Form::model($passenger, ['method' => 'PATCH', 'action' => ['\App\Http\Controllers\PassengerController@update', $passenger->id]]) !!}
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
            
                                {!! Form::select('insurance_type', ['Worldtrips' => 'Worldtrips', 'WeCare'=>'WeCare', 'Dubai Insurance'=>'DubaiInsurance'], null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                                <small class="text-danger">{{ $errors->first('destination') }}</small>
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
      yearRange: '1950:2022',
  });


  // $(function() {
  //   $('.toggle-class').change(function() {
  //       var status = $(this).prop('checked') == true ? 1 : 0; 
  //       var passenger_id = $(this).data('id'); 
         
  //       $.ajax({
  //           type: "GET",
  //           dataType: "json",
  //           url: 'passenger/status',
  //           data: {'status': status, 'passenger_id': passenger_id},
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
  //   //   url: "passenger/status/"+id+"/"+status,
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
      url: "passenger/status/"+id+"/"+status,
      success: function (response) {
        console.log(response);
      }
    });
  });

});

</script>

@endsection
