@extends('layouts.frontend-master')
@section('content')
<div class="su-main-reg-form-area">
    <div class="su-main-reg-form-area">
        <div class="su-inner-banner-area new-cert-bg no-print">
            <div class="container">
                <div class="row text-center">
                    <div class="col-12 col-sm-6 col-lg-5 col-xl-4 m-auto"><h3>Verify Certificate</h3></div>
                    <div class="col-12 col-sm-6 col-lg-5 col-xl-4 m-auto pt-4 pt-sm-0">
                        <div class="su-inner-banner-img"><img alt="image" class="img-fluid" src="{{asset('frontend')}}/static/media/new-certification-card.ac1c4d8c.png" /></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container no-print">
            <div class="su-main-reg-form-header">
                <br />
                <p class="text-left"></p>
            </div>
        </div>
        <div class="container">
            <div class="container">
                <div class="row justify-content-center py-8 px-8 py-md-27 px-md-0">
                    <div class="col-md-12 p-sm-0">
                        <div class="d-flex justify-content-between">
                            <div class="col-md-12 p-sm-0">
                                <div class="text-right mb-2 no-print"><button onclick="window.print();" class="btn btn-sm btn-success">Print</button></div>
                                <div style="border: 1px solid rgb(222, 226, 230);">
                                    <div class="text-center pt-2 show-mobile no-print">
                                        <img src="{{asset('frontend')}}/static/media/gov_logo.0b7f8514.png" width="70" />&nbsp; &nbsp; &nbsp; &nbsp;<img src="/static/media/mujib100.75b35add.png" width="100" />
                                    </div>
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
                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; overflow-wrap: break-word;">BD{{$vaccine->certificate_number}}</div>
                                                </div>
                                            </div>
                                            <div class="row m-0">
                                                <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: right; padding: 5px; overflow-wrap: break-word;">
                                                        NID Number:<br />
                                                        জাতীয় পরিচয়পত্র নং:
                                                    </div>
                                                </div>
                                                <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; overflow-wrap: break-word;">
                                                        @if ($vaccine->nid == null)
                                                        N/A
                                                        @else
                                                        {{$vaccine->nid}}
                                                        @endif
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="row m-0">
                                                <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: right; padding: 5px; overflow-wrap: break-word;">
                                                        Passport No:<br />
                                                        পাসপোর্ট নং:
                                                    </div>
                                                </div>
                                                <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; overflow-wrap: break-word;">
                                                        @if ($vaccine->passport == null)
                                                        N/A
                                                        @else
                                                        {{$vaccine->passport}}
                                                        @endif
                                                        </div>
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
                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; overflow-wrap: break-word;">{{$vaccine->nationality}}</div>
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
                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; overflow-wrap: break-word;">{{$vaccine->name}}</div>
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
                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; overflow-wrap: break-word;">{!!$vaccine->dob_day .'-' .$vaccine->dob_month. '-' .$vaccine->dob_year !!}</div>
                                                </div>
                                            </div>
                                            <div class="row m-0">
                                                <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: right; padding: 5px; overflow-wrap: break-word;">
                                                        Gender:<br />
                                                        লিঙ্গ:
                                                    </div>
                                                </div>
                                                <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; text-transform: capitalize;">{{$vaccine->gender}}</div>
                                                </div>
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
                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; overflow-wrap: break-word;">{{date('d-m-Y', strtotime($vaccine->first_dose))}}</div>
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
                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; overflow-wrap: break-word;">{{$vaccine->vaccine_name}}</div>
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
                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; overflow-wrap: break-word;">{{date('d-m-Y', strtotime($vaccine->second_dose))}}</div>
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
                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; overflow-wrap: break-word;">{{$vaccine->vaccine_name}}</div>
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
                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; overflow-wrap: break-word;">{{$vaccine->vaccine_center}}</div>
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
                                                <div class="col-6" style="border: 1px dashed rgb(222, 226, 230);">
                                                    <div class="cert-verify-content-div" style="font-size: 13px; text-align: left; padding: 5px; overflow-wrap: break-word;">2</div>
                                                </div>
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
                </div>
            </div>
        </div>
    </div>
</div>

@endsection