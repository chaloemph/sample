@extends('layouts.dashboard')

@section('url')
calendar_vehicle
@endsection

@section('content')
<style type="text/css">
    .datepicker table tr td span{
      width: 6.3%;
    }
    .datepicker table tr td span.active:not([disabled]):not(.disabled):active, .datepicker table tr td span.active:not([disabled]):not(.disabled).active, .show > .datepicker table tr td span.active.dropdown-toggle, .datepicker table tr td span.active:hover:not([disabled]):not(.disabled):active, .datepicker table tr td span.active:hover:not([disabled]):not(.disabled).active, .show > .datepicker table tr td span.active:hover.dropdown-toggle, .datepicker table tr td span.active.disabled:not([disabled]):not(.disabled):active, .datepicker table tr td span.active.disabled:not([disabled]):not(.disabled).active, .show > .datepicker table tr td span.active.disabled.dropdown-toggle, .datepicker table tr td span.active.disabled:hover:not([disabled]):not(.disabled):active, .datepicker table tr td span.active.disabled:hover:not([disabled]):not(.disabled).active, .show > .datepicker table tr td span.active.disabled:hover.dropdown-toggle{
      background-color:#3e8ef7;
      box-shadow:inset 0 0px 0px rgba(0, 0, 0, 0), 0 0 0 0px rgba(62, 142, 247, .5);
      font-weight: bold;
      color: #fff;
    }

    #box-day , #box-day-title{
      border: 1px solid #ccc;
      width: 45px;
      height: 45px;
      display: inline-block;
      text-align: center;
      font-weight: bold;
      position: relative;
    }
    #box-day-detail{
      position: absolute;
      top: 50%; left: 50%;
      transform: translate(-50%,-50%);
    }
    #box-day h5{
      font-weight: bold;
    }
    
    .main-box-title::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }
    .main-box-title::-webkit-scrollbar-track {
        background: rgba(0, 0, 0, 0);
        border: none!important;
    }

    .main-box-title::-webkit-scrollbar-thumb {
        border-radius: 8px;
        background-color: #888;
    }
    
    #box-day-datetime{
      width: 45px;
      height: 25px;
      display: inline-block;
      text-align: center;
      font-weight: bold;
      position: relative;
    }

    .card{
      margin-bottom: 0;
    }
    .bg-red{
      background: #007bff !important;
    }
    .panel{
      background: none;
    }
  </style>
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
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col"></div>
                            <div class="col-11">
								<div class="main-box-title" style="overflow-x: scroll;">
									<div class="row  justify-content-end">
										<div class="col-md-12" style="white-space: nowrap;">
                                            
                                            @for ($i = 1; $i < 31; $i++)
                                                <div id="box-day-datetime">
                                                    <div style="background: green;cursor: pointer;" class="room-day" id="box-day">
                                                        <div id="box-day-detail">
                                                            {{$i}}
                                                            {{-- <input type="text" name="" style="width: 34px;text-align: center;border: 1px;background: #f1f4f5" value="{{$i}}" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="planInventory"> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endfor
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        
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
@endsection
