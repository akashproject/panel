@extends('administrator.layouts.admin')
@section('content')
<div class="col-12">
	@if($batches)
		<div class="card">
			<div class="card-header d-flex flex-wrap justify-content-between gap-3">
				<div class="card-title mb-0 me-1">
					<h5 class="mb-1"> {{ count($batches) }} Records found</h5>
				</div>
			</div>
			<div class="table-responsive text-nowrap">
				<table class="datatables-batches table">
				<thead class="table-light">
					<tr>
						<th>Teacher</th>
						<th>Course</th>
						<th>Price</th>
						<th>Discounted Price</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody class="table-border-bottom-0">
					@foreach ($batches as $value)
					<tr>
						<td>{{ $value->teacher }}</td>													
						<td>{{ $value->course }}</td>
						<td>{{ $value->price }}</td>
						<td>{{ $value->discounted }}</td>
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
								<a href="{{ route('admin-show-batch',$value->id) }}" class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></a>
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



