<div class="row">
			<!-- Profile Info and Notifications -->
			<div class="col-md-6 col-sm-8 clearfix">
		
				<ul class="user-info pull-left pull-none-xsm">
		
					<!-- Profile Info -->
					<li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->
		
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="{{asset('admin/images/admin.png')}}" alt="" class="img-circle" width="44" />
							{{Auth::user()->name}}
						</a>
		
						<!--<ul class="dropdown-menu">-->
		
							<!-- Reverse Caret -->
						<!--	<li class="caret"></li>-->
		
							<!-- Profile sub-links -->
						<!--	<li>-->
						<!--		<a href="#">-->
						<!--			<i class="entypo-user"></i>-->
						<!--			Edit Profile-->
						<!--		</a>-->
						<!--	</li>-->
		
						<!--	<li>-->
						<!--		<a href="#">-->
						<!--			<i class="entypo-mail"></i>-->
						<!--			Inbox-->
						<!--		</a>-->
						<!--	</li>-->
		
						<!--	<li>-->
						<!--		<a href="#">-->
						<!--			<i class="entypo-calendar"></i>-->
						<!--			Calendar-->
						<!--		</a>-->
						<!--	</li>-->
		
						<!--	<li>-->
						<!--		<a href="#">-->
						<!--			<i class="entypo-clipboard"></i>-->
						<!--			Tasks-->
						<!--		</a>-->
						<!--	</li>-->
						<!--</ul>-->
					</li>
		
				</ul>
		
			</div>
		
		
			<!-- Raw Links -->
			<div class="col-md-6 col-sm-4 clearfix hidden-xs">
		
				<ul class="list-inline links-list pull-right">
		
					<li class="sep"></li>
		
					<li>
						<a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
							Log Out <i class="entypo-logout right"></i>
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
					</li>
				</ul>
		
			</div>
		
		</div>
		
		<hr />