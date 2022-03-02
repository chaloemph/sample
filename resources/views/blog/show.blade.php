@extends('layouts.appbase')


@section('head')
  <style>
    /* p img {
      width: 100% !important;
    } */
    table {
      width: 100% !important;
    }
  </style>
@endsection

@section('url')
    blog
@endsection

@section('content')



<section class="ftco-section ftco-degree-bg">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 ftco-animate">
        <h2 class="mb-3">{{$blog->title}}</h2>
        <p>
          <img src="/images/blog/{{$blog->attachfile}}" alt="" class="img-fluid">
        </p>
        <p>{!!$blog->description!!}</p>
      </div> <!-- .col-md-12 -->
      

    </div>
  </div>
</section> <!-- .section -->







@endsection
