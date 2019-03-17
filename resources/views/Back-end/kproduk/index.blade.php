@extends('Back-end.template')
@section('title','Semua Kategori Produk')
@section('main')
@if ($message = Session::get('success'))
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			setTimeout(function() {
				var opts = {
					"closeButton": true,
					"debug": false,
					"positionClass": rtl() || public_vars.$pageContainer.hasClass('right-sidebar') ? "toast-top-left" : "toast-top-right",
					"toastClass": "black",
					"onclick": null,
					"showDuration": "300",
					"hideDuration": "1000",
					"timeOut": "5000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				};
					
				toastr.success("{{$message}}", opts);
			}, 5);
		});
    </script>
@endif

@if ($message = Session::get('error'))
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			setTimeout(function() {
				var opts = {
					"closeButton": true,
					"debug": false,
					"positionClass": rtl() || public_vars.$pageContainer.hasClass('right-sidebar') ? "toast-top-left" : "toast-top-right",
					"toastClass": "black",
					"onclick": null,
					"showDuration": "300",
					"hideDuration": "1000",
					"timeOut": "5000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				};
					
				toastr.error("{{$message}}", opts);
			}, 5);
		});
    </script>
@endif
<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th width="2%"><center>No</center></th>
			<th><center>Nama Kategori</center></th>
			<th width="25%"><center>Aksi</center></th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 0; ?>
		@foreach($kproduks as $row)
		<tr class="odd gradeX">
			<td><center>{{++$no}}</center></td>
			<td>{{$row->nama_kategori}}</td>
			<td>
				<div align="center">
					<form action="{{route('delete_produk', $row->id_kategori)}}" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<a href="{{route('edit_produk', $row->id_kategori)}}" class="btn btn-sm btn-green btn-icon icon-left">
							<i class="entypo-pencil"></i>
							Ubah
						</a>
						<button type="submit" onclick="return confirm('Anda Yakin Akan Menghapus Kategori Ini !')"class="btn btn-sm btn-danger btn-icon icon-left">
							<i class="entypo-trash"></i>
							Hapus
						</button>
					</form>
				</div>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>


@endsection

@section('scripts')
<link rel="stylesheet" href="{{asset('admin/js/datatables/datatables.css')}}">
<link rel="stylesheet" href="{{asset('admin/js/select2/select2-bootstrap.css')}}">
<link rel="stylesheet" href="{{asset('admin/js/select2/select2.css')}}">
<script src="{{asset('admin/js/datatables/datatables.js')}}"></script>
<script type="text/javascript">
		jQuery( document ).ready( function( $ ) {
			var $table1 = jQuery( '#table-1' );
			
			// Initialize DataTable
			$table1.DataTable( {
				"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"bStateSave": true
			});
			
			// Initalize Select Dropdown after DataTables is created
			$table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
				minimumResultsForSearch: -1
			});
		} );
</script>

@endsection