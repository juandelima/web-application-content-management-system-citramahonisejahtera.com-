@extends('Front-end/template')
@section('title','Project')
@section('main')
<br>
<br>

<section class="main">
<div class="container-fluid">
<div class="row" style="margin-top: 25px;">

  <div class="col-sm-6">
    @php
    if (!empty($of)) {
    @endphp
      <a href="{{route('projects.list', $of->slug)}}">
        <img class="img-responsive" src="{{asset('images/office_f.jpg')}}">
        <div class="overlay">
          <div class="text">{{$of->nama_kategori}}</div>
        </div>
      </a>
    @php
    } else {
    @endphp
    <a href="#">
        <img class="img-responsive" src="{{asset('images/office_f.jpg')}}">
        <div class="overlay">
          <div class="text"></div>
        </div>
    </a>
    @php
    }
    @endphp
  </div>
  
  <div class="col-sm-6">
    @php
    if (!empty($oi)) {
    @endphp
      <a href="{{route('projects.list', $oi->slug)}}">
        <div class="col-xs-6">
        	<img class="img-responsive" src="{{asset('images/office_i.jpg')}}">
        	<div class="overlay">
        		<div class="text">{{$oi->nama_kategori}}</div>
          </div>
        </div>
      </a>
    @php
    } else {
    @endphp
      <a href="#">
        <div class="col-xs-6">
          <img class="img-responsive" src="{{asset('images/office_i.jpg')}}">
          <div class="overlay">
            <div class="text"></div>
          </div>
        </div>
      </a>
    @php
    }
    @endphp
    
    @php
    if (!empty($hf)) {
    @endphp
    <a href="{{route('projects.list', $hf->slug)}}">
      <div class="col-xs-6">
        <img class="img-responsive" src="{{asset('images/hotel_f.jpg')}}">
        <div class="overlay">
          <div class="text">{{$hf->nama_kategori}}</div>
        </div>
      </div>
    </a>
    @php
    } else {
    @endphp
    <a href="#">
      <div class="col-xs-6">
        <img class="img-responsive" src="{{asset('images/hotel_f.jpg')}}">
        <div class="overlay">
          <div class="text"></div>
        </div>
      </div>
    </a>
    @php
    }
    @endphp

    @php
    if (!empty($di)) {
    @endphp
    <a href="{{route('projects.list', $di->slug)}}">
      <div class="col-xs-6" style="padding-top:45px;">
      	<img class="img-responsive" src="{{asset('images/design_i.jpg')}}">
        <div class="overlay">
          <div class="text">{{$di->nama_kategori}}</div>
        </div>
      </div>
    </a>
    @php
    } else {
    @endphp
    <a href="#">
      <div class="col-xs-6" style="padding-top:45px;">
        <img class="img-responsive" src="{{asset('images/design_i.jpg')}}">
        <div class="overlay">
          <div class="text"></div>
        </div>
      </div>
    </a>
    @php
    }
    @endphp

    @php
    if (!empty($cf)) {
    @endphp    
    <a href="{{route('projects.list', $cf->slug)}}">
      <div class="col-xs-6" style="padding-top:45px;">
        <img class="img-responsive" src="{{asset('images/custom_f.jpg')}}">
        <div class="overlay">
          <div class="text">{{$cf->nama_kategori}}</div>
        </div>
      </div>
    </a>
    @php
    } else {
    @endphp
    <a href="#">
      <div class="col-xs-6" style="padding-top:45px;">
        <img class="img-responsive" src="{{asset('images/custom_f.jpg')}}">
        <div class="overlay">
          <div class="text"></div>
        </div>
      </div>
    </a>
    @php
    }
    @endphp    
  </div>
</div>
</div>
</section>

<div class="container">
	<div class="row space space_a row2" style="margin-top: 120px;">
    <div class="col-md-6 cover_cms">
      <div class="img_cms2">
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
  <div>
    <h1 class="t_pro" style="margin-top: 125px;">OUR DONE PROJECTS</h1>
    <div class="border"></div>
    <div class="slide_our_done">
        @foreach($proyek as $row)
      <div class="project_done" style="background-image: url({{asset('/proyek_img/'.$row->featured_image)}});">
        <div class="text_">
          <small>{{$row->kategori->nama_kategori}}</small><br/>
          <h1><a href="{{route('projects.single', $row->slug)}}" target="__blank" style="color: #fff; font-size: 23px;">{{$row->nama_project}}</a></h1>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection