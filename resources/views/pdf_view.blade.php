
<!DOCTYPE html>
  <html lang="en">
  <head>
      {{-- <meta charset="UTF-8"> --}}
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' 
    name='viewport'>
      <title>Worldtrip</title>
   {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">  --}}
   
   <link href="https://fonts.googleapis.com/css?family=Caveat" rel="stylesheet">
   <link href="https://fonts.maateen.me/charukola-ultra-light/font.css" rel="stylesheet">
  
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
      <link href="css/style.css" rel="stylesheet"> 
      <style type="text/css">
        /*@import url(https://fonts.googleapis.com/css?family=Kosugi);*/
          /*Nunito font*/
          /*@import url(//fonts.googleapis.com/earlyaccess/notosansjapanese.css);
          @font-face {
              !*font-family: "Noto Sans", "Noto Sans CJK JP", sans-serif;*!
              font-family: 'Noto Sans Japanese', sans-serif;
              src: url() format("otf");
              font-weight: normal;
              font-style: normal;
              font-size: 8px;
          }*/
          
        
          /* @font-face {
          font-family: 'Carlito';
          src: url("/fonts/carlito.ttf");
          }  */
          .page-break {
              page-break-after: always;
          }
          .second{
            text-align: center;
          }
    </style>
  </head>
  <body>
    <div class="containers">
      <header>
        <div class="logo float-left">
          {{-- <img style="height: 18px"src="https://app.useanvil.com/img/email-logo-black.png"> --}}
          <img style="height: 50px"src="images/logo.jpg">
          <span>{{$data->created_at->format('F d, Y')}}</span>
        </div>
        
        {{-- <div class="issue-date">
          <span>December 19, 2021</span>
        </div> --}}
        <div class="lloyds text-right">
          <img  style="height: 40px" src="images/lloyds.jpg">
          <span><img src="data:image/png;base64, {!! $barcodes !!}"></span>
          
          
        </div>
        <div class="barcode">
          {{-- <img  style="height: 120px" src="images/barcode.jpg"> --}}
          
        </div>
      </header>
        <div class="certificates text-center">
          <span class="confermation">CONFIRMATION OF</span>
          <p class="travels">TRAVEL INSURANCE COVERAGE</p>
        </div>
        <div class="description">
          <p>We are pleased to confirm travel medical coverage under VisitorSecure®, insured by Lloyd’s Syndicate 4141 and administered by WorldTrips, a member of the Tokio Marine HCC group of companies. WorldTrips has authority to enter into contracts of insurance on behalf of the Lloyd’s underwriting members of Lloyd’s Syndicate 4141, which is managed by HCC Underwriting Agency Ltd. Lloyd’s is authorized as an insurer in Spain by the Spanish insurance regulatory authority (Dirección General de Segurosy Fondos de Pensiones) under reference L0017.</p>
          <p>This coverage is valid worldwide, except for the member’s Home Country and countries restricted by U.S. economic sanctions and embargo programs.</p>
        </div>
        <div class="ins-info">
          <p>Effective Date: <span>{{date('d/m/Y', strtotime($data->effective_date))}}</span></p>
          <p>Termination Date: <span>{{date('d/m/Y', strtotime($data->termination_date))}}</span></p>
          <p>Home Country: <span>Bangladesh</span></p>
          <p>Destination Country (ies): <span>Saudi Arabia</span></p>
        </div>
  
        {{-- <div class="pas-info">
          <div class="col-4">
            Effective Date: 25/12/2021
          </div><div class="col-4">
            Effective Date: 25/12/2021
          </div><div class="col-4">
            Effective Date: 25/12/2021
          </div><div class="col-4">
            Effective Date: 25/12/2021
          </div>
        </div> --}}
        <table class="tables">
          <thead>
            <tr>
              <th style="width:35%">Name</th>
              <th style="">Policy No</th>
              <th style="">Date of Birth</th>
              <th style="">Passport</th>
              <th style="width: 16%; text-align:left">Citizenship</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{$data->name}}</td>
              <td>{{$data->policy_number}}</td>
              <td>{{date('d/m/Y', strtotime($data->dob))}}</td>
              <td>{{$data->pp_number}}</td>
              <td>Bangladesh</td>
            </tr>
          </tbody>
        </table>
        <img src="images/ins-bg.png" alt="" style="width: 100%">
        {{-- <div class="ins-decs">
          <div class="title-line text-center">
            <span>VisitorSecure®</span>
          </div>
          <div class="ins-content">
            <ul>
              <li>Overall Maximum Limit</li>
              <li>$130,000 (€109902.0000*)</li>
              <li>One Hundred Thirty Thousand US Dollars</li>
            </ul>
          </div>
        </div> --}}
  
        <div class="ins-footer" style="margin-top: 10px">
          <span class="font-size:8px; margin:0;padding:0">* Plan pays in US Dollars only. Amounts in Euros are provided for convenience and are based on conversion rate as of {{$data->created_at->format('F d, Y')}}*</span><br>
          <span class="font-size:8px; margin:0;padding:0">* Except as provided under Acute Onset of Pre-existing Condition</span>
  
          <div class="line"></div>
        WorldTrips
        <p>251 North Illinois Street, Suite 600, Indianapolis, IN, 46204 USA • Tel: 317-262-2132 • Fax: 317-262-2140 • Toll Free: 800-605-2282 • worldtrips.com</p>
        </div>
  
        <div class="page-break"></div>
        
          <div class="second justify-content-center">
            <img style="height: 950px; margin-top: 65px; "src="images/worldtrip-2.jpg">
        </div>
    </div>
    
  
  </body>
  </html>