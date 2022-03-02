@extends('layouts.dashboard')

@section('url')
users
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">ผู้ใช้งาน</h1>
    <p class="mb-4">สามารถจัดการข้อมูลผู้ใช้งานได้</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <!-- <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div> -->
        <div class="card-body">
           
            <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <!-- <caption>Users</caption> -->
                    <thead>
                        <tr class="bold">
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th width="110px">Action</th>
                        </tr>
                    </thead>
                    <tbody class="" style="font-size: 0.8rem;">
                        @foreach ($users as $user)
                        <tr class="align-items-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['email'] }}</td>
                            <td>
                              

                                {{-- <button class="btn btn-warning btn-sm" type="button" name="button">Edit</button> --}}
                                {{-- <button class="btn btn-outline-danger btn-sm" type="button" name="button" onclick="mailToResetPWD('{{$user['email']}}')">Reset Password</button> --}}
                                {{-- <button class="btn btn-danger btn-sm" type="button" name="button">Delete</button> --}}
                              
                            </td>
                        </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal_approvement" tabindex="-1" role="dialog" aria-labelledby="approvement" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">User Approvement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col" id="upload"><img id="modal_img" class="img-thumbnail" width="100%" height="100%" alt="kyc image"></div>
                        <div class="col" id="noupload">no upload images</div>
                        <div class="col-sm-1"></div>
                    </div>
                </div>

                <div class="modal-footer" >
                    @csrf
                    <form  method="post" action="" class="col">
                      @csrf
                        <button id="user_id" name="id" type="submit" class="col btn btn-success">Approve</button>
                    </form>
                    <form  method="post" action="" class="col">
                      @csrf
                        <button id="reject_id" name="id" type="submit" class="col btn btn-warning">Reject</button>
                    </form>
                    <div class="col">
                        <button type="button" class="col btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <div class="modal fade" id="modal_reset_password" tabindex="-1" role="dialog" aria-labelledby="modal_reset_password" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reset Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  {{-- <form method="POST" action="{{route('password.email')}}">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="form-group row">
                          <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                          <div class="col-md-6">
                              <input id="email" type="email" class="form-control " name="email" required="" autocomplete="email" autofocus="">

                          </div>
                      </div>

                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Send Password Reset Link
                              </button>
                          </div>
                      </div>
                  </form> --}}
                </div>

            </div>
        </div>
    </div>

</div>






<!-- <script src="{{ mix('js/app.js') }}"></script> -->
<!-- <script src="{{ mix('js/app.js') }}"></script> -->
<script type="text/javascript">
    // $(document).ready(function() {});

    function approvement(path, user_id) {

            $("#noupload").removeClass('d-none')
            $("#upload").removeClass('d-none')
       
        if (path != '') {
            $("#noupload").addClass('d-none')
            $("#modal_img").attr("src", path);
        } else {
            $("#upload").addClass('d-none')
        }
        
        $("#user_id").attr('value', user_id);
        $("#reject_id").attr('value', user_id);
        $("#modal_approvement").modal('show');
    };

    // function reject(path, user_id) {
    //     // dd(user_id);
    //     // console.log(user_id);
    //     $("#modal_img").attr("src", path);
    //     $("#reject_id").attr('value', user_id);
    //     $("#modal_approvement").modal('show');
    // };

    function mailToResetPWD(email) {
        // dd(user_id);
        // console.log(user_id);
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
