@extends('layouts.dashboard')

@section('url')
point
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
    <h1 class="h3 mb-2 text-gray-800">ตารางเส้นทางเดินรถ</h1>
    <p class="mb-4">สามารถจัดการข้อมูลเส้นทางเดินรถได้</p>

    <div class="row">
        <div class="col-6">
            {{-- <h1 class="h5 mb-2 text-gray-800">ตารางเส้นทางเดินรถ</h1> --}}
        </div>
        {{-- <div class="col text-right">
        </div> --}}
    </div>
    
    <div class="row">
        @foreach ($points as $key => $point)
        {{-- {{$key}} --}}
            <div class="col-6">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-6">
                                <h6 class="m-0 font-weight-bold text-secondary">{{($key === 'startpoints')? 'ต้นทาง':'ปลายทาง'}}</h6>
                            </div>
                            <div class="col-6 text-right">
                                @if ($key === 'startpoints')
                                    <a href="{{route('dashboard.points.create',['type'=>'startpoints'])}}" class="btn btn-sm btn-primary">เพิ่มต้นทาง <i class="fas fa-plus"></i></a>
                                @else
                                    <a href="{{route('dashboard.points.create', ['type' => 'endpoints'])}}" class="btn btn-sm btn-primary">เพิ่มปลายทาง <i class="fas fa-plus"></i></a>
                                @endif
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
                                        <th>{{($key === 'startpoints')? 'ต้นทาง':'ปลายทาง'}}</th>
                                        <th width="50px" class="text-center">จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody class="" style="font-size: 0.8rem;">
                                    @foreach ($point as $value)
                                    <tr class="align-items-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$value->name}}</td>
                                        <td class="text-center">
                                           

                                            <a href="{{route('dashboard.points.show', [ 'point' => $value->id , 'type' => $key])}}" class="btn btn-sm btn-info">edit <i class="fas fa-edit"></i></a>

                                            <form class="d-none" id="confirm" method="post" action="{{ route('dashboard.points.destroy' , ['point'=> $value->id, 'type' => $key] ) }}">
                                                @csrf
                                                @method('delete')
                                            </form>
    
                                            <button onclick="triger_delete($(this))" class="btn btn-sm btn-danger">ลบ <i class="fas fa-trash-restore-alt"></i></button>
                                            
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

    $('button[point="true"]').on('click', function (e) {
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
