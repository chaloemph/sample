@extends('layouts.booking')

@section('content')

<section class="ftco-section">
    <div class="container">
    <h2>ข้อมูลผู้จอง</h2>
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
        {{-- <div class="row no-gutters">
            
        </div> --}}
        <form method="POST" action="{{route('personalbookingstore',['id'=>$booking->uuid])}}">
            @csrf
            @method('put')
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="firstname">ชื่อ</label>
                <input type="text" name="name" class="form-control" id="firstname" autocomplete="off" value="{{isset($booking->firstname)? $booking->firstname:''}}" required>
              </div>
              <div class="form-group col-md-6">
                <label for="lastname">นามสกุล</label>
                <input type="text" name="sirname" class="form-control" id="lastname" autocomplete="off" value="{{isset($booking->lastname)? $booking->lastname:''}}" required>
              </div>
            </div>
            <div class="form-group">
              <label for="phone">เบอร์โทรศัพท์</label>
              <input type="text" name="phone" class="form-control" id="phone" autocomplete="off" value="{{isset($booking->phone)? $booking->phone:''}}" required>
            </div>
            <div class="form-group">
              <label for="email">อีเมล์</label>
              <input type="email" name="email" class="form-control" id="email" autocomplete="off" value="{{isset($booking->email)? $booking->email:''}}" required>
            </div>

            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" name="insurance_service" id="insurance_service" onclick="trigger_insurance()">
              <label class="form-check-label" for="exampleCheck1">ต้องการประกัน</label>
            </div>
            <div class="form-group insurance d-none">
              <label for="insurance">จำนวนคน / 150 บาทต่อคน</label>
              <div class="form-field">
                  <div class="select-wrap">
                      {{-- <div class="icon"><span class="ion-ios-arrow-down"></span></div> --}}
                      <input type="number" name="insurance_amount" class="form-control" id="insurance" autocomplete="off" min="1" value="1">
                  </div>
              </div>
            </div>
           
            <div id="insurance-template" class=" d-none"></div>
            
            <button type="submit" class="btn btn-primary float-right ml-1">ยืนยันข้อมูลผู้จอง</button>
            {{-- <button type="button" class="btn btn-success float-right">ต้องการประกัน</button> --}}

          </form>
    </div>
</section>

<template class="insurance-template">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="firstname">ชื่อ</label>
      <input type="text" name="firstname[]" class="form-control" id="firstname" autocomplete="off">
    </div>
    <div class="form-group col-md-4">
      <label for="lastname">นามสกุล</label>
      <input type="text" name="lastname[]" class="form-control" id="lastname" autocomplete="off">
    </div>
    <div class="form-group col-md-4">
      <label for="lastname">เลขบัตรประชาชน</label>
      <input type="text" name="idcard[]" class="form-control" id="lastname" autocomplete="off">
    </div>
  </div>
</template>

@endsection

@section('script')
<script>   
$(document).ready(function () {
    // $('input[name="insurance_amount"]').trigger('change');
  });

  $('input[name="insurance_amount"]').on('keypress change', function (e) {
    const _this = $(this)
    const _template = $('template.insurance-template').html()
    var _el = ""
    for (let index = 0; index < _this.val(); index++) {
      _el += _template
    }
    $('#insurance-template').html(_el)
    if( $('input[name="insurance_service"]').is(":checked") ) {
      $('input[name="firstname[]"] , input[name="lastname[]"] , input[name="idcard[]"]').attr('required', true)
    } else {
      $('input[name="firstname[]"] , input[name="lastname[]"] , input[name="idcard[]"]').removeAttr('required')
    }

  });


  $('button[skip-insurance="true"]').on('click', function(event){
        window.location.href = '{{route("skipselectinsurance", ["id"=>$booking->uuid] )}}'
    });

    function trigger_insurance() {
      $('.insurance , #insurance-template').toggleClass('d-none')
      $('input[name="insurance_amount"]').trigger('change');

    }
</script>
@endsection
