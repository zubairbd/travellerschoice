@extends('layouts.admin', [
  'page_header' => 'Students',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'pass' => 'active',
  'ins' => '',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => ''
])

@section('styles')
{{-- <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet" /> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />

@endsection

@section('content')
@include('message')
  @if ($auth->role == 'A')
    
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Passenger</h4>
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
                {!! Form::text('pp_number', null, ['class' => 'form-control', 'placeholder' => 'eg: AB1234567', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('pp_number') }}</small>
                </div>
                <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                {!! Form::label('dob', 'Date of birth') !!}
                <span class="required">*</span>
                {!! Form::date('dob', null, ['class' => 'form-control', 'placeholder' => 'eg: 01/01/1997', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('dob') }}</small>
                </div>
                {{-- <div class="form-group{{ $errors->has('policy_number') ? ' has-error' : '' }}">
                {!! Form::label('policy_number', 'Policy Number') !!}
                <span class="required">*</span>
                {!! Form::text('policy_number', null, ['class' => 'form-control', 'placeholder' => 'eg: AB1234567', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('policy_number') }}</small>
                </div> --}}
                
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('destination') ? ' has-error' : '' }}">
                {!! Form::label('destination', 'Destination') !!}

                {!! Form::select('destination', ['Saudi Arabia' => 'Saudi Arabia', 'Oman'=>'Oman', 'UAE'=>'UAE', 'Qatar'=>'Qatar', 'Kuwait'=>'Kuwait'], null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('destination') }}</small>
                </div>

                {{-- <div class="form-group{{ $errors->has('effective_date') ? ' has-error' : '' }}">
                {!! Form::label('effective_date', 'Effective Date') !!}

                {!! Form::text('effective_date', null, ['class' => 'datepicker form-control', 'id' => 'effective_date', 'placeholder' => 'DD/MM/YY']) !!}
                <small class="text-danger">{{ $errors->first('effective_date') }}</small>
                </div>

                <div class="form-group{{ $errors->has('termination_date') ? ' has-error' : '' }}">
                {!! Form::label('termination_date', 'Termination Date') !!}

                {!! Form::text('termination_date', null, ['class' => 'form-control datepicker', 'id' => 'termination_date', 'placeholder' => 'DD/MM/YY']) !!}
                <small class="text-danger">{{ $errors->first('termination_date') }}</small>
                </div> --}}
                
                    <div class="form-group">
                    <label for="effective_date" class="col-sm-4 col-form-label col-form-label-sm text-danger">Medical Date</label>
                    <input type="text" name="effective_date" id="effective_date" class="datepicker col-sm-7 form-control form-control-sm @error('medical_date') is-invalid @enderror" placeholder="DD/MM/YY">
                  </div>
                  <div class="form-group">
                    <label for="termination_date" class="col-sm-4 col-form-label col-form-label-sm">Medical Expire</label>
                    <input type="text" name="termination_date" id="termination_date" class="datepicker col-sm-7 form-control form-control-sm" placeholder="DD/MM/YY">
                  </div>
                 <div class="form-group">
                   
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
    
  @endif
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src=”https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js”></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" ></script> --}}

<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

@include('admin.passengers.partials.scripts')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script> --}}

<script>
  $('#ch1').click(function(){
    $('#pass').show();
  });

  $('#ch2').click(function(){
    $('#pass').hide();
  });
  
</script>

@endsection
