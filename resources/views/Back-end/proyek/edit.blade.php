@extends('Back-end.template')
@section('title','Ubah Proyek')
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
<h1 class="margin-bottom">Ubah Proyek</h1>

<ol class="breadcrumb 2">
	<li>
		<a href="{{route('index_proyek')}}"><i class="fa-home"></i>Proyek</a>
	</li>
	<li class="active">
		<strong>Ubah Proyek</strong>
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
				<form role="form" class="form-horizontal form-groups-bordered" action="{{route('update_a_proyek', $proyek->id_project)}}" method="post" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
						<label for="field-1" class="col-sm-2 control-label" style="text-align:left;">&emsp;Kategori Produk</label>
						<div class="col-sm-8">
							<select name="kategori_id" class="form-control select2" required data-placeholder="Pilih kategori produk..." required>
							<option></option>
							@foreach($kproyeks as $row)
								<option value="{{$row->id_kategori}}" @if($row->id_kategori == $proyek->kategori_proyek_id) selected @endif>{{$row->nama_kategori}}</option>
							@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" style="text-align:left; font-size:13px;">&emsp;Thumbnail Produk:
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
									<img @if ($proyek->featured_image != '') src="{{ asset('proyek_img/'.$proyek->featured_image) }}" @else src="http://placehold.it/200x150" @endif alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
								<div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new">Pilih Photo</span>
										<span class="fileinput-exists">Ubah</span>
										<input type="file" name="featured_image" accept="image/*">
									</span>
									<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Hapus</a>
								</div>
							</div>
						</div>
						<input type="hidden" name="gambar_lama" value="{{ $proyek->featured_image }}" />
					</div>
					<div class="form-group">
						<label for="field-1" class="col-sm-2 control-label" style="text-align:left;">&emsp;Nama Proyek</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="nama_project" value="{{$proyek->nama_project}}" required>
						</div>
					</div>
					<div class="form-group">
						<label for="field-1" class="col-sm-2 control-label" style="text-align:left;">&emsp;Deskripsi Proyek</label>
						<div class="col-sm-8">
							<textarea class="form-control summernote" name="deskripsi" required></textarea>
						</div>
					</div>

					<div id="tambah">
						<?php $i = 0; ?>
						<?php $z = 0; ?>
						@if ($proyek->gambar->count() > 0)
						@foreach($proyek->gambar as $row)
						<input type="hidden" id="gambarup_{{$i}}" name="sub_img2[{{$z}}]" value="{{$row->id_sub_img}}">
						<?php $i++; ?>
						<div id="foto_<?= $i; ?>" style="margin-top: 15px;">
							<div class="form-group">
								@if($i == 1)
								<label for="field-1" class="col-sm-2 control-label" style="text-align:left;">&emsp;Foto Proyek:
								@if (session('error_upload1'))
								<br />
								<p style="color:red;">
									{{ session('error_upload1') }}
								</p>
								@endif
								</label>
								@else
								<label for="field-1" class="col-sm-2 control-label" style="text-align:left;">&emsp;
								@if (session('error_upload1'))
								<br />
								<p style="color:red;">
									{{ session('error_upload1') }}
								</p>
								@endif
								
								</label>
								@endif
								
								<div class="col-sm-4">
									<div class="fileinput fileinput-new" data-provides="fileinput">
										<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
										<img @if ($row->sub_img != '') src="{{ asset('proyek_img/'.$row->sub_img) }}" @else src="http://placehold.it/200x150" @endif alt="...">
										</div>
										<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
										<div>

											<span class="btn btn-white btn-file">
												<span class="fileinput-new">Pilih Photo</span>
												<span class="fileinput-exists">Ubah</span>
												<input type="file" id="gambarup_{{$i}}" name="sub_img[{{$z}}]" accept="image/*">
											</span>
											<input type="hidden" id="gambarup_{{$i}}" name="sub_img[{{$z}}]" value="{{$row->sub_img}}">
											<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Hapus</a>
											@if($i >= 2)
												<button type="button" class="btn btn-red btn-icon icon-left hapus" data-id="<?= $i; ?>"> Hapus
													<i class="entypo-cancel"></i>
												</button>
											@endif
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php $z += 1; ?>
						@endforeach
						@else
							<?php $i++; ?>
							<div id="foto_<?= $i; ?>" style="margin-top: 15px;">
								<div class="form-group">
									<label for="field-1" class="col-sm-2 control-label" style="text-align:left;">&emsp;Foto Produk:
									@if (session('error_upload1'))
									<br />
									<p style="color:red;">
										{{ session('error_upload1') }}
									</p>
									@endif
									
									</label>
									<div class="col-sm-4">
										<div class="fileinput fileinput-new" data-provides="fileinput">
											<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
												<img src="http://placehold.it/200x150" alt="...">
											</div>
											<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
											<div>
												<span class="btn btn-white btn-file">
													<span class="fileinput-new">Pilih Photo</span>
													<span class="fileinput-exists">Ubah</span>
													<input type="file" name="sub_img[]" accept="image/*">
												</span>
												<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Hapus</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						@endif
					</div>

					<div class="form-group">
						<label for="field-ta" class="col-sm-2 control-label"></label>
						<div class="col-sm-2">
							<button type="button" id="tambah_f" class="btn btn-blue btn-icon icon-left">
							Tambah
							<i class="entypo-plus"></i>
							</button>
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
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>
<script src="{{asset('admin/js/fileinput.js')}}"></script>
<script type="text/javascript">
	var loop = <?= ++$i; ?>;
    $(document).ready(function() {
    	//initialize summernote
        $('.summernote').summernote({
            height: 300,
                toolbar: [
                [ 'style', [ 'style' ] ],
                [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
                [ 'fontname', [ 'fontname' ] ],
                [ 'fontsize', [ 'fontsize' ] ],
                [ 'color', [ 'color' ] ],
                [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
                [ 'table', [ 'table' ] ],
                [ 'insert', [ 'link'] ],
                [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
            ]
        });
 
   	    //assign the variable passed from controller to a JavaScript variable.
        var content = {!! json_encode($proyek->deskripsi) !!};
 
        //set the content to summernote using `code` attribute.
        $('.summernote').summernote('code', content);
    	$('#tambah_f').click(function(e) {
			e.preventDefault();
			var html = '';
			html +=
					'<div id="foto_'+loop+'">' +
					'<div class="form-group">' +
					'<label for="field-1" class="col-sm-2 control-label" style="text-align:left; margin-left: 19px;">&emsp;' +
					'</label>' +
					'<div class="fileinput fileinput-new" data-provides="fileinput">' +
					'<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">' +
					'<img src="http://placehold.it/200x150" alt="...">'+
					'</div>' +
					'<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>' +
					'<div>' +
					'<span class="btn btn-white btn-file">' +
					'<span class="fileinput-new">Pilih Photo</span>' +
					'<span class="fileinput-exists">Ubah</span>' +
					'<input type="file" id="gambarup_'+loop+'" name="sub_img[]">' +
					'</span>'+
					'<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Hapus</a>'+
					'<button type="button" class="btn btn-red btn-icon icon-left hapus" data-id="'+loop+'" style="margin-left: 15px;">' +
					'Hapus' +
					'<i class="entypo-cancel"></i>' +
					'</button>' +
					'</div>'+
					'</div>' +
					'</div>' +
					'</div>';
					$('#tambah').append(html);
					loop++;
		});

		$("#tambah").on('click','.hapus', function(e){
			e.preventDefault();
			var id = $(this).data('id');
			$("#foto_"+id).remove();
		});
   });
</script>
@endsection