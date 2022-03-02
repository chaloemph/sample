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
                        <div class="row">
                            <div class="col">
                                <h6 class="m-0 font-weight-bold text-secondary">ทริป</h6>
                            </div>
                            <div class="col text-right">
                                <a href="{{route('dashboard.trips.create')}}" class="btn btn-sm btn-primary">เพิ่มทริป <i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                    
                        <div class="table-responsive">
                            <table class="table" width="100%" cellspacing="0">
                                <!-- <caption>Users</caption> -->
                                <thead>
                                    <tr class="bold">
                                        <th>#</th>
                                        <th>บริการ</th>
                                        <th>ราคา</th>
                                        <th>ประเภท</th>
                                        <th width="22%">จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody class="" style="font-size: 0.8rem;">
                                    @foreach ($trips as $key => $trip)
                                    <tr class="align-items-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$trip->name}}</td>
                                        <td>
                                           {{$trip->price}}
                                        </td>
                                        <td>{{$trip->triptype->name}}</td>
                                        <td>
                                            @if ($trip->status === 1)
                                                <button trip="true" class="btn btn-sm btn-success" type="off" id="{{$trip->id}}">
                                                on
                                                <i class="fas fa-toggle-on"></i>
                                                </button>
                                            @else
                                                <button trip="true" class="btn btn-sm btn-danger" type="on" id="{{$trip->id}}">
                                                    off
                                                    <i class="fas fa-toggle-off"></i>
                                                </button>
                                            @endif
                                            <a href="{{route('dashboard.trips.show', [ 'trip' =>$trip->id])}}" class="btn btn-sm btn-info">edit <i class="fas fa-edit"></i></a>

                                            <form class="d-none" id="confirm" method="post" action="{{ route('dashboard.trips.destroy' , ['trip'=> $trip->id] ) }}">
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
