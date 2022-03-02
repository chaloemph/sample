<?php
	include("global.php"); 
	//include("ThaiNumText.php");

	$v = $_GET['v'];
	$sql = "SELECT * FROM `lpbook_booking` 
					LEFT JOIN lpbook_resort ON (lpbook_booking.resort_id = lpbook_resort.resort_id) 
					LEFT JOIN lpbook_resort_price ON (lpbook_booking.price_id = lpbook_resort_price.price_id) 
					LEFT JOIN lpbook_transfer ON (lpbook_booking.booking_transfer = lpbook_transfer.transfer_id) 
					LEFT JOIN lpbook_vehicles ON (lpbook_booking.booking_vehicle = lpbook_vehicles.vehicle_id)  
					WHERE md5(booking_id) = '$v' ";
	$booking = mysql_fetch_array(mysql_query($sql));

?>
<!DOCTYPE html>
<html>
<head>
	<title>Invoice Booking #<?php echo $booking['booking_invoice'];?></title>
	<META http-equiv=Content-Type content="text/html; charset=utf-8">

	<style type="text/css">
		body{
			font-family: helvetica,thonburi,tahoma;
		  font-size: 14px;
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
									<img src="http://www.lipeferry.net/img/logo.png" border="0" width="120" height="120">
								</div>
							</td>
							<td width="1" align="center">
								<div style="margin: 0;padding: 3px 10px;white-space: nowrap;font-size: 20px;font-weight: bold;">Lipeh Ferry & Speed Boat (INVOICE)</div>
								<div style="margin: 0;padding: 3px 10px;white-space: nowrap;font-size: 14px;">509 หมู่ที่ 2 ต.ปากน้ำ อ.ละงู จ.สตูล 91110 โทร. 098-0102202, 089-4647816 แฟ็กซ์ 0-7478-3068</</div>
								<div style="margin: 0;padding: 3px 10px;white-space: nowrap;font-size: 14px;">อีเมล์ lipeferryspeedboat@hotmail.com เว็บไซต์ www.lipeferry.net</</div>
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
				<td valign="top" width="50%" align="left">&nbsp;
					
				</td>
				<td valign="top" width="50%" align="right">
					<div class="text-content-title">
						เลขที่ใบจอง&nbsp;<b><?php echo $booking['booking_invoice'];?></b>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="2" height="5"></td>
			</tr>
			<tr>
				<td valign="top" colspan="2">
					<table width="100%" align="center" cellpadding="3" cellspacing="0" border="1">
						<tr>
							<td width="50%" colspan="2">
								<table align="left" cellpadding="0" cellspacing="0" border="0">
									<tr>
										<td>
											ชื่อ-สกุล
										</td>
										<td style="padding-left:20px;">
											<?php echo $booking['booking_name'].' '.$booking['booking_surname'];?>
										</td>
									</tr>
								</table>
							</td>
							<td width="50%" colspan="2">
								<table align="left" cellpadding="0" cellspacing="0" border="0">
									<tr>
										<td>
											เบอร์โทรศัพท์
										</td>
										<td style="padding-left:20px;">
											<?php echo $booking['booking_tel'];?>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td width="50%" colspan="4">
								<table align="left" cellpadding="0" cellspacing="0" border="0">
									<tr>
										<td>
											ที่อยู่อีเมล์
										</td>
										<td style="padding-left:20px;">
											<?php echo $booking['booking_email'];?>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td width="50%" colspan="2">
								<table align="left" cellpadding="0" cellspacing="0" border="0">
									<tr>
										<td>
											จำนวนคน
										</td>
										<td style="padding-left:20px;">
											ผู้ใหญ่ <?php echo $booking['booking_adult'];?> คน เด็ก <?php echo $booking['booking_children'];?> คน
										</td>
									</tr>
								</table>
							</td>
							<td width="50%" colspan="2">
								<table align="left" cellpadding="0" cellspacing="0" border="0">
									<tr>
										<td>
											ประเภทการเดินทาง
										</td>
										<td style="padding-left:20px;">
											<?php 
												$tour_type = array(
													'oneway' => 'เดินทางเที่ยวเดียว', 
													'roundtrip' => 'เดินทางไปกลับ'
												);

												echo $tour_type[$booking['travel_type']];
											?>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td colspan="4">
								<p style="margin: 7px 0 0 0;">บริการ</p>
								<?php echo $booking['booking_dataservice'];?>
							</td>
						</tr>
						<tr>
							<td colspan="4" style="padding: 0;">
								<table width="100%" cellpadding="0" cellspacing="0" border="1" style="border: none;">
									<tr>
										<td width="50%" valign="top" colspan="2" style="border: none;border-right: 1.5px #000 solid;padding-left: 10px;">
											<div class="text-content">
												รายละเอียดขาไป
											</div>
											<div class="text-content-val transfer-detail">
												<?php echo ($booking['booking_godetail'] == "")?'-':$booking['booking_godetail'];?>
											</div>
										</td>
										<td width="50%" valign="top" colspan="2" style="border: none;padding-left: 10px;">
											<div class="text-content">
												รายละเอียดขากลับ
											</div>
											<div class="text-content-val transfer-detail">
												<?php echo ($booking['booking_backdetail'] == "")?'-':$booking['booking_backdetail'];?>
											</div>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td colspan="4">
								<table align="left" cellpadding="0" cellspacing="0" border="0">
									<tr>
										<td>
											ช่องทางการชำระเงิน
										</td>
										<td style="padding-left:20px;">
											<?php 
												$paymenttype = array(
													'banktransfer' => 'โอนเงินผ่านธนาคาร' , 
													'paypal' => 'โอนเงินผ่าน PayPal' , 
													'credit' => 'โอนเงินผ่านบัตร Credit'
												);
												echo $paymenttype[$booking['booking_paymenttype']];
											?>
										</td>
									</tr>
								</table>
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
									<?php 										
									    
										if($booking['booking_tour_type'] != "oneway"){
                                            $price = mysql_result(mysql_query("SELECT price FROM lpbook_price WHERE timerang_id = '".$booking['time_startboat']."'  AND launch_date = '".date("Y-m-01 00:00:00",strtotime($booking["booking_gotrip"]))."' AND `type` = 'boat' AND van_type = ''  "), 0);
											$price2 = mysql_result(mysql_query("SELECT price2 FROM lpbook_price WHERE timerang_id = '".$booking['time_startboat']."'  AND launch_date = '".date("Y-m-01 00:00:00",strtotime($booking["booking_gotrip"]))."' AND `type` = 'boat' AND van_type = ''  "), 0);
											$price_b = mysql_result(mysql_query("SELECT price FROM lpbook_price WHERE timerang_id = '".$booking['time_backboat']."'  AND launch_date = '".date("Y-m-01 00:00:00",strtotime($booking["booking_backtrip"]))."' AND `type` = 'boat' AND van_type = ''  "), 0);
											$price2_b = mysql_result(mysql_query("SELECT price2 FROM lpbook_price WHERE timerang_id = '".$booking['time_backboat']."'  AND launch_date = '".date("Y-m-01 00:00:00",strtotime($booking["booking_backtrip"]))."' AND `type` = 'boat' AND van_type = ''  "), 0);
                                        }else{
                                          if ($booking['tour_type_oneway'] == "oneway_go") {
                                            $price = mysql_result(mysql_query("SELECT price FROM lpbook_price WHERE timerang_id = '".$booking['time_startboat']."'  AND launch_date = '".date("Y-m-01 00:00:00",strtotime($booking["booking_gotrip"]))."' AND `type` = 'boat' AND van_type = ''  "), 0);
											$price2 = mysql_result(mysql_query("SELECT price2 FROM lpbook_price WHERE timerang_id = '".$booking['time_startboat']."'  AND launch_date = '".date("Y-m-01 00:00:00",strtotime($booking["booking_gotrip"]))."' AND `type` = 'boat' AND van_type = ''  "), 0);
											$price_b = mysql_result(mysql_query("SELECT price FROM lpbook_price WHERE timerang_id = '".$booking['time_startboat']."'  AND launch_date = '".date("Y-m-01 00:00:00",strtotime($booking["booking_gotrip"]))."' AND `type` = 'boat' AND van_type = ''  "), 0);
											$price2_b = mysql_result(mysql_query("SELECT price2 FROM lpbook_price WHERE timerang_id = '".$booking['time_startboat']."'  AND launch_date = '".date("Y-m-01 00:00:00",strtotime($booking["booking_gotrip"]))."' AND `type` = 'boat' AND van_type = ''  "), 0);
                                          }else{
                                          	$price = mysql_result(mysql_query("SELECT price FROM lpbook_price WHERE timerang_id = '".$booking['time_backboat']."'  AND launch_date = '".date("Y-m-01 00:00:00",strtotime($booking["booking_backtrip"]))."' AND `type` = 'boat' AND van_type = ''  "), 0);
											$price2 = mysql_result(mysql_query("SELECT price2 FROM lpbook_price WHERE timerang_id = '".$booking['time_backboat']."'  AND launch_date = '".date("Y-m-01 00:00:00",strtotime($booking["booking_backtrip"]))."' AND `type` = 'boat' AND van_type = ''  "), 0);
											$price_b = mysql_result(mysql_query("SELECT price FROM lpbook_price WHERE timerang_id = '".$booking['time_backboat']."'  AND launch_date = '".date("Y-m-01 00:00:00",strtotime($booking["booking_backtrip"]))."' AND `type` = 'boat' AND van_type = ''  "), 0);
											$price2_b = mysql_result(mysql_query("SELECT price2 FROM lpbook_price WHERE timerang_id = '".$booking['time_backboat']."'  AND launch_date = '".date("Y-m-01 00:00:00",strtotime($booking["booking_backtrip"]))."' AND `type` = 'boat' AND van_type = ''  "), 0);
                                          }
                                        }
										$adultprice = array(
											'oneway' => $price,
											'roundtrip' => ($price+$price_b)
										);
										$childrenprice = array(
											'oneway' => $price2,
											'roundtrip' => ($price2+$price2_b)
										);
										$adult_amount = $booking['booking_adult']*$adultprice[$booking['booking_tour_type']];
										$children_amount = $booking['booking_children']*$childrenprice[$booking['booking_tour_type']];
										$boat_amount = ($adult_amount+$children_amount);
										array_push($total, $boat_amount);

										echo number_format($boat_amount,2);
									?>
								</div>
							</td>
						</tr>
						<tr>
							<td align="right" colspan="3">
								<div class="text-content">
									<?php
										if ($booking['booking_checked6'] == 6) {
											echo "เหมารถตู้ / ".$booking['booking_checked2type'];
											echo " จำนวน " . $booking["vehicle_amount"] . " คัน";
										}else if ($booking['booking_checked2'] == 2) {
											echo "รถตู้ / ".$booking['booking_checked2type'];
										}else if ($booking['booking_checked7'] == 7) {
											echo "รถรับส่ง Taxi / ";
											if($booking['taxiType'] == "3seat"){echo "3 ที่นั่ง";}
                                          	if($booking['taxiType'] == "5seat"){echo "5 ที่นั่ง";}
										}

									?>
								</div>
							</td>
							<td align="right">
								<div class="text-content-val" style="text-align: right;min-width: 40px;">
									<?php 
										if($booking['booking_checked2'] == 0 && $booking['booking_checked6']  == 0 && $booking['booking_checked7']  == 0){
											echo '-';
										}else{
											if ($booking['booking_checked6'] == 6) {
												$vanvipprice = mysql_result(mysql_query("SELECT price2 FROM lpbook_price WHERE timerang_id = '".$booking['time_startcar']."'  AND launch_date = '".date("Y-m-01 00:00:00",strtotime($booking["booking_gotrip"]))."' AND `type` = 'van' AND van_type = 'vip'  "), 0);
												$vanvipprice_b = mysql_result(mysql_query("SELECT price2 FROM lpbook_price WHERE timerang_id = '".$booking['time_backcar']."'  AND launch_date = '".date("Y-m-01 00:00:00",strtotime($booking["booking_backtrip"]))."' AND `type` = 'van' AND van_type = 'vip'  "), 0);

												$vannmprice = mysql_result(mysql_query("SELECT price2 FROM lpbook_price WHERE timerang_id = '".$booking['time_startcar']."'  AND launch_date = '".date("Y-m-01 00:00:00",strtotime($booking["booking_gotrip"]))."' AND `type` = 'van' AND van_type = 'normal'  "), 0);
												$vannmprice_b = mysql_result(mysql_query("SELECT price2 FROM lpbook_price WHERE timerang_id = '".$booking['time_backcar']."'  AND launch_date = '".date("Y-m-01 00:00:00",strtotime($booking["booking_backtrip"]))."' AND `type` = 'van' AND van_type = 'normal'  "), 0);
												
												if ( ($booking['time_startcar'] == 0 && $booking['time_backcar'] != 0) || ($booking['time_startcar'] != 0 && $booking['time_backcar'] == 0) ) {
													if ($booking['time_backcar'] != 0) {
														$carType = array(
															'normal' => array('oneway' => $vannmprice_b,'roundtrip' => ($vannmprice + $vannmprice_b)),
															'vip' => array('oneway' => $vanvipprice_b,'roundtrip' => ($vanvipprice + $vanvipprice_b))
														);
													}else if ($booking['time_startcar'] != 0) {
														$carType = array(
															'normal' => array('oneway' => $vannmprice,'roundtrip' => ($vannmprice + $vannmprice_b)),
															'vip' => array('oneway' => $vanvipprice,'roundtrip' => ($vanvipprice + $vanvipprice_b))
														);
													}
												}else{
													$carType = array(
														'normal' => array('oneway' => $vannmprice,'roundtrip' => ($vannmprice + $vannmprice_b)),
														'vip' => array('oneway' => $vanvipprice,'roundtrip' => ($vanvipprice + $vanvipprice_b))
													);

												}

												if ($booking["vehicle_amount"] != 0) {
													$person = $booking["vehicle_amount"];
												}else{
													$person = 1;
												}
												
												// $person = 1;
											}else if ($booking['booking_checked2'] == 2){
												$vanvipprice = mysql_result(mysql_query("SELECT price FROM lpbook_price WHERE timerang_id = '".$booking['time_startcar']."'  AND launch_date = '".date("Y-m-01 00:00:00",strtotime($booking["booking_gotrip"]))."' AND `type` = 'van' AND van_type = 'vip'  "), 0);
												$vanvipprice_b = mysql_result(mysql_query("SELECT price FROM lpbook_price WHERE timerang_id = '".$booking['time_backcar']."'  AND launch_date = '".date("Y-m-01 00:00:00",strtotime($booking["booking_backtrip"]))."' AND `type` = 'van' AND van_type = 'vip'  "), 0);

												$vannmprice = mysql_result(mysql_query("SELECT price FROM lpbook_price WHERE timerang_id = '".$booking['time_startcar']."'  AND launch_date = '".date("Y-m-01 00:00:00",strtotime($booking["booking_gotrip"]))."' AND `type` = 'van' AND van_type = 'normal'  "), 0);
												$vannmprice_b = mysql_result(mysql_query("SELECT price FROM lpbook_price WHERE timerang_id = '".$booking['time_backcar']."'  AND launch_date = '".date("Y-m-01 00:00:00",strtotime($booking["booking_backtrip"]))."' AND `type` = 'van' AND van_type = 'normal'  "), 0);
												

												if ( ($booking['time_startcar'] == 0 && $booking['time_backcar'] != 0) || ($booking['time_startcar'] != 0 && $booking['time_backcar'] == 0) ) {
													if ($booking['time_backcar'] != 0) {
														$carType = array(
															'normal' => array('oneway' => $vannmprice_b,'roundtrip' => ($vannmprice + $vannmprice_b)),
															'vip' => array('oneway' => $vanvipprice_b,'roundtrip' => ($vanvipprice + $vanvipprice_b))
														);
													}else if ($booking['time_startcar'] != 0) {
														$carType = array(
															'normal' => array('oneway' => $vannmprice,'roundtrip' => ($vannmprice + $vannmprice_b)),
															'vip' => array('oneway' => $vanvipprice,'roundtrip' => ($vanvipprice + $vanvipprice_b))
														);
													}
												}else{
													$carType = array(
														'normal' => array('oneway' => $vannmprice,'roundtrip' => ($vannmprice + $vannmprice_b)),
														'vip' => array('oneway' => $vanvipprice,'roundtrip' => ($vanvipprice + $vanvipprice_b))
													);

												}

												$person = ($booking['booking_adult']+$booking['booking_children']);
											}
											

											$car_amount = $person * $carType[$booking['booking_checked2type']][$booking['van_trip']];

											if ($booking['booking_checked7'] == 7) {
												if ($booking['van_trip'] == "oneway") {
                                                  $mikeway = 1;
                                                }else if ($booking['van_trip'] == "roundtrip"){
                                                  $mikeway = 2;
                                                }
	                                            if($booking['taxiType'] == "3seat"){$car_amount = 1700 * $mikeway;}
	                                            if($booking['taxiType'] == "5seat"){$car_amount = 2000 * $mikeway;}
	                                          }

											// if ($booking['booking_checked6'] == 6 && $booking['van_trip'] == "roundtrip" ) {
											// 	$car_amount = $car_amount *2;
											// }
											array_push($total, $car_amount);

											echo number_format($car_amount,2);
										}
									?>
								</div>
							</td>
						</tr>
						<!-- <tr>
							<td align="right" colspan="3">
								<div class="text-content">
									ทริปดำน้ำ
								</div>
							</td>
							<td align="right">
								<div class="text-content-val" style="text-align: right;min-width: 40px;">
									<?php
										// if($booking['booking_checked8'] == 0){
										// 	echo '-';
										// }
										// else{
          //                                   $tripunderwater_amount = mysql_fetch_assoc(mysql_query("SELECT tripunderwater_amount FROM `lpbook_tripunderwater` WHERE tripunderwater_id = ".$booking['tripunderwater_id']." "));
											
										// 	array_push($total, $tripunderwater_amount['tripunderwater_amount'] * $booking['watertripamount']);
										// 	echo number_format($tripunderwater_amount['tripunderwater_amount'] * $booking['watertripamount'],2);
										// }
									?>
								</div>
							</td>
						</tr> -->
						<tr>
							<td align="right" colspan="3">
								<div class="text-content">
									ทริปดำน้ำ
								</div>
							</td>
							<td align="right">
								<div class="text-content-val" style="text-align: right;min-width: 40px;">
									<?php
										if($booking['booking_checked8'] == 0){
											echo '-';
										}
										else if($booking["tripunderwater_id"] != 0){
                                            $tripunderwater_amount = mysql_fetch_assoc(mysql_query("SELECT tripunderwater_amount FROM `lpbook_tripunderwater` WHERE tripunderwater_id = ".$booking['tripunderwater_id']." "));
											
											array_push($total, $tripunderwater_amount['tripunderwater_amount'] * $booking['watertripamount']);
											echo number_format($tripunderwater_amount['tripunderwater_amount'] * $booking['watertripamount'],2);
										}else{
											echo "-";
										}
									?>
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
									<?php
										if($booking['booking_checked8'] == 0){
											echo '-';
										}
										else if($booking["tripunderwater_id_hire"] != 0){
											
											$arr = explode(",", $booking["tripunderwater_id_hire"]);
											$sumTripunderwater_amount = 0;
											for ($i=0; $i < COUNT($arr) ; $i++) { 
												$tripunderwater_amount = mysql_fetch_assoc(mysql_query("SELECT tripunderwater_amount FROM `lpbook_tripunderwater` WHERE tripunderwater_id = ".$arr[$i]." "));
												$sumTripunderwater_amount += $tripunderwater_amount["tripunderwater_amount"];
											}
											
											
											array_push($total, $sumTripunderwater_amount * $booking['watertripamount']);
											echo number_format($sumTripunderwater_amount * $booking['watertripamount'],2);
										}else{
											echo "-";
										}
									?>
								</div>
							</td>
						</tr>
						<tr>
							<td align="right" colspan="3">
								<div class="text-content">
									เรือหางยาว
								</div>
							</td>
							<td align="right">
								<div class="text-content-val" style="text-align: right;min-width: 40px;">
									<?php
										if($booking['booking_checked3'] == 0){
											echo '-';
										}
										else{
											$longboat_amount = mysql_fetch_array(mysql_query("SELECT * FROM `lpbook_longboat` WHERE longboat_id = ".$booking['longboat_id']." "));
											
											array_push($total, $longboat_amount['longboat_amount']);

											echo number_format($longboat_amount['longboat_amount'],2);
										}
									?>
								</div>
							</td>
						</tr>
						<tr>
							<td align="right" colspan="3">
								<div class="text-content">
									ประกันการเดินทาง
								</div>
							</td>
							<td align="right">
								<div class="text-content-val" style="text-align: right;min-width: 40px;">
									<?php 
										if($booking['booking_checked4'] == 0){
											echo '-';
										}
										else{
											$people_amount = 150;

											$assured_amount = $booking['booking_assured'] * $people_amount;

											array_push($total, $assured_amount);

											echo number_format($assured_amount,2);
										}
									?>
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
									<?php
										$total_amount = array_sum($total);

										echo number_format($total_amount,2);
									?>
								</div>
							</td>
						</tr>
						<tr>
							<td align="center" colspan="4">
								<table border="0" class="table-conditon-pay" width="70%">
									<tr>
										<td colspan="2">
											<div class="text-content">แบ่งการชำระเป็นจำนวน 2 งวด</div>
										</td>
									</tr>
									<tr>
										<td width="20">&nbsp;
											
										</td>
										<td>
											<?php 
											$deposits_amount = ($total_amount*40)/100;
											$balance_amount = ($total_amount - $deposits_amount);
											?>

											<?php
												$deposits_amount = ($total_amount*40)/100;
												$balance_amount  = ($total_amount - $deposits_amount);

												$payment_expired = strtotime($booking['booking_gotrip']);
												$payment_extend  = strtotime("+3 day", time());

												if($payment_extend >= $payment_expired ){
													$payment_extend = time();
												}
											?>



											<table align="left" cellpadding="0" cellspacing="0" border="0">
												<tr>
													<td style="white-space: nowrap;">
														งวดที่ 1. ชำระเงินภายในวันที่
													</td>
													<td style="padding-left:20px;padding-right:20px;" bgcolor="#E4D69A">
														<?php echo date("d/m/Y",$payment_extend);?>
													</td>
													<td>
														จำนวน
													</td>
													<td style="padding-left:20px;padding-right:20px;" bgcolor="#E4D69A">
														<?php echo number_format($deposits_amount,2);?>
													</td>
													<td>
														บาท
													</td>
												</tr>
												<tr>
													<td style="white-space: nowrap;">
														งวดที่ 2. ชำระที่เคาน์เตอร์ในวันเดินทาง
													</td>
													<td style="padding-left:20px;padding-right:20px;">
														<?php echo date("d/m/Y",strtotime($booking['booking_gotrip']));?>
													</td>
													<td>
														จำนวน
													</td>
													<td style="padding-left:20px;padding-right:20px;">
														<?php echo number_format($balance_amount,2);?>
													</td>
													<td>
														บาท
													</td>
												</tr>
											</table>

										</td>
									</tr>
								</table>
								<!-- <p style="font-size: 14px;margin-top: 22px;line-height: 22px;">โอนเงินเข้าบัญชีธนาคารกรุงเทพ คุณอานนท์ บุญมา หมายเลขบัญชี 455-0-49583-4 <br/> ประเภทบัญชีออมทรัพย์ สาขาย่อยละงู</p> -->
								<div style="width: 100%;text-align: left;padding-left: 250px;">
									<p style="font-size: 14px;margin-top: 22px;line-height: 22px;">โอนเงินเข้าบัญชี  คุณอานนท์ บุญมา </p>
									<p> <img src="http://www.lipeferry.net/img/bank/kbank.png" style="width: 40px;"> กสิกร 035-8-86210-1</p>
									<p> <img src="http://www.lipeferry.net/img/bank/ktb.png"  style="width: 40px;"> กรุงไทย 901-3-46462-9</p>
									<p><img src="http://www.lipeferry.net/img/bank/scb.png"  style="width: 40px;"> ไทยพาณิชย์ 864-222-698-9</p>
									<p><img src="http://www.lipeferry.net/img/bank/GSB.png"  style="width: 40px;"> ออมสิน 020179401334</p>
									<p> <img src="http://www.lipeferry.net/img/bank/bk.png"  style="width: 40px;"> กรุงเทพ 455-049-583-4</p>
								</div>	
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<p style="text-align:center;margin-top: 40px;color:red;font-family: helvetica,thonburi,tahoma;font-size: 14px;white-space: nowrap;" class="print-hidden">
			** เมื่อชำระเงินแล้ว กรุณาแนบสลิปการโอน ในหน้าแจ้งชำาระเงิน **<br>
			หลักจากลูกค้าโอนเงิน และแจ้งชำาระเงินแล้ว ระบบจะส่งวอยเชอร์เข้าทางอีเมล์ของลูกค้าโดยอัติโนมัติ (ภายใน 24 ชั่วโมง)
		</p>
	</body>
</html>