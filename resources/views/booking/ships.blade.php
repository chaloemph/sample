@extends('layouts.booking')

@section('content')

<section class="ftco-section">
    <div class="container">
    <h2>จองเรือ {{($typeship["typeship"] === 'go')? 'ขาไป':'ขากลับ'}}</h2>
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
                                  <label for="#">ประเภทเรือ</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="shiptype" id="shiptype" class="form-control">
                                                <option value="">-กรุณาเลือก-</option>
                                                @foreach ($shiptypes as $shiptype)
                                                <option value="{{$shiptype->id}}">{{$shiptype->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                            </div>
                         </div>
                    </div>
                    <div class="col-md d-flex">
                        <div class="form-group d-flex align-self-stretch">
                      <button type="button" skip-ships="true" class="btn btn-black py-5 py-md-3 px-4 align-self-stretch d-block"><span>ไม่ต้องการจองเรือ <small>--ข้ามการจองเรือเพื่อไปยังบริการอื่นๆ--</small></span></button>
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
        <h2>ตารางเที่ยวเรือ</h2>
        @forelse ($shipschedules as $shipschedule)
        <div class="card shipschedule mb-5 mt-3" shiptype-id="{{$shipschedule->ship->first()->shiptype_id}}">

            <h5 class="card-header bg-primary" style="color: #fff">{{$shipschedule->ship->first()->name}} <i class="fas fa-ship"></i></h5>
            <div class="card-body">
              <p class="card-title" style="color: #000">{{date('H:i',strtotime($shipschedule->starttime))}} - {{date('H:i',strtotime($shipschedule->starttime_expected))}}</p>
              <h3 class="card-text text-right text-success">
                  ราคา {{number_format($shipschedule->ship->first()->price)}} บาท
              </h3>


              @if ($typeship["typeship"] === 'go')
              <form  method="post" action="{{ route('shipgobooking' , ['id'=> $booking->uuid] ) }}">
                @csrf
                @method('put')
                <input type="hidden" name="shipschedule" value="{{$shipschedule->id}}">
                <button type="submit" class="btn btn-primary float-right">เลือก</button>
              </form>
              @else
              <form  method="post" action="{{ route('shipbackbooking' , ['id'=> $booking->uuid] ) }}">
                @csrf
                @method('put')
                <input type="hidden" name="shipschedule" value="{{$shipschedule->id}}">
                <button type="submit" class="btn btn-primary float-right">เลือก</button>
              </form>
              @endif



            </div>

        </div>
        @empty
        <div style="font-size: 1.2rem">เรือที่ให้บริการเต็ม</div>
        @endforelse
    </div>
</section>



@endsection

@section('script')
<script>
    $('select[name="shiptype"]' ).on('change', function(e){
        e.preventDefault()
        _this = $(this)
        _value = _this.val()

        if (_value) {
            $(".card.shipschedule").removeClass('d-none')
            $('.card.shipschedule[shiptype-id!="'+_value+'"]').addClass('d-none')
        } else {
            $(".card.shipschedule").removeClass('d-none')
        }
    })



    function checkprice(price) {
        if ( '{{$booking->tour_type}}' == 'oneway') {
            $('input[name="price"]').val(price *  '{{$booking->adult}}' )
        }else{
            $('input[name="price"]').val(price *  '{{$booking->adult}}' * 2 )

        }
    }


    $('button[skip-ships="true"]').on('click', function(event){
        window.location.href = '{{route("skipselectship", ["id"=>$booking->uuid] )}}'
    });





</script>
@endsection

{{-- {{dd($booking->tour_type)}} --}}

