@extends('layouts.dashboard')

@section('url')
vehicleschedules
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
    <h1 class="h3 mb-2 text-gray-800">ตารางเวลารถ</h1>
    <p class="mb-4">สามารถจัดการข้อมูลตารางเวลารถได้</p>

        
    <div class="row my-3">
        <div class="col-4">
            {{-- <h1 class="h5 mb-2 text-gray-800">ตารางเวลารถ</h1> --}}
            <label for="">เส้นทางการเดินรถ</label>
            <select name="fillter" class="custom-select">
                <option value="">--กรุณาเลือกเส้นทางการเดินรถ--</option>
                @foreach ($vehiclepoints as $vehiclepoint)
                    @if ($vehiclepoint->startpoint != $vehiclepoint->endpoint)
                        <option value="{{$vehiclepoint->id}}" {{(isset($_GET['fillter']) && $_GET['fillter'] == $vehiclepoint->id)? 'selected':''}} >{{$vehiclepoint->startpoint.'-'.$vehiclepoint->endpoint}}</option>
                    @endif
                @endforeach
              </select>
        </div>
        @if (isset($_GET["fillter"]) && $_GET["fillter"] != "")
            
        <div class="col">
            {{-- <h1 class="h5 mb-2 text-gray-800">ตารางเวลารถ</h1> --}}
            <label for="">ประเภทรถ</label>
            <select name="vehicletype" class="custom-select">
                <option value="">--กรุณาเลือกเส้นทางการเดินรถ--</option>
                @foreach ($vehicletypes as $vehicletype)
                    <option value="{{$vehicletype->id}}" {{(isset($_GET['vehicletype']) && $_GET['vehicletype'] == $vehicletype->id)? 'selected':''}} >{{$vehicletype->name}}</option>
                @endforeach
              </select>
        </div>

        @endif

        <div class="col text-right">
            <a href="{{route('dashboard.vehicleschedules.create')}}" class="btn btn-sm btn-primary">เพิ่มตารางรถ <i class="fas fa-plus"></i></a>
        </div>
    </div>
    
    <div class="row">
        @foreach ($vehicles as $key => $vehicle)
        @php
            $c = 0;
        @endphp
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
                                        <th>เวลาถึง</th>
                                        {{-- <th>ราคา</th> --}}
                                        <th width="10%" class="text-center">จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody class="" style="font-size: 0.8rem;">
                                    @foreach ($vehicle as $value)
                                    
                                        @if (isset($_GET["fillter"]) && $value->vehiclepoint_id == $_GET["fillter"])
                                        @if ( !isset($_GET["vehicletype"]) || (isset($_GET["vehicletype"]) && $value->vehicle->first()->vehicletype->id == $_GET["vehicletype"] ))
                                            <tr class="align-items-center">
                                                <td>{{ ++$c }}</td>
                                                <td>{{($value->vehicle->first() !== null)? $value->vehicle->first()->name:''}}</td>
                                                <td>{{($value->vehicle->first() !== null)? $value->vehicle->first()->vehicletype->name:''}}</td>
                                                <td>{{$value->starttime}}</td>
                                                <td>{{$value->starttime_expected}}</td>
                                                {{-- <td>{{($value->vehicle->first() !== null)? $value->vehicle->first()->price:''}}</td> --}}
                                                {{-- <td>{{$value->vehicle->first()->price}}</td> --}}
                                                <td>
                                                    @if ($value->status === 1)
                                                        <button vehicle="true" class="btn btn-sm btn-success mb-1" type="off" id="{{$value->id}}">
                                                        on
                                                        <i class="fas fa-toggle-on"></i>
                                                        </button>
                                                    @else
                                                        <button vehicle="true" class="btn btn-sm btn-danger mb-1" type="on" id="{{$value->id}}">
                                                            off
                                                            <i class="fas fa-toggle-off"></i>
                                                        </button>
                                                    @endif
                                                    <a href="{{route('dashboard.vehicleschedules.show', [ 'vehicleschedule' =>$value->id])}}" class="btn btn-sm btn-info mb-1">edit <i class="fas fa-edit"></i></a>

                                                    <form class="d-none" id="confirm" method="post" action="{{ route('dashboard.vehicleschedules.destroy' , ['vehicleschedule'=> $value->id] ) }}">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
            
                                                    <button onclick="triger_delete($(this))" class="btn btn-sm btn-danger mb-1"> ลบ <i class="fas fa-trash-restore-alt"></i></button>

                                                    <a href="{{route('fullcalendar.fillter',[ 'type_id' => $value->id , 'type' => 'vehicle' ])}}" target="_blank" class="btn btn-sm btn-secondary">ปฏิทิน<i class="fas fa-calendar-alt" style="padding: 3px"></i></a>


                                                </td>
                                            </tr>
                                        @endif
                                        @endif

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
            // $('.table').DataTable();
        });


        $('select[name="fillter"]').on('change', function(event){
            event.preventDefault();
            var _this = $(this)
            window.location.href = '?fillter='+_this.val()
        })

        $('select[name="vehicletype"]').on('change', function(event){
            event.preventDefault();
            var _this = $(this)
            if (_this.val() != "") {
                window.location.href = '?fillter='+$('select[name="fillter"]').val()+'&vehicletype='+_this.val()
            } else {
                window.location.href = '?fillter='+$('select[name="fillter"]').val()
            }
        })

        

        
    </script>
@endsection
