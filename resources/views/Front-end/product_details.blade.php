@extends('Front-end/template2')
<?php $titleTag = htmlspecialchars($product->nama_produk); ?>
@section('title'," $titleTag")
@section('main')
<div class="container">
	<div class="row" style="margin-top: 50px;">
    <div class="col-md-10 col-md-offset-1 givemargin" style="margin-bottom: 0px;">
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 text-center givemargin">
          <div class="aa-product-view-slider">
            <div class="simpleLens-gallery-container" id="demo-1">
              <div class="simpleLens-container">
                <div class="simpleLens-big-image-container">
                  <a class="simpleLens-lens-image dataimage1"  data-lens-image="{{asset('/produk/'.$product->featured_image)}}">
                    <img src="{{asset('/produk/'.$product->featured_image)}}"  class="simpleLens-big-image image1" alt="Clover Armchair">
                  </a>
                </div>
              </div>

              <div class="simpleLens-thumbnails-container">
                <a href="#" class="simpleLens-thumbnail-wrapper dataimage1" data-lens-image="{{asset('/produk/'.$product->featured_image)}}" data-big-image="{{asset('/produk/'.$product->featured_image)}}">
                  <img class="simpleLens-lens-image-q image1" src="{{asset('/produk/'.$product->featured_image)}}" alt="Clover Armchair">
                </a>
                @foreach($product->gambar as $row)
                <a href="#" class="simpleLens-thumbnail-wrapper dataimage1" data-lens-image="{{asset('/produk/'.$row->sub_img)}}" data-big-image="{{asset('/produk/'.$row->sub_img)}}">
                  <img class="simpleLens-lens-image-q image1" src="{{asset('/produk/'.$row->sub_img)}}" alt="Clover Armchair">
                </a>
                @endforeach
              </div>
              
            </div>
          </div>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12" style="margin-top:30px;">
          <section id="checkout">
            <div class="row">
              <div class="col-md-10 col-xs-8 col-xs-offset-1">
                <h3 class="fontcolor">{{$product->nama_produk}}</h3>
                <div class="thinfont margintop"><p><b open="" sans",="" sans-serif;="" font-size:="" 12px;"="" style="color: rgb(51, 51, 51); font-family: ">Pre-order within 3-4 weeks</b><br></p><p>{!! $product->deskripsi !!}</p></div>
              </div>
            </div>
          </section>
        </div>

      </div>
    </div>
	</div>
</div>
@endsection