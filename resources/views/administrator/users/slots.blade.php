@extends('administrator.layouts.admin')
@section('content')
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

	@if($schedules)
		<div class="row row-cols-1 row-cols-md-3 g-4 mb-3">
			@foreach($schedules as $value)
			<div class="col-md-3">
				<label for="slots_{{$value->id}}" class="card shadow-none bg-white mb-2">
					<input type="checkbox" id="slots_{{$value->id}}" name="slots[]" value="{{ $value->id }}" style="visibility: hidden;">	
					<div class="card-body">
						<div class="row" >
							<h5 class="card-title  mb-0">{{ $value->day }}  </h5>
							<p class="card-text">{{ $value->start_time }} - {{ $value->end_time }}</p>
						</div>
					</div>
				</label>
			</div>
			@endforeach
		</div>
	@endif
@endsection
@section('script')
<!-- ============================================================== -->
<!-- CHARTS -->
@endsection