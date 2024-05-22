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
		<div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
			@foreach($schedules as $value)
			<div class="col">
				<div class="card shadow-none bg-transparent border border-success mb-3">
					<div class="card-body">
						<div class="row" >
							<h5 class="card-title  mb-0">{{ $value->day }}  </h5>
							<p class="card-text">{{ $value->start_time }} - {{ $value->end_time }}</p>
						</div>
							
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