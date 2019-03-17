@extends('Front-end/template')
@section('title','Admin')
@section('main')
<div class="control_carousel">
  <div class="carousel_1">
    <p class="carouse_capt">Selamat Datang di Citra Mahoni Sejahtera</p>
  </div>
  <div class="carousel_2">
    <p class="carouse_capt">Selamat Datang di Citra Mahoni Sejahtera</p>
  </div>
</div>

<div class="container">
  <div class="row space space_a row2">
    <div class="col-md-6 col-md-6 cover_cms" data-aos="fade-up">
      <div class="img_cms">
        <p class="title_img">CMS</p>
        <p class="content_c">
          WOODEN INDOOR/OUTDOOR<br/>
          HOTEL/OFFICE FURNITURE<br/>
          METAL/ FABRIC FURNITURE<br/>
          ETC.
        </p>
      </div>
    </div>
    <div class="col-md-6 video" data-aos="fade-up">
      <video width="100%" height="340" controls autoplay class="video_style">
        <source src="#" type="video/mp4">
        <source src="#" type="video/ogg">
      </video>
    </div>
  </div>

  <div class="row space" data-aos="fade-up">
    <h1 class="t_pro">Our Products</h1>
    <div class="border"></div>
    <div class="slider_products">
      <a href="#" class="margin">
        <div class="slide_1"></div>
        <span class="text">Prouduct Name</span>
      </a>
      <a href="#" class="margin">
        <div class="slide_2"></div>
        <span class="text">Prouduct Name</span>
      </a>
      <a href="#" class="margin">
        <div class="slide_3"></div>
        <span class="text">Prouduct Name</span>
      </a>
      <a href="#" class="margin">
        <div class="slide_4"></div>
        <span class="text">Prouduct Name</span>
      </a>
      <a href="#" class="margin">
        <div class="slide_5"></div>
        <span class="text">Prouduct Name</span>
      </a>
      <a href="#" class="margin">
        <div class="slide_6"></div>
        <span class="text">Prouduct Name</span>
      </a>
      <a href="#" class="margin">
        <div class="slide_7"></div>
        <span class="text">Prouduct Name</span>
      </a>
      <a href="#" class="margin">
        <div class="slide_8"></div>
        <span class="text">Prouduct Name</span>
      </a>
      <a href="#" class="margin">
        <div class="slide_9"></div>
        <span class="text">Prouduct Name</span>
      </a>
      <a href="#" class="margin">
        <div class="slide_10"></div>
        <span class="text">Prouduct Name</span>
      </a>
    </div>
  </div>
  <div class="row" data-aos="fade-up">
    <h1 class="t_pro">Latest News</h1>
    <div class="border"></div>
    <div class="col-md-12 col-xs-12">
      <div class="box-berita" style="margin: 0 auto; width: 100%;">
        <article>
          <h1><a href="#">Title</a></h1>
          <div class="date">22-December-2018</div>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, temporibus. Architecto consequuntur sit nobis quisquam adipisci quae earum sed voluptates, molestiae incidunt magnam quo magni, nam explicabo quaerat optio animi odio, sequi reiciendis eos aperiam itaque aliquid. Aperiam ab tempore autem porro, nisi labore possimus optio voluptatibus velit ipsam ducimus...</p>
        </article>
      </div>
    </div>
  </div>
  <div class="row space" data-aos="fade-right">
    <h1 class="t_pro">Events</h1>
    <div class="border"></div>
    <div class="event_slide">
      <div class="event_1">
        <h1 class="title_ev"><a href="#">Event 1</a></h1>
      </div>
      <div class="event_1">
        <h1 class="title_ev"><a href="#">Event 2</a></h1>
      </div>
      <div class="event_1">
        <h1 class="title_ev"><a href="#">Event 3</a></h1>
      </div>
      <div class="event_1">
        <h1 class="title_ev"><a href="#">Event 4</a></h1>
      </div>
      <div class="event_1">
        <h1 class="title_ev"><a href="#">Event 5</a></h1>
      </div>
      <div class="event_1">
        <h1 class="title_ev"><a href="#">Event 6</a></h1>
      </div>
      <div class="event_1">
        <h1 class="title_ev"><a href="#">Event 7</a></h1>
      </div>
      <div class="event_1">
        <h1 class="title_ev"><a href="#">Event 8</a></h1>
      </div>
    </div>
  </div>

  <div class="row space" data-aos="fade-up" style="margin-bottom: 120px;">
    <h1 class="t_pro">Our Clients</h1>
    <div class="border"></div>
    <div class="slider-clients">
      <div class="client_1 margin"></div>
      <div class="client_2 margin"></div>
      <div class="client_3 margin"></div>
      <div class="client_4 margin"></div>
      <div class="client_5 margin"></div>
      <div class="client_6 margin"></div>
      <div class="client_7 margin"></div>
      <div class="client_8 margin"></div>
      <div class="client_9 margin"></div>
      <div class="client_10 margin"></div>
    </div>
  </div>
</div>
@endsection