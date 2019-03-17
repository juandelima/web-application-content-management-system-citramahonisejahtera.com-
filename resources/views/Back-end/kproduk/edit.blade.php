@extends('Back-end.template')
@section('title','Ubah Kategori Baru')
@section('main')
<h1 class="margin-bottom">Ubah Kategori</h1>

<ol class="breadcrumb 2">
	<li>
		<a href="{{route('kategori_produk')}}"><i class="fa-home"></i>Kategori Produk</a>
	</li>
	<li class="active">
		<strong>Ubah Kategori</strong>
	</li>
</ol>

@if (count($errors) > 0)
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-body">
				<form role="form" class="form-horizontal form-groups-bordered" action="{{route('update_produk', $produk->id_kategori)}}" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Nama Kategori</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="nama_kategori" required value="{{$produk->nama_kategori}}">
						</div>
					</div>
					<div class="form-group center-block full-right" style="margin-left: 15px;">
						<button type="submit" name="simpan" id="simpan" class="btn btn-green btn-icon icon-left col-left">
						Simpan
						<i class="entypo-check"></i>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection