@extends('administrator.layouts.admin')
@section('content')
<div class="col-12">
	<div class="card">
		<form class="form-horizontal" method="post" action="{{ route('admin-save-course') }}" enctype="multipart/form-data">
			@csrf
			<div class="card-body">
				<h4 class="card-title"> Show Course : {{$course->name}}</h4>
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
					<div class="alert alert-success">
						{{ session()->get('message') }}
					</div>
				@endif
				<div class="row">
					<div class="col-md-8" >
						<div class="mb-3 row">
							<label for="name" class="col-md-3 col-form-label">Course Name</label>
							<div class="col-md-9">
								<input name="name" class="form-control" type="text" value="{{$course->name}}" id="name" >
							</div>
						</div>
						<div class="mb-3 row">
							<label for="description" class="col-sm-3 text-right control-label col-form-label">Description</label>
							<div class="col-sm-9">
								<textarea class="form-control editor" name="description"  id="description" placeholder="Enter description Here" >{{$course->description}}</textarea>
							</div>
						</div>
						<div class="mb-3 row">
							<label for="excerpt" class="col-sm-3 text-right control-label col-form-label">Short Description</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="excerpt" id="excerpt" placeholder="Enter excerpt Here" >{{$course->excerpt}}</textarea>
							</div>
						</div>
						<div class="form-group row">
							<label for="max_price" class="col-sm-3 text-right control-label col-form-label">Max Price</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="max_price" id="max_price" value="{{$course->max_price}}" placeholder="Enter Max Price" >
							</div>
						</div>
						
					</div>

					<div class="col-md-4">
						<div class="mb-4 row">
							<label for="state" class="col-sm-3 text-left control-label col-form-label">Status</label>
							<div class="col-sm-9">
								<select name="status" id="status" class="select2 form-control custom-select" style="width: 100%; height:36px;">	
									<option value="">Update Status</option>
									<option value="1" selected> Publish</option>
									<option value="0" > Private </option>
								<select>
							</div>
						</div>
					</div>
				</div>
				<h4 class="card-title my-4"> SEO Content </h4>
				<div class="row">
					<div class="col-md-8" >
						<div class="mb-3 row">
							<label for="number_of_rating" class="col-md-3 col-form-label">Number of Rating</label>
							<div class="col-md-9">
								<input name="number_of_rating" class="form-control" type="text" value="{{$course->number_of_rating}}" id="number_of_rating">
							</div>
						</div>
						<div class="mb-3 row">
							<label for="meta_description" class="col-sm-3 text-right control-label col-form-label">Meta Description</label>
							<div class="col-sm-9">
								<textarea class="form-control editor" name="meta_description"  id="meta_description" placeholder="Enter Meta description Here" >{{$course->meta_description}}</textarea>
							</div>
						</div>
						<div class="mb-3 row">
							<label for="schema" class="col-sm-3 text-right control-label col-form-label">schema</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="schema" id="schema" placeholder="Enter schema Here" >{{$course->schema}}</textarea>
							</div>
						</div>
						<div class="mb-3 row">
							<label for="utm_campaign" class="col-sm-3 text-right control-label col-form-label">UTM Campaign</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="utm_campaign" id="utm_campaign" value="{{$course->utm_campaign}}"  placeholder="Enter UTM Campaign" >
							</div>
						</div>
						<div class="mb-3 row">
							<label for="utm_source" class="col-sm-3 text-right control-label col-form-label">UTM Source</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="utm_source" id="utm_source" value="{{$course->utm_source}}" placeholder="Enter UTM Source" >
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="border-top">
				<div class="card-body">
					<button type="submit" class="btn btn-primary">Submit</button>
					<input type="hidden" name="course_id" id="course_id" value="{{$course->id}}" >
				</div>
			</div>
		</form>
	</div>

</div>              



@endsection



@section('script')



<!-- ============================================================== -->



<!-- CHARTS -->



@endsection



