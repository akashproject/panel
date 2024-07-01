@extends('administrator.layouts.admin')
@section('content')
<div class="col-12">
	@if($permissions)
		<div class="card">
			<div class="card-header d-flex flex-wrap justify-content-between gap-3">
				<div class="card-title mb-0 me-1">
					<h5 class="mb-1"> {{ count($permissions) }} Records found</h5>
				</div>
				<div class="d-flex justify-content-md-end align-items-center gap-3 flex-wrap">
					<div class="position-relative">
						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPermission">
							Add New Permission
						</button>
					</div>
				</div>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="addPermission" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
					<form class="" method="post" action="{{ route('save-permission') }}" enctype="multipart/form-data">
					@csrf
						<div class="modal-body">
							<button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
							<div class="text-center mb-4">
								<h3>Add New Permission</h3>
								<p>Permissions you may use and assign to your users.</p>
							</div>
							<div class="col-12 mb-3 fv-plugins-icon-container">
								<label class="form-label" for="permission">Permission Name</label>
								<input type="text" id="permission" name="permission" class="form-control" placeholder="Permission Name" autofocus="">
								<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
								Close
							</button>
							<button type="submit" class="btn btn-primary">Save changes</button>
						</div>
					</form>
					</div>
				</div>
			</div>
			<div class="table-responsive text-nowrap">
				<table class="datatables-courses table">
				<thead class="table-light">
					<tr>
						<th>Name</th>
						<th>Assigned to</th>
						<th>Created At</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody class="table-border-bottom-0">
					@foreach ($permissions as $value)
					<tr>
						<td>{{ $value->name }}</td>
						<td>{{ $value->excerpt }}</td>
						<td>
							@switch($value->status)
							@case('0')
								<span class="badge bg-label-danger me-1">
								Deactive
							@break
							@case('1')
								<span class="badge bg-label-success me-1">
								Active
							@break
							@endswitch
							</span>
						</td>
						<td>
							<div class="d-inline-block text-nowrap">
								@can('update')
								<a href="{{ route('admin-show-course',$value->id) }}" class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></a>
								@endcan
								@can('delete')
								<a href="{{ route('admin-delete-course',$value->id) }}" onclick="return confirm('Are you sure?')"; class="btn btn-sm btn-icon delete-record">
									<i class="bx bx-trash"></i>
								</a>
								@endcan
							</div>
						</td>
					</tr>
					@endforeach		
				</tbody>
				</table>
			</div>
		</div>
		<!--/ Striped Rows -->
	@endif
</div>
@endsection
@section('script')
<!-- ============================================================== -->
<!-- CHARTS -->
@endsection