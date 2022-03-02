@extends('layouts.app')

@section('url')
    home
@endsection

@section('content')

<section class="ftco-section">
  <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section text-center ftco-animate">
        <span class="subheading">Welcome to Lipeferry</span>
        <h2 class="mb-4">SERVICES</h2>
      </div>
    </div>  
    <div class="row d-flex">
      <div class="col-md pr-md-1 d-flex align-self-stretch ftco-animate" style="cursor: pointer" onclick="window.location.href = '/service/1'">
        <div class="media block-6 services py-4 d-block text-center">
          <div class="d-flex justify-content-center">
              <div class="icon d-flex align-items-center justify-content-center">
                  {{-- <span class="flaticon-reception-bell"></span> --}}
                  <i class="fas fa-ship fa-2x"></i>
              </div>
          </div>
          <div class="media-body">
            <h3 class="heading mb-3">บริการเรือ</h3>
          </div>
        </div>      
      </div>
      <div class="col-md px-md-1 d-flex align-sel Searchf-stretch ftco-animate" style="cursor: pointer" onclick="window.location.href = '/service/2'">
        <div class="media block-6 services py-4 d-block text-center">
          <div class="d-flex justify-content-center">
              <div class="icon d-flex align-items-center justify-content-center">
                  {{-- <span class="flaticon-car"></span> --}}
                  <i class="fas fa-shuttle-van fa-2x"></i>
              </div>
          </div>
          <div class="media-body">
            <h3 class="heading mb-3">บริการรถตู้รับส่งสนามบิน</h3>
          </div>
        </div>      
      </div>
      <div class="col-md px-md-1 d-flex align-self-stretch ftco-animate" style="cursor: pointer" onclick="window.location.href = '/service/3'">
        <div class="media block-6 services py-4 d-block text-center">
          <div class="d-flex justify-content-center">
              <div class="icon d-flex align-items-center justify-content-center">
                  {{-- <span class="flaticon-spa"></span> --}}
                  <i class="fas fa-swimmer fa-2x"></i>
              </div>
          </div>
          <div class="media-body">
            <h3 class="heading mb-3">บริการทริปดำน้ำ</h3>
          </div>
        </div>      
      </div>
    </div>
  </div>
</section>



<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section text-center ftco-animate">
          <span class="subheading">Read Blog</span>
        <h2>Recent Blog</h2>
      </div>
    </div>
    <div class="row d-flex">
      @foreach ($blogs as $blog)
        <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
            <a href="{{route('blog.show', ['id'=> $blog->id])}}" class="block-20 rounded" style="background-image: url('/images/blog/{{$blog->attachfile}}');">
            </a>
            <div class="text mt-3 text-center">
                <div class="meta mb-2">
                <div><a href="{{route('blog.show', ['id'=> $blog->id])}}"><i class="fas fa-calendar-alt"></i> {{date('d/m/Y',strtotime($blog->updated_at))}}</a></div>
                {{-- <div><a href="#">Admin</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div> --}}
              </div>
              <h3 class="heading"><a href="#">{{$blog->title}}</a></h3>
            </div>
          </div>
        </div>
      @endforeach
      
    </div>
  </div>
</section>
@endsection
