@extends('layouts.booking')

@section('content')

<section class="ftco-section">
    <div class="container">
    <h2>จองรถ{{($typevehicle["typevehicle"] === 'go')?'ขาไป':'ขากลับ'}}</h2>
    <h6>
        @if ($booking->tour_type !== 'oneway')
            {{date('d/m/Y',strtotime($booking->checkin_date)) .' - '.date('d/m/Y',strtotime($booking->checkout_date))}}
            ประเภท ไป-กลับ
        @else
            @if ($booking->tour_type_oneway === 'go')
                {{date('d/m/Y',strtotime($booking->checkin_date))}}
                ประเภท ไป
            @else
                {{date('d/m/Y',strtotime($booking->checkout_date))}}
                ประเภท กลับ
            @endif
        @endif
        จำนวน {{$booking->adult}} คน
    </h6>

    @if ($typevehicle["typevehicle"] === 'go' || $booking->tour_type_oneway === 'back')
        <div class="row no-gutters">
            <div class="col-lg-12">
                <form method="POST" action="{{route('storebooking')}}" class="booking-form aside-stretch form-ship">
                @csrf
                <div class="row">
                    <div class="col-md d-flex py-md-4">
                        <div class="form-group align-self-stretch d-flex align-items-end">
                            <div class="wrap align-self-stretch py-3 px-4">
                                  <label for="#">ประเภทการจองยานพาหนะ</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="vehicletypes" id="vehicletypes" class="form-control">
                                                <option value="">-กรุณาเลือก-</option>
                                                @foreach ($vehicletypes as $vehicletype)
                                                <option value="{{$vehicletype->id}}">{{$vehicletype->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                            </div>
                         </div>
                    </div>

                    <div class="col-md d-flex py-md-4">
                        <div class="form-group align-self-stretch d-flex align-items-end">
                            <div class="wrap align-self-stretch py-3 px-4">
                                  <label for="#">ประเภทยานพาหนะ</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="vehicles" id="vehicles" class="form-control">
                                                <option value="">-กรุณาเลือก-</option>
                                                @foreach ($vehicles as $vehicle)
                                                <option  vehicletype-id="{{$vehicle->vehicletype_id}}" value="{{$vehicle->id}}">{{$vehicle->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                            </div>
                         </div>
                    </div>
                    
                    <div class="col-md d-flex">
                        <div class="form-group d-flex align-self-stretch">
                      <button type="button" skip-vehicles="true" class="btn btn-black py-5 py-md-3 px-4 align-self-stretch d-block"><span>ไม่ต้องการจองรถ <small>--ข้ามการจองรถเพื่อไปยังบริการอื่นๆ--</small></span></button>
                    </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    @endif

    </div>
</section>



<section class="">
    <div class="container">
        @forelse ($vehicleschedules as $vehicleschedule)
        <div class="card vehicleschedule my-5" 
        vehicle-id="{{$vehicleschedule->vehicle->first()->id}}"
        vehicletype-id="{{$vehicleschedule->vehicle->first()->vehicletype->id}}"
        >
            
            <h5 class="card-header bg-primary" style="color: #fff">
                {{$vehicleschedule->vehicle->first()->name}}
                {{$vehicleschedule->vehicle->first()->vehicletype->name}}

                @if ( ( $vehicleschedule->vehicle->first()->vehicletype->id === 2 && $typevehicle["typevehicle"] === 'go' )|| $booking->tour_type_oneway === 'back')
                <label for="" class="float-right ml-1">คัน</label>
                <input type="number" class="form-control-sm float-right border-0 text-center" autocomplete="off" value="1" style="width:40px"> 
                @endif
                
                {{-- {{$vehicleschedule}} --}}
                <i class="fas fa-shuttle-van"></i>
            </h5>
            <div class="card-body">
                @if ($vehicleschedule->vehicle->first()->vehicletype->id === 2)
                    @if ($typevehicle["typevehicle"] === 'go' )
                        <input type="text" name="vehicleschedules_go_detail" class="form-control" placeholder="รายละเอียดขาไป/เวลา/สถานที่/ไฟท์บิน - เวลา" required>
                        <p class="card-title mt-3" style="color: #000;">
                            {{date('H:i',strtotime($vehicleschedule->starttime))}} ({{$vehicleschedule->vehiclepoint->first()->startpoint}}) - 
                            {{date('H:i',strtotime($vehicleschedule->starttime_expected))}} ({{$vehicleschedule->vehiclepoint->first()->endpoint}})
                        </p>
                    @else
                        <input type="text" name="vehicleschedules_back_detail" class="form-control" placeholder="รายละเอียดขากลับ/เวลา/สถานที่/ไฟท์บิน - เวลา" required>
                        <p class="card-title mt-3" style="color: #000;">
                            {{date('H:i',strtotime($vehicleschedule->starttime))}} ({{$vehicleschedule->vehiclepoint->first()->endpoint}}) - 
                            {{date('H:i',strtotime($vehicleschedule->starttime_expected))}} ({{$vehicleschedule->vehiclepoint->first()->startpoint}})
                        </p>
                    @endif
                @else
                    @if ($typevehicle["typevehicle"] === 'go' )
                        <input type="text" name="vehicleschedules_go_detail" class="form-control" placeholder="รายละเอียดขาไป/เวลา/สถานที่/ไฟท์บิน - เวลา" required>
                        <p class="card-title mt-3" style="color: #000;">
                            {{date('H:i',strtotime($vehicleschedule->starttime))}} ({{$vehicleschedule->vehiclepoint->first()->startpoint}}) - 
                            {{date('H:i',strtotime($vehicleschedule->starttime_expected))}} ({{$vehicleschedule->vehiclepoint->first()->endpoint}})
                        </p>
                    @else
                        <input type="text" name="vehicleschedules_back_detail" class="form-control" placeholder="รายละเอียดขากลับ/เวลา/สถานที่/ไฟท์บิน - เวลา" required>
                        <p class="card-title mt-3" style="color: #000;">
                            {{date('H:i',strtotime($vehicleschedule->starttime))}} ({{$vehicleschedule->vehiclepoint->first()->endpoint}}) -
                            {{date('H:i',strtotime($vehicleschedule->starttime_expected))}} ({{$vehicleschedule->vehiclepoint->first()->startpoint}})

                        </p>
                    @endif
                    
                @endif
              <h3 class="card-text text-success text-right">
                  ราคา {{number_format($vehicleschedule->vehicle->first()->price)}} บาท
              </h3>

              
              @if ($typevehicle["typevehicle"] === 'go')
              <form  method="post" action="{{ route('vehiclegobooking' , ['id'=> $booking->uuid] ) }}">
                @csrf
                @method('put')
                <input type="hidden" name="vehicleschedule" value="{{$vehicleschedule->id}}">
                <input type="hidden" name="vehicle_rent_amount" value="1">
                <input type="hidden"  name="vehicleschedules_go_detail" class="form-control vehicleschedules_go_detail" placeholder="รายละเอียดขาไป/เวลา/สถานที่" required>
                <button type="submit" class="btn btn-primary float-right">เลือก</button>
              </form>
              @else
              <form  method="post" action="{{ route('vehiclebackbooking' , ['id'=> $booking->uuid] ) }}">
                @csrf
                @method('put')
                <input type="hidden" name="vehicleschedule" value="{{$vehicleschedule->id}}">
                <input type="hidden"  name="vehicleschedules_back_detail" class="form-control vehicleschedules_back_detail" placeholder="รายละเอียดขาไป/เวลา/สถานที่" required>
                <button type="submit" class="btn btn-primary float-right">เลือก</button>
              </form>
              @endif
              
              
              
            </div>
           
        </div>
        @empty
        <div style="font-size: 1.2rem">รถที่ให้บริการเต็ม</div>
        @endforelse
    </div>
</section>



@endsection

@section('script')
<script>


    $('select[name="vehicletypes"]' ).on('change', function(e){
        e.preventDefault()
        _this = $(this)
        _value = _this.val()

        vehicles = $('select[name="vehicles"]' ).val()
        $(".card.vehicleschedule").addClass('d-none')   

       
        if (_value && vehicles != "" ) {
            $('.card.vehicleschedule[vehicletype-id="'+_value+'"][vehicle-id="'+vehicles+'"]').removeClass('d-none')
        } else if(_value && vehicles == "") {
            $('.card.vehicleschedule[vehicletype-id="'+_value+'"]').removeClass('d-none')
        }
         else {
            $(".card.vehicleschedule").removeClass('d-none')   
        }



        $('select option[vehicletype-id]').addClass('d-none')

        if (_value) {
            $('select option[vehicletype-id="'+_value+'"]').removeClass('d-none')
        } else {
            $('select option[vehicletype-id]').removeClass('d-none')

        }


    })


    $('select[name="vehicles"]' ).on('change', function(e){
        e.preventDefault()
        _this = $(this)
        _value = _this.val()

        vehicletypes = $('select[name="vehicletypes"]' ).val()
        $(".card.vehicleschedule").addClass('d-none')   

        if (_value && vehicletypes != "") {
            $('.card.vehicleschedule[vehicle-id="'+_value+'"][vehicletype-id="'+vehicletypes+'"]').removeClass('d-none')
        } else if (_value && vehicletypes == "") { 
            $('.card.vehicleschedule[vehicle-id="'+_value+'"]').removeClass('d-none')
        }
         else {
            $(".card.vehicleschedule").removeClass('d-none')   
        }
    })



    function checkprice(price) {
        if ( '{{$booking->tour_type}}' == 'oneway') {
            $('input[name="price"]').val(price *  '{{$booking->adult}}' )
        }else{
            $('input[name="price"]').val(price *  '{{$booking->adult}}' * 2 )

        }
    }


    $('input[type="number"]').on('change', function(e){
        e.preventDefault()
        $('input[name="vehicle_rent_amount"]').val($(this).val())
    });


    $('button[skip-vehicles="true"]').on('click', function(event){
        window.location.href = '{{route("skipselectvehicle", ["id"=>$booking->uuid] )}}'
    });

    $('input[name="vehicleschedules_back_detail"]').on('keydown , keyup', function(){
        $('input.vehicleschedules_back_detail').val('')
        $('input.vehicleschedules_back_detail').val($(this).val())
    })

    $('input[name="vehicleschedules_go_detail"]').on('keydown , keyup', function(){
        $('input.vehicleschedules_go_detail').val('')
        $('input.vehicleschedules_go_detail').val($(this).val())
    })

   
</script>
@endsection

{{-- {{dd($booking->tour_type)}} --}}

