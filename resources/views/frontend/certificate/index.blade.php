@extends('layouts.frontend-master')
@section('content')
<div class="su-main-reg-form-area">
    <div class="su-main-reg-form-area">
        <div class="page-inner-title">
            <div class="container">
                <div class="row text-left">
                    <div class="col-12"><h3>টিকা সনদ</h3></div>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4 col-xs-12 wrapper-left-navmenu">
                        <ul>
                            <li><a aria-current="page" class="active" href="/certificate?s=1">জাতীয় পরিচয়পত্র</a></li>
                            <li><a class="" href="/certificate/birth-registration?s=1">জন্ম নিবন্ধন সার্টিফিকেট</a></li>
                            <li><a class="" href="/certificate/foreigners?s=1">পাসপোর্ট (বাংলাদেশি/বিদেশি)</a></li>
                        </ul>
                        <div class="app-link">
                            <a href="https://play.google.com/store/apps/details?id=com.codersbucket.surokkha_app" target="_blank"><img src="{{asset('frontend')}}/static/media/Surrokkha Advertisement card.c17bcc5f.jpg" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-8 col-xs-12 wrapper-right-navmenu">
                        <div class="su-enroll-form-main card-body p-0">
                            <div class="container" id="su-nid-verification-form">
                                <div class="form-section-wrapper">
                                    <div class="identification-desc">
                                        <h3>অনুগ্রহ করে মেনু থেকে শনাক্তকরণ অপশনটি নির্বাচন করুন</h3>
                                        <ol>
                                            <li>
                                                <h5>জাতীয় পরিচয়পত্র</h5>
                                                <p>
                                                    নিচের ফরমে আপনার জাতীয় পরিচয়পত্র নম্বর ও জন্ম তারিখ (জাতীয় পরিচয়পত্র অনুযায়ী) প্রদান করে "যাচাই করুণ" বাটনে ক্লিক করলে নিবন্ধনের সময় প্রদানকৃত মোবাইল নম্বরে একটি OTP কোড SMS এর মাধ্যমে
                                                    পাঠানো হবে, তা পরবর্তী OTP কোড ঘরে প্রদান করে "টিকা সনদপত্র ডাউনলোড" বাটনে ক্লিক করলে টিকা সনদ সংগ্রহ করা যাবে।
                                                </p>
                                            </li>
                                            <li>
                                                <h5>জন্ম নিবন্ধন সার্টিফিকেট</h5>
                                                <p>
                                                    নিচের ফরমে আপনার জন্ম সনদ নম্বর ও জন্ম তারিখ ( জন্ম সনদ অনুযায়ী) প্রদান করে "যাচাই করুণ" বাটনে ক্লিক করলে নিবন্ধনের সময় প্রদানকৃত মোবাইল নম্বরে একটি OTP কোড SMS এর মাধ্যমে পাঠানো হবে, তা
                                                    পরবর্তী OTP কোড ঘরে প্রদান করে "টিকা সনদপত্র ডাউনলোড" বাটনে ক্লিক করলে টিকা সনদ সংগ্রহ করা যাবে।
                                                </p>
                                            </li>
                                            <li>
                                                <h5>পাসপোর্ট (বাংলাদেশি/বিদেশি)</h5>
                                                <p>
                                                    নিচের ফরমে আপনার পাসপোর্ট নম্বর ও জন্ম তারিখ (পাসপোর্ট অনুযায়ী) প্রদান করে "যাচাই করুণ" বাটনে ক্লিক করলে নিবন্ধনের সময় প্রদানকৃত মোবাইল নম্বরে একটি OTP কোড SMS এর মাধ্যমে পাঠানো হবে, তা
                                                    পরবর্তী OTP কোড ঘরে প্রদান করে "টিকা সনদপত্র ডাউনলোড" বাটনে ক্লিক করলে টিকা সনদ সংগ্রহ করা যাবে।
                                                </p>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection