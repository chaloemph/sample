@extends('layouts.appbase')

@section('url')
paymentcheckinghowto
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
        <div class="row">
            <div class="col-12">
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

