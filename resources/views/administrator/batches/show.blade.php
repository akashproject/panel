@extends('administrator.layouts.admin')
@section('content')
<div class="card">
	<div class="card-header d-flex flex-wrap justify-content-between gap-3">
		<div class="card-title mb-0 me-1">
			<h5 class="mb-1">View Course</h5>
		</div>
		<div class="d-flex justify-content-md-end align-items-center gap-3 flex-wrap">
			<div class="position-relative">
				<h3 style="font-weight:bold" > Total Price : ₹{{$batch->price+(int)get_theme_setting('commission_amount')}}/- </h3>
			</div>
		</div>
	</div>
	<div class="card-body">
		<form method="post" action="{{ route('admin-save-batch') }}" enctype="multipart/form-data" >
			@csrf
			<div class="row">
				<div class="col-md-8" >
					<div class="mb-2 row">
						<label for="name" class="col-sm-3 text-right control-label col-form-label">Course</label>
						<div class="col-sm-9">
							{{ $batch->course}}
						</div>
					</div>
					<div class="mb-2 row">
						<label for="name" class="col-sm-3 text-right control-label col-form-label">Teacher</label>
						<div class="col-sm-9">
							{{ $batch->teacher}}
						</div>
					</div>
					<div class="mb-2 row">
						<label for="name" class="col-sm-3 text-right control-label col-form-label">Price</label>
						<div class="col-sm-9">
							₹{{ $batch->price}}/-
						</div>
					</div>
					<div class="mb-2 row">
						<label for="name" class="col-sm-3 text-right control-label col-form-label">Session Slot</label>
						<div class="col-sm-9">
							{{$batch->day}}, {{$batch->start_time}} - {{$batch->end_time}}
						</div>
					</div>
					<div class="mb-2 row">
						<label for="name" class="col-sm-3 text-right control-label col-form-label">Status</label>
						<div class="col-sm-8">
							@switch($batch->status)
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
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-sm-3 form-label" for="basic-icon-default-phone">Status</label>
						<div class="col-sm-9">
							<select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="status">
								<option selected>Select Status</option>
								<option value="1" {{($batch->status == 1)? 'selected':'' }}>Enable</option>
								<option value="0" {{($batch->status == 0)? 'selected':'' }}>Disable</option>
							</select>
						</div>
					</div>
					<div class="row justify-content-end">
						<div class="col-sm-9">
							<button type="submit" class="btn btn-primary">Update Record</button>
							<input type="hidden" name="batch_id" id="batch_id" value="{{ $batch->id }}" >
						</div>
					</div>
				</div>                   
			</div>                   
		</form>                   
	</div>                   
</div>                   
@endsection
@section('script')
@endsection