@extends('administrator.layouts.admin')
@section('content')
	<div class="row mb-2 ">
		<div class="col-md-12">
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
				<span class="tf-icons bx bx-calendar"></span> Create Schedule
			</button>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
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
									<option selected>Select Day</option>
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
									<input type="time" id="start_time" name="start_time" class="form-control" placeholder="xxxx@xxx.xx" />
								</div>
								<div class="col mb-0">
									<label for="end_time" class="form-label"> End Time</label>
									<input type="time" id="end_time" name="end_time" class="form-control" placeholder="DD / MM / YY" />
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
	@if($schedules)
		<div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
			@foreach($schedules as $schedule)
			<div class="col">
				<div class="card shadow-none bg-transparent border border-success mb-3">
				<!-- <img class="card-img-top" src="{{ url('assets/administrator/img/elements/2.jpg') }}" alt="Card image cap" /> -->
				<div class="card-body">
					<h5 class="card-title">{{ $schedule->day }}, {{ $schedule->start_time }} - {{ $schedule->end_time }} </h5>
				</div>
				</div>
			</div>
			@endforeach
		</div>
	@endif
@endsection
@section('script')
<!-- ============================================================== -->
<!-- CHARTS -->
@endsection