@extends('layouts.dashboard')

@section('url')
schedules
@endsection
<style>
    .table tr th {
        font-size: 13px;
    }
</style>
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">ตารางเวลา</h1>
    <p class="mb-4">สามารถจัดการข้อมูลตารางเวลาได้</p>

    <div class="row">
        <div class="col-6">
            <h1 class="h5 mb-2 text-gray-800">ตารางเวลาเรือ</h1>
        </div>
        <div class="col text-right">
            <a href="{{route('dashboard.shipschedules.create')}}" class="btn btn-sm btn-primary">เพิ่มตารางเรือ <i class="fas fa-plus"></i></a>
        </div>
    </div>
    
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
                                        <th width="40%" class="text-center">จัดการ</th>
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

                                            <a href="{{route('dashboard.shipschedules.show', [ 'shipschedule' =>$value->id])}}" class="btn btn-sm btn-info">edit <i class="fas fa-edit"></i></a>

                                            <form class="d-none" id="confirm" method="post" action="{{ route('dashboard.shipschedules.destroy' , ['shipschedule'=> $value->id] ) }}">
                                                @csrf
                                                @method('delete')
                                            </form>
    
                                            <button onclick="triger_delete($(this))" class="btn btn-sm btn-danger">ลบ <i class="fas fa-trash-restore-alt"></i></a>

                                            
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

    
    <div class="row">
        <div class="col-6">
            <h1 class="h5 mb-2 text-gray-800">ตารางเวลารถ</h1>
        </div>
        <div class="col text-right">
            <a href="{{route('dashboard.vehicleschedules.create')}}" class="btn btn-sm btn-primary">เพิ่มตารางรถ <i class="fas fa-plus"></i></a>
        </div>
    </div>
    
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
                                        <th width="40%" class="text-center">จัดการ</th>
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
                                            <a href="{{route('dashboard.vehicleschedules.show', [ 'vehicleschedule' =>$value->id])}}" class="btn btn-sm btn-info">edit <i class="fas fa-edit"></i></a>

                                            <form class="d-none" id="confirm" method="post" action="{{ route('dashboard.vehicleschedules.destroy' , ['vehicleschedule'=> $value->id] ) }}">
                                                @csrf
                                                @method('delete')
                                            </form>
    
                                            <button onclick="triger_delete($(this))" class="btn btn-sm btn-danger">ลบ <i class="fas fa-trash-restore-alt"></i></a>

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

    function triger_delete(_this) {
       if (confirm('คุณต้องการลบ ?')) {
        _this.prev().submit()
       }
    }

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
