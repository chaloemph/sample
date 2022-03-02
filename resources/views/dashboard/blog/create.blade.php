@extends('layouts.dashboard')

@section('url')
blogs
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">blog</h1>
    <p class="mb-4">สามารถจัดการข้อมูล blog ได้</p>
    
    <div class="row">
            <div class="col-12">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-secondary">blog</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('dashboard.blogs.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="title">หัวข้อ</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                              </div>
                            </div>

                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="description">รายละเอียด</label>
                                <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                              </div>
                            </div>

                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="attachfile">รูปภาพ</label>
                                <input type="file" class="form-control" id="attachfile" name="attachfile" required>
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
<script src="/ckeditor/ckeditor.js"></script>
    <script>
         $(document).ready( function () {
            $('#dataTable').DataTable();
            CKEDITOR.replace('description', {
                filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form',
                
            });
        });
        
    </script>
    <script type="text/javascript">
        // $(document).ready(function() {});
    
        $('button[blog="true"]').on('click', function (e) {
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
