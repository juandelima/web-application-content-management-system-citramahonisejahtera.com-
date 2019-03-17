@extends('Back-end.template')
@section('title','Tambah Pos Baru')
@section('main')
<h1 class="margin-bottom">Ubah Pos</h1>
<ol class="breadcrumb 2">
	<li>
		<a href="{{route('posts')}}"><i class="fa-home"></i>Pos</a>
	</li>

	<li class="active">
		<strong>Ubah Pos</strong>
	</li>
</ol>
<br />
<style>
	.ms-container .ms-list {
		width: 135px;
		height: 205px;
	}
		
	.post-save-changes {
		float: right;
	}
		
	@media screen and (max-width: 789px)
	{
		.post-save-changes {
			float: none;
			margin-bottom: 20px;
		}
	}
</style>
<form method="post" action="{{route('update_post', $post->id_post)}}" role="form" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="row">
		<div class="col-sm-2 post-save-changes">
			<button type="submit" class="btn btn-green btn-lg btn-block btn-icon">
				Publish
				<i class="entypo-check"></i>
			</button>
		</div>

		<div class="col-sm-10">
			<input type="text" class="form-control input-lg" name="title" placeholder="Post title" required value="{{$post->title}}" />
		</div>
	</div>
	<br />
	<div class="row">
		<div class="col-sm-12">
			<textarea class="form-control summernote" name="body" required></textarea>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="fileinput fileinput-new" data-provides="fileinput">
				<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
					<img @if ($post->img != '') src="{{ asset('/pengguna/'.$post->img) }}" @else src="http://placehold.it/200x150" @endif alt="...">
				</div>
				<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 100%; max-height: 550px">
				</div>
				<div>
					<span class="btn btn-white btn-file">
						<span class="fileinput-new">Pilih Photo</span>
						<span class="fileinput-exists">Ubah</span>
						<input type="file" name="img" accept="image/*">
					</span>
					<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Hapus</a>
				</div>
			</div>
		</div>
		<input type="hidden" name="gambar_lama" value="{{ $post->img }}" />
	</div>
</form>
@section('scripts')
<link rel="stylesheet" href="{{asset('js/wysihtml5/bootstrap-wysihtml5.css')}}">
<link rel="stylesheet" href="{{asset('js/selectboxit/jquery.selectBoxIt.css')}}">
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
<script src="{{asset('js/wysihtml5/wysihtml5-0.4.0pre.min.js')}}"></script>
<script src="{{asset('js/wysihtml5/bootstrap-wysihtml5.js')}}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>
<script src="{{asset('admin/js/fileinput.js')}}"></script>
<script type="text/javascript">

    $(document).ready(function() {
            //initialize summernote
            $('.summernote').summernote();
 
            //assign the variable passed from controller to a JavaScript variable.
            var content = {!! json_encode($post->konten) !!};
 
            //set the content to summernote using `code` attribute.
            $('.summernote').summernote('code', content);
        });

</script>
@endsection
@endsection