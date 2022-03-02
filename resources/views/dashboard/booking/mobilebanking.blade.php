@extends('layouts.dashboard')

@section('url')
mobilebankingbookings
@endsection

@section('content')
<style>
    .form-control:disabled, .form-control[readonly]{
        background: none;
    }
</style>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">การจอง โมบายแบงค์กิ้ง</h1>
    <p class="mb-4">สามารถจัดการข้อมูลการจองได้</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <!-- <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div> -->
        <div class="card-body">

            <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <!-- <caption>Users</caption> -->
                    <thead>
                        <tr class="bold">
                            <th>#</th>
                            <th>เลขที่ใบจอง</th>
                            <th>ชื่อ - สกุล</th>
                            {{-- <th>อีเมล</th> --}}
                            <th>สถานะ</th>
                            <th>การชำระ</th>
                            {{-- <th>แจ้งชำระ</th> --}}
                            <th>วันที่ทำรายการ</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody class="" style="font-size: 0.8rem;">
                        @foreach ($bookings as $booking)
                        <tr class="align-items-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{  $booking->ref }}</td>
                            <td>{{ $booking->firstname }} {{ $booking->lastname }}</td>
                            {{-- <td>{{ $booking->email }}</td> --}}
                            <td class="text-center" style="cursor: pointer" status="{{$booking->status}}" confirm-booking="{{$booking->id}}">
                              <i class="{{$booking->status === 'success' ? 'far fa-check-circle text-success':'fas fa-exclamation-circle text-warning'}}"></i>
                              <p class="{{$booking->status === 'success' ? 'text-success':'text-warning'}}">{{ number_format($booking->sum,2) }}</p>
                            </td>
                            <td>
                                @if ($booking->status === 'paid')
                                    @if ($booking->payment->status === 0)
                                        รอตรวจสอบ
                                    @else
                                        รอตรวจสอบ
                                    @endif
                                @endif

                                @if ($booking->status === 'success')
                                    ชำระเงินเรียบร้อยแล้ว
                                @endif
                            </td>
                            {{-- <td>
                                @if ($booking->payment->status === 1)
                                    <button type="button" class="btn btn-sm btn-primary"
                                      data-attachfile="{{$booking->payment->attach_file}}"
                                      data-payment_amount="{{$booking->payment->payment_amount}}"
                                      data-payment_time="{{date('d/m/Y H:i:s',strtotime($booking->payment->payment_time))}}"
                                      data-paymentbanking_id="{{$booking->payment->paymentbanking->bank_name}}"
                                      data-note="{{$booking->payment->note}}"
                                      data-booking_id="{{$booking->id}}"
                                      data-payment_id="{{$booking->payment->id}}"
                                      data-status="{{$booking->status}}"
                                      data-toggle="modal"
                                      data-target="#attachfileModal"
                                      >
                                        หลักฐาน
                                    </button>
                                @endif
                            </td> --}}
                            <td>
                              {{date('d/m/Y',strtotime($booking->created_at))}}
                            </td>
                            <td>
                                <a href="{{route('invoice',[ 'id' => $booking->uuid ])}}" target="_blank" class="btn btn-sm btn-info"> ใบแจ้งหนี้</a>

                              @if ($booking->status === 'success')
                                <a href="{{route('invoice-success',[ 'id' => $booking->uuid ])}}" target="_blank" class="btn btn-sm btn-success"> วอเชอร์</a>
                              @endif
                                {{-- <a href="{{route('invoice',[ 'id' => $booking->id ])}}" target="_blank" class="btn btn-sm btn-info"> ใบแจ้งหนี้</a> --}}
                                <a href="{{route('dashboard.bookings.canclebooking',[ 'booking' => $booking->id ])}}" class="btn btn-sm btn-danger destroy-booking"><i class="fas fa-trash"></i> ยกเลิก</a>
                                <button type="button"
                                 class="btn btn-warning btn-sm"
                                 data-toggle="modal"
                                 data-target="#noteModal"
                                 data-booking_id="{{$booking->id}}"
                                 data-note="{{$booking->note}}"
                                 ><i class="far fa-comments"></i></button>

                                 @if (!$booking->insurances->isEmpty())
                                 <button type="button"
                                 class="btn btn-info btn-sm"
                                 data-toggle="modal"
                                 data-target="#insuranceModal"
                                 data-insurance="{{$booking->insurances}}"
                                 >ประกันภัย</button>
                                 @endif



                                {{-- <button class="btn btn-warning btn-sm" type="button" name="button">Edit</button> --}}
                                {{-- <button class="btn btn-outline-danger btn-sm" type="button" name="button" onclick="mailToResetPWD('{{$booking['email']}}')">Reset Password</button> --}}
                                {{-- <button class="btn btn-danger btn-sm" type="button" name="button">Delete</button> --}}

                            </td>
                        </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



<!-- Modal -->
<div class="modal fade" id="attachfileModal" tabindex="-1" aria-labelledby="attachfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <span class="modal-title" id="attachfileModalLabel">หลักฐานการแจ้งชำระเงิน</span>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <img src="" alt="" class="img-fluid mb-5">
            <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="paymentbanking_id">ธนาคารที่โอน
                  </label>
                  <input type="text" class="form-control" id="paymentbanking_id" name="paymentbanking_id" autocomplete="off" required>

                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="payment_amount">จำนวนเงินที่โอน</label>
                  <input type="text" class="form-control" id="payment_amount" name="payment_amount" autocomplete="off" required>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="payment_date">วันที่โอน</label>
                  <input type="text" name="payment_date" id="payment_date" class="form-control" attr-placeholder="วันเดินทางไป" placeholder="วันเดินทางไป" autocomplete="off" value="{{date('d/m/Y')}}" required>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="note">หมายเหตุ</label>
                  <textarea name="note" class="form-control" rows="5"></textarea>
                </div>
              </div>
        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
          <a href="" id="cancle" class="btn btn-sm btn-danger">ยกเลิกการชำระเงิน</a>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal -->
<div class="modal fade" id="noteModal" tabindex="-1" aria-labelledby="noteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="note">หมายเหตุ</label>
                  <textarea name="note" id="note" class="form-control" rows="5"></textarea>
                </div>
              </div>
        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
          <button  id="note-confirm" class="btn btn-sm btn-primary">บันทึก</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="insuranceModal" tabindex="-1" aria-labelledby="insuranceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="insurance">ข้อมูลประกันภัย</label>
                  <div id="insurance"></div>
                </div>
              </div>
        </div>
      </div>
    </div>
  </div>





<!-- <script src="{{ mix('js/app.js') }}"></script> -->
<!-- <script src="{{ mix('js/app.js') }}"></script> -->
<script type="text/javascript">
    function mailToResetPWD(email) {
        // dd(booking_id);
        // console.log(booking_id);
        // $("#modal_img").attr("src", path);
        $("#email").attr('placeholder', email);
        $("#email").attr('value', email);
        $("#modal_reset_password").modal('show');
    };

</script>

@endsection


@section('script')
    <script>
         $(document).ready( function () {
            $('#dataTable').DataTable();
            $('#attachfileModal input,#attachfileModal textarea').attr('readonly', 'true')
        });

        $('#attachfileModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var src = button.data('attachfile')
        var payment_amount = button.data('payment_amount')
        var payment_date = button.data('payment_time')
        var paymentbanking_id = button.data('paymentbanking_id')
        var note = button.data('note')
        var booking_id = button.data('booking_id')
        var payment_id = button.data('payment_id')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-body img').attr('src', '/images/payment/'+src)
        modal.find('.modal-body input[name="payment_amount"]').val(payment_amount)
        modal.find('.modal-body input[name="payment_date"]').val(payment_date)
        modal.find('.modal-body input[name="paymentbanking_id"]').val(paymentbanking_id)
        modal.find('.modal-body textarea[name="note"]').val(note)
        modal.find('a#cancle').attr('href', `/dashboard/payments/${payment_id}/canclepayment`)
        })

        $('a#cancle').on('click', function(){
          if(confirm('คุณต้องการยกเลิกการแจ้งชำระของลูกค้าใช้หรือไม่ ?')){
            return true
          }
          return false;
        })

        $('a.destroy-booking').on('click', function(){
          if(confirm('คุณต้องการยกเลิกข้อมูลการจองใช้หรือไม่ ?')){
            return true
          }
          return false;
        })

        $('td[confirm-booking]').on('click', function(e){
          e.preventDefault()
          const _this = $(this)
          var booking = _this.attr('confirm-booking')
          var status = _this.attr('status')


          if(confirm((status === 'paid')? 'คุณต้องการยืนยันการจองใช้หรือไม่':'คุณต้องการยกเลิกการจองใช้หรือไม่')){
            $.ajax({
                type: "GET",
                url: `/dashboard/bookings/${booking}/confirmbooking`,
                data: {'_token': '{{csrf_token()}}', 'booking': 5},
                // dataType: "json",
                success: function (response) {
                    console.log(response);
                    location.reload()

                }
            });
          }
        })

        $('#noteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var note = button.data('note')
        var booking_id = button.data('booking_id')
        var modal = $(this)
        modal.find('#note-confirm').attr('id',booking_id)
        modal.find('#note').val(note)
        })

        $('#note-confirm').on('click',function(){
            var _this = $(this)
            var booking_id  = _this.attr('id')
            var note  = $('#noteModal #note').val()
            if(confirm('คุณต้องการบันทึกใช้หรือไม่ ?')){
                $.ajax({
                type: "GET",
                url: `/dashboard/bookings/note/save/${booking_id}`,
                data: {'_token': '{{csrf_token()}}', 'note':note},
                // dataType: "json",
                success: function (response) {
                    console.log(response);
                    // location.reload()

                }
            });

          }
          return false;
        })

        $('#insuranceModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var insurance = button.data('insurance')
        var modal = $(this)
        modal.find('#insurance').html('')
        insurance.map((result) => {
          modal.find('#insurance').append(`<p>${result.firstname} ${result.lastname} ${result.idcard}</p>`)
        })
        })



    </script>
@endsection
