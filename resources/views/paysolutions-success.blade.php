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
        <div class="col-12 col-md-8 mx-auto">
          <div class="card">
            <div class="card-body">
                <i class="far fa-check-circle fa-2x mr-3" style="color: greenyellow"></i>
                ท่านชำระเงินเรียบร้อยแล้ว
            </div>
          </div>
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
