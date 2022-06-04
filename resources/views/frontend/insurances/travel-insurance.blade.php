@extends('layouts.frontend-master')
@section('travel-insurance')current-menu-item @endsection
@section('styles')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"/>
@endsection
@section('content')
      <!-- Counter Section Start -->
      <div class="rs-contact-wrap bg5 pt-80 pb-390 md-pt-80">
        <div class="container">
          <div class="sec-title2 text-center mb-30">
              <span class="sub-text style-bg white-color">Insurance Form</span>
              <h2 class="title white-color">
                 Type Your Travler Information
              </h2>
          </div>           
        </div>
     </div>
     <!-- Counter Section End -->
 <!-- Video Section End -->
 <div class="rs-travelform-wrap style2 inner pb-120 md-pb-80">
    <div class="container">
        <div class="row justify-content-center margin-0 gray-color">
            <div class="col-lg-8 padding-0">
                <div class="rs-requset"> 
                
                    @if(session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('success') }}
                        </div>   
                    @endif
                    @if(count($errors) > 0 )
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <ul class="p-0 m-0" style="list-style: none;">
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif             
                    {{-- <div id="form-messages"></div> --}}
                    <form method="post" action="{{route('user.insurances.store')}}">
                        @csrf
                        <fieldset>
                            <div class="row">
                                <div class="col-lg-12 mb-30 col-md-12 col-sm-12">
                                    <select class="from-control select2" name="insurance_type" id="insurance_type">
                                        <option value="Worldtrips">Worldtrips</option>
                                        <option value="WeCare">We Care</option>
                                        <option value="Dubai">Dubai Insurance</option>
                                    </select>
                                </div> 
                                <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                    <input class="from-control" type="text" id="name" name="name" placeholder="Name">
                                </div> 
                                <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                    <input class="from-control" type="text" id="pp_number" name="pp_number" placeholder="Passport Number">
                                </div>
                                <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                    <input class="from-control" type="text" id="dob" name="dob" placeholder="Date of birth">
                                </div>
                                <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                    <select class="from-control select2" name="destination" id="destination">
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Oman">Oman</option>
                                        <option value="United Arab Emirates">UAE</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Kuwait">Kuwait</option>
                                      </select>
                                </div> 
                                <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                    <input class="from-control" type="text" id="effective_date" name="effective_date" placeholder="Effective Date">
                                </div> 
                               
                                <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                    <input class="from-control" type="text" id="mobile" name="mobile" placeholder="Phone Number">
                                </div>
                                <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                    <input class="from-control" type="hidden" id="termination_date" name="termination_date" placeholder="Termination Date">
                                </div> 
                            </div>
                            <div class="btn-part">
                              <input class="submit sub-small" type="submit" value="Submit Now">
                            </div> 
                        </fieldset>
                    </form> 
                </div>
            </div>
        </div>
    </div> 
</div>
<!-- Video Section End -->

@endsection
@section('scripts')
<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script>
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
    });
  
    
  </script>
@endsection