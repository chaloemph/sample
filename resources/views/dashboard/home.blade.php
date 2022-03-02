@extends('layouts.dashboard')

@section('url')
dashboard
@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">You are logged in {{ Auth::user()->name }}. !</h1>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">รายการจองใหม่</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$booking_reservation_today}} รายการ</div>
            </div>
            <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
        </div>
        </div>
    </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">รายการแจ้งชำระ            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$booking_reservation_payment_today}} รายการ</div>
            </div>
            <div class="col-auto">
            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
        </div>
        </div>
    </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">ยอดรายได้ของการจองวันนี้</div>
            <div class="row no-gutters align-items-center">
                <div class="col-auto">
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$booking_reservation_recieve}}</div>
                </div>
                <div class="col">
                <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                </div>
            </div>
            </div>
            <div class="col-auto">
            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
        </div>
        </div>
    </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">รายการจองทั้งหมด</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$booking_reservation_all}}</div>
            </div>
            <div class="col-auto">
            <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
        </div>
        </div>
    </div>
    </div>


</div>

<!-- Content Row -->
@endsection
