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
  'pay' => '',
  'sett' => ''
])

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> 
@endsection

@section('content')
@include('message')
  @if ($auth->role == 'A')
  <div class="content-block box">
    <div class="box-body table-responsive">
      <div class="row">
        <div class="col-md-6">

          <input class="typeahead form-control" id="search" type="text">

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
  </div>
    
    
  @endif
@endsection
@section('scripts')

<script type="text/javascript">
   var path = "{{ route('admin.autocomplete') }}";
  
  $( "#search" ).autocomplete({
      source: function( request, response ) {
        $.ajax({
          url: path,
          type: 'GET',
          dataType: "json",
          data: {
             search: request.term
          },
          success: function( data ) {
             response( data );
          }
        });
      },
      select: function (event, ui) {
         $('#search').val(ui.item.label);
         console.log(ui.item); 
         return false;
      }
    });
</script>

@endsection
