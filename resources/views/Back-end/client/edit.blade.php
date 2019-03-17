@extends('Back-end.template')
@section('title','Ubah Klien')
@section('main')
<style>
.col-sm-1 {
    width: 45px;
}

.select2-container .select2-choice {
    display: block!important;
    height: 30px!important;
    white-space: nowrap!important;
    line-height: 26px!important;
}
</style>
<h1 class="margin-bottom">Ubah Klien</h1>

<ol class="breadcrumb 2">
	<li>
		<a href="{{route('index_client')}}"><i class="fa-home"></i>Klien</a>
	</li>
	<li class="active">
		<strong>Ubah Klien</strong>
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
				<form role="form" class="form-horizontal form-groups-bordered" action="{{route('update_client', $klien->id_client) }}" method="post" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div id="foto_1" style="margin-top: 15px;">
						<div class="form-group">
						<label class="col-sm-2 control-label" style="text-align:left; font-size:13px;">&emsp;Gambar Klien:
							@if (session('error_upload'))
							<br />
							<p style="color:red;">
								{{ session('error_upload') }}
							</p>
							@endif
						</label>
						<div class="col-sm-8">
							<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
									<img @if ($klien->client_img != '') src="{{ asset('img_client/'.$klien->client_img) }}" @else src="http://placehold.it/200x150" @endif alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
								<div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new">Pilih Photo</span>
										<span class="fileinput-exists">Ubah</span>
										<input type="file" name="img_klien" accept="image/*">
									</span>
									<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Hapus</a>
								</div>
							</div>
						</div>
						<input type="hidden" name="gambar_lama" value="{{ $klien->client_img }}" />
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
<link rel="stylesheet" href="{{asset('admin/js/wysihtml5/bootstrap-wysihtml5.css')}}">
<script src="{{asset('admin/js/fileinput.js')}}"></script>
@endsection