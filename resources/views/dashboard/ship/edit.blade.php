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
                        <h6 class="m-0 font-weight-bold text-secondary">เรือ</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('dashboard.ships.update',['ship'=> $ship->id])}}">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="name">ชื่อบริการ</label>
                              <input type="text" class="form-control" id="name" name="name" value="{{$ship->name}}" required>
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="shiptype_id">ประเภท</label>
                                <select id="shiptype_id" class="form-control" name="shiptype_id" required>
                                  <option selected value="">Choose...</option>
                                  @foreach ($shiptypes as $shiptype)
                                  <option value="{{$shiptype->id}}" {{($ship->shiptype_id == $shiptype->id)? 'selected':''}}>{{$shiptype->name}}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="form-group col-md-6">
                                <label for="price">ราคา</label>
                              <input type="text" class="form-control" id="price" name="price" value="{{$ship->price}}" required>
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
    
    </script>
@endsection
