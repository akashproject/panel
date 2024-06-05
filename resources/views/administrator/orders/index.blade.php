@extends('administrator.layouts.admin')
@section('content')
<div class="card mb-4">
  <div class="card-widget-separator-wrapper">
    <div class="card-body card-widget-separator">
      <div class="row gy-4 gy-sm-1">
        <div class="col-sm-6 col-lg-3">
          <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
            <div>
              <h3 class="mb-2">56</h3>
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
              <h3 class="mb-2">12,689</h3>
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
              <h3 class="mb-2">124</h3>
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
              <h3 class="mb-2">32</h3>
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
			<h5 class="mb-1"> 11 Records found</h5>
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
					<th>Date</th>
					<th>Customer</th>
					<th>Payment</th>
					<th>Status</th>
					<th>View</th>
				</tr>
			</thead>
			<tbody class="table-border-bottom-0">
				
				<tr>
					<td><a href="app-ecommerce-order-details.html"><span class="fw-medium">#6979</span></a></td>
					<td> <span class="text-nowrap">Apr 15, 2023, 10:21</span> </td>
					<td>
						<div class="d-flex justify-content-start align-items-center user-name">
							<div class="avatar-wrapper">
								<div class="avatar me-2">
									<span class="avatar-initial rounded-circle bg-label-primary">AB</span>
								</div>
							</div>
							<div class="d-flex flex-column">
								<span class="emp_name text-truncate">Akash Dutta</span>
								<small class="emp_post text-truncate text-muted">akashduttaphp@gmaail.com</small>
							</div>
						</div>
						
					</td>					
					<td><h6 class="mb-0 w-px-100 text-warning"><i class="bx bxs-circle fs-tiny me-2"></i>Pending</h6></td>
					<td>
						<span class="badge px-2 bg-label-success" text-capitalized="">Success</span>
					</td>
					<td>
						<a href="{{ route('admin-show-order',1) }}" class="btn btn-sm btn-icon"><i class="bx bx-show-alt"></i></a>
					</td>
				</tr>
				
			</tbody>
		</table>
	</div>
	<!-- @endif -->
</div>
<!--/ Striped Rows -->
                   
@endsection
@section('script')
@endsection



