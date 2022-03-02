@extends('layouts.dashboard')

@section('url')
trips
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">ทริป</h1>
    <p class="mb-4">สามารถจัดการข้อมูลทริปได้</p>
    
    <div class="row">
            <div class="col-12">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-secondary">ทริป</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('dashboard.trips.index')}}">
                            @csrf
                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="name">รายละเอียด</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="triptype_id">ประเภท</label>
                                <select id="triptype_id" class="form-control" name="triptype_id" required>
                                  <option selected value="">Choose...</option>
                                  @foreach ($triptypes as $triptype)
                                  <option value="{{$triptype->id}}">{{$triptype->name}}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="form-group col-md-6">
                                <label for="price">ราคา</label>
                                <input type="text" class="form-control" id="price" name="price" required>
                              </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-right">บันทึก</button>
                          </form>
                    </div>
                </div>
            </div>
    </div>


</div>






<!-- <script src="{{ mix('js/app.js') }}"></script> -->
<!-- <script src="{{ mix('js/app.js') }}"></script> -->
<script type="text/javascript">
    // $(document).ready(function() {});

    $('button[trip="true"]').on('click', function (e) {
        e.preventDefault()
        const _this = $(this)
        const type = _this.attr('type')
        const id = _this.attr('id')
        _this.text('Loding...')
            $.ajax({
                type: "GET",
                url: '{{route('dashboard.changetripstatus')}}',
                data: {'_token': '{{csrf_token()}}', id},
                // dataType: "json",
                success: function (response) {
                    console.log(response);
                    location.reload()

                }
            });
    });



    // function reject(path, booking_id) {
    //     // dd(booking_id);
    //     // console.log(booking_id);
    //     $("#modal_img").attr("src", path);
    //     $("#reject_id").attr('value', booking_id);
    //     $("#modal_approvement").modal('show');
    // };

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
        });

        $('input[trip="true"]').on('change', function (e) {
            e.preventDefault()
            const _this = $(this)
            const id = _this.attr('id')
            const price = _this.val()
                $.ajax({
                    type: "GET",
                    url: '{{route('dashboard.changetripprice')}}',
                    data: {'_token': '{{csrf_token()}}', id , price},
                    // dataType: "json",
                    success: function (response) {
                        console.log(response);
                        // location.reload()

                    }
                });
        });

        
    </script>
@endsection
