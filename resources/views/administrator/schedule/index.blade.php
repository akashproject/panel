@extends('administrator.layouts.admin')
@section('content')
	<div class="row mb-2 ">
		<div class="col-md-12">
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createSchedule">
				<span class="tf-icons bx bx-calendar"></span> Create Schedule
			</button>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="createSchedule" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form class="" method="post" action="{{ route('admin-save-schedule') }}" enctype="multipart/form-data">
					<div class="modal-header">
						<h3 class="modal-title" id="exampleModalLabel1">Create Schedule</h3>
						<button
							type="button"
							class="btn-close"
							data-bs-dismiss="modal"
							aria-label="Close"
						></button>
						</div>
						<div class="modal-body">
						
							@csrf
							<div class="row">
								<div class="col mb-3">
								<label for="day" class="form-label">Select Day</label>
								<select class="form-select" id="day" name="day" aria-label="Default select example">
									<option value="">Select Day</option>
									<option value="Sunday">Sunday</option>
									<option value="Monday">Monday</option>
									<option value="Tuesday">Tuesday</option>
									<option value="Wednesday">Wednesday</option>
									<option value="Thusday">Thusday</option>
									<option value="Friday">Friday</option>
									<option value="Saturday">Saturday</option>
								</select>
								</div>
							</div>
							<div class="row g-2">
								<div class="col mb-0">
									<label for="start_time" class="form-label">Start Time</label>
									<input type="time" id="start_time"  value="00:00:00" name="start_time" class="form-control" placeholder="xxxx@xxx.xx" />
								</div>
								<div class="col mb-0">
									<label for="end_time" class="form-label"> End Time</label>
									<input type="time" id="end_time" value="00:00:00" name="end_time" class="form-control" placeholder="DD / MM / YY" />
								</div>
							</div>
							<input type="hidden" name="schedule_id" id="schedule_id" value="" >
						
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
	<div class="row mb-2" >
		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		@if(session()->has('message'))
			<div class="alert alert-success" role="alert">{{ session()->get('message') }}</div>
		@endif
	</div>
	@if(count($schedules) > 0)
		<div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
			@foreach($schedules as $value)
			<div class="col">
				<div class="card shadow-none bg-transparent border border-success mb-3">
					<div class="card-body">
						<div class="row" >
							<div class="col-10 text-center"> 
								<h5 class="card-title  mb-0">{{ $value->day }}  </h5>
								<p class="card-text">{{ $value->start_time }} - {{ $value->end_time }}</p>
							</div>
							<div class="col-2"> 
								<div class="dropdown">
									<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
									<div class="dropdown-menu">
										<a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editSchedule_{{ $value->id }}" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
										<a class="dropdown-item" onclick="return confirm('Are you sure?')"; href="{{ route('admin-delete-schedule',$value->id) }}"><i class="bx bx-trash me-1"></i> Delete</a>
									</div>
								</div>
							</div>
						</div>
							
					</div>
				</div>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="editSchedule_{{ $value->id }}" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<form class="" method="post" action="{{ route('admin-save-schedule') }}" enctype="multipart/form-data">
							<div class="modal-header">
								<h3 class="modal-title" id="exampleModalLabel1">Update Schedule</h3>
								<button
									type="button"
									class="btn-close"
									data-bs-dismiss="modal"
									aria-label="Close"
								></button>
								</div>
								<div class="modal-body">
								
									@csrf
									<div class="row">
										<div class="col mb-3">
										<label for="day" class="form-label">Select Day</label>
										<select class="form-select" id="day" name="day" aria-label="Default select example">
											<option value="">Select Day</option>
											<option value="Sunday" {{ ($value->day == 'Sunday')?'selected':''; }}>Sunday</option>
											<option value="Monday" {{ ($value->day == 'Monday')?'selected':''; }} >Monday</option>
											<option value="Tuesday" {{ ($value->day == 'Tuesday')?'selected':''; }} >Tuesday</option>
											<option value="Wednesday" {{ ($value->day == 'Wednesday')?'selected':''; }}>Wednesday</option>
											<option value="Thusday" {{ ($value->day == 'Thusday')?'selected':''; }}>Thusday</option>
											<option value="Friday" {{ ($value->day == 'Friday')?'selected':''; }}>Friday</option>
											<option value="Saturday" {{ ($value->day == 'Saturday')?'selected':''; }}>Saturday</option>
										</select>
										</div>
									</div>
									<div class="row g-2">
										<div class="col mb-0">
											<label for="start_time" class="form-label">Start Time</label>
											<input type="time" id="start_time"  value="{{$value->start_time}}" name="start_time" class="form-control" placeholder="DD / MM / YY" />
										</div>
										<div class="col mb-0">
											<label for="end_time" class="form-label"> End Time</label>
											<input type="time" id="end_time" value="{{$value->end_time}}" name="end_time" class="form-control" placeholder="DD / MM / YY" />
										</div>
									</div>
									<input type="hidden" name="schedule_id" id="schedule_id" value="{{$value->id}}" >
								
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
			@endforeach
		</div>
	@else
		<div class="alert alert-dark mb-0" role="alert">
			No Records found
		</div>
	@endif
</div>
@endsection
@section('script')
<!-- ============================================================== -->
<!-- CHARTS -->
@endsection