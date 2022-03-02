@extends('layouts.dashboard')

@section('url')
schedules
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">ตารางเวลา</h1>
    <p class="mb-4">สามารถจัดการข้อมูลตารางเวลาได้</p>

    <h1 class="h5 mb-2 text-gray-800">ตารางเวลาเรือ</h1>
    
    <div class="row">
        @foreach ($ships as $key => $ship)
            <div class="col-6">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-secondary">{{($key === 'go_shipschedule')? 'ขาไป':'ขากลับ'}}</h6>
                    </div>
                    <div class="card-body">
                    
                        <div class="table-responsive">
                            <table class="table" width="100%" cellspacing="0">
                                <!-- <caption>Users</caption> -->
                                <thead>
                                    <tr class="bold">
                                        <th>#</th>
                                        <th>บริการ</th>
                                        <th>เวลาออก</th>
                                        {{-- <th>ราคา</th> --}}
                                        <th width="110px">จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody class="" style="font-size: 0.8rem;">
                                    @foreach ($ship as $value)
                                    <tr class="align-items-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$value->ship->first()->name}}</td>
                                        <td>{{$value->starttime}}</td>
                                        {{-- <td>{{$value->ship->first()->price}}</td> --}}
                                        <td>
                                            @if ($value->status === 1)
                                                <button ship="true" class="btn btn-sm btn-success" type="off" id="{{$value->id}}">
                                                on
                                                <i class="fas fa-toggle-on"></i>
                                                </button>
                                            @else
                                                <button ship="true" class="btn btn-sm btn-danger" type="on" id="{{$value->id}}">
                                                    off
                                                    <i class="fas fa-toggle-off"></i>
                                                </button>
                                            @endif
                                            {{-- <a href="{{route('invoice',[ 'id' => $booking->id ])}}" target="_blank" class="btn btn-sm btn-info">ใบแจ้งหนี้</a> --}}
                                        </td>
                                    </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


    </div>

    
    <h1 class="h5 mb-2 text-gray-800">ตารางเวลารถ</h1>
    
    <div class="row">
        @foreach ($vehicles as $key => $vehicle)
            <div class="col-6">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-secondary">{{($key === 'go_vehicleschedules')? 'ขาไป':'ขากลับ'}}</h6>
                    </div>
                    <div class="card-body">
                    
                        <div class="table-responsive">
                            <table class="table" width="100%" cellspacing="0">
                                <!-- <caption>Users</caption> -->
                                <thead>
                                    <tr class="bold">
                                        <th>#</th>
                                        <th>บริการ</th>
                                        <th>ประเภท</th>
                                        <th>เวลาออก</th>
                                        {{-- <th>ราคา</th> --}}
                                        <th width="110px">จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody class="" style="font-size: 0.8rem;">
                                    @foreach ($vehicle as $value)
                                    <tr class="align-items-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$value->vehicle->first()->name}}</td>
                                        <td>{{$value->vehicle->first()->vehicletype->name}}</td>
                                        <td>{{$value->starttime}}</td>
                                        {{-- <td>{{$value->vehicle->first()->price}}</td> --}}
                                        <td>
                                            @if ($value->status === 1)
                                                <button vehicle="true" class="btn btn-sm btn-success" type="off" id="{{$value->id}}">
                                                on
                                                <i class="fas fa-toggle-on"></i>
                                                </button>
                                            @else
                                                <button vehicle="true" class="btn btn-sm btn-danger" type="on" id="{{$value->id}}">
                                                    off
                                                    <i class="fas fa-toggle-off"></i>
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


    </div>

</div>






<!-- <script src="{{ mix('js/app.js') }}"></script> -->
<!-- <script src="{{ mix('js/app.js') }}"></script> -->
<script type="text/javascript">
    // $(document).ready(function() {});

    $('button[ship="true"]').on('click', function (e) {
        e.preventDefault()
        const _this = $(this)
        const type = _this.attr('type')
        const id = _this.attr('id')
        _this.text('Loding...')
            $.ajax({
                type: "GET",
                url: '{{route('dashboard.changeshipstatus')}}',
                data: {'_token': '{{csrf_token()}}', id},
                // dataType: "json",
                success: function (response) {
                    console.log(response);
                    location.reload()

                }
            });
    });

    $('button[vehicle="true"]').on('click', function (e) {
        e.preventDefault()
        const _this = $(this)
        const type = _this.attr('type')
        const id = _this.attr('id')
        _this.text('Loding...')
            $.ajax({
                type: "GET",
                url: '{{route('dashboard.changevehiclestatus')}}',
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



        $('#modal_approvement').on('hidden.bs.modal', function (e) {
            $("#noupload").removeClass('d-none')
            $("#upload").removeClass('d-none')
            
        })


        
    </script>
@endsection
