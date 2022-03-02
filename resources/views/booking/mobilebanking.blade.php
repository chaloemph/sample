@extends('layouts.booking')

@section('content')
<style>
    body {
        display: none;
    }
</style>

<section class="ftco-section">
    <div class="container">
        <h2>Paypal</h2>
        <form id="paypal" method="post" action="https://www.thaiepay.com/epaylink/payment.aspx"  accept-charset="UTF-8">
            <input type="hidden" name="merchantid" value="49715821">
            <input type="hidden" name="refno" value="<?php echo $booking->id; ?>">
            <input type="hidden" name="customeremail" value="{{$booking->email}}">
            <input type="hidden" name="productdetail" value="ชำระค่าบริการหลีเป๊ะเฟอรี่ #{{$booking->ref}}">
            <input type="hidden" name="total" value="{{$sum}}">
            <input type="submit" name="Submit" value="Comfirm Order">
            <button type="submit" name="cancelOrder" form="frmops" value="<?php echo $booking->id; ?>">Cancel Order</button>
          </form>
        <form method="POST" id="frmops" name="frmops"></form>
    </div> 
</section>



@endsection

@section('script')
<script>   
    $(document).ready(function () {
        $('form#paypal').submit()
    });
</script>
@endsection
