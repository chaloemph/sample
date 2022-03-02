@extends('layouts.booking')

@section('content')

<section class="ftco-section">
    <div class="container">
    <h2>จองทริป</h2>
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

        <div class="row no-gutters">
            <div class="col-lg-12">
                <form method="POST" action="{{route('storebooking')}}" class="booking-form aside-stretch form-ship">
                @csrf
                <div class="row">
                    <div class="col-md d-flex py-md-4">
                        <div class="form-group align-self-stretch d-flex align-items-end">
                            <div class="wrap align-self-stretch py-3 px-4">
                                  <label for="#">ประเภทการจองทริป</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="triptypes" id="triptypes" class="form-control">
                                                <option value="">-กรุณาเลือก-</option>
                                                @foreach ($triptypes as $triptype)
                                                <option value="{{$triptype->id}}">{{$triptype->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                            </div>
                         </div>
                    </div>
        
                    <div class="col-md d-flex">
                        <div class="form-group d-flex align-self-stretch">
                      <button type="button" skip-trips="true" class="btn btn-black py-5 py-md-3 px-4 align-self-stretch d-block"><span>ไม่ต้องการจองทริป <small>--ข้ามการจองทริปเพื่อไปยังบริการอื่นๆ--</small></span></button>
                    </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</section>



<section class="">
    <div class="container">
        @forelse ($trips as $trip)
        <div class="card trip my-5" 
        triptype-id="{{$trip->triptype_id}}"
        >
            
            <h5 class="card-header bg-primary" style="color: #fff">
                {{$trip->name}}
                {{-- {{$trip->price}} --}}
                @if ($trip->triptype_id === 2)
                <label for="" class="float-right ml-1">ลำ</label>
                <input type="number" class="form-control-sm float-right border-0 text-center" autocomplete="off" value="1" style="width:40px"> 
                @endif
                
                {{-- {{$trip}} --}}
                <i class="fas fa-swimmer"></i>
            </h5>
            <div class="card-body">
              {{-- <p class="card-title" style="color: #000">{{$trip->starttime}} ({{$trip->vehiclepoint->first()->startpoint}}) - {{$trip->starttime_expected}} ({{$trip->vehiclepoint->first()->endpoint}})</p> --}}
              <h3 class="card-text text-success">
                  ราคา {{number_format($trip->price)}} บาท
              </h3>

              
              <form  method="post" action="{{ route('tripbookingstore' , ['id' => $booking->uuid] ) }}">
                @csrf
                @method('put')
                <input type="hidden" name="trip" value="{{$trip->id}}">
                <input type="hidden" name="trip_rent_amount" value="1">
                <label for="#">ระบุวันที่</label>
                <input type="text" name="trip_date" class="form-control-sm checkin_date" style="border:1px solid #ababab;max-width:89px" attr-placeholder="วันเดินทางไป" placeholder="วันเดินทางไป" autocomplete="off" value="{{date('d/m/Y')}}" required>
                <button type="submit" class="btn btn-primary float-right">เลือก</button>
              </form>
              
              
              
            </div>
           
        </div>
        @empty
        <div style="font-size: 1.2rem">ทริปที่ให้บริการเต็ม</div>
        @endforelse
    </div>
</section>



@endsection

@section('script')
<script>
    $('select[name="triptypes"]' ).on('change', function(e){
        e.preventDefault()
        _this = $(this)
        _value = _this.val()
        $(".card.trip").addClass('d-none')   

       
        if (_value) {
            $('.card.trip[triptype-id="'+_value+'"]').removeClass('d-none')
        }
         else {
            $(".card.trip").removeClass('d-none')   
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
        $('input[name="trip_rent_amount"]').val($(this).val())
    });


    $('button[skip-trips="true"]').on('click', function(event){
        window.location.href = '{{route("skipselecttrip", ["id"=>$booking->uuid] )}}'
    });

    
    

   
</script>
@endsection

{{-- {{dd($booking->tour_type)}} --}}

