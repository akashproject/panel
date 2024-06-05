@extends('administrator.layouts.admin')
@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
  <div class="d-flex flex-column justify-content-center">
    <h5 class="mb-1 mt-3">Order #32543 
		<span class="badge bg-label-success me-2 ms-2">Paid</span>
	</h5>
    <p class="text-body">Aug 17, <span id="orderYear">2024</span>, 5:48 (ET)</p>
  </div>
  	<div class="d-flex align-content-center flex-wrap gap-2">
    	<button class="btn btn-danger">Cancel Order</button>
    	<button class="btn btn-danger">Refund</button>
  	</div>
</div>
<div class="row">
	<div class="col-12 col-lg-8">
		<div class="card mb-4">
			<div class="card-header d-flex justify-content-between align-items-center">
				<h5 class="card-title m-0">Batch details</h5>
			</div>
			<div class="table-responsive text-nowrap">
				<table class="datatables-users table">
					<thead class="table-light">
						<tr>
							<th>Batch</th>
							<th>Price</th>
							<th>Qty</th>
							<th>Total</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody class="table-border-bottom-0">
						
						<tr>
							<td>
								<div class="d-flex justify-content-start align-items-center user-name">
									<div class="avatar-wrapper">
										<div class="avatar me-2">
											<span class="avatar-initial rounded-circle bg-label-primary">AB</span>
										</div>
									</div>
									<div class="d-flex flex-column">
										<span class="emp_name text-truncate">Trading Live Session</span>
										<small class="emp_post text-truncate text-muted">Monday : 12:00 PM - 02:00 PM</small>
									</div>
								</div>
								
							</td>	
							<td>
								<span>₹841/-</span>
							</td>
							<td>2</td>
							<td>
								<h6 class="mb-0">₹1682</h6>
							</td>
							<td>
								<button class="btn btn-danger btn-small">Refund</button>
							</td>
						</tr>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-12 col-lg-4">
		<div class="card mb-4">
			<div class="card-header">
				<h6 class="card-title m-0">Customer details</h6>
			</div>
			<div class="card-body">
				<div class="d-flex justify-content-start align-items-center mb-4">
					<div class="avatar-wrapper">
						<div class="avatar me-2">
							<span class="avatar-initial rounded-circle bg-label-primary">AB</span>
						</div>
					</div>
				<div class="d-flex flex-column">
					<a href="app-user-view-account.html" class="text-body text-nowrap">
					<h6 class="mb-0">Shamus Tuttle</h6>
					</a>
					<small class="text-muted">Customer ID: #58909</small></div>
				</div>
				<div class="d-flex justify-content-start align-items-center mb-4">
				<span class="avatar rounded-circle bg-label-success me-2 d-flex align-items-center justify-content-center"><i class="bx bx-cart-alt bx-sm lh-sm"></i></span>
				<h6 class="text-body text-nowrap mb-0">12 Orders</h6>
				</div>
				<div class="d-flex justify-content-between">
				<h6>Contact info</h6>
				</div>
				<p class=" mb-1">Email: Shamus889@yahoo.com</p>
				<p class=" mb-0">Mobile: +1 (609) 972-22-22</p>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<!-- Striped Rows -->
		<div class="card">
			<div class="card-header d-flex flex-wrap justify-content-between gap-3">
				<div class="card-title mb-0 me-1">
					<h5 class="mb-1"> Transactions </h5>
				</div>
			</div>
			<div class="table-responsive text-nowrap">
				<table class="datatables-users table">
					<thead class="table-light">
						<tr>
							<th>ID</th>
							<th>Type</th>
							<th>Card</th>
							<th>Amount</th>
							<th>Date</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody class="table-border-bottom-0">
						<tr>
							<td><a href="app-ecommerce-order-details.html"><span class="fw-medium">#6979</span></a></td>
							<td> Credit Card</td>
							<td>
								<div class="d-flex justify-content-start align-items-center user-name">
									<div class="avatar-wrapper">
										<div class="avatar me-2">
											<span class="avatar-initial rounded-circle bg-label-primary">AB</span>
										</div>
									</div>
									<div class="d-flex flex-column">
										<span class="emp_name text-truncate">Master Card</span>
										<small class="emp_post text-truncate text-muted"> XXXXXXX 2028</small>
									</div>
								</div>
							</td>	
							<td> <span class="text-nowrap">2000</span> </td>				
							<td> <span class="text-nowrap">Apr 15, 2023, 10:21</span> </td>				
							<td>
								<h6 class="mb-0 w-px-100 text-success"><i class="bx bxs-circle fs-tiny me-2"></i>Success</h6>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<!--/ Striped Rows -->
	</div>
</div>
@endsection
@section('script')
@endsection