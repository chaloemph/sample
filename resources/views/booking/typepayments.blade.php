@extends('layouts.booking')

@section('content')

<section class="ftco-section">
    <div class="container">
    {{-- <h2>ข้อมูลการจอง</h2> --}}
    {{-- <h6>{{$booking->checkin_date .' - '.$booking->checkout_date}} ประเภท {{($booking->tour_type === 'oneway')? 'เที่ยวเดียว':'ไป-กลับ'}} จำนวน {{$booking->adult}} คน</h6> --}}

    <div class="container py-2">
      <h2 class="font-weight-light text-center text-muted py-3">เลือกวิธีชำระเงิน</h2>
        
      
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
                        <form method="POST" action="{{route('typepaymentbookingstore', ['id' => $booking->uuid])}}">
                            @csrf
                            @method('put')
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="typepayment" id="exampleRadios1" value="1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    โอนเงินผ่านธนาคาร
                                    <br>
                                    <img src="/images/banktransfer.png" alt="โอนเงิน" height="40">
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input"  type="radio" name="typepayment" id="exampleRadios2" value="2">
                                <label class="form-check-label" for="exampleRadios2">
                                    ชำระเงินผ่านบัตร Credit Card
                                    <br>
                                    <img src="/images/credit.png" alt="credit" height="40">
                                </label>
                            </div>
                        </form>
                        </div>
                        <div class="card-footer">
                            <button type="button" btn-payment="true" class="btn btn-primary float-right">ยืนยันการทำรายการ <i class="fas fa-credit-card"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!--/row-->

      
	  
      {{-- <!-- timeline item 4 -->
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
                          รวม  {{number_format($sum)}}
                        </h4>
                  </div>
                  <div class="card-footer">
                      <button type="buttin" btn-payment="true" class="btn btn-primary float-right">ไปยังหน้าชำระเงิน <i class="fas fa-credit-card"></i></button>
                  </div>
              </div>
          </div>
      </div> --}}
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
        if( confirm('ยืนยันการทำรายการ')) {
            $('form').submit()
        }
    });
</script>
@endsection
