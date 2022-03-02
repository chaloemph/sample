
<!DOCTYPE html>
<html>
<head>
	<title>Invoice Booking #</title>
	<META http-equiv=Content-Type content="text/html; charset=utf-8">
	<!-- bootstrap -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/js/all.min.js" integrity="sha256-HkXXtFRaflZ7gjmpjGQBENGnq8NIno4SDNq/3DbkMgo=" crossorigin="anonymous"></script>
	

	<style type="text/css">
		@media print{
			.print-hidden{
				display: none;
			}
			/*.table-invoice tr td{
			  font-family: 'TF_Srivichai',helvetica,thonburi,tahoma;
		    font-size: 18px;
		    border: 1px #666DA2 solid;
		    padding: 0px 5px;
		    letter-spacing: 0.5px;
			}*/
		}
		body{
			margin:8px;
		}
		h3, .h3 {
	    font-size: 20px;
	    font-weight: bold;
	    /*letter-spacing: 1px;*/
		}
		h4, .h4 {
		  font-size: 14px;
		}
		.table-invoice,.table-box-invoice{
			border-collapse: collapse;
		}
		.table-box-invoice td{
			/*font-family: 'TF_Srivichai',helvetica,thonburi,tahoma;*/
			font-family: helvetica,thonburi,tahoma;
			font-size: 14px;
		}
		.table-invoice tr td{
		  /*font-family: 'TF_Srivichai',helvetica,thonburi,tahoma;*/
	    font-size: 14px;
	    border: 1px #666DA2 solid;
	    padding: 0px 5px;
	    /*letter-spacing: 0.5px;*/
	    height: 24px;
		}
		.text-content,.text-content-val{
			position: relative;
			display: inline-block;
		}
		.text-content{
			/*font-weight: 600;*/
		}
		.text-content > p{
			margin: 4px 0px 0;
			padding: 0;
			display: inline-block;
		}
		.text-content-val{
			text-align: center;
			min-width: 188px;
			/*color: #172486;*/
			text-transform: capitalize;
		}
		.transfer-detail{
			display: block;
	    max-width: 100%;
	    text-align: left;
	    text-indent: 20px;
		}
		.licen{
			position: absolute;
			bottom: 2px;
    	left: 110px;
		}
		.text-content-title{
			font-size: 14px;
		}
		.head-top{
			margin: 0;
    	padding: 5px 10px;
    	white-space: nowrap;
		}
		body, .booking-form .form-control , .table-invoice tr td , .text-content-title{
            font-family: 'Kanit', sans-serif !important;
        }
	</style>
</head>
	<body>
		
		<table width="700" align="center" cellpadding="0" cellspacing="0" border="0" class="table-box-invoice">
			<tr>
				<td valign="top" colspan="2" style="background: #D0D5F5;">
					<table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
						<tr>
							<td align="center">
								<div class="logo">
									<img src="http://lipeferry.net//images/logo.png" border="0" width="120" height="120">
								</div>
							</td>
							<td width="1" align="center">
								<h3 class="head-top">Lipeh Ferry & Speed Boat (VOUCHER)</h3>
								<h4 class="head-top">509 หมู่ที่ 2 ต.ปากน้ำ อ.ละงู จ.สตูล 91110 โทร.<!--  098-010-2202,  089-464-7816, 094-319-8111 --> 094-319-8111 , 098-010-2202 แฟ็กซ์ 0-7478-3068</h4>
								<h4 class="head-top">อีเมล์ lipeferryspeedboat@hotmail.com เว็บไซต์ www.lipeferry.net</h4>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<hr style="border: 0;border-bottom: 1px dashed #7989EC;">
				</td>
			</tr>
			<tr>
				<td valign="top" width="50%" align="left">
					&nbsp;
				</td>
				<td valign="top" width="50%" align="right">
					<div class="text-content-title">
						เลขที่ใบจอง&nbsp;<b>{{sprintf("%04d",$booking->ref)}}</b>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="2" height="5"></td>
			</tr>
			<tr>
				<td valign="top" colspan="2">
					<table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" class="table-invoice">
						<tr>
							<td width="50%" colspan="2">
								<div class="text-content">
									ชื่อ-สกุล
								</div>
								<div class="text-content-val">
									{{$booking->firstname }}  {{$booking->lastname }}
								</div>
							</td>
							<td width="50%" colspan="2">
								<div class="text-content">
									เบอร์โทรศัพท์
								</div>
								<div class="text-content-val">
									{{$booking->phone }}
								</div>
							</td>
						</tr>
						<tr>
							<td width="50%" colspan="4">
								<div class="text-content">
									ที่อยู่อีเมล์
								</div>
								<div class="text-content-val" style="text-transform: none;">
									{{$booking->email }}
								</div>
							</td>
						</tr>
						<tr>
							<td width="50%" colspan="2">
								<div class="text-content">
									จำนวนคน
								</div>
								<div class="text-content-val">
									ผู้ใหญ่ {{$booking->adult }} คน
									 {{-- เด็ก  คน --}}
								</div>
							</td>
							<td width="50%" colspan="2">
								<div class="text-content">
									ประเภทการเดินทาง
								</div>
								<div class="text-content-val">
									{{($booking->tour_type === 'oneway')? 'เที่ยวเดียว':'ไป-กลับ'}}
								</div>
							</td>
						</tr>

						<tr>
							<td width="50%" colspan="2">
								<div class="text-content">
									ต้นทาง
								</div>
								<div class="text-content-val">
									{{$booking->startpoint->name}}
								</div>
							</td>
							<td width="50%" colspan="2">
								<div class="text-content">
									ปลายทาง
								</div>
								<div class="text-content-val">
									{{$booking->endpoint->name}}
								</div>
							</td>
						</tr>
						{{-- รถ --}}
						<tr>
							<td colspan="4">
								@if ($booking->vehicleschedules_go || $booking->vehicleschedules_back)
									@if ($booking->tour_type === 'oneway')
										@if ($booking->tour_type_oneway === 'go')
											<div class="text-content">
												รายละเอียดรถขาไป
											</div>
											<div class="text-content-val transfer-detail">
												<p class="card-text">
													{{$booking->vehicleschedulego->vehicle->first()->name}} <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												วันเดินทางไป  {{ date('d/m/Y',strtotime($booking->checkin_date)) }} 
													<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  {{($booking->vehicleschedulego->vehicle->first()->vehicletype_id === 2 )? $booking->vehicleschedules_go_detail:$booking->vehicleschedulego->starttime}} 
												  {{($booking->vehicleschedulego->vehicle->first()->vehicletype_id === 2 )? '':"เวลาถึง". date('h:i',strtotime($booking->vehicleschedulego->starttime_expected))}} 
											</p>
											</div>
										@else
											<div class="text-content">
												รายละเอียดรถขากลับ
											</div>
											<div class="text-content-val transfer-detail">
												<p class="card-text"> 
													{{$booking->vehiclescheduleback->vehicle->first()->name}}  <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												   วันเดินทางกลับ {{ date('d/m/Y',strtotime($booking->checkout_date)) }} 
													<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  {{($booking->vehiclescheduleback->vehicle->first()->vehicletype_id === 2 )? $booking->vehicleschedules_back_detail:date('h:i',strtotime($booking->vehiclescheduleback->starttime))}} 
												   เวลาถึง  {{($booking->vehiclescheduleback->vehicle->first()->vehicletype_id === 2 )? $booking->vehicleschedules_back_detail:"เวลาถึง".date('h:i',strtotime($booking->vehiclescheduleback->starttime_expected))}} 
											   </p>
											</div>
										@endif
									@else
									<table width="100%" cellpadding="0" cellspacing="0" border="0" style="border: none;">
										<tr>
											<td width="50%" valign="top" colspan="2" style="border: none;border-right: 1px #666DA2 solid;">
												<div class="text-content">
													รายละเอียดรถขาไป
												</div>
												<div class="text-content-val transfer-detail">
													<p class="card-text">
														{{$booking->vehicleschedulego->vehicle->first()->name}} <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													   วันเดินทางไป  {{ date('d/m/Y',strtotime($booking->checkin_date)) }} 
														<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  {{ ($booking->vehicleschedulego->vehicle->first()->vehicletype_id === 2 )? $booking->vehicleschedules_go_detail:$booking->vehicleschedulego->starttime}} 
													     {{ ($booking->vehicleschedulego->vehicle->first()->vehicletype_id === 2 )? '':"เวลาถึง".date('h:i',strtotime($booking->vehicleschedulego->starttime_expected))}} 
												   </p>
												</div>
											</td>
											<td width="50%" valign="top" colspan="2" style="border: none;">
												<div class="text-content">
													รายละเอียดรถขากลับ
												</div>
												<div class="text-content-val transfer-detail">
													<p class="card-text"> 
														{{$booking->vehiclescheduleback->vehicle->first()->name}}  <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													   วันเดินทางกลับ {{ date('d/m/Y',strtotime($booking->checkout_date)) }} 
														<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  {{ ($booking->vehiclescheduleback->vehicle->first()->vehicletype_id === 2 )? $booking->vehicleschedules_back_detail:date('h:i',strtotime($booking->vehiclescheduleback->starttime))}} 
													     {{ ($booking->vehiclescheduleback->vehicle->first()->vehicletype_id === 2 )? '':"เวลาถึง". date('h:i',strtotime($booking->vehiclescheduleback->starttime_expected))}} 
												   </p>
												</div>
											</td>
										</tr>
									</table>
									@endif
								@endif
							</td>
						</tr>

						{{-- เรือ --}}
						<tr>
							<td colspan="4">
								@if ($booking->shipschedules_go || $booking->shipschedules_back)
									@if ($booking->tour_type === 'oneway')
										@if ($booking->tour_type_oneway === 'go')
											<div class="text-content">
												รายละเอียดเรือขาไป
											</div>
											<div class="text-content-val transfer-detail">
												<p class="card-text">
													{{$booking->shipschedulesgo->ship->first()->name}} <br> &nbsp;&nbsp;&nbsp; 
												   วันเดินทางไป  {{ date('d/m/Y',strtotime($booking->checkin_date)) }}
													:  {{date('h:i',strtotime($booking->shipschedulesgo->starttime))}} 
												   เวลาถึง  {{date('h:i',strtotime($booking->shipschedulesgo->starttime_expected))}} 
											   </p> 
											</div>
										@else
											<div class="text-content">
												รายละเอียดเรือขากลับ
											</div>
											<div class="text-content-val transfer-detail">
												<p class="card-text">
													{{$booking->shipschedulesback->ship->first()->name}}   <br> &nbsp;&nbsp;&nbsp;
												   วันเดินทางกลับ  {{ date('d/m/Y',strtotime($booking->checkin_date)) }}
													:  {{date('h:i',strtotime($booking->shipschedulesback->starttime))}} 
												   เวลาถึง  {{date('h:i',strtotime($booking->shipschedulesback->starttime_expected))}} 
											   </p>
											</div>
										@endif
									@else
									<table width="100%" cellpadding="0" cellspacing="0" border="0" style="border: none;">
										<tr>
											<td width="50%" valign="top" colspan="2" style="border: none;border-right: 1px #666DA2 solid;">
												<div class="text-content">
													รายละเอียดเรือขาไป
												</div>
												<div class="text-content-val transfer-detail">
													<p class="card-text">
														{{$booking->shipschedulesgo->ship->first()->name}} <br> &nbsp;&nbsp;&nbsp; 
													   วันเดินทางไป  {{ date('d/m/Y',strtotime($booking->checkin_date)) }}
														:  {{date('h:i',strtotime($booking->shipschedulesgo->starttime))}} 
													   เวลาถึง  {{date('h:i',strtotime($booking->shipschedulesgo->starttime_expected))}} 
												   </p>
												</div>
											</td>
											<td width="50%" valign="top" colspan="2" style="border: none;">
												<div class="text-content">
													รายละเอียดเรือขากลับ
												</div>
												<div class="text-content-val transfer-detail">
												   <p class="card-text">
														{{$booking->shipschedulesback->ship->first()->name}}   <br> &nbsp;&nbsp;&nbsp;
													   วันเดินทางกลับ  {{ date('d/m/Y',strtotime($booking->checkin_date)) }}
														:  {{date('h:i',strtotime($booking->shipschedulesback->starttime))}} 
													   เวลาถึง  {{date('h:i',strtotime($booking->shipschedulesback->starttime_expected))}} 
												   </p>
												</div>
											</td>
										</tr>
									</table>
									@endif
								@endif
							</td>
						</tr>

						{{-- ทริป --}}
						<tr>
							<td colspan="4">
								@if ($booking->trip_id)
								<div class="text-content">
									รายละเอียดทริป
								</div>
								<div class="text-content-val transfer-detail">
									{{-- ทริป <br> --}}
									&nbsp;&nbsp;&nbsp;{{trim($booking->trip->name)}}
									<br> 
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; วันเดินทาง {{date('d/m/Y',strtotime($booking->trip_date))}}
								</div>
								@endif
								
							</td>
						</tr>
						{{-- <tr>
							<td colspan="4">
								<table width="100%" cellpadding="0" cellspacing="0" border="0" style="border: none;">
									<tr>
										<td width="50%" valign="top" colspan="2" style="border: none;border-right: 1px #666DA2 solid;">
											<div class="text-content">
												รายละเอียดขาไป
											</div>
											<div class="text-content-val transfer-detail">
                                                
											</div>
										</td>
										<td width="50%" valign="top" colspan="2" style="border: none;">
											<div class="text-content">
												รายละเอียดขากลับ
											</div>
											<div class="text-content-val transfer-detail">
                                                
											</div>
										</td>
									</tr>
								</table>
							</td>
						</tr> --}}
						<tr>
							<td colspan="4">
								<div class="text-content">
									ช่องทางการชำระเงิน
								</div>
								<div class="text-content-val">
									{{$booking->payment->paymenttype->type}}
								</div>
							</td>
						</tr>
						<?php
							$total = array();
						?>
						<tr>
							<td align="right" colspan="3">
								<div class="text-content">
									ตั๋วเรือ/จำนวนผู้โดยสาร
								</div>
							</td>
							<td align="right" width="1">
								<div class="text-content-val" style="text-align: right;min-width: 40px;">
									@php
									if((isset($booking->shipschedulesgo) || isset($booking->shipschedulesback))){
									$price = 0;
										if ($booking->tour_type === 'oneway') {
											if ($booking->tour_type_oneway === 'go') {
												$price += $booking->shipschedulesgo->ship->first()->price * $booking->adult;
											} else {
												$price += $booking->shipschedulesback->ship->first()->price * $booking->adult;
											}
										} else {
											$price += $booking->shipschedulesgo->ship->first()->price * $booking->adult;
											$price += $booking->shipschedulesback->ship->first()->price * $booking->adult;
										}

										echo number_format($price, 2);
									}
										
									@endphp
									
								</div>
							</td>
						</tr>
						<tr>
							<td align="right" colspan="3">
								<div class="text-content">
									@php
									if((isset($booking->vehicleschedules_go) || isset($booking->vehicleschedules_back))){
										if ($booking->tour_type === 'oneway') {
											if ($booking->tour_type_oneway === 'go') {
												if ($booking->vehicleschedulego->vehicle->first()->vehicletype_id === 2) {
													echo "เหมารถ" . $booking->vehicleschedulego->vehicle->first()->name; 
												} else {
													echo "จอย" . $booking->vehicleschedulego->vehicle->first()->name; 
												} 
											} else {
												if ($booking->vehiclescheduleback->vehicle->first()->vehicletype_id === 2) {
													echo "เหมารถ" . $booking->vehiclescheduleback->vehicle->first()->name; 
												} else {
													echo "จอย" . $booking->vehiclescheduleback->vehicle->first()->name; 
												} 
											}
										} else {
											if ($booking->vehicleschedulego->vehicle->first()->vehicletype_id === 2) {
												echo "เหมารถ" . $booking->vehicleschedulego->vehicle->first()->name; 
											} else {
												echo "จอย" . $booking->vehicleschedulego->vehicle->first()->name; 
											}
										}
									}
										
									@endphp
								</div>
							</td>
							<td align="right">
								<div class="text-content-val" style="text-align: right;min-width: 40px;">
									@php
									if((isset($booking->vehicleschedules_go) || isset($booking->vehicleschedules_back))){
										$price = 0;
										if ($booking->tour_type === 'oneway') {
											if ($booking->tour_type_oneway === 'go') {
												if ($booking->vehicleschedulego->vehicle->first()->vehicletype_id === 2) {
													$price += $booking->vehicleschedulego->vehicle->first()->price * $booking->vehicle_rent_amount;   
												} else {
													$price += $booking->vehicleschedulego->vehicle->first()->price * $booking->adult; 
												} 
											} else {
												if ($booking->vehiclescheduleback->vehicle->first()->vehicletype_id === 2) {
													$price += $booking->vehiclescheduleback->vehicle->first()->price * $booking->vehicle_rent_amount;   
												} else {
													$price += $booking->vehiclescheduleback->vehicle->first()->price * $booking->adult; 
												} 
											}
										} else {
											if ($booking->vehicleschedulego->vehicle->first()->vehicletype_id === 2) {
												$price += $booking->vehicleschedulego->vehicle->first()->price * $booking->vehicle_rent_amount;  
												$price += $booking->vehiclescheduleback->vehicle->first()->price * $booking->vehicle_rent_amount;   

											} else {
												$price += $booking->vehicleschedulego->vehicle->first()->price * $booking->adult; 
												$price += $booking->vehiclescheduleback->vehicle->first()->price * $booking->adult; 
											}
										}
										
										echo number_format($price, 2);
									}
										
									@endphp
								</div>
							</td>
						</tr>
						<tr>
							<td align="right" colspan="3">
								<div class="text-content">
									ทริปดำน้ำ
								</div>
							</td>
							<td align="right">
								<div class="text-content-val" style="text-align: right;min-width: 40px;">
									@php
										if((isset($booking->trip_id))){
											$price = 0;
										// ราคาเหมาทริป
											if ($booking->trip->triptype_id === 2) {
												$price += $booking->trip->price * $booking->trip_rent_amount;
											} else {
												$price += $booking->trip->price * $booking->adult;
												echo number_format($price, 2);
											}
										}
									@endphp
								</div>
							</td>
						</tr>
						<tr>
							<td align="right" colspan="3">
								<div class="text-content">
									ทริปดำน้ำเหมาลำ
								</div>
							</td>
							<td align="right">
								<div class="text-content-val" style="text-align: right;min-width: 40px;">
									@php
										if((isset($booking->trip_id))){
											$price = 0;
										// ราคาเหมาทริป
											if ($booking->trip->triptype_id === 2) {
												$price += $booking->trip->price * $booking->trip_rent_amount;
												echo number_format($price, 2);
											} else {
												$price += $booking->trip->price * $booking->adult;
											}
											
											
										}
									@endphp
								</div>
							</td>
						</tr>
						{{-- <tr>
							<td align="right" colspan="3">
								<div class="text-content">
									เรือหางยาว
								</div>
							</td>
							<td align="right">
								<div class="text-content-val" style="text-align: right;min-width: 40px;">
									
								</div>
							</td>
						</tr> --}}
						<tr>
							<td align="right" colspan="3">
								<div class="text-content">
									ประกันการเดินทาง
								</div>
							</td>
							<td align="right">
								<div class="text-content-val" style="text-align: right;min-width: 40px;">
									@php
										if( isset($booking->insurance_amount) ) {
											$price = 0;
											$insurances = \App\Insurance::where('booking_id', $booking->id)->get();
											foreach($insurances as $insurance) {
												$price += 150;
											}
											echo number_format($price, 2);
										}
									@endphp
								</div>
							</td>
						</tr>
						<tr>
							<td align="right" colspan="3">
								<div class="text-content">
									รวมเงิน
								</div>
							</td>
							<td align="right">
								<div class="text-content-val" style="text-align: right;min-width: 40px;">
									{{number_format($sum, 2)}}
								</div>
							</td>
						</tr>
						<tr>
							<td align="right" colspan="3">
								<div class="text-content">
									ลายมือชื่อเจ้าหน้าที่
								</div>
							</td>
							<td align="center">
								<div class="text-content-val" style="text-align: left;min-width: 40px;">
									<img src="http://lipeferry.net//images/licen.png" alt="" width="60">
								</div>
							</td>
						</tr>
						
					</table>
				</td>
			</tr>
		</table>
		
	</body>
</html>