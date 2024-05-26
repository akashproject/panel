@extends('administrator.layouts.admin')
@section('content')
<div class="col-12">
	@if($users)
			<!-- Striped Rows -->
			<div class="card">
                <h5 class="card-header"> {{ count($users) }} Records found</h5>
                <div class="table-responsive text-nowrap">
                  <table class="datatables-users table">
                    <thead class="table-light">
						<tr>
							<th>Name</th>
							<th>Mobile</th>
							<th>Role</th>
							<th>Is Approved</th>
							<th>Status</th>
							<th>Actions</th>
						</tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
						@foreach ($users as $value)
						<tr>
							<td>
								<div class="d-flex justify-content-start align-items-center user-name">
									<div class="avatar-wrapper">
										<div class="avatar me-2">
											<span class="avatar-initial rounded-circle bg-label-primary">AB</span>
										</div>
									</div>
									<div class="d-flex flex-column">
										<span class="emp_name text-truncate">{{ $value->name }}</span>
										<small class="emp_post text-truncate text-muted">{{ $value->email }}</small>
									</div>
								</div>
								
							</td>													
							<td>{{ $value->mobile }}</td>
							<td></td>
							<td>
								@switch($value->is_approved)
								@case('0')
									<span class="badge bg-label-danger me-1">
									Unapproved
								@break
								@case('1')
									<span class="badge bg-label-success me-1">
									Approved
								@break
								@endswitch
								</span>
							</td>
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
								<a href="{{ route('admin-user',$value->id) }}" class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></a>
								@can('delete')
								<a href="{{ route('admin-delete-user',$value->id) }}" onclick="return confirm('Are you sure?')"; class="btn btn-sm btn-icon delete-record"><i class="bx bx-trash"></i></a>
								@endcan
								<button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
									<i class="bx bx-dots-vertical-rounded me-2"></i>
								</button>
								<div class="dropdown-menu dropdown-menu-end m-0">
									@if($value->is_approved == 0)
									<a class="dropdown-item" href="{{ route('admin-approve-user',$value->id) }}"
									onclick="return confirm('Are you sure?')"; ><i class="bx bx-check-circle me-1"></i> Approve</a
									>
									@else
									<a class="dropdown-item" href="{{ route('admin-user',$value->id) }}"
										><i class='bx bxs-x-circle me-1'></i> Unapprove {{ $value->role }}</a>
									@endif
									@if(in_array('teacher',  json_decode($value->getRoleNames())))
									<a class="dropdown-item" href="{{ route('admin-teacher-slots',$value->id) }}"
										><i class='bx bx-calendar-event me-1' ></i> Slots</a
									>
									@endif
									@role('super-admin')
									<a class="dropdown-item" href="{{ route('assign-role.index',$value->id) }}"
										><i class="bx bx-lock-open me-1"></i> Role</a
									>
									@endrole
								</div>
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