@extends('Front-end/template')
@section('title','About Us')
@section('main')
<style type="text/css">
	#map{
		height: 100%;
		width: 100%;
	}
</style>
<div class="container">
	<div class="row" style="margin-top: 90px; margin-bottom: 100px;">
		<div class="col-md-6 about_us">
			<div>
			<h1>About <span class="c_t">Us</span></h1>
			<p>
				PT. CITRA MAHONI SEJAHTERA has been producing, servicing quality furniture in panel wood, metal plating &
				panel straight lines made of Plywood, particle board, Block board, and MDF in the Tangerang Area.
				For certain quantities it is possible to modify dimensions of standard models or to develop new models to
				produce a range to satisfy special requirements.
				This underdeveloped industry is still preoccupied in finding its own voice in a cluttered market
				dominated by international brands and aesthetics that has resulted in indonesians drawing less artistic inspiration
				from their own centuries – old rich heritage and more from the latest imported trends filtering down from overseas.
				<p style="display: none;" id="more">
					This is where we are determined to make visible and viable difference.
					Taking inspiration from the country’s wealth in artisanal beauty and traditional culture
					we aim to design and create modern, beautiful, high quality, functional furniture
					that not only reflect the nation’s century old identity, but also products with an international and modern appeal
					that are able to thrive in the break-neck world of international furniture design.<br/>
					We’ve always had a penchant for producing simple, beautiful and functional products
					that would fit snugly into any modern abode, yet this season we’re taking things a step further.<br/>
					The year 2017 also brings forths a new batch of items
					that have been produced and developed through years of devotion that is categorized into few lines.
				</p>
			</p>
			<div style="margin-top: 25px;"><a href="#" class="btn-more">View/Less More</a></div>
			</div>
		</div>
		<div class="col-md-6 gambar_about" style="margin-top: 20px;">
			<img src="{{asset('images/about_us.jpg')}}" width="250" height="250" class="img_about">
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
<div id="map" style="margin-top: 55px;">
</div>
<script type="text/javascript">
	function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
              center: {lat: -6.2303665, lng: 106.6991242},
              zoom: 15
            });
          }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_3s9gSVtxaOOyAZbGOpZbIMtUIGbDO9Y&callback=initMap" type="text/javascript"></script>
@endsection