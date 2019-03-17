@extends('Front-end/template2')
@section('title','Product')
@section('main')

<div class="container">
    <div class="row" style="margin-top: 120px;">
        <div class="col-md-3">
            <div class="box-month">
    			<h1>By Category</h1>
    			<ul>
    			    @foreach($k_products as $row)
    				<li><a href="{{route('product.filter', $row->slug)}}">{{$row->nama_kategori}}</a></li>
    				@endforeach
    			</ul>
		    </div>
        </div>
        
        <div class="col-md-9">
            <div class="product-imgs">
    			@foreach($product as $row)
    			<div class="box-product">
    				<img src="{{asset('/produk/'.$row->featured_image)}}" class="img-product">
    				<div class="box-link">
    					<a href="#" class="nama_produk" data-toggle="modal" data-target="#quick-view-modal{{$row->id_produk}}" data-index="638">{{$row->nama_produk}}</a>
    				</div>
    			</div>
    			@endforeach
		    </div>
        </div>
    </div>
    
    <div class="box_date">
		<h1>By Category</h1>
		<ul>
    			    @foreach($k_products as $row)
    				<li><a href="{{route('product.filter', $row->slug)}}">{{$row->nama_kategori}}</a></li>
    				@endforeach
    			</ul>
	</div>
</div>

@foreach($product as $row)
<div class="modal fade quick-view-modal" id="quick-view-modal{{$row->id_produk}}" tabindex="-3" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-product">
        <div class="modal-content"> 
            <div class="modal-body">
                <button type="button" style="width: 30px;" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 text-center">
                        <div class="aa-product-view-slider">
                            <div class="simpleLens-gallery-container" id="demo-1">
                                <div class="simpleLens-container">
                                    <div class="simpleLens-big-image-container">
                                        <a class="simpleLens-lens-image dataimage1"  data-lens-image="{{asset('/produk/'.$row->featured_image)}}">
                                            <img src="{{asset('/produk/'.$row->featured_image)}}" class="simpleLens-big-image">
                                        </a>
                                    </div>
                                </div>

                                <div class="simpleLens-thumbnails-container">
                                    <a href="#" class="simpleLens-thumbnail-wrapper dataimage1" data-lens-image="{{asset('/produk/'.$row->featured_image)}}" data-big-image="{{asset('/produk/'.$row->featured_image)}}">
                                        <img class="simpleLens-lens-image-q image1" src="{{asset('/produk/'.$row->featured_image)}}">
                                    </a>
                                    @foreach($row->gambar as $row2)
                                    <a href="#" class="simpleLens-thumbnail-wrapper dataimage2" data-lens-image="{{asset('/produk/'.$row2->sub_img)}}" data-big-image="{{asset('/produk/'.$row2->sub_img)}}">
                                      <img class="simpleLens-lens-image-q image2" src="{{asset('/produk/'.$row2->sub_img)}}">
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="aa-product-view-content">
                                <h3 class="productName">{{$row->nama_produk}}</h3>
                                <p><strong>Details</strong><br><span class="productDescription"><p>{!! $row->deskripsi !!}&nbsp;</p></span></p>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection