@extends('Back-end.template')
@section('title','Dashboard')
<script type="text/javascript" src="{{asset('admin/js/dashboard.js')}}"></script>
@section('main')
<?php
	$news = \App\Models\Post::all()->count();
	$events = \App\Models\Event::all()->count();
	$produks = \App\Models\Produk::all()->count();
	$projects = \App\Models\Proyek::all()->count();
?>
<div class="row">
	<div class="col-sm-3 col-xs-6">
		<div class="tile-stats tile-red">
			<div class="icon"><i class="entypo-doc-text-inv"></i></div>
			<div class="num" data-start="0" data-end="{{$news}}" data-postfix="" data-duration="1500" data-delay="0">0</div>
			<h3>Posts</h3>
			<p>total postingan.</p>
		</div>
	</div>
	
	<div class="col-sm-3 col-xs-6">
		<div class="tile-stats tile-green">
			<div class="icon"><i class="entypo-picasa"></i></div>
			<div class="num" data-start="0" data-end="{{$events}}" data-postfix="" data-duration="1500" data-delay="600">0</div>
			<h3>Events</h3>
			<p>total event.</p>
		</div>
	</div>
			
	<div class="clear visible-xs"></div>
	<div class="col-sm-3 col-xs-6">
		<div class="tile-stats tile-aqua">
			<div class="icon"><i class="fa fa-dropbox"></i></div>
			<div class="num" data-start="0" data-end="{{$produks}}" data-postfix="" data-duration="1500" data-delay="1200">0</div>
			<h3>Produk</h3>
			<p>total produk.</p>
		</div>
	</div>
		
	<div class="col-sm-3 col-xs-6">
		<div class="tile-stats tile-blue">
			<div class="icon"><i class="glyphicon glyphicon-tasks"></i></div>
			<div class="num" data-start="0" data-end="{{$projects}}" data-postfix="" data-duration="1500" data-delay="1800">0</div>
			<h3>Projects</h3>
			<p>total projects.</p>
		</div>
	</div>
</div>
@endsection