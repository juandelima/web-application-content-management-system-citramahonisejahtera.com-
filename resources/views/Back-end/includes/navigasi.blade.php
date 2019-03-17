<ul id="main-menu" class="main-menu">
	<li class="#">
		<a href="{{route('back-end.index')}}">
			<i class="entypo-gauge"></i>
			<span class="title">Dasbor</span>
		</a>
	</li>

	<li class="{{set_opened(['create_post','edit_post','posts'])}} {{set_active(['create_post','edit_post','posts'])}} has-sub">
		<a href="#">
			<i class="entypo-doc-text"></i>
			<span class="title">Pos</span>
		</a>
		<ul>
			<li class="{{set_active('posts')}}">
				<a href="{{route('posts')}}">
					<span class="title">Semua Pos</span>
				</a>
			</li>
			<li class="{{set_active('create_post')}}">
				<a href="{{route('create_post')}}">
					<span class="title">Tambah Baru</span>
				</a>
			</li>
		</ul>
	</li>
	<li class="{{set_opened(['create_event','edit_event','events'])}} {{set_active(['create_event','edit_event','events'])}} has-sub">
		<a href="#">
			<i class="entypo-picasa"></i>
			<span class="title">Events</span>
		</a>
		
		<ul>
			<li class="{{set_active('events')}}">
				<a href="{{route('events')}}">
					<span class="title">Events List</span>
				</a>
			</li>
			<li class="{{set_active('create_event')}}">
				<a href="{{route('create_event')}}">
					<span class="title">Add New</span>
				</a>
			</li>
		</ul>
	</li>
	<li class="{{set_opened(['kategori_produk','create_produk','edit_produk'])}} {{set_active(['kategori_produk','create_produk','edit_produk'])}} has-sub">
		<a href="#">
			<i class="entypo-bag"></i>
			<span class="title">Kategori Produk</span>
		</a>
		<ul>
			<li class="{{set_active(['kategori_produk'])}}">
				<a href="{{route('kategori_produk')}}">
					<span class="title">&nbsp; &nbsp;Semua Kategori</span>
				</a>
			</li>
			<li class="{{set_active(['create_produk'])}}">
				<a href="{{route('create_produk')}}">
					<span class="title">&nbsp; &nbsp;Tambah Kategori Baru</span>
				</a>
			</li>
		</ul>
	</li>
	
	<li class="{{set_opened(['kategori_proyek','create_proyek'])}} {{set_active(['kategori_proyek','create_proyek'])}} has-sub">
		<a href="#">
			&nbsp;<i class="glyphicon glyphicon-modal-window"></i>
			<span class="title">Kategori Project</span>
		</a>
		<ul>
			<li class="{{set_active(['kategori_proyek'])}}">
				<a href="{{route('kategori_proyek')}}">
					<span class="title">&nbsp; &nbsp;Semua Kategori</span>
				</a>
			</li>
		</ul>
	</li>

	<li class="{{set_opened(['new_product','index_produk','edit_a_product'])}} {{set_active(['new_product','index_produk','edit_a_product'])}} has-sub">
		<a href="#">
			&nbsp;<i class="fa fa-dropbox"></i>
			<span class="title">Produk</span>
		</a>
		<ul>
			<li class="{{set_active(['index_produk'])}}">
				<a href="{{route('index_produk')}}">
					<span class="title">Semua Produk</span>
				</a>
			</li>
			<li class="{{set_active(['new_product'])}}">
				<a href="{{route('new_product')}}">
					<span class="title">Tambah Produk Baru</span>
				</a>
			</li>
		</ul>
	</li>
	
	<li class="{{set_opened(['new_proyek','index_proyek','edit_proyek'])}} {{set_active(['new_proyek','index_proyek','edit_proyek'])}} has-sub">
		<a href="#">
			&nbsp;<i class="glyphicon glyphicon-tasks"></i>
			<span class="title">Project</span>
		</a>
		<ul>
			<li class="{{set_active(['index_proyek'])}}">
				<a href="{{route('index_proyek')}}">
					<span class="title">Semua Project</span>
				</a>
			</li>
			<li class="{{set_active(['new_proyek'])}}">
				<a href="{{route('new_proyek')}}">
					<span class="title">Tambah Project Baru</span>
				</a>
			</li>
		</ul>
	</li>

	<li class="{{set_opened(['index_client','create_client','save_client'])}} {{set_active(['index_client','create_client','save_client'])}} has-sub">
		<a href="#">
			<i class="entypo-picture"></i>
			<span class="title">Klien</span>
		</a>
		<ul>
			<li class="{{set_active(['index_client'])}}">
				<a href="{{route('index_client')}}">
					<span class="title">Semua Klien</span>
				</a>
			</li>
			<li class="{{set_active(['create_client'])}}">
				<a href="{{route('create_client')}}">
					<span class="title">Tambah Klien Baru</span>
				</a>
			</li>
		</ul>
	</li>

	<!--<li>-->
	<!--	<a href="#">-->
	<!--		<i class="entypo-users"></i>-->
	<!--		<span class="title">Pengguna</span>-->
	<!--	</a>-->
	<!--</li>-->
	<li>
			<a href="{{ route('logout') }}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
				<i class="entypo-logout"></i>
				<span>Logout</span>
			</a>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
			
		</li>
</ul>