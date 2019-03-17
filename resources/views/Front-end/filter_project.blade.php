@extends('Front-end/template')
@section('title','Product')
@section('main')

<div class="container">
    <div class="row" style="margin-top: 120px;">
        <div class="col-md-3">
            <div class="box-month">
    			<h1>By Category</h1>
				<ul>
					@foreach($k_projects as $row)
					<li><a href="{{route('projects.list', $row->slug)}}">{{$row->nama_kategori}}</a></li>
					@endforeach
				</ul>
		    </div>
        </div>
        
        <div class="col-md-9">
            <div class="product-imgs">
			@foreach($filter_projects->filter_project as $row)
			<div class="box-product">
				<img src="{{asset('/proyek_img/'.$row->featured_image)}}" class="img-product">
				<div class="box-link">
					<a href="{{route('projects.single', $row->slug)}}" class="nama_produk">{{$row->nama_project}}</a>
				</div>
			</div>
			@endforeach
		</div>
        </div>
    </div>
    
    <div class="box_date">
		<h1>By Category</h1>
				<ul>
					@foreach($k_projects as $row)
					<li><a href="{{route('projects.list', $row->slug)}}">{{$row->nama_kategori}}</a></li>
					@endforeach
				</ul>
	</div>
</div>
@endsection