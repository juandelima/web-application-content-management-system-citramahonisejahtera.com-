@extends('Front-end/template')
@section('title','Home')
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
    <div class="col-md-6 cover_cms">
      <div class="img_cms">
        <p class="title_img">CMS</p>
        <p class="content_c">
          WOODEN INDOOR/OUTDOOR<br/>
          HOTEL/OFFICE FURNITURE<br/>
          METAL/FABRIC FURNITURE<br/>
          ETC.
        </p>
      </div>
    </div>
    <div class="col-md-6 video">
      <video width="450" height="340" controls autoplay class="video_style">
        <source src="{{asset("/video/video.MP4") }}" type="video/mp4">
        <source src="{{asset("/video/video.MP4") }}" type="video/ogg">
      </video>
    </div>
  </div>

  <div class="row space">
    <h1 class="t_pro">Our Products</h1>
    <div class="border"></div>
    <div class="slider_products">
      @foreach($product as $row)
      <a href="{{ route('products.single', $row->slug) }}" class="margin">
        <div class="slide_1" style="background-image: url({{asset("/produk/".$row->featured_image)}});"></div>
        <span class="text">{{$row->nama_produk}}</span>
      </a>
      @endforeach
    </div>
  </div>

  @if(!empty($latest_news))
  <div class="row space_news">
    <h1 class="t_pro">Latest News</h1>
    <div class="border"></div>
    <div class="col-md-12">
      <div class="col-xs-12 box-berita">
        <h1><a href="{{ route('news.single', $latest_news->slug) }}">{{ $latest_news->title }}</a></h1>
        <div class="date">{{ date('M j, Y', strtotime($latest_news->created_at)) }}</div>
        <article>
          <img src="{{asset('/pengguna/' . $latest_news->img)}}" class="imgn_size">
          <p>{{ substr(strip_tags($latest_news->konten), 0, 550) }}{{ strlen(strip_tags($latest_news->konten)) > 550 ? '...' : "" }}</p>
        </article>
        <a href="{{ route('news.single', $latest_news->slug) }}" class="btn-more2">Detail</a>
      </div>
    </div>
  </div>
  @else
  <div></div>
  @endif
  <div class="row space">
    <h1 class="t_pro">Events</h1>
    <div class="border"></div>
    <div class="event_slide">
      @foreach($event as $row)
      <div class="event_d" style="background-image: url({{asset('/pengguna/'.$row->img)}});">
        <div class="text_">
          <small>{{ date('M j, Y', strtotime($row->created_at)) }}</small><br/>
          <h1><a href="{{route('event.single', $row->slug)}}" class="event_link">{{$row->title}}</a></h1>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  <div class="row space" style="margin-bottom: 120px;">
    <h1 class="t_pro">Our Clients</h1>
    <div class="border"></div>
    <div class="slider-clients">
      @foreach($klien as $row)
      <div class="client margin" style="background-image: url({{asset("/img_client/".$row->client_img)}});"></div>
      @endforeach
    </div>
  </div>
</div>
@endsection