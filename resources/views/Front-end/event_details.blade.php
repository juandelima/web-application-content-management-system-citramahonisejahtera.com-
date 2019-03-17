@extends('Front-end/template')
<?php $titleTag = htmlspecialchars($event->title); ?>
@section('title'," $titleTag")
@section('main')

<div class="container">
	<div class="control-nd" style="margin-top: 65px;">
		<div class="contain-news">
			<h1 class="title-news">{{ $event->title }}</h1>
			<div class="date">{{ date('M j, Y', strtotime($event->created_at)) }}</div>
			<article class="contain">
				@if(!empty($event->img))
				<img src="{{asset('/pengguna/' . $event->img)}}" alt="" class="news-img">
				@else
				<img src="{{asset('images/news.jpg')}}" alt="" class="news-img">
				@endif
				<p>
					{!! $event->konten !!}
				</p>
			</article>
		</div>

		<div class="other-news">
			<h1>Featured Events</h1>
			@foreach($event_fp as $row)
			<div class="box-other-news">
				<img src="{{asset('/pengguna/' . $row->img)}}" alt="" class="featured-img">
				<div class="title-and-date">
					<small class="date-fp">{{ date('M j, Y', strtotime($row->created_at)) }}</small>
					<a href="{{ route('event.single', $row->slug) }}"  class="title-fp">{{ $row->title }}</a>
				</div>
			</div>
			@endforeach
			<div class="num">
				<center>{!! $event_fp->links() !!}</center>
			</div>
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