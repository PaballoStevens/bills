
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="images/favicon.png" rel="icon" />
<title>{{ config('app.name', 'Laravel') }}</title>
<meta name="author" content="harnishdesign.net">

<!-- Web Fonts
======================= -->
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<!-- Stylesheet
======================= -->
<link rel="stylesheet" type="text/css" href="http://demo.harnishdesign.net/html/koice/vendor/bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="http://demo.harnishdesign.net/html/koice/vendor/font-awesome/css/all.min.css"/>
<link rel="stylesheet" type="text/css" href="http://demo.harnishdesign.net/html/koice/css/stylesheet.css"/>
</head>
<body>
<!-- Container -->
<div class="container-fluid invoice-container">
  <!-- Header -->
  <header>
  <div class="row align-items-center">
    <div class="col-sm-7 text-center text-sm-start mb-3 mb-sm-0">
      <img id="logo" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSJ0YqQ9p7kqw_fYxyFZHTljB6Jd_oV82kKBd0_ftC4QDzNZeCJmiypy3EIwuuH3t26LeE&usqp=CAU" title="tshwane" alt="tshwane" style="height: 90px" />
    </div>
    <div class="col-sm-5 text-center text-sm-end">
      <i class="fa fa-address-book"> Tel: 012 358 9999</i> <br>
      <i class="fa fa-fax">  Fax: 012 359 6111</i><br>
      <i class="fa fa-envelope">  E-mail: customercare@tshwane.gov.za</i> <br>
      <i class="fa fa-map-marker">  Address: P O BOX 408 | Pretoria</i> <br>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-sm-6 order-sm-"> <strong>{{$profile->LastName}}, {{$profile->FirstName}}</strong>
      <address>
      <strong>Unit {{$profile->FirstName}}</strong><br />
      <strong> {{$profile->Location}} </strong><br />
      </address>
    </div>
     <br>
    <div class="row">
    <div class="col-sm-6 text-sm-end order-sm-1"> 
      <address>
      <strong >Account No : </strong><br />
      <input class="bg-success text-center" value="1234567890" disabled> <br />
      </address>
    </div>
    <div class="col-sm-6 order-sm-0">
       <address>
      TAX invoice : <br />
      Issued:  {{ \Carbon\Carbon::parse($record->created_at)->format( 'd/m/y')}}<br />
      </address>
    </div>
  </div>
  </div>
  <br>
  </header>
  
  <!-- Main Content -->
  <main>
  <div class="card ">
    <table>
      <tbody>
      <tr>
        <td class="col-3">Account for </td>
        <td class="col-3">Stand no</td>
        <td class="col-3 text-center ">Township  {{$profile->Location}}</td>
        <td class="col-3  text-end">Days {{ \Carbon\Carbon::parse($record->created_at)->daysInMonth}} </td>
      </tr> 
      <tr>
        <td class="col-3">Address  STAND</td>
        <td class="col-3 text-center">Sectional title scheme</td>
        <td class="col-3 text-center">Unit no.</td>
        <td class="col-3 text-end ">Meter reading Unit</td>
      </tr> 
      <tr>
        <td class="col-2">Group account</td>
        <td class="col-2 text-center">Deposit date</td>
        <td class="col-2 text-center ">Deposit</td>
        <td class="col-2 text-center">Guarantee date</td>
         <td class="col- text-end">Guarantee  000</td>
      </tr>
      <tr>
        <td class="col-2">GISKEY:</td>
        <td class="col-2 text-center"></td>
        <td class="col-2 text-center"></td>
         <td class="col- text-end">BP:</td>
      </tr>  
      <tbody>
    </table>
  </div>
  <br>
  
  <div class="card">
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table mb-0">
		<thead class="card-header bg-success">
          <tr>
            <td class="col-3 text-white">DATE</td>
			<td class="col-4 text-white">DETAILS</td>
            <td class="col-2 text-center text-white">(R) Amount (excl.VAT)</td>
			<td class="col-1 text-center text-white">(R) VAT</td>
            <td class="col-2 text-end text-white">(R) Amount (incl.VAT)</td>
          </tr>
        </thead>
          <tbody>
            <tr>
              <td class="col-3">{{ \Carbon\Carbon::parse($record->created_at)->format( 'd/m/y')}}</td>
              <td class="col-4 text-1">Balance Brought Forward </td>
              <td class="col-2 text-center">R50.00 </td>
			  <td class="col-1 text-center">10</td>
			  <td class="col-2 text-end">R {{$record->BalanceBroughtForward}}</td>
            </tr>
            <tr style=" border:none">
              <td>{{ \Carbon\Carbon::parse($record->created_at)->format( 'd/m/y')}}</td>
              <td class="text-1"><strong>Sub Total (A)</strong></td>
              <td class="text-center">R120.00</td>
			  <td class="text-center">10</td>
			  <td class="text-end">R {{$record->BalanceBroughtForward}}</td>
            </tr>
			<tr>
              <td>{{ \Carbon\Carbon::parse($record->created_at)->format( 'd/m/y')}} <br>
              {{ \Carbon\Carbon::parse($record->created_at)->format( 'd/m/y')}} <br>
              {{ \Carbon\Carbon::parse($record->created_at)->format( 'd/m/y')}} <br>
              {{ \Carbon\Carbon::parse($record->created_at)->format( 'd/m/y')}} <br>
              {{ \Carbon\Carbon::parse($record->created_at)->format( 'd/m/y')}} <br>
              {{ \Carbon\Carbon::parse($record->created_at)->format( 'd/m/y')}} <br>
              {{ \Carbon\Carbon::parse($record->created_at)->format( 'd/m/y')}} <br>
              </td>
              <td class="text-1">Miscellaneous Charge<br>
              Property Rate <br>
              Waste Management <br>
              Water <br>
              Sanitation <br>
              VAT 14% on services of R 0.00 <br>
              VAT 15% on services of R 2282.05
              </td>
              <td class="text-center">R450.00 <br>
              R450.00 <br>
              R450.00 <br>
              R450.00 <br>
              R450.00 <br>
              R450.00 <br>
              R450.00
              </td>
			  <td class="text-center">
              R450.00 <br>
              R450.00 <br>
              R450.00 <br>
              R450.00 <br>
              R450.00 <br>
              R450.00 <br>
              R450.00
              </td>
			  <td class="text-end">
              R {{$record->MiscellaneousCharges}} <br>
              R {{$record->PropertyRates}} <br>
              R {{$record->WasteManagement}} <br>
              R {{$record->Water}} <br>
              R {{$record->Sanitation}} <br>
              R {{$record->VAT14}} <br>
              R {{$record->VAT15}} 
              </td>
            </tr>
          </tbody>
		  <tfoot class="card-footer">
			<tr style=" border:none">
              <td>{{ \Carbon\Carbon::parse($record->created_at)->format( 'd/m/y')}}</td>
              <td class="text-1"><strong>Total Current Levy (B)</strong></td>
              <td class="text-center">R120.00</td>
			  <td class="text-center">10</td>
			  <td class="text-end">R {{$record->MiscellaneousCharges + $record->PropertyRates + $record->WasteManagement + $record->Water + $record->Sanitation}}</td>
            </tr>
            <tr style=" border:none">
             <tr style=" border:none">
              <td></td>
              <td class="text-1"></td>
              <td class="text-center"></td>
			  <td class="text-center"></td>
			  <td class="text-end"></td>
            </tr>
            </tr>
            <tr style=" border:none">
              <td>{{ \Carbon\Carbon::parse($record->created_at)->format( 'd/m/y')}}</td>
              <td class="text-1"><strong>TOTAL AMOUNT PAYABLE (A + B)</strong></td>
              <td class="text-center">R120.00</td>
			  <td class="text-center">10</td>
			  <td class="text-end">R {{$record->MiscellaneousCharges + $record->PropertyRates + $record->WasteManagement + $record->Water + $record->Sanitation + $record->BalanceBroughtForward}}</td>
            </tr>
		  </tfoot>
        </table>
      </div>
    </div>
  </div>
  </main>
  <!-- Footer -->
  <footer class="text-center mt-4">
  <p class="text-1"><strong>NOTE :</strong> This is computer generated receipt and does not require physical signature.</p>
  <div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()" class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-print"></i> Print</a> <a href="" class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-download"></i> Download</a> <a href="/account/billing/=&HJSNDVNRKTLKC5784{{$record->id}}JIJOJK" class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-download"></i> Payments</a> </div>
  </footer>
</div>
</body>
</html>