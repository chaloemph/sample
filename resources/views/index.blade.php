@extends('layouts.appbase')

@section('url')
    about
@endsection

@section('head')
<style>
    h5 {
        font-family: 'Kanit', sans-serif !important;
    }
    .modal-dialog {
        width: 100%;
        height: 90%;
    }
    .modal-content {
        height: auto;
        min-height: 100%;
        border-radius: 0;
    }
    .promotion{
        font-size: 18px;
        text-align: justify; 
        text-indent: 15%;
        font-family: 'Kanit', sans-serif !important;
    }
</style>
@endsection

@section('content')
<section class="ftco-section">
  <div class="container">
    <div class="row">
        <div class="col-12 col-md-8 mx-auto my-3">
            <a href="{{Request::root()}}/home" class="btn btn-block btn-lg btn-primary">ไปยังเวอร์ชั่นใหม่</a>
        </div>
        <div class="col-12 col-md-8 mx-auto my-3 mb-5">
          <a href="http://lipetranfer.com/m.booking.php" class="btn btn-block btn-lg btn-info">ไปยังเวอร์ชั่นเดิม</a>
        </div>
        <div class="col-12 col-md-6 mx-auto my-3">
            <img class="img-fluid" src="{{ asset('images/promotion.jpg') }}" alt="เกาะหลีเป๊ะ โปรโมชั่น lipe promotion">
        </div>
        <div class="col-12 col-md-6 mx-auto my-3">
            <h1 class="promotion">ไปเที่ยวเกาะหลีเป๊ะกันดีกว่า เกาะหลีเป๊ะเดินทางยังไงได้บ้าง เว็บนี้มีคำตอบ บริการจองตั๋วครบครับ ทั้งรถตู้รับส่งสนามบินหาดใหญ่/เรือไปกลับเกาะหลีเป๊ะ/ทริปดำน้ำ
                - เดินทางโดยเครื่องบินลงเครื่องที่สนามบินหาดใหญ่ ทางเรามีรถตู้รับส่งสนามบินหาดใหญ่ อัพเดตตามไฟท์บิน
                - ขึ้นเรือที่ท่าเรือปากบารา ไปกลับเกาะหลีเป๊ะ มีเรือวิ่งทุกวัน
                - ทริปดำน้ำเที่ยวตามเกาะต่างๆ โซนใน/โซนนอก
                
                เวลาในการเดินทาง
                หาดใหญ่-ท่าเรือปากบารา ใช้เวลาเดินทาง 1.30 ชั่วโมง ท่าเรือปากบารา-หลีเป๊ะ ใช้เวลาเดินทาง 1.30 ชั่วโมง
                
                โปรโมชั่นพิเศษ
                รถตู้รับส่งสนามบินหาดใหญ่+เรือไปกลับเกาะหลีเป๊ะ ในราคาเพียง 1,500 บาท 
                <br>
                ทริปดำน้ำ หลีเป๊ะ
                ดำน้ำหลีเป๊ะ โซนใน โซนนอก
                 </h1>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                <div class="mr-auto">
                    <img src="/images/logolipeferry.png" alt="lipeferry" class="img-fluid" style="max-width: 75px;">
                    Lipe<span>ferry</span>
                </div>
                <div class="ml-auto">
                    <h5 class="modal-title" id="staticBackdropLabel">กรุณาเลือกเวอร์ชั่นก่อนเข้าใช้งาน</h5>
                </div>
                
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-md-8 mx-auto my-3">
                            <button id="new-version" class="btn btn-block btn-lg btn-primary">ไปยังเวอร์ชั่นใหม่</button>
                        </div>
                        <div class="col-12 col-md-8 mx-auto my-3">
                          <button id="old-version" class="btn btn-block btn-lg btn-info">ไปยังเวอร์ชั่นเดิม</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    lipeferry จองตั๋วเรือเฟอร์รี่ สปีดโบ้ท | รถตู้รับส่งสนามบิน เรือไปเกาะหลีเป๊ะ
                </div>
            </div>
        </div>
    </div>
  </div>
</section>

@endsection

@section('script')
    <script>
        // $('#staticBackdrop').modal()

        // $('#new-version').on('click', function () {
        //     window.location.href = "/home"
        // });
        // $('#old-version').on('click', function () {
        //     window.location.href = "http://lipetranfer.com/"
        // });
    </script>
@endsection
