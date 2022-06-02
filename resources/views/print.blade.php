<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
 {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <style>
      
      @font-face {
  font-family: 'Ubuntu';
  font-style: normal;
  font-weight: 400;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/ubuntu/v15/4iCs6KVjbNBYlgoKcg72j00.woff2) format('woff2');
  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
}
       
      .certificate h2{
          font-size: 28px;
          font-family: 'Ubuntu';
          font-weight: 300;
      }
      .certificate p{
          font-size: 16px;
          font-family: 'Kolker Brush';
          font-weight: 300;
      }
  </style>
</head>
<body>
    {{-- <script type="text/javascript">
        window.onload = function() { window.print(); }
   </script> --}}
    <div class="container">
        <div class="certificate text-center">
            <h2>CONFIRMATION OF</h2>
            <p>TRAVEL INSURANCE COVERAGE</p>
        </div>
      {{$data->name}}
      </div>

      <h6 style="margin-left:30%;">This invoice is computer generated,no signature is required.</h6>
      </div>
     
    </div>
  
    
</body>
</html>