@extends('layouts.admin-master')
@section('dashboard')current-menu-item @endsection
@section('vaccine-list')active @endsection
@section('styles')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"/>
@endsection
@section('content')
<div class="container-fluid">
    <main>
    <!-- Page Heading -->
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i class="fa fa-list"></i><circle cx="12" cy="7" r="4"></circle></svg></div>
                                Vaccine List - Create
                            </h1>
                        </div>
                        <div class="col-auto mb-3">
                            <a href="{{route('admin.vaccines.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-list fa-sm text-white-50"></i> Vaccine List</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="px-4">
            @include('partials.messages')
        </div>
       
        <!-- Content Row -->
        <div class="row">
            
            <div class="col-xl-12 col-lg-10">

                <!-- Area Chart -->
                <div class="card shadow mb-4">
                
                    <div class="card-body">
                        <form method="post" action="{{route('admin.vaccines.store')}}">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="passport">Passport No.</label>
                                                <input type="text" name="passport" class="form-control" placeholder="Passport No.">
                                            </div>
                                            <div class="form-group">
                                                <label for="nid">NID No.</label>
                                                <input type="text" name="nid" class="form-control" placeholder="NID No.">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Full Name</label>
                                                <input type="text" name="name" class="form-control" placeholder="Full Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="dob">Date of birth</label>
                                                <div class="row">
                                                    <div class="col-6 col-md-3 mob-mb-15">
                                                        <select name="dob_day" class="form-control suk-select-field day" id="basic_dob_day" tabindex="-1" aria-hidden="true">
                                                            <option value="">Day</option>
                                                            <option value="01">1</option>
                                                            <option value="02">2</option>
                                                            <option value="03">3</option>
                                                            <option value="04">4</option>
                                                            <option value="05">5</option>
                                                            <option value="06">6</option>
                                                            <option value="07">7</option>
                                                            <option value="08">8</option>
                                                            <option value="09">9</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                            <option value="13">13</option>
                                                            <option value="14">14</option>
                                                            <option value="15">15</option>
                                                            <option value="16">16</option>
                                                            <option value="17">17</option>
                                                            <option value="18">18</option>
                                                            <option value="19">19</option>
                                                            <option value="20">20</option>
                                                            <option value="21">21</option>
                                                            <option value="22">22</option>
                                                            <option value="23">23</option>
                                                            <option value="24">24</option>
                                                            <option value="25">25</option>
                                                            <option value="26">26</option>
                                                            <option value="27">27</option>
                                                            <option value="28">28</option>
                                                            <option value="29">29</option>
                                                            <option value="30">30</option>
                                                            <option value="31">31</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-5 col-6 mob-mb-15">
                                                        <select name="dob_month" class="form-control suk-select-field" id="basic_dob_month" tabindex="-1" aria-hidden="true">
                                                            <option value="">Month</option>
                                                            <option value="01">January</option>
                                                            <option value="02">February</option>
                                                            <option value="03">March</option>
                                                            <option value="04">April</option>
                                                            <option value="05">May</option>
                                                            <option value="06">June</option>
                                                            <option value="07">July</option>
                                                            <option value="08">August</option>
                                                            <option value="09">September</option>
                                                            <option value="10">October</option>
                                                            <option value="11">November</option>
                                                            <option value="12">December</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4 mob-mb-15">
                                                        <select name="dob_year" class="form-control suk-select-field" id="basic_dob_year" tabindex="-1" aria-hidden="true">
                                                            <option value="">Year</option>
                                                            <option value="2017">2017</option>
                                                            <option value="2016">2016</option>
                                                            <option value="2015">2015</option>
                                                            <option value="2014">2014</option>
                                                            <option value="2013">2013</option>
                                                            <option value="2012">2012</option>
                                                            <option value="2011">2011</option>
                                                            <option value="2010">2010</option>
                                                            <option value="2009">2009</option>
                                                            <option value="2008">2008</option>
                                                            <option value="2007">2007</option>
                                                            <option value="2006">2006</option>
                                                            <option value="2005">2005</option>
                                                            <option value="2004">2004</option>
                                                            <option value="2003">2003</option>
                                                            <option value="2002">2002</option>
                                                            <option value="2001">2001</option>
                                                            <option value="2000">2000</option>
                                                            <option value="1999">1999</option>
                                                            <option value="1998">1998</option>
                                                            <option value="1997">1997</option>
                                                            <option value="1996">1996</option>
                                                            <option value="1995">1995</option>
                                                            <option value="1994">1994</option>
                                                            <option value="1993">1993</option>
                                                            <option value="1992">1992</option>
                                                            <option value="1991">1991</option>
                                                            <option value="1990">1990</option>
                                                            <option value="1989">1989</option>
                                                            <option value="1988">1988</option>
                                                            <option value="1987">1987</option>
                                                            <option value="1986">1986</option>
                                                            <option value="1985">1985</option>
                                                            <option value="1984">1984</option>
                                                            <option value="1983">1983</option>
                                                            <option value="1982">1982</option>
                                                            <option value="1981">1981</option>
                                                            <option value="1980">1980</option>
                                                            <option value="1979">1979</option>
                                                            <option value="1978">1978</option>
                                                            <option value="1977">1977</option>
                                                            <option value="1976">1976</option>
                                                            <option value="1975">1975</option>
                                                            <option value="1974">1974</option>
                                                            <option value="1973">1973</option>
                                                            <option value="1972">1972</option>
                                                            <option value="1971">1971</option>
                                                            <option value="1970">1970</option>
                                                            <option value="1969">1969</option>
                                                            <option value="1968">1968</option>
                                                            <option value="1967">1967</option>
                                                            <option value="1966">1966</option>
                                                            <option value="1965">1965</option>
                                                            <option value="1964">1964</option>
                                                            <option value="1963">1963</option>
                                                            <option value="1962">1962</option>
                                                            <option value="1961">1961</option>
                                                            <option value="1960">1960</option>
                                                            <option value="1959">1959</option>
                                                            <option value="1958">1958</option>
                                                            <option value="1957">1957</option>
                                                            <option value="1956">1956</option>
                                                            <option value="1955">1955</option>
                                                            <option value="1954">1954</option>
                                                            <option value="1953">1953</option>
                                                            <option value="1952">1952</option>
                                                            <option value="1951">1951</option>
                                                            <option value="1950">1950</option>
                                                            <option value="1949">1949</option>
                                                            <option value="1948">1948</option>
                                                            <option value="1947">1947</option>
                                                            <option value="1946">1946</option>
                                                            <option value="1945">1945</option>
                                                            <option value="1944">1944</option>
                                                            <option value="1943">1943</option>
                                                            <option value="1942">1942</option>
                                                            <option value="1941">1941</option>
                                                            <option value="1940">1940</option>
                                                            <option value="1939">1939</option>
                                                            <option value="1938">1938</option>
                                                            <option value="1937">1937</option>
                                                            <option value="1936">1936</option>
                                                            <option value="1935">1935</option>
                                                            <option value="1934">1934</option>
                                                            <option value="1933">1933</option>
                                                            <option value="1932">1932</option>
                                                            <option value="1931">1931</option>
                                                            <option value="1930">1930</option>
                                                            <option value="1929">1929</option>
                                                            <option value="1928">1928</option>
                                                            <option value="1927">1927</option>
                                                            <option value="1926">1926</option>
                                                            <option value="1925">1925</option>
                                                            <option value="1924">1924</option>
                                                            <option value="1923">1923</option>
                                                            <option value="1922">1922</option>
                                                            <option value="1921">1921</option>
                                                            <option value="1920">1920</option>
                                                            <option value="1919">1919</option>
                                                            <option value="1918">1918</option>
                                                            <option value="1917">1917</option>
                                                            <option value="1916">1916</option>
                                                            <option value="1915">1915</option>
                                                            <option value="1914">1914</option>
                                                            <option value="1913">1913</option>
                                                            <option value="1912">1912</option>
                                                            <option value="1911">1911</option>
                                                            <option value="1910">1910</option>
                                                            <option value="1909">1909</option>
                                                            <option value="1908">1908</option>
                                                            <option value="1907">1907</option>
                                                            <option value="1906">1906</option>
                                                            <option value="1905">1905</option>
                                                            <option value="1904">1904</option>
                                                            <option value="1903">1903</option>
                                                            <option value="1902">1902</option>
                                                            <option value="1901">1901</option>
                                                            <option value="1900">1900</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="gender">Gender</label>
                                                <select class="custom-select" name="gender">
                                                    <option selected>Select Gender</option>
                                                    <option value="MALE">MALE</option>
                                                    <option value="FEMALE">FEMALE</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="nationality">Nationality</label>
                                                <select class="custom-select" name="nationality">
                                                    <option selected value="Bangladesh">Bangladesh</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="first_dose">Date of Vaccination (Dose 1)</label>
                                                    <input type="text" name="first_dose" class="form-control" id="first_dose" placeholder="Date of Vaccination (Dose 1)">
                                            </div>
                                            <div class="form-group">
                                                <label for="second_dose">Date of Vaccination (Dose 2)</label>
                                                    <input type="text" name="second_dose" class="form-control" id="second_dose" placeholder="Date of Vaccination (Dose 2)">
                                            </div>
                                            <div class="form-group">
                                                <label for="vaccine_name">Name of Vaccination</label>
                                                <select class="custom-select" name="vaccine_name">
                                                    <option selected>Select Vaccination Name</option>
                                                    <option value="Pfizer (Pfizer-BioNTech)">Pfizer (Pfizer-BioNTech)</option>
                                                    <option value="Moderna (Moderna)">Moderna (Moderna)</option>
                                                    <option value="Vero Cell (Sinopharm)">Vero Cell (Sinopharm)</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="boster_dose">Date of Vaccination (Boster Dose)</label>
                                                <input type="text" name="boster_dose" class="form-control" id="boster_dose" placeholder="Date of Vaccination (Boster Dose)">
                                            </div>
                                            <div class="form-group">
                                                <label for="vaccine_name_boster">Name of Vaccination Boster</label>
                                                <select class="custom-select" name="vaccine_name_boster">
                                                    <option value="">Select Vaccination Name Boster</option>
                                                    <option value="Pfizer (Pfizer-BioNTech)">Pfizer (Pfizer-BioNTech)</option>
                                                    <option value="Moderna (Moderna)">Moderna (Moderna)</option>
                                                    <option value="Vero Cell (Sinopharm)">Vero Cell (Sinopharm)</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="vaccine_center">Vaccination Center</label>
                                                <select class="custom-select" name="vaccine_center">
                                                    <option selected>Select Vaccination Center</option>
                                                    <option value="Sheikh Russel National Gastroliver Institute & Hospital">Sheikh Russel National Gastroliver Institute & Hospital</option>
                                                    <option value="Shaheed Suhrawardy Medical College and Hospital">Shaheed Suhrawardy Medical College and Hospital</option>
                                                    <option value="Dhaka Medical College Hospital">Dhaka Medical College Hospital</option>
                                                </select>
                                            </div>
                                        </div>
                                        

                                        
                                    </div>

                                    <button type="submit" class="btn btn-primary float-right">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        
        </div>
    </main>

</div>

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
        //   dateFormat: "dd/mm/yy",
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
        //   dateFormat: "dd/mm/yy",
          autoclose: true,
          onSelect: function(selectedDate) {
              $("#effective_date").datepicker( "option", "maxDate", selectedDate );
          }
      });
  
      $("#dob").datepicker({
        changeMonth: true,
        changeYear: true,
        // dateFormat: "dd/mm/yy",
        autoclose: true,
        yearRange: '1950:2022',
        });
        $("#first_dose").datepicker({
        changeMonth: true,
        changeYear: true,
        // dateFormat: "dd/mm/yy",
        autoclose: true,
        yearRange: '2021:2022',
        });
        $("#second_dose").datepicker({
        changeMonth: true,
        changeYear: true,
        // dateFormat: "dd/mm/yy",
        autoclose: true,
        yearRange: '2021:2022',
        });
        $("#boster_dose").datepicker({
        changeMonth: true,
        changeYear: true,
        // dateFormat: "dd/mm/yy",
        autoclose: true,
        yearRange: '2021:2022',
        });
    });
        
    </script>
@endsection