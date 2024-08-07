@extends('administrator.layouts.admin')
@section('content')
<div class="card mb-4">
  <div class="card-widget-separator-wrapper">
    <div class="card-body card-widget-separator">
      <div class="row gy-4 gy-sm-1">
        <div class="col-sm-6 col-lg-3">
          <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
            <div>
              <h3 class="mb-2">{{ $pending }}</h3>
              <p class="mb-0">Pending Payment</p>
            </div>
            <div class="avatar me-sm-4">
              <span class="avatar-initial rounded bg-label-secondary">
                <i class="bx bx-calendar bx-sm"></i>
              </span>
            </div>
          </div>
          <hr class="d-none d-sm-block d-lg-none me-4">
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
            <div>
              <h3 class="mb-2">{{ $completed }}</h3>
              <p class="mb-0">Completed</p>
            </div>
            <div class="avatar me-lg-4">
              <span class="avatar-initial rounded bg-label-secondary">
                <i class="bx bx-check-double bx-sm"></i>
              </span>
            </div>
          </div>
          <hr class="d-none d-sm-block d-lg-none">
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="d-flex justify-content-between align-items-start border-end pb-3 pb-sm-0 card-widget-3">
            <div>
              <h3 class="mb-2">{{ $cancelled }}</h3>
              <p class="mb-0">Refunded</p>
            </div>
            <div class="avatar me-sm-4">
              <span class="avatar-initial rounded bg-label-secondary">
                <i class="bx bx-wallet bx-sm"></i>
              </span>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="d-flex justify-content-between align-items-start">
            <div>
              <h3 class="mb-2">{{ $cancelled }}</h3>
              <p class="mb-0">Failed</p>
            </div>
            <div class="avatar">
              <span class="avatar-initial rounded bg-label-secondary">
                <i class="bx bx-error-alt bx-sm"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Striped Rows -->
<div class="card">
	<div class="card-header d-flex flex-wrap justify-content-between gap-3">
		<div class="card-title mb-0 me-1">
			<h5 class="mb-1"> {{ count($orders) }} Records found</h5>
		</div>
		<div class="d-flex justify-content-md-end align-items-center gap-3 flex-wrap">
			<div class="position-relative">
				<div class="input-group input-group-merge">
					<span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
					<input type="text" class="form-control" placeholder="Search..." aria-label="Search...">
				</div>
			</div>
		</div>
	</div>
	<!-- @if($orders) -->
	<div class="table-responsive text-nowrap">
		<table class="datatables-users table">
			<thead class="table-light">
				<tr>
					<th>ID</th>
          <th>Customer</th>
					<th>Date</th>
					<th>Status</th>
					<th>View</th>
				</tr>
			</thead>
			<tbody class="table-border-bottom-0">
				@foreach($orders as $order)
				<tr>
					<td><a href="{{ route('admin-show-order',$order->id) }}"><span class="fw-medium">#{{$order->order_no}}</span></a></td>
					<td>
						<div class="d-flex justify-content-start align-items-center user-name">
							<div class="d-flex flex-column">
								<span class="emp_name text-truncate">{{$order->name}}</span>
								<small class="emp_post text-truncate text-muted">{{$order->mobile}}</small>
							</div>
						</div>
					</td>		
          <td> <span class="text-nowrap">{{ date('M d, Y h:i',strtotime($order->created_at)) }}</span> </td>			
					<td>
						<span class="badge px-2 bg-label-success">{{ strtoupper($order->status) }}</span>
					</td>
					<td>
						<a href="{{ route('admin-show-order',$order->id) }}" class="btn btn-sm btn-icon"><i class="bx bx-show-alt"></i></a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<!-- @endif -->
</div>
<!--/ Striped Rows -->
                   
@endsection
@section('script')
@endsection



