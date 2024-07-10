@extends('administrator.layouts.admin')
@section('content')
<div class="col-12">
	@if($referrers)
		<div class="card">
			<div class="card-header d-flex flex-wrap justify-content-between gap-3">
				<div class="card-title mb-0 me-1">
					<h5 class="mb-1"> {{ count($referrers) }} Records found</h5>
				</div>
				<div class="d-flex justify-content-md-end align-items-center gap-3 flex-wrap">
					<div class="position-relative">
						<a href="{{ route('admin-add-referrer') }}" class="btn btn-secondary add-new btn-primary" tabindex="0">
							<span>
								<i class="bx bx-plus me-0 me-sm-1"></i>
								<span class="d-none d-sm-inline-block">Add Referrer</span>
							</span>
						</a>
					</div>
				</div>
			</div>
			<div class="table-responsive text-nowrap">
				<table class="datatables-referrers table">
				<thead class="table-light">
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Mobile No.</th>
						<th>Code</th>
						<th>Discount</th>
						<th>Commission</th>
						<th>status</th>
						<th></th>
					</tr>
				</thead>
				<tbody class="table-border-bottom-0">
					@foreach ($referrers as $value)
					<tr>
						<td>{{ $value->name }}</td>													
						<td>{{ $value->email }}</td>
						<td>{{ $value->mobile }}</td>
						<td>{{ $value->code }}</td>
						<td>{{ $value->discount }}</td>
						<td>{{ $value->commission }}</td>
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
								<a href="{{ route('admin-show-refferer',$value->id) }}" class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></a>
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



