@extends('administrator.layouts.admin')
@section('content')
<div class="col-12">
	@if($courses)
		<div class="card">
			<div class="card-header d-flex flex-wrap justify-content-between gap-3">
				<div class="card-title mb-0 me-1">
					<h5 class="mb-1"> {{ count($courses) }} Records found</h5>
				</div>
				<div class="d-flex justify-content-md-end align-items-center gap-3 flex-wrap">
					<div class="position-relative">
						<a href="{{ route('admin-add-course') }}" class="btn btn-secondary add-new btn-primary" tabindex="0">
							<span>
								<i class="bx bx-plus me-0 me-sm-1"></i>
								<span class="d-none d-sm-inline-block">Add New Course</span>
							</span>
						</a>
					</div>
				</div>
			</div>
			<div class="table-responsive text-nowrap">
				<table class="datatables-courses table">
				<thead class="table-light">
					<tr>
						<th>Name</th>
						<th>Excerpt</th>
						<th>Max Price</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody class="table-border-bottom-0">
					@foreach ($courses as $value)
					<tr>
						<td> {{ $value->name }} </td>													
						<td>{{ $value->excerpt }}</td>
						<td>{{ $value->max_price }}</td>
						
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
@endsection



