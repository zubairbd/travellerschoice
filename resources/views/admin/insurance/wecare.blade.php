
<!DOCTYPE html>
  <html lang="en">
  <head>
      {{-- <meta charset="UTF-8"> --}}
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' 
    name='viewport'>
      <title>WeCare-Center</title>
   {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">  --}}
   
   <link href="https://fonts.googleapis.com/css?family=Caveat" rel="stylesheet">
   <link href="https://fonts.maateen.me/charukola-ultra-light/font.css" rel="stylesheet">
  
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
      <link href="css/custom.css" rel="stylesheet"> 
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
        <div class="logo">
          {{-- <img style="height: 18px"src="https://app.useanvil.com/img/email-logo-black.png"> --}}
          <img style="height: 65px"src="images/wc.png">
        </div>
        <div class="certificates text-center">
          <span class="confermation">TRAVEL INSURANCE CERTIFICATE</span>
        </div>
      </header>
      <div class="inscont">
        <div class="col-md-3">
          <span>POLICY NO:</span> {{$data->policy_number}}
        </div>
        <div class="col-md-3">
          <span >ISSUE DATE:</span>
          @if($data->updated_at === null)
          {{date('d/m/Y', strtotime($data->created_at))}}
          @else
          {{date('d/m/Y', strtotime($data->updated_at))}}
          @endif
        </div>
        <div class="col-md-3">
          <span>PLAN:</span> Covid Plan 
          @if($data->destination === "Saudi Arabia")
          (KSA)
          @else
          (Plus)
          @endif
          
        </div>
        <div class="col-md-3">
          <span>AGENT:</span> TRAVELLERS
        </div>
        {{-- <ul>
          <li><span>POLICY NO:</span> WC-16753372</li>
          <li><span>ISSUE DATE:</span> 28/12/202</li>
          <li><span>PLAN:</span> Covid Plan (KSA)</li>
          <li><span>AGENT:</span> NATIONAL</li>
        </ul> --}}
      </div>
      <div class="maincontent">
        <div class="col-sd-3" style="width: 23%">
          <div class="cards" style="margin-right: 15px">
            <p>DESTINATION</p>
            <p style="font-size: 10px"><b>{{$data->destination}}</b></p>
          </div>
        </div>
        <div class="col-sd-3"  style="width: 14%">
          <div class="cards" style="margin-right: -3px">
            <p>FROM</p>
            <p style="font-size: 10px"><b>{{date('d/m/Y', strtotime($data->effective_date))}}</b></p>
          </div>
        </div>
        <div class="col-sd-3"  style="width: 14%">
          <div class="cards">
            <p>TO</p>
            <p style="font-size: 10px"><b>{{date('d/m/Y', strtotime($data->termination_date))}}</b></p>
          </div>
        </div>
        <div class="col-sd-3" style="width: 23%">
          <div class="cards" style="margin-left: 15px">
            <p>COUNTRY OF RESIDENCE</p>
            <p style="font-size: 10px"><b>Bangladesh</b></p>
          </div>
        </div>
        <div class="col-sd-3" style="width: 23%">
          <div class="cards" style="margin-left: 15px">
            <p>DESTINATION</p>
            <p style="font-size: 10px"><b>+88 02 55055655</b></p>
          </div>
        </div>
      </div>
      <div class="maincontent" style="margin-top: 13px">
        <div class="col-sd-3" style="width: 23%">
          <div class="cards" style="margin-right: 15px">
            <p>FULL NAME </p>
            <p style="font-size: 10px"><b>{{$data->name}}</b></p>
          </div>
        </div>
        <div class="col-sd-3"  style="width: 29%">
          <div class="cards">
            <p>DATE OF BIRTH</p>
            <p style="font-size: 10px"><b>{{date('d/m/Y', strtotime($data->dob))}}</b></p>
          </div>
        </div>
     
        <div class="col-sd-3" style="width: 23%">
          <div class="cards" style="margin-left: 15px">
            <p>PASSPORT NUMBER </p>
            <p style="font-size: 10px"><b>{{$data->pp_number}}</b></p>
          </div>
        </div>
      </div>
      <div class="smallcontent">
        <p>Contrary to any stipulations stated in the General Conditions,the plan subscribed to,under this Letter of Confirmation, covers exclusively the below mentioned Benefits, 
          Limitations & Excesses shown in the table hereafter.</p>
          <p>The General Conditions form an integral part of this Letter of Confirmation.</p>
          <p><span>For more info/modification regarding your policy, kindly do not hesitate to contact your authorized agent or e-mail us on enquiry@wecare.com</span></p>
      </div>
      <div class="insdesc" style="margin:0">
        <table class="table">
          <thead>
            <tr>
              <th>BENEFITS</th>
              <th>SUM INSURED</th>
              <th>EXCESS</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Emergency Medical expenses due to COVID-19</td>
              <td>Up to $ 20 000</td>
              <td>0</td>
            </tr>
          </tbody>
          <thead>
            <tr>
              <th>Quarantine expenses due to COVID-19</th>
              <th>Up to $100 Per Day Max 14 Days</th>
              <th>0</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Emergency Medical Evacuation & Repatriation due to COVID-19</td>
              <td>Up to $10 000*</td>
              <td>0</td>
            </tr>
          </tbody>
          <thead>
            <tr>
              <th>Repatriation of Mortal remains</th>
              <th>Repatriation of Mortal remains</th>
              <th>0</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Emergency Dental Coverage</td>
              <td>Up to $ 100</td>
              <td>$ 30</td>
            </tr>
          </tbody>
          <thead>
            <tr>
              <th>Flight Cancelation</th>
              <th>Flight Cancelation </th>
              <th>6 Hours</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Loss Of baggage</td>
              <td>Up to $ 100 </td>
              <td>$ 25</td>
            </tr>
          </tbody>
          <thead>
            <tr>
              <th>Delay Of baggage</th>
              <th>Delay Of baggage</th>
              <th>12 Hours</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Loss Of Passport</td>
              <td>Loss Of Passport</td>
              <td>0</td>
            </tr>
          </tbody>
        </table>
      </div>
      <p style="font-size: 10px; margin-left:10px;">Above sums insured are per person & per period of cover</p>
      
      <div class="important">
        <span>I mportant Notes:</span>
        <p>-Upon calling the Alarm Center and claim being processed on direct billing procedure, no deductible shall apply for insured up to 70 years old </p>
        <p>In all cases, deductible shall apply for Insured above 70 years old.</p>
        <p>Deductible shall be maintained for all insured bracket of age if claims are accepted and processed on reimbursement basis. </p>
        <p>(Please refer to the General Conditions for all deductible details)</p>
        <p>In case claim is accepted on reimbursement, please refer to the General Conditions.</p>
        <p>-This policy is specially designed to cover Covid-19 related expenses only.(Please carefully read the general conditions)</p>
        <p style="margin-top:10px">Coverage in the USA, Canada, Japan & Australia for Emergency Medical Expenses and Evacuation & Repatriation due to Covid-19 is limited to US $ 20,000 per benefit</p>
      </div>
      <div class="barcode">
        <p>Confirmation Code</p>
        <img src="data:image/png;base64, {!! $barcodes !!}">
        <br>
        <span>For official use,scan the above code to validate this confirmation letter</span>
      </div>
      {{-- <img style="height: 900px"src="images/we-care.jpg"> --}}
      
  
      <div class="footer">
          <div class="footer-content">
            <p style="margin-top:20px"><b>PLEASE KEEP THIS LETTER OF CONFIRMATION WITH YOU AT ALL TIMES</b></p>
            <p>Claims must be reported within 48 hours from occurrence of the event 
              related original documents must be submitted to the Company by
              the beneficiary within four (4) months maximum.
              </p>
            
          </div>
          <div class="footer-content">
            
            <p style="margin-left:10px">in case of emergency or claims of assistance, call us on:<span style="color: #3bb86b"> +91 95 11 35 89
              38 or +91 87 56 54 21 80 </span>or send e-mail to: <span style="color: #3bb86b">claims@wecare.com</span> and all 
              You will be asked to provide the reference of this letter and/or show this 
              document. This purchase is non-refundable. Please refer to your receip </p>
          </div>
      </div>
  

    </div>
    
  
  </body>
  </html>