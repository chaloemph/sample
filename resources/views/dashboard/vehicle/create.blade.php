@extends('layouts.dashboard')

@section('url')
vehicles
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">รถ</h1>
    <p class="mb-4">สามารถจัดการข้อมูลรถได้</p>
    
    <div class="row">
            <div class="col-12">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-secondary">รถ</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('dashboard.vehicles.store')}}">
                            @csrf
                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="name">ชื่อบริการ</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="vehicletype_id">ประเภท</label>
                                <select id="vehicletype_id" class="form-control" name="vehicletype_id" required>
                                  <option selected value="">Choose...</option>
                                  @foreach ($vehicletypes as $vehicletype)
                                  <option value="{{$vehicletype->id}}">{{$vehicletype->name}}</option>
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

@endsection


@section('script')
    <script>
         $(document).ready( function () {
            $('#dataTable').DataTable();
        });
        
    </script>
    <script type="text/javascript">
        // $(document).ready(function() {});
    
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
    
    </script>
@endsection
