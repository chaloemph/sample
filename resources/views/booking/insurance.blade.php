@extends('layouts.booking')

@section('content')


<section class="ftco-section pb-0">
  <div class="container">
  <h2>ประกันการเดินทาง</h2>
  <h6>
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
  </h6>


      <div class="row no-gutters">
          <div class="col-lg-12">
            <form class="booking-form aside-stretch form-ship">
              @csrf
              <div class="row">
                  <div class="col-md d-flex py-md-4">
                      <div class="form-group align-self-stretch d-flex align-items-end">
                          <div class="wrap align-self-stretch py-3 px-4">
                                <label for="insurance">จำนวนคน / 150 บาทต่อคน</label>
                                  <div class="form-field">
                                      <div class="select-wrap">
                                          {{-- <div class="icon"><span class="ion-ios-arrow-down"></span></div> --}}
                                          <input type="number" name="insurance_amount" class="form-control" id="insurance" autocomplete="off" min="1" value="1">
                                      </div>
                                  </div>
                          </div>
                       </div>
                  </div>
      
                  <div class="col-md d-flex">
                      <div class="form-group d-flex align-self-stretch">
                    <button type="button" skip-insurance="true" class="btn btn-primary py-5 py-md-3 px-4 align-self-stretch d-block"><span>ข้ามการซื้อประกันการเดินทาง <small>--ข้ามการซื้อประกันการเดินทางเพื่อไปยังบริการอื่นๆ--</small></span></button>
                  </div>
                  </div>
              </div>
            </form>
          </div>
      </div>
  </div>
</section>

<section class="ftco-section pt-5">
    <div class="container">
    <h2>ข้อมูลประกันภัย</h2>
        <form method="POST" action="{{route('insurancebookingstore',['id'=>$booking->uuid])}}">
            @csrf
            @method('put')
            <div id="insurance-template"></div>
            <button type="submit" class="btn btn-primary float-right">ยืนยันข้อมูลประกันภัย</button>
          </form>
    </div>
</section>



<template class="insurance-template">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="firstname">ชื่อ</label>
      <input type="text" name="firstname[]" class="form-control" id="firstname" autocomplete="off" required>
    </div>
    <div class="form-group col-md-4">
      <label for="lastname">นามสกุล</label>
      <input type="text" name="lastname[]" class="form-control" id="lastname" autocomplete="off" required>
    </div>
    <div class="form-group col-md-4">
      <label for="lastname">เลขบัตรประชาชน</label>
      <input type="text" name="idcard[]" class="form-control" id="lastname" autocomplete="off" required>
    </div>
  </div>
</template>

@endsection

@section('script')
<script>   
  $(document).ready(function () {
    $('input[name="insurance_amount"]').trigger('change');
  });

  $('input[name="insurance_amount"]').on('keypress change', function (e) {
    const _this = $(this)
    const _template = $('template.insurance-template').html()
    var _el = ""
    for (let index = 0; index < _this.val(); index++) {
      _el += _template
    }

    $('#insurance-template').html(_el)

  });


  $('button[skip-insurance="true"]').on('click', function(event){
        window.location.href = '{{route("skipselectinsurance", ["id"=>$booking->uuid] )}}'
    });
</script>
@endsection
