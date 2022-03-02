@extends('layouts.appbase')

@section('url')
    paymentchecking
@endsection

@section('content')
<style>
  .wickedpicker__controls{
    padding: 0px;
  }
  .wickedpicker__title {
    background: #3f91fb;
    margin: 0 auto;
    padding: 12px 11px 10px 15px;
    color: #ffffff;
    font-size: inherit;
}
.datepicker table tr td.active, .datepicker table tr td.active:hover, .datepicker table tr td.active.disabled, .datepicker table tr td.active.disabled:hover {
    background-color: #006dcc;
    background-image: -moz-linear-gradient(top, #0088cc, #0044cc);
    background-image: -ms-linear-gradient(top, #eff6fa, #0044cc);
    background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#0088cc), to(#0044cc));
    background-image: -webkit-linear-gradient(top, #0088cc, #3089fc);
    background-image: -o-linear-gradient(top, #0088cc, #0044cc);
    background-image: linear-gradient(top, #0088cc, #0044cc);
    background-repeat: repeat-x;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#0088cc', endColorstr='#0044cc', GradientType=0);
    border-color: #0044cc #0044cc #002a80;
    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
    filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
    color: #fff;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
}

</style>

<section class="ftco-section">
  <div class="container">
      {{-- <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-12 heading-section text-center ftco-animate"> --}}
          {{-- <span class="subheading">ชำระเงิน</span> --}}
        {{-- <span class="mb-4" style="font-size: 28px;color: #000;font-weight:700">ใบอนุญาติประกอบธุรกิจ และใบรับรองคุณภาพ</span> --}}
      {{-- </div>
    </div>  --}}
    <div class="row">
      <div class="col-md-8 col-12 mx-auto">
        <div class="card">
          <h5 class="card-header" style="color: #3089fc;font-family: 'Kanit', sans-serif;">ตรวจสอบสถานะการจอง</h5>
          <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{route('payment.checking.status.boooking')}}" enctype="multipart/form-data">
              @csrf
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="invoice_number">เลขที่ใบจอง</label>
                  <input type="text" class="form-control" id="invoice_number" name="invoice_number" autocomplete="off" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
                  @if(Session::has('error'))
                  <span class="helper-text" style="color:red" data-error="wrong" data-success="right">{{Session::get('error')['ref']}}</span>
                  @endif
                  @if(Session::has('msg'))
                  <span class="helper-text" style="color:green" data-error="wrong" data-success="right">{{Session::get('msg')['ref']}}</span>
                  @endif
                </div>
               
              </div>

              
              
              <button type="submit" class="btn btn-primary float-right"><i class="fas fa-paper-plane"></i> ยืนยัน</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container mt-4">
    <div class="row">
        <div class="col-md-8 col-12 mx-auto">
            <a href="/files/how-to.pdf" target="_blank"><i class="fas fa-file-pdf fa-2x mr-3"></i>วิธีตรวจสอบและแจ้งชำระ</a>
        </div>
    </div>
</div>
</section>


@endsection


@section('script')
<script>
  $(function() {
    $('#payment_date').datepicker({
      'format': 'd/m/yyyy',
	    'autoclose': true,
    });
    $('.time').wickedpicker({
      twentyFour: true,
      showSeconds: false, 
      title: 'เวลาที่โอน', 
    });
  });
</script>
@endsection

