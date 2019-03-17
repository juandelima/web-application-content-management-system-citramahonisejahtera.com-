@extends('Back-end/template')
@section('title','Products')
@section('main')
<div class="main-content">
  <h1>Products Data</h1>

			<br />

			<script type="text/javascript">
				jQuery(document).ready(function ($) {
					var $table1 = jQuery('#table-1');

					// Initialize DataTable
					$table1.DataTable({
						"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
						"bStateSave": true
					});

					// Initalize Select Dropdown after DataTables is created
					$table1.closest('.dataTables_wrapper').find('select').select2({
						minimumResultsForSearch: -1
					});
				});
			</script>

			<table class="table table-bordered datatable" id="table-1">
				<thead>
					<tr>
						<th>No</th>
						<th>Products Code</th>
						<th>Name</th>
						<th>Category</th>
						<th data-hide="phone,tablet">Descriptions</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<tr class="odd gradeX">
						<td>1</td>
						<td>Internet Explorer 4.0</td>
						<td>Win 95+</td>
						<td></td>
						<td class="center">4</td>
						<td>
							<a href="#" class="btn btn-default btn-sm btn-icon icon-left">
								<i class="entypo-pencil"></i>
								Edit
							</a>

							<a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
								<i class="entypo-cancel"></i>
								Delete
							</a>
						</td>
					</tr>
				</tbody>
			</table>

			<br />
</div>


@endsection