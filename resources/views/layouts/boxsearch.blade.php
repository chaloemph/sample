<section class="ftco-booking ftco-section  ftco-no-pb ">
    <div class="container-fluid">
        @if(Session::has('error'))
            <div class="modal" id="modal-box-search-warning" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">{{Session::get('error')['ref']}}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    {{-- <div class="modal-body">
                      <p>{{Session::get('error')['ref']}}</p>
                    </div> --}}
                  </div>
                </div>
                
              </div>
              <script>
                  $('#modal-box-search-warning').modal('show')
              </script>
        @endif

        <script>
            $('#modal-box-search-warning').on('hidden.bs.modal', function (e) {
                location.reload()
            })
        </script>


        <div class="row no-gutters">
            <div class="col-lg-12">
                <form method="POST" action="{{route('storebooking')}}" class="booking-form aside-stretch">
                @csrf
                <div class="row">
                    <div class="col-md d-flex py-md-4">
                        <div class="form-group align-self-stretch d-flex align-items-end">
                            <div class="wrap align-self-stretch py-3 px-4">
                                  <label for="#">ต้นทาง</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="startpoint" id="startpoints" class="form-control" required>
                                                <option value="">--กรุณาเลือก--</option>
                                                @foreach ($startpoints as $startpoint)
                                                <option value="{{$startpoint->id}}">{{$startpoint->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                            </div>
                         </div>
                    </div>
                    <div class="col-md d-flex py-md-4">
                        <div class="form-group align-self-stretch d-flex align-items-end">
                            <div class="wrap align-self-stretch py-3 px-4">
                                  <label for="#">ปลายทาง</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="endpoint_id" id="endpoint_id" class="form-control" required>
                                                <option value="">--กรุณาเลือก--</option>
                                                @foreach ($endpoints as $endpoint)
                                                <option value="{{$endpoint->id}}">{{$endpoint->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                            </div>
                         </div>
                    </div>
                    <div class="col-md d-flex py-md-4">
                        <div class="form-group align-self-stretch d-flex align-items-end">
                            <div class="wrap align-self-stretch py-3 px-4">
                                  <label for="#">ประเภทเดินทาง</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="tour_type" id="tour_type" class="form-control">
                                                <option value="roundtrip">ไปกลับ</option>
                                                <option value="oneway">เที่ยวเดียว</option>
                                            </select>
                                        </div>
                                    </div>
                            </div>
                         </div>
                    </div>
                    <div class="col-md d-none py-md-4 tour_type_oneway">
                        <div class="form-group align-self-stretch d-flex align-items-end">
                            <div class="wrap align-self-stretch py-3 px-4">
                                  <label for="#" attr="ประเภทเดินทาง">ประเภทเดินทาง</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="tour_type_oneway" disabled id="tour_type_oneway" class="form-control" required="true">
                                                <option value="">กรุณาเลือก</option>
                                                <option value="go">ไป</option>
                                                <option value="back">กลับ</option>
                                            </select>
                                        </div>
                                    </div>
                            </div>
                         </div>
                    </div>
                    <div class="col-md d-flex py-md-4 checkin_date_class">
                        <div class="form-group align-self-stretch d-flex align-items-end">
                            <div class="wrap align-self-stretch py-3 px-4">
                                <label for="#">วันเดินทางไป</label>
                                <input type="text" name="checkin_date" class="form-control checkin_date" attr-placeholder="วันเดินทางไป" placeholder="วันเดินทางไป" autocomplete="off" value="{{date('d/m/Y')}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md d-flex py-md-4 checkout_date_class">
                        <div class="form-group align-self-stretch d-flex align-items-end">
                            <div class="wrap align-self-stretch py-3 px-4">
                                <label for="#">วันเดินทางกลับ</label>
                                <input type="text" name="checkout_date" class="form-control checkout_date" attr-placeholder="วันเดินทางกลับ" placeholder="วันเดินทางกลับ" autocomplete="off" value="{{date('d/m/Y',strtotime("now +1 days"))}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md d-flex py-md-4">
                        <div class="form-group align-self-stretch d-flex align-items-end">
                            <div class="wrap align-self-stretch py-3 px-4">
                                <label for="#">จำนวน</label>
                                <input type="text" name="adult" class="form-control" placeholder="จำนวนคน" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md d-flex">
                        <div class="form-group d-flex align-self-stretch">
                      <button type="submit" class="btn btn-primary py-5 py-md-3 px-4 align-self-stretch d-block"><span>ค้นหา <small>Best Price Guaranteed!</small></span></button>
                    </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</section>


<script>
    $('select[name="tour_type"]').on('change', function () {
        var _this = $(this)
        if (_this.val() === 'oneway') {

        // $(".tour_type_oneway").addClass('d-flex')
        // $(".tour_type_oneway").removeClass('d-none')
            // $('input[name="checkin_date"] , input[name="checkout_date"]').val("")
            // $('input[name="checkin_date"] , input[name="checkout_date"]').attr('disabled', true)
            // $('input[name="checkin_date"] , input[name="checkout_date"]').attr('readonly', true)
            // $('input[name="checkin_date"] , input[name="checkout_date"]').attr('required', true)


            $('select[name="tour_type_oneway"]').removeAttr('disabled')
             $('select[name="tour_type_oneway"]').val("go").trigger('change')
        } else {
            $('select[name="tour_type_oneway"]').val("").trigger('change');
            $('select[name="tour_type_oneway"]').attr('disabled', 'true');

            $(".tour_type_oneway").removeClass('d-flex')
        $(".tour_type_oneway").addClass('d-none')
        }
    })


    $('select[name="tour_type_oneway"]').on('change', function() {
        var _this = $(this)

        $('input[name="checkin_date"]').attr("placeholder", $('input[name="checkin_date"]').attr('attr-placeholder') )
        $('input[name="checkout_date"]').attr("placeholder", $('input[name="checkout_date"]').attr('attr-placeholder') )
        $('input[name="checkin_date"] , input[name="checkout_date"]').attr('required', true)
        $('input[name="checkin_date"] , input[name="checkout_date"]').removeAttr('disabled')
        $('input[name="checkin_date"] , input[name="checkout_date"]').removeAttr('readonly')

        $('.checkin_date_class, .checkout_date_class').removeClass('d-none').addClass('d-flex')



        if ($('select[name="tour_type"]').val() === 'oneway') {
            $('input[name="checkin_date"] , input[name="checkout_date"]').val("")
            $('input[name="checkin_date"] , input[name="checkout_date"]').attr('disabled', true)
            $('input[name="checkin_date"] , input[name="checkout_date"]').attr('readonly', true)
            

            var elm_rm_mame =  (_this.val() === 'go') ? 'input[name="checkin_date"]':'input[name="checkout_date"]'
            var elm_add_mame =  (_this.val() === 'go') ? 'input[name="checkout_date"]':'input[name="checkin_date"]'

            var elm_rm_mame_class =  (_this.val() === 'go') ? '.checkin_date_class':'.checkout_date_class'
            var elm_add_mame_class =  (_this.val() === 'go') ? '.checkout_date_class':'.checkin_date_class'

            $(elm_rm_mame).removeAttr('readonly')
            $(elm_rm_mame).removeAttr('disabled')
            $(elm_add_mame).removeAttr('required')
            $(elm_add_mame).attr('placeholder', '-------------')

            $(elm_rm_mame_class).addClass('d-flex').removeClass('d-none')
            $(elm_add_mame_class).removeClass('d-flex').addClass('d-none')
        }
    })

    $('select[name="startpoint"]').on('change', function(){
        // var _this = $(this)
        // $('select[name="startpoint"] option').removeClass('d-none')
        // $('select[name="endpoint_id"] option[value="'+_this.val()+'"]').addClass('d-none')
        // console.log($('select[name="endpoint"] option[value="'+_this.val()+'"]'));
    })
</script>