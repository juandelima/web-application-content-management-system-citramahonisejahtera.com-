@extends('Front-end/template')
@section('title','News')
@section('main')

<div class="container">
	<div class="row" style="margin-top: 120px;">
		<div class="col-md-8">
			@foreach ($posts as $post)
				<div class="col-xs-12 box-berita">
					<h1><a href="{{ route('news.single', $post->slug) }}" target="__blank">{{ $post->title }}</a></h1>
					<div class="date">{{ date('M j, Y', strtotime($post->created_at)) }}</div>
					<article>
						<img src="{{asset('/pengguna/' . $post->img)}}" class="imgn_size">
						<p>{{ substr(strip_tags($post->konten), 0, 250) }}{{ strlen(strip_tags($post->konten)) > 250 ? '...' : "" }}</p>
					</article>
					<a href="{{ route('news.single', $post->slug) }}" class="btn-more2">Detail</a>
				</div>
			@endforeach
		</div>

		<div class="col-md-4">
			<div class="box-month">
				<h1>By Month</h1>
				<ul>
					<li><a href="{{route('news.filter', date("M", mktime(0,0,0, 1)))}}">January</a></li>
					<li><a href="{{route('news.filter', date("M", mktime(0,0,0, 2)))}}">February</a></li>
					<li><a href="{{route('news.filter', date("M", mktime(0,0,0, 3)))}}">March</a></li>
					<li><a href="{{route('news.filter', date("M", mktime(0,0,0, 4)))}}">April</a></li>
					<li><a href="{{route('news.filter', date("M", mktime(0,0,0, 5)))}}">May</a></li>
					<li><a href="{{route('news.filter', date("M", mktime(0,0,0, 6)))}}">June</a></li>
					<li><a href="{{route('news.filter', date("M", mktime(0,0,0, 7)))}}">July</a></li>
					<li><a href="{{route('news.filter', date("M", mktime(0,0,0, 8)))}}">August</a></li>
					<li><a href="{{route('news.filter', date("M", mktime(0,0,0, 9)))}}">September</a></li>
					<li><a href="{{route('news.filter', date("M", mktime(0,0,0, 10)))}}">October</a></li>
					<li><a href="{{route('news.filter', date("M", mktime(0,0,0, 11)))}}">November</a></li>
					<li><a href="{{route('news.filter', date("M", mktime(0,0,0, 12)))}}">December</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="prev-and-next" style="margin-top: 50px;">
		<div class="num">
			{!! $posts->links() !!}
		</div>
	</div>
	<div class="box_date">
		<h1>By Month</h1>
		<ul>
					<li><a href="{{route('news.filter', date("M", mktime(0,0,0, 1)))}}">January</a></li>
					<li><a href="{{route('news.filter', date("M", mktime(0,0,0, 2)))}}">February</a></li>
					<li><a href="{{route('news.filter', date("M", mktime(0,0,0, 3)))}}">March</a></li>
					<li><a href="{{route('news.filter', date("M", mktime(0,0,0, 4)))}}">April</a></li>
					<li><a href="{{route('news.filter', date("M", mktime(0,0,0, 5)))}}">May</a></li>
					<li><a href="{{route('news.filter', date("M", mktime(0,0,0, 6)))}}">June</a></li>
					<li><a href="{{route('news.filter', date("M", mktime(0,0,0, 7)))}}">July</a></li>
					<li><a href="{{route('news.filter', date("M", mktime(0,0,0, 8)))}}">August</a></li>
					<li><a href="{{route('news.filter', date("M", mktime(0,0,0, 9)))}}">September</a></li>
					<li><a href="{{route('news.filter', date("M", mktime(0,0,0, 10)))}}">October</a></li>
					<li><a href="{{route('news.filter', date("M", mktime(0,0,0, 11)))}}">November</a></li>
					<li><a href="{{route('news.filter', date("M", mktime(0,0,0, 12)))}}">December</a></li>
				</ul>
	</div>
	<div class="row space">
    <h1 class="t_pro">Events</h1>
    <div class="border"></div>
    <div class="event_slide">
      @foreach($event as $row)
      <div class="event_d" style="background-image: url({{asset('/pengguna/'.$row->img)}});">
        <div class="text_">
          <small>{{ date('M j, Y', strtotime($row->created_at)) }}</small><br/>
          <h1><a href="{{route('event.single', $row->slug)}}" class="event_link">{{$row->title}}</a></h1>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection