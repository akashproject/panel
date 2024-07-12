@extends('administrator.layouts.admin')
@section('content')
<div class="col-12">
	@if($referearns)
		<div class="card">
			<div class="card-header d-flex flex-wrap justify-content-between gap-3">
				<div class="card-title mb-0 me-1">
					<h5 class="mb-1"> {{ count($referearns) }} Records found</h5>
				</div>
				
			</div>
			<div class="table-responsive text-nowrap">
				<table class="datatables-referearns table">
				<thead class="table-light">
					<tr>
						<th>Order ID</th>
						<th>Coupon Code</th>
						<th>Refer By</th>
						<th>Customer Name</th>
						<th>Discount</th>
						<th>Commission</th>
						<th></th>
					</tr>
				</thead>
				<tbody class="table-border-bottom-0">
					@foreach ($referearns as $value)
					<tr>
						<td> <a target="_blank" href="{{ route('admin-show-order',$value->order_id) }} " > {{ $value->order_no }} </a> </td>													
						<td>{{ $value->code }}</td>
						<td>{{ $value->refer_by }}</td>
						<td>{{ $value->refer_to }}</td>
						<td>{{ $value->discount }}</td>
						<td>{{ $value->commission }}</td>
						
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



