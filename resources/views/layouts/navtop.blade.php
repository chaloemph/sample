<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light scrolled awake" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="{{route('home')}}">
        <img src="/images/logolipeferry.png" alt="lipeferry" class="img-fluid" style="max-width: 75px;">
        Lipe<span>ferry</span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item {{trim($__env->yieldContent('url')) === 'home' ? 'active':''}}"><a href="{{route('home')}}" class="nav-link">หน้าหลัก</a></li>
          {{-- <li class="nav-item"><a href="rooms.html" class="nav-link">Our Rooms</a></li> --}}
          {{-- <li class="nav-item"><a href="restaurant.html" class="nav-link">Restaurant</a></li> --}}
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              ชำระเงิน
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item nav-link" href="{{route('payment.index')}}">แจ้งชำระเงิน</a>
              <a class="dropdown-item nav-link" href="{{route('payment.checking.status')}}">ตรวจสอบสถานะการจอง</a>
              {{-- <a class="dropdown-item nav-link" href="{{route('payment.checking.howto')}}">วิธีตรวจสอบและแจ้งชำระ</a> --}}
            </div>
          </li>
          {{-- <li class="nav-item"><a href="{{route('payment.index')}}" class="nav-link {{trim($__env->yieldContent('url')) === 'payment' ? 'active':''}}">แจ้งชำระเงิน</a></li>
          <li class="nav-item"><a href="{{route('payment.checking.status')}}" class="nav-link {{trim($__env->yieldContent('url')) === 'paymentchecking' ? 'active':''}}">ตรวจสอบสถานะการจอง</a></li>
          <li class="nav-item"><a href="{{route('payment.checking.howto')}}" class="nav-link {{trim($__env->yieldContent('url')) === 'paymentcheckinghowto' ? 'active':''}}">วิธีตรวจสอบและแจ้งชำระ</a></li> --}}
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              ตารางเดินทาง
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item nav-link" href="{{route('schedule.show', ['id'=> '1'])}}">ตารางเรือ</a>
              <a class="dropdown-item nav-link" href="{{route('schedule.show', ['id'=> '2'])}}">ตารางรถโดยสาร</a>
              <a class="dropdown-item nav-link" href="{{route('schedule.show', ['id'=> '3'])}}">ทริปดำน้ำ</a>
            </div>
          </li>
          <li class="nav-item"><a href="{{route('about')}}" class="nav-link {{trim($__env->yieldContent('url')) === 'about' ? 'active':''}}">ติดต่อเรา</a></li>
        </ul>
      </div>
    </div>
  </nav>
<!-- END nav -->
{{-- <div class="hero">
    <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image:url(images/bg_5.jpg);">
          <div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-end">
          <div class="col-md-6 ftco-animate">
              <div class="text">
                  <h2>More than a hotel... an experience</h2>
                <h1 class="mb-3">Hotel for the whole family, all year round.</h1>
            </div>
          </div>
        </div>
        </div>
      </div>

      <div class="slider-item" style="background-image:url(images/bg_2.jpg);">
          <div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-end">
          <div class="col-md-6 ftco-animate">
              <div class="text">
                  <h2>Harbor Lights Hotel &amp; Resort</h2>
                <h1 class="mb-3">It feels like staying in your own home.</h1>
            </div>
          </div>
        </div>
        </div>
      </div>
    </section>
</div> --}}