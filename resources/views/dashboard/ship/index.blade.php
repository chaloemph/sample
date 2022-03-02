@extends('layouts.dashboard')

@section('url')
ships
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">เรือ</h1>
    <p class="mb-4">สามารถจัดการข้อมูลเรือได้</p>

    
    <div class="row">
            <div class="col-12">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col">
                                <h6 class="m-0 font-weight-bold text-secondary">เรือ</h6>
                            </div>
                            <div class="col text-right">
                                <a href="{{route('dashboard.ships.create')}}" class="btn btn-sm btn-primary">เพิ่มเรือ <i class="fas fa-plus"></i></a>
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
                                        <th>ประเภท</th>
                                        <th>ราคา</th>
                                        <th width="150px">จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody class="" style="font-size: 0.8rem;">
                                    @foreach ($ships as $key => $ship)
                                    <tr class="align-items-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$ship->name}}</td>
                                        <td>{{$ship->shiptype->name}}</td>
                                        <td>
                                           {{$ship->price}}
                                        </td>
                                        <td>
                                          
                                            <a href="{{route('dashboard.ships.edit', [ 'ship' =>$ship->id])}}" class="btn btn-sm btn-info">edit <i class="fas fa-edit"></i></a>

                                            <form class="d-none" id="confirm" method="post" action="{{ route('dashboard.ships.destroy' , ['ship'=> $ship->id] ) }}">
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

    $('button[ship="true"]').on('click', function (e) {
        e.preventDefault()
        const _this = $(this)
        const type = _this.attr('type')
        const id = _this.attr('id')
        _this.text('Loding...')
            $.ajax({
                type: "GET",
                // url: '{{route('dashboard.changeshipstatus')}}',
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

        $('input[ship="true"]').on('change', function (e) {
            e.preventDefault()
            const _this = $(this)
            const id = _this.attr('id')
            const price = _this.val()
                $.ajax({
                    type: "GET",
                    // url: '{{('dashboard.changeshipprice')}}',
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