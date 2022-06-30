@extends('layouts.frontend-master')
@section('certificate') active @endsection
@section('content')
<div class="su-main-reg-form-area">
    <div class="su-main-reg-form-area">
        <div class="page-inner-title">
            <div class="container">
                <div class="row text-left">
                    <div class="col-12"><h3>টিকা সনদ যাচাই</h3></div>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4 col-xs-12 wrapper-left-navmenu">
                        <ul>
                            <li><a aria-current="page" class="active" href="/verify?s=1">জাতীয় পরিচয়পত্র</a></li>
                            <li><a class="" href="/verify/birth-registration?s=1">জন্ম নিবন্ধন সার্টিফিকেট</a></li>
                            <li><a aria-current="page" class="activated active" href="/verify/foreigners?s=1">পাসপোর্ট (বাংলাদেশি/বিদেশি)</a></li>
                        </ul>
                        <div class="app-link">
                            <a href="https://play.google.com/store/apps/details?id=com.codersbucket.surokkha_app" target="_blank"><img src="{{asset('frontend')}}/static/media/Surrokkha Advertisement card.c17bcc5f.jpg" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-8 col-xs-12 wrapper-right-navmenu">
                        <div class="su-enroll-form-main card-body p-0">
                            <div class="container no-print"></div>
                            <div class="su-reg-status-area no-print">
                                <div class="su-reg-status-form">
                                    <div class="container mob-p-0">
                                        <div id="su-reg-status-form">
                                            <form id="formData">
                                            <div class="row">
                                                <div class="col-md-6 mb-4">
                                                    <label for="su-mobile-otp">Passport Number</label>
                                                    <input type="text" name="passport" class="form-control" style="text-transform: uppercase;" placeholder="Example: AC0215425" autocomplete="off" id="passport" />
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                    <label for="su-v-dob">Date of Birth</label>
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
                                            </div>
                                            <div class="row align-items-center">
                                                <div class="col-md-6 mb-4">
                                                    <label for="certificate_number">Certificate Number</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><div class="input-group-text" id="btnGroupAddon" style="border: 0.5px solid rgb(0, 17, 62);">BD</div></div>
                                                        <input type="number" name="certificate_number" class="form-control" placeholder="123456789012" autocomplete="off" id="certificate_number" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="captcha-wrapper">
                                                        <div class="style_captchaContainer__LdFYB">
                                                            <canvas style="pointer-events: none;" class="" width="300" height="40"></canvas>
                                                            <button id="retryButton" class="style_retryButton__2gxEO">
                                                                <img src="https://cdn.jsdelivr.net/npm/react-client-captcha/dist/retry.svg" alt="Re-new captcha" class="" width="16" height="16" />
                                                            </button>
                                                        </div>
                                                        <p>উপরের লিখাটি সঠিকভাবে নিচে লিখুন</p>
                                                        <input type="text" maxlength="6" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mt-4"><button id="verify"  class="btn btn-primary btn-block">Verify Certificate</button></div>
                                            </div>
                                        </form>
                                        </div>
                                        <br />
                                    </div>
                                </div>
                            </div>
                            <div class="container" id="hello">
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script>
         $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // $('#formData').on('click', '#verify', function() {
            $("#verify").click(function(e){
 
                e.preventDefault();

                var passport = $('#passport').val();
                var certificate_number = $('#certificate_number').val();
                $.ajax({
                    type: 'post',
                    url: '/foreigner-verify-certificate',
                    data:{'passport':passport, 'certificate_number':certificate_number},
                    // dataType:'json',
                    success: function(data) {
                      console.log(data);
                    //   $("#companyName").val(data['0'].company_name);
                    var html = "";
                        
                        html+=` <div class="row justify-content-center py-8 px-8 py-md-27 px-md-0">
                                    <div class="col-md-12 p-sm-0">
                                        <div class="d-flex justify-content-between">
                                            <div class="col-md-12 p-sm-0">
                                                <div class="text-right mb-2 no-print"><button onclick="window.print();" class="btn btn-sm btn-success">Print</button></div>
                                                <div style="border: 1px solid rgb(222, 226, 230);">
                                                    <div class="text-center pt-2 show-mobile no-print"><img src="{{asset('frontend')}}/static/media/gov_logo.0b7f8514.png" width="70" />&nbsp; &nbsp; &nbsp; &nbsp;<img src="{{asset('frontend')}}/static/media/mujib100.75b35add.png" width="100" /></div>
                                                    <div class="row m-0 mt-2">
                                                        <div class="col-md-3 col-sm-12 text-right hide-mobile"><img src="{{asset('frontend')}}/static/media/gov_logo.0b7f8514.png" width="70" /></div>
                                                        <div class="col-md-6 col-sm-12 text-center" style="font-size: 16px; line-height: 70px;">
                                                            <p style="line-height: 18px; margin-bottom: 0px; margin-top: 18px;">Government of the People's Republic of Bangladesh</p>
                                                            <p style="line-height: 18px;">Ministry of Health and Family Welfare</p>
                                                        </div>
                                                        <div class="col-md-3 col-sm-12 text-left hide-mobile"><img src="{{asset('frontend')}}/static/media/mujib100.75b35add.png" width="100" /></div>
                                                    </div>
                                                    <div class="text-center mt-2 mb-2">
                                                        <div style="font-size: 30px; color: green; font-weight: bold;">Verification Successful !</div>
                                                        <div style="font-size: 22px; color: green; font-weight: 350;">This Vaccination Certificate is Valid.</div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="row m-0">
                                                        <div class="col-md-5 p-0">
                                                            <div class="text-center p-2" style="text-align: center; background-color: rgb(238, 238, 238); font-size: 14px; font-weight: bold; border: 1px solid rgb(222, 226, 230);">
                                                                Beneficiary Details (টিকা গ্রহণকারীর বিবরণ)
                                                            </div>
                                                            <div class="row m-0">
                                                                <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: right; padding: 5px; overflow-wrap: break-word;">
                                                                        Certificate No:<br />
                                                                        সার্টিফিকেট নং:
                                                                    </div>
                                                                </div>
                                                                <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; overflow-wrap: break-word;">BD${data.data[0].certificate_number}</div>
                                                                </div>
                                                            </div>
                                                            <div class="row m-0">
                                                                <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: right; padding: 5px; overflow-wrap: break-word;">
                                                                        NID Number:<br />
                                                                        জাতীয় পরিচয়পত্র নং:
                                                                    </div>
                                                                </div>
                                                                <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);"><div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; overflow-wrap: break-word;">N/A</div></div>
                                                            </div>
                                                            <div class="row m-0">
                                                                <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: right; padding: 5px; overflow-wrap: break-word;">
                                                                        Passport No:<br />
                                                                        পাসপোর্ট নং:
                                                                    </div>
                                                                </div>
                                                                <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; overflow-wrap: break-word;">${data.data[0].passport}</div>
                                                                </div>
                                                            </div>
                                                            <div class="row m-0">
                                                                <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: right; padding: 5px; overflow-wrap: break-word;">
                                                                        Country/Nationality:<br />
                                                                        দেশ/জাতীয়তা:
                                                                    </div>
                                                                </div>
                                                                <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; overflow-wrap: break-word;">${data.data[0].nationality}</div>
                                                                </div>
                                                            </div>
                                                            <div class="row m-0">
                                                                <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: right; padding: 5px; overflow-wrap: break-word;">
                                                                        Name:<br />
                                                                        নাম:
                                                                    </div>
                                                                </div>
                                                                <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; overflow-wrap: break-word;">${data.data[0].name}</div>
                                                                </div>
                                                            </div>
                                                            <div class="row m-0">
                                                                <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: right; padding: 5px; overflow-wrap: break-word;">
                                                                        Date of Birth:<br />
                                                                        জন্ম তারিখ:
                                                                    </div>
                                                                </div>
                                                                <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; overflow-wrap: break-word;">${data.data[0].dob_day}-${data.data[0].dob_month}-${data.data[0].dob_year}</div>
                                                                </div>
                                                            </div>
                                                            <div class="row m-0">
                                                                <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: right; padding: 5px; overflow-wrap: break-word;">
                                                                        Gender:<br />
                                                                        লিঙ্গ:
                                                                    </div>
                                                                </div>
                                                                <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);"><div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; text-transform: capitalize;">${data.data[0].gender}</div></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-7 p-0">
                                                            <div class="text-center p-2" style="text-align: center; background-color: rgb(238, 238, 238); font-size: 14px; font-weight: bold; border: 1px solid rgb(222, 226, 230);">
                                                                Vaccination Details (টিকা প্রদানের বিবরণ)
                                                            </div>
                                                            <div class="row m-0">
                                                                <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: right; padding: 5px; overflow-wrap: break-word;">
                                                                        Date of Vaccination (Dose 1):<br />
                                                                        টিকা প্রদানের তারিখ (ডোজ ১):
                                                                    </div>
                                                                </div>
                                                                <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; overflow-wrap: break-word;">${data.data[0].first_dose}</div>
                                                                </div>
                                                            </div>
                                                            <div class="row m-0">
                                                                <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: right; padding: 5px; overflow-wrap: break-word;">
                                                                        Name of Vaccine (Dose 1):<br />
                                                                        টিকার নাম (ডোজ ১):
                                                                    </div>
                                                                </div>
                                                                <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; overflow-wrap: break-word;">${data.data[0].vaccine_name}</div>
                                                                </div>
                                                            </div>
                                                            <div class="row m-0">
                                                                <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: right; padding: 5px; overflow-wrap: break-word;">
                                                                        Date of Vaccination (Dose 2):<br />
                                                                        টিকা প্রদানের তারিখ (ডোজ ২):
                                                                    </div>
                                                                </div>
                                                                <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; overflow-wrap: break-word;">${data.data[0].second_dose}</div>
                                                                </div>
                                                            </div>
                                                            <div class="row m-0">
                                                                <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: right; padding: 5px; overflow-wrap: break-word;">
                                                                        Name of Vaccine (Dose 2):<br />
                                                                        টিকার নাম (ডোজ ২):
                                                                    </div>
                                                                </div>
                                                                <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; overflow-wrap: break-word;">${data.data[0].vaccine_name}</div>
                                                                </div>
                                                            </div>
                                                            <div class="row m-0">
                                                                <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: right; padding: 5px; overflow-wrap: break-word;">
                                                                        Vaccination Center:<br />
                                                                        টিকা প্রদানের কেন্দ্র:
                                                                    </div>
                                                                </div>
                                                                <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; overflow-wrap: break-word;">${data.data[0].vaccine_center}</div>
                                                                </div>
                                                            </div>
                                                            <div class="row m-0">
                                                                <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: right; padding: 5px; overflow-wrap: break-word;">
                                                                        Vaccinated By:<br />
                                                                        টিকা প্রদানকারী:
                                                                    </div>
                                                                </div>
                                                                <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; overflow-wrap: break-word;">Directorate General of Health Services (DGHS)</div>
                                                                </div>
                                                            </div>
                                                            <div class="row m-0">
                                                                <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: right; padding: 5px; overflow-wrap: break-word;">
                                                                        Total Doses Given:<br />
                                                                        মোট ডোজ সংখ্যা:
                                                                    </div>
                                                                </div>
                                                                <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);"><div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; overflow-wrap: break-word;">2</div></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="p-2" style="text-align: center; border: 1px solid rgb(222, 226, 230);">
                                                    For any further assistance, please visit www.dghs.gov.bd or e-mail: info@dghs.gov.bd <br />
                                                    (প্রয়োজনে www.dghs.gov.bd ওয়েব সাইটে ভিজিট করুন অথবা ইমেইল করুনঃ info@dghs.gov.bd)
                                                </div>
                                                <div class="text-center p-2" style="text-align: center; background-color: rgb(238, 238, 238); font-size: 14px; font-weight: bold; border: 1px solid rgb(222, 226, 230);">In Cooperation With</div>
                                                <div class="text-center p-2 mb-3 footer-cert-verify-img" style="border: 1px solid rgb(222, 226, 230);"><img src="{{asset('frontend')}}/static/media/Credit_Logo.68be46aa.png" alt="ict logo" style="max-width: 80%;" /></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`
                    $('#hello').html(html);

                    }
                });
            });
        });
    </script>
@endsection