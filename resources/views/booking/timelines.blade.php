@extends('layouts.booking')

@section('content')

<section class="ftco-section">
    <div class="container">
    {{-- <h2>ข้อมูลการจอง</h2> --}}
    {{-- <h6>{{$booking->checkin_date .' - '.$booking->checkout_date}} ประเภท {{($booking->tour_type === 'oneway')? 'เที่ยวเดียว':'ไป-กลับ'}} จำนวน {{$booking->adult}} คน</h6> --}}

    <div class="container py-2">
      <h2 class="font-weight-light text-center text-muted py-3">ข้อมูลการจอง</h2>
        
      
          <!-- timeline item 1 -->
            <div class="row">
                <!-- timeline item 1 left dot -->
                <div class="col-auto text-center flex-column d-none d-sm-flex">
                    <div class="row h-50">
                        <div class="col">&nbsp;</div>
                        <div class="col">&nbsp;</div>
                    </div>
                    <h5 class="m-2">
                        <span class="badge badge-pill bg-success">&nbsp;</span>
                    </h5>
                    <div class="row h-50">
                        <div class="col border-right">&nbsp;</div>
                        <div class="col">&nbsp;</div>
                    </div>
                </div>
                <!-- timeline item 1 event content -->
                <div class="col py-2">
                    <div class="card border-success shadow">
                        <div class="card-body">
                        <div class="float-right text-success"></div>
                            <h4 class="card-title text-success">ข้อมูลการจอง</h4>
                            <p class="card-text">
                                ต้นทาง <i class="fas fa-map-marker-alt"></i> {{$booking->startpoint->name}} 
                                - ปลายทาง <i class="fas fa-map-marker-alt"></i> {{$booking->endpoint->name}} 
                            </p>
                            <p class="card-text">
                                {{-- <h6>
                                    @if ($booking->tour_type !== 'oneway')
                                        {{date('d/m/Y',strtotime($booking->checkin_date)) .' - '.date('d/m/Y',strtotime($booking->checkout_date))}}
                                        ประเภท ไป-กลับ
                                    @else
                                        @if ($booking->tour_type_oneway === 'go'))
                                            {{date('d/m/Y',strtotime($booking->checkin_date))}}
                                            ประเภท ไป
                                        @else
                                            {{date('d/m/Y',strtotime($booking->checkout_date))}}
                                            ประเภท กลับ
                                        @endif
                                    @endif
                                    จำนวน {{$booking->adult}} คน
                                </h6> --}}
                                @if($booking->tour_type === 'oneway')
                                    @if($booking->tour_type_oneway === 'back')
                                    วันเดินทางกลับ <i class="fas fa-calendar-alt"></i> {{date('d/m/Y',strtotime($booking->checkout_date))}} 
                                    @else
                                    วันเดินทางไป <i class="fas fa-calendar-alt"></i> {{date('d/m/Y',strtotime($booking->checkin_date))}} 
                                    @endif
                                @else
                                วันเดินทางไป <i class="fas fa-calendar-alt"></i> {{date('d/m/Y',strtotime($booking->checkin_date))}} 
                                - วันเดินทางกลับ <i class="fas fa-calendar-alt"></i> {{date('d/m/Y',strtotime($booking->checkout_date))}} 
                                @endif
                                
                            </p>
                            <p class="card-text"> 
                                ประเภทการเดินทาง {{($booking->tour_type === 'oneway')? 'เที่ยวเดียว':'ไป-กลับ'}}
                                @isset($booking->tour_type_oneway)
                                    @if ($booking->tour_type_oneway === 'go')
                                    (ขาไป)
                                    @else
                                    (ขากลับ)
                                    @endif
                                @endisset
                            </p>
                            <p class="card-text">
                                จำนวนผูเดินทาง {{$booking->adult}} คน
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!--/row-->

    
        <!-- timeline item 3 -->
        <div class="row">
            <div class="col-auto text-center flex-column d-none d-sm-flex">
                <div class="row h-50">
                    <div class="col border-right">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                </div>
                <h5 class="m-2">
                    <span class="badge badge-pill bg-light border">&nbsp;</span>
                </h5>
                <div class="row h-50">
                    <div class="col border-right">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                </div>
            </div>
            <!-- timeline item 1 event content -->
            <div class="col py-2">
                <div class="card border-success shadow">
                    <div class="card-body">
                    <div class="float-right text-success"></div>
                        <h4 class="card-title text-success">ข้อมูลผู้จอง</h4>
                        <p class="card-text">
                            <i class="far fa-user"></i> {{$booking->firstname }} {{$booking->lastname}}
                        </p>
                        <p class="card-text">
                            <i class="fas fa-mobile-alt"></i> {{$booking->phone }}
                        </p>
                        <p class="card-text">
                            <i class="fas fa-envelope"></i> {{$booking->email}}
                        </p>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
        </div>
        <!--/row-->
      

      @if ($booking->vehicleschedules_go || $booking->vehicleschedules_back)
      <!-- timeline item 3 -->
      <div class="row">
        <div class="col-auto text-center flex-column d-none d-sm-flex">
            <div class="row h-50">
                <div class="col border-right">&nbsp;</div>
                <div class="col">&nbsp;</div>
            </div>
            <h5 class="m-2">
                <span class="badge badge-pill bg-light border">&nbsp;</span>
            </h5>
            <div class="row h-50">
                <div class="col border-right">&nbsp;</div>
                <div class="col">&nbsp;</div>
            </div>
        </div>
        <!-- timeline item 1 event content -->
        <div class="col py-2">
            <div class="card border-success shadow">
                <div class="card-body">
                <div class="float-right text-success"></div>
                    <h4 class="card-title text-success">ข้อมูลการจองยานพาหนะ</h4>
                    @if ($booking->tour_type === 'oneway')
                        @if ($booking->tour_type_oneway === 'go')
                            <p class="card-text">
                                <i class="fas fa-shuttle-van"></i> {{$booking->vehicleschedulego->vehicle->first()->name}} 
                                {{-- <i class="fas fa-calendar-alt"></i> {{$booking->checkin_date}}  --}}
                                @if ($booking->vehicleschedulego->vehicle->first()->vehicletype_id === 2)
                                    {{$booking->vehicleschedules_go_detail}}
                                @else
                                    เวลาไป <i class="far fa-clock"></i> {{date('H:i',strtotime($booking->vehicleschedulego->starttime))}} 
                                    เวลาถึง <i class="far fa-clock"></i> {{date('H:i',strtotime($booking->vehicleschedulego->starttime_expected))}} 
                                @endif
                                
                            </p>
                        @else
                            <p class="card-text"> 
                                <i class="fas fa-shuttle-van"></i> {{$booking->vehiclescheduleback->vehicle->first()->name}} 
                                {{-- <i class="fas fa-calendar-alt"></i> {{$booking->checkin_date}}  --}}
                                @if ($booking->vehiclescheduleback->vehicle->first()->vehicletype_id === 2)
                                    {{$booking->vehicleschedules_back_detail}}
                                @else
                                    เวลากลับ <i class="far fa-clock"></i> {{date('H:i',strtotime($booking->vehiclescheduleback->starttime))}} 
                                    เวลาถึง <i class="far fa-clock"></i> {{date('H:i',strtotime($booking->vehiclescheduleback->starttime_expected))}} 
                                @endif
                                
                            </p>
                        @endif
                    @else
                        @if ($booking->vehicleschedulego)
                        <p class="card-text">
                            <i class="fas fa-shuttle-van"></i> {{$booking->vehicleschedulego->vehicle->first()->name}} 
                            {{-- <i class="fas fa-calendar-alt"></i> {{$booking->checkin_date}}  --}}
                            @if ($booking->vehicleschedulego->vehicle->first()->vehicletype_id === 2)
                                {{$booking->vehicleschedules_go_detail}}
                            @else
                                เวลาไป <i class="far fa-clock"></i> {{date('H:i',strtotime($booking->vehicleschedulego->starttime))}} 
                                เวลาถึง <i class="far fa-clock"></i> {{date('H:i',strtotime($booking->vehicleschedulego->starttime_expected))}} 
                            @endif
                        </p>
                        @endif
                        @if ($booking->tour_type !== 'oneway')
                        <p class="card-text"> 
                            <i class="fas fa-shuttle-van"></i> {{$booking->vehiclescheduleback->vehicle->first()->name}} 
                            {{-- <i class="fas fa-calendar-alt"></i> {{$booking->checkin_date}}  --}}
                            @if ($booking->vehiclescheduleback->vehicle->first()->vehicletype_id === 2)
                                {{$booking->vehicleschedules_back_detail}}
                            @else
                                เวลากลับ <i class="far fa-clock"></i> {{date('H:i',strtotime($booking->vehiclescheduleback->starttime))}} 
                                เวลาถึง <i class="far fa-clock"></i> {{date('H:i',strtotime($booking->vehiclescheduleback->starttime_expected))}} 
                            @endif
                        </p>
                        @endif
                    @endif


                    @if ($booking->tour_type === 'oneway')
                        @if ($booking->tour_type_oneway === 'go')
                            @if ($booking->vehicleschedulego->vehicle->first()->vehicletype_id === 2)
                                <p class="card-text text-success text-right">
                                    ราคาขาไป {{ number_format($booking->vehicleschedulego->vehicle->first()->price) }} บาท * {{number_format($booking->vehicle_rent_amount)}} คัน 
                                    รวม {{number_format($booking->vehicleschedulego->vehicle->first()->price * $booking->vehicle_rent_amount)}} บาท
                                </p>
                            @else
                                <p class="card-text text-success text-right">
                                    ราคาขากลับ {{ number_format($booking->vehicleschedulego->vehicle->first()->price) }} บาท * {{number_format($booking->adult)}} คน 
                                    รวม {{number_format($booking->vehicleschedulego->vehicle->first()->price * $booking->adult)}} บาท
                                </p>
                            @endif
                        @else
                            @if ($booking->vehiclescheduleback->vehicle->first()->vehicletype_id === 2)
                                <p class="card-text text-success text-right">
                                    ราคาขาไป {{ number_format($booking->vehiclescheduleback->vehicle->first()->price) }} บาท * {{number_format($booking->vehicle_rent_amount)}} คัน 
                                    รวม {{number_format($booking->vehiclescheduleback->vehicle->first()->price * $booking->vehicle_rent_amount)}} บาท
                                </p>
                            @else
                                <p class="card-text text-success text-right">
                                    ราคาขากลับ {{ number_format($booking->vehiclescheduleback->vehicle->first()->price) }} บาท * {{number_format($booking->adult)}} คน 
                                    รวม {{number_format($booking->vehiclescheduleback->vehicle->first()->price * $booking->adult)}} บาท
                                </p>
                            @endif
                        @endif
                    @else
                        @if ($booking->vehicleschedulego->vehicle->first()->vehicletype_id === 2)
                            <p class="card-text text-success text-right">
                                ราคาขาไป {{ number_format($booking->vehicleschedulego->vehicle->first()->price) }} บาท * {{number_format($booking->vehicle_rent_amount)}} คัน 
                                รวม {{number_format($booking->vehicleschedulego->vehicle->first()->price * $booking->vehicle_rent_amount)}} บาท
                            </p>
                            <p class="card-text text-success text-right">
                                ราคาขากลับ {{ number_format($booking->vehiclescheduleback->vehicle->first()->price) }} บาท * {{number_format($booking->vehicle_rent_amount)}} คัน 
                                รวม {{number_format($booking->vehiclescheduleback->vehicle->first()->price * $booking->vehicle_rent_amount)}} บาท
                            </p>
                        @else
                            <p class="card-text text-success text-right">
                                ราคาขาไป {{ number_format($booking->vehicleschedulego->vehicle->first()->price) }} บาท * {{number_format($booking->adult)}} คน 
                                รวม {{number_format($booking->vehicleschedulego->vehicle->first()->price * $booking->adult)}} บาท
                            </p>
                            <p class="card-text text-success text-right">
                                ราคาขากลับ {{ number_format($booking->vehiclescheduleback->vehicle->first()->price) }} บาท * {{number_format($booking->adult)}} คน 
                                รวม {{number_format($booking->vehiclescheduleback->vehicle->first()->price * $booking->adult)}} บาท
                            </p>
                        @endif
                    @endif
                    <p class="card-text"></p>
                </div>
            </div>
        </div>
    </div>
    <!--/row-->
    @endif
      

    @if ($booking->shipschedules_go || $booking->shipschedules_back)
      <!-- timeline item 3 -->
      <div class="row">
          <div class="col-auto text-center flex-column d-none d-sm-flex">
              <div class="row h-50">
                  <div class="col border-right">&nbsp;</div>
                  <div class="col">&nbsp;</div>
              </div>
              <h5 class="m-2">
                  <span class="badge badge-pill bg-light border">&nbsp;</span>
              </h5>
              <div class="row h-50">
                  <div class="col border-right">&nbsp;</div>
                  <div class="col">&nbsp;</div>
              </div>
          </div>
		  <div class="col py-2">
			<div class="card border-success shadow">
				<div class="card-body">
				<div class="float-right text-success"></div>
                    <h4 class="card-title text-success">ข้อมูลการจองเรือ</h4>
                    @if ($booking->tour_type === 'oneway')
                        @if ($booking->tour_type_oneway === 'go')
                            <p class="card-text">
                                <i class="fas fa-ship"></i> {{$booking->shipschedulesgo->ship->first()->name}} 
                                เวลาไป <i class="far fa-clock"></i> {{date('H:i',strtotime($booking->shipschedulesgo->starttime))}} 
                                เวลาถึง <i class="far fa-clock"></i> {{date('H:i',strtotime($booking->shipschedulesgo->starttime_expected))}} 
                            </p>
                            <p class="card-text text-success text-right">
                                ราคาขาไป {{ number_format($booking->shipschedulesgo->ship->first()->price) }} บาท * {{number_format($booking->adult)}} คน 
                                รวม {{number_format($booking->shipschedulesgo->ship->first()->price * $booking->adult)}} บาท
                            </p>
                        @else
                            <p class="card-text">
                                <i class="fas fa-ship"></i> {{$booking->shipschedulesback->ship->first()->name}} 
                                เวลากลับ <i class="far fa-clock"></i> {{date('H:i',strtotime($booking->shipschedulesback->starttime))}} 
                                เวลาถึง <i class="far fa-clock"></i> {{date('H:i',strtotime($booking->shipschedulesback->starttime_expected))}} 
                            </p>
                            <p class="card-text text-success text-right">
                                ราคาขากลับ {{ number_format($booking->shipschedulesback->ship->first()->price) }} บาท * {{number_format($booking->adult)}} คน 
                                รวม {{number_format($booking->shipschedulesback->ship->first()->price * $booking->adult)}} บาท
                            </p>
                        @endif
                    @else
                        <p class="card-text">
                            <i class="fas fa-ship"></i> {{$booking->shipschedulesgo->ship->first()->name}} 
                            เวลาไป <i class="far fa-clock"></i> {{date('H:i',strtotime($booking->shipschedulesgo->starttime))}} 
                            เวลาถึง <i class="far fa-clock"></i> {{date('H:i',strtotime($booking->shipschedulesgo->starttime_expected))}} 
                        </p>
                        <p class="card-text">
                            <i class="fas fa-ship"></i> {{$booking->shipschedulesback->ship->first()->name}} 
                            เวลากลับ <i class="far fa-clock"></i> {{date('H:i',strtotime($booking->shipschedulesback->starttime))}} 
                            เวลาถึง <i class="far fa-clock"></i> {{date('H:i',strtotime($booking->shipschedulesback->starttime_expected))}} 
                        </p>
                        <p class="card-text text-success text-right">
                            ราคาขาไป {{ number_format($booking->shipschedulesgo->ship->first()->price) }} บาท * {{number_format($booking->adult)}} คน 
                            รวม {{number_format($booking->shipschedulesgo->ship->first()->price * $booking->adult)}} บาท
                        </p>
                        <p class="card-text text-success text-right">
                            ราคาขากลับ {{ number_format($booking->shipschedulesback->ship->first()->price) }} บาท * {{number_format($booking->adult)}} คน 
                            รวม {{number_format($booking->shipschedulesback->ship->first()->price * $booking->adult)}} บาท
                        </p>
                    @endif
					
                    
					

                    
                    
				</div>
			</div>
		</div>
      </div>
      <!--/row-->
    @endif


    @if ($booking->trip_id)
      <!-- timeline item 3 -->
      <div class="row">
          <div class="col-auto text-center flex-column d-none d-sm-flex">
              <div class="row h-50">
                  <div class="col border-right">&nbsp;</div>
                  <div class="col">&nbsp;</div>
              </div>
              <h5 class="m-2">
                  <span class="badge badge-pill bg-light border">&nbsp;</span>
              </h5>
              <div class="row h-50">
                  <div class="col border-right">&nbsp;</div>
                  <div class="col">&nbsp;</div>
              </div>
          </div>
		  <div class="col py-2">
			<div class="card border-success shadow">
				<div class="card-body">
                    <h4 class="card-title text-success">ข้อมูลการจองทริป</h4>
                        <p>
                          <i class="fas fa-hiking"></i> {{$booking->trip->name}}
                        </p>
                        วันเดินทาง <i class="fas fa-calendar-alt"></i> {{date('d/m/Y',strtotime($booking->trip_date))}} 
                        

                      @if ($booking->trip->triptype_id === 2)
                        <p class="card-text text-success text-right">
                            ราคา {{ number_format($booking->trip->price) }} บาท * {{number_format($booking->trip_rent_amount)}} ลำ
                            รวม {{number_format($booking->trip->price * $booking->trip_rent_amount)}} บาท
                        </p>
                      @else
                        <p class="card-text text-success text-right">
                            ราคา {{ number_format($booking->trip->price) }} บาท * {{number_format($booking->adult)}} คน
                            รวม {{number_format($booking->trip->price * $booking->adult)}} บาท
                        </p>
                      @endif
                </div>
			</div>
		</div>
      </div>
      <!--/row-->
    @endif


    @if ($booking->insurance_amount)
      <!-- timeline item 3 -->
      <div class="row">
          <div class="col-auto text-center flex-column d-none d-sm-flex">
              <div class="row h-50">
                  <div class="col border-right">&nbsp;</div>
                  <div class="col">&nbsp;</div>
              </div>
              <h5 class="m-2">
                  <span class="badge badge-pill bg-light border">&nbsp;</span>
              </h5>
              <div class="row h-50">
                  <div class="col border-right">&nbsp;</div>
                  <div class="col">&nbsp;</div>
              </div>
          </div>
		  <div class="col py-2">
			<div class="card border-success shadow">
				<div class="card-body">
                    <h4 class="card-title text-success">ข้อมูลการประกันภัย</h4>
                    @foreach ($insurances as $insurance)
                    <p>
                        <i class="fas fa-user-shield"></i> {{$insurance->firstname}} {{$insurance->lastname}} {{$insurance->idcard}}
                    </p>
                    @endforeach
                        <p class="card-text text-success text-right">
                            ราคา 150 *  {{$booking->insurance_amount}} คน
                            รวม {{number_format($booking->insurance_amount * 150 )}} บาท
                        </p>
                      
                </div>
			</div>
		</div>
      </div>
      <!--/row-->
    @endif
      
	  
      <!-- timeline item 4 -->
      <div class="row">
          <div class="col-auto text-center flex-column d-none d-sm-flex">
              <div class="row h-50">
                  <div class="col border-right">&nbsp;</div>
                  <div class="col">&nbsp;</div>
              </div>
              <h5 class="m-2">
                  <span class="badge badge-pill bg-light border">&nbsp;</span>
              </h5>
              <div class="row h-50">
                  <div class="col">&nbsp;</div>
                  <div class="col">&nbsp;</div>
              </div>
          </div>
          <div class="col py-2">
              <div class="card">
                  <div class="card-body">
                      <h4 class="card-title text-success float-right">
                          รวม  {{number_format($sum)}} บาท
                        </h4>
                  </div>
                  <div class="card-footer">
                      <button type="buttin" btn-payment="true" class="btn btn-primary float-right">ไปยังหน้าชำระเงิน <i class="fas fa-credit-card"></i></button>
                  </div>
              </div>
          </div>
      </div>
      <!--/row-->



  </div>
  <!--container-->
  
  <hr>
</section>



<section class="">
    <div class="container">
    </div>
</section>



@endsection

@section('script')
<script>   
    $('button[btn-payment="true"]').on('click', function () {
        window.location.href = '{{route("typepayment", ["id"=>$booking->uuid] )}}'
    });
</script>
@endsection
