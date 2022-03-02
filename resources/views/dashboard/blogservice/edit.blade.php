@extends('layouts.dashboard')

@section('url')
blogservices
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">blogservice</h1>
    <p class="mb-4">สามารถจัดการข้อมูลเรือได้</p>
    
    <div class="row">
            <div class="col-12">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-secondary">blogservice</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('dashboard.blogservices.update',['blogservice'=> $blogservice->id])}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="title">หัวข้อ</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{$blogservice->title}}" required>
                              </div>
                            </div>

                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="description">รายละเอียด</label>
                                <textarea class="form-control description" name="description" id="description" cols="30" rows="10">{{$blogservice->description}}</textarea>
                              </div>
                            </div>

                            {{-- <div class="form-row">
                              <div class="form-group col-md-12">
                                <img src="/images/blogservice/{{$blogservice->attachfile}}" style="max-width: 250px;" class="img-fluid">
                              </div>
                            </div>

                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="attachfile">รูปภาพ</label>
                                <input type="file" class="form-control" id="attachfile" name="attachfile">
                              </div>
                            </div> --}}
                            <button type="submit" class="btn btn-primary float-right">บันทึก</button>
                          </form>
                    </div>
                </div>
            </div>
    </div>


</div>

@endsection


@section('script')
{{-- <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script> --}}
<script src="/ckeditor/ckeditor.js"></script>

    <script>
         $(document).ready( function () {
            $('#dataTable').DataTable();
            // $('.ckeditor').ckeditor();
            CKEDITOR.replace('description', {
                filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form'
            });
        });
        
    </script>
    <script type="text/javascript">
        // $(document).ready(function() {});
    
        $('button[blogservice="true"]').on('click', function (e) {
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
