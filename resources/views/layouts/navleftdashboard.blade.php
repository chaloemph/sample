<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">

        </div>
        <div class="sidebar-brand-text mx-3">Lipeferry<sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{trim($__env->yieldContent('url')) === 'dashboard' ? 'active':''}}">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item {{trim($__env->yieldContent('url')) === 'users' ? 'active':''}}">
        <a class="nav-link" href="{{route('dashboard.users.index')}}">
            <i class="fas fa-fw fa-user-alt"></i>
            <span>จัดการผู้ใช้งานระบบ</span></a>
    </li>

    <li class="nav-item {{trim($__env->yieldContent('url')) === 'bookings' ? 'active':''}}">
        <a class="nav-link" href="{{route('dashboard.bookings.index')}}">
            <i class="fas fa-fw fa-user-alt"></i>
            <span>รายการจอง</span></a>
    </li>

    <li class="nav-item {{trim($__env->yieldContent('url')) === 'mobilebankingbookings' ? 'active':''}}">
        <a class="nav-link" href="{{route('dashboard.bookings.index.mobilebanking')}}">
            <i class="fas fa-fw fa-user-alt"></i>
            <span>รายการจอง โมบายแบงค์กิ้ง</span></a>
    </li>

    {{-- <li class="nav-item {{trim($__env->yieldContent('url')) === 'schedules' ? 'active':''}}">
        <a class="nav-link" href="{{route('dashboard.schedules.index')}}">
            <i class="fas fa-fw fa-user-alt"></i>
            <span>จัดการเวลาเรือและรถ</span></a>
    </li> --}}

    <li class="nav-item {{trim($__env->yieldContent('url')) === 'vehicleschedules' ? 'active':''}}">
        <a class="nav-link" href="{{route('dashboard.vehicleschedules.index')}}">
            <i class="fas fa-fw fa-user-alt"></i>
            <span>จัดการเวลารถ</span></a>
    </li>

    <li class="nav-item {{trim($__env->yieldContent('url')) === 'shipschedules' ? 'active':''}}">
        <a class="nav-link" href="{{route('dashboard.shipschedules.index')}}">
            <i class="fas fa-fw fa-user-alt"></i>
            <span>จัดการเวลาเรือ</span></a>
    </li>

    <li class="nav-item {{trim($__env->yieldContent('url')) === 'trips' ? 'active':''}}">
        <a class="nav-link" href="{{route('dashboard.trips.index')}}">
            <i class="fas fa-fw fa-user-alt"></i>
            <span>ตั้งค่าราคา ทริป</span></a>
    </li>

    <li class="nav-item {{trim($__env->yieldContent('url')) === 'ships' ? 'active':''}}">
        <a class="nav-link" href="{{route('dashboard.ships.index')}}">
            <i class="fas fa-fw fa-user-alt"></i>
            <span>ตั้งค่าราคา เรือ</span></a>
    </li>

    <li class="nav-item {{trim($__env->yieldContent('url')) === 'vehicles' ? 'active':''}}">
        <a class="nav-link" href="{{route('dashboard.vehicles.index')}}">
            <i class="fas fa-fw fa-user-alt"></i>
            <span>ตั้งค่าราคา รถโดยสาร</span></a>
    </li>

    <li class="nav-item {{trim($__env->yieldContent('url')) === 'blogs' ? 'active':''}}">
        <a class="nav-link" href="{{route('dashboard.blogs.index')}}">
            <i class="fas fa-fw fa-user-alt"></i>
            <span>Blog</span></a>
    </li>

    <li class="nav-item {{trim($__env->yieldContent('url')) === 'blogservices' ? 'active':''}}">
        <a class="nav-link" href="{{route('dashboard.blogservices.index')}}">
            <i class="fas fa-fw fa-user-alt"></i>
            <span>Service</span></a>
    </li>

    <li class="nav-item {{trim($__env->yieldContent('url')) === 'scheduleservices' ? 'active':''}}">
        <a class="nav-link" href="{{route('dashboard.scheduleservices.index')}}">
            <i class="fas fa-fw fa-user-alt"></i>
            <span>ตารางเดินทาง</span></a>
    </li>

    <li class="nav-item {{trim($__env->yieldContent('url')) === 'points' ? 'active':''}}">
        <a class="nav-link" href="{{route('dashboard.points.index')}}">
            <i class="fas fa-fw fa-user-alt"></i>
            <span>เส้นทางเดินรถ</span></a>
    </li>

    {{-- <li class="nav-item {{trim($__env->yieldContent('url')) === 'calendar_vehicles' ? 'active':''}}">
        <a class="nav-link" href="{{route('dashboard.calendars_vehicles.index')}}">
            <i class="fas fa-fw fa-user-alt"></i>
            <span>ตั้งค่า</span></a>
    </li> --}}

    {{-- <li class="nav-item {{trim($__env->yieldContent('url')) === 'topup' ? 'active':''}}">
        <a class="nav-link" href="{{route('dashboard.topup.index')}}">
            <i class="fas fa-fw fa-wallet"></i>
            <span>Topup</span></a>
    </li>

    <li class="nav-item {{trim($__env->yieldContent('url')) === 'exchange' ? 'active':''}}">
        <a class="nav-link" href="{{route('dashboard.exchange.index')}}">
            <i class="fas fa-fw fa-wallet"></i>
            <span>Exchange</span></a>
    </li>

    <li class="nav-item {{trim($__env->yieldContent('url')) === 'report' ? 'active' : '' }}">
        <a class="nav-link" href="{{route('dashboard.report.index')}}">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Report</span></a>
    </li>

    <li class="nav-item {{trim($__env->yieldContent('url')) === 'chat' ? 'active' : '' }}">
        <a class="nav-link" href="{{route('dashboard.chat')}}">
            <i class="fas fa-comments"></i>
            <span>Chat</span></a>
    </li> --}}

    
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    {{-- <div class="sidebar-heading">
        Profile
    </div> --}}

    <!-- Nav Item - Pages Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>User profile</span>
        </a>
        
    </li> --}}

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"
            onclick="$('#accordionSidebar').toggleClass('toggled');"></button>
    </div>




</ul>