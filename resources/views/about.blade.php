@extends('layouts.appbase')

@section('url')
    about
@endsection

@section('content')

<section class="ftco-section">
  <div class="container">

    <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-12 text-center">
        <span class="subheading mb-3" style="font-size: 28px">เกี่ยวกับเรา</span>
      </div>
      <div class="col-md-12">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.2522634045054!2d99.72075431482298!3d6.8603406210588975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304c4fd5f6d67b65%3A0xb220521679c78fe6!2sLipe%20Ferry%20Checkpoit!5e0!3m2!1sth!2sth!4v1603185324090!5m2!1sth!2sth" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      </div>
      <div class="col-md-12">
        <span class="mb-4" style="font-size: 20px;color: #000;font-weight:700">
        509 หมู่ 2 ตำบลปากน้ำ อำเภอละงู จังหวัดสตูล 91110 <br>

        094-319-8111 , 089-464-7816 <br>

        อีเมล์: lipeferryspeedboat@hotmail.com <br>

        Facebook: <a href="https://www.facebook.com/www.lipeferry.net">Lipe Ferry</a>
        </span>
        
      </div>
    </div>


      {{-- <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-12 heading-section text-center ftco-animate">
        <span class="mb-4" style="font-size: 28px;color: #000;font-weight:700">ใบอนุญาติประกอบธุรกิจ และใบรับรองคุณภาพ</span>
        <p>
          หลีเป๊ะ เฟอร์รี่ แอนด์สปีดโบ้ท ได้รับอนุญาติถูกต้องตามกฏหมายในการจำหน่ายตั๋วเรือ การเดินเรือ และการประกอบธุรกิจนำเที่ยว เรือทุกลำผ่านการตรวจสภาพการใช้งานที่รับรองมาตรฐานโดยกรมเจ้าท่าในทุกๆปี ทั้งนี้จึงการันตีได้ทั้งในด้านคุณภาพและมาตรฐานความปลอดภัย
        </p>
      </div>
    </div>  --}}

    {{-- <div class="row">
      @foreach ($about_imgs as $about_img)
        <div class="col-6 mx-auto mb-5">
          <img src="images/{{$about_img}}" alt="lipe ferry {{$about_img}}" class="card-img-top" style="max-height: 720px">
        </div>
      @endforeach
    </div>  --}}

    
  </div>
</section>







@endsection
