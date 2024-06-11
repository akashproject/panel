@extends('layouts.main')
@section('content')
<div class="col-xxl">
    @if($loggedInUser->is_approved == "1")
    <form class="form-horizontal" method="post" action="{{ route('save-batch') }}" enctype="multipart/form-data">
        @csrf
        <div class="app-ecommerce">
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
            <!-- Add Product -->
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                <div class="d-flex flex-column justify-content-center">
                    <h4 class="mb-1 mt-3">Add a new Batch</h4>
                    <p class="text-muted">Orders placed across your store</p>
                </div>
                <div class="d-flex align-content-center flex-wrap gap-3">
                    <button type="submit" class="btn btn-primary">Publish Batch</button>
                    <input type="hidden" name="batch_id" id="batch_id" value="" >
                </div>
            </div>

            <div class="row">
                <!-- First column-->
                <div class="col-12 col-lg-8">
                    <!-- Product Information -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="name">Select Course</label>
                                <select type="text" class="form-control" id="course_id" name="course_id">
                                    <option value="" > Select Your Course </option> 
                                    @foreach($courses as $course)
                                        <option value="{{$course->id}}" > {{$course->name}} </option> 
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /Product Information -->
                </div>
                <!-- /Second column -->

                <!-- Second column -->
                <div class="col-12 col-lg-4" data-select2-id="17">
                    <!-- Pricing Card -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Pricing</h5>
                        </div>
                        <div class="card-body">
                            <!-- Discounted Price -->
                            <div class="mb-3">
                                <label class="form-label" for="teacher_fee">Batch Fees</label>
                                <input type="number" class="form-control" id="teacher_fee" placeholder="Enter Batch fees" name="teacher_fee" >
                            </div>
                            
                        </div>
                    </div>
                    <!-- /Pricing Card -->
                    
                </div>
                <!-- /Second column -->
            </div>

            <div class="card mb-4">
                <h5 class="card-header"> Select Slot for session </h5>
                <div class="card-body">
                    <div class="row">
                        @foreach($slots as $value)
                        <div class="col-md-3">
                            <input class="slot_select" type="radio" id="slots_{{$value->id}}" name="slot" value="{{ $value->id }}" style="visibility: hidden;" {{ in_array($value->id, json_decode(isset($teacherSlot->slots)?$teacherSlot->slots:'[]'))?'checked':'' }}>	
                            <label for="slots_{{$value->id}}" class="card slot_select_label shadow-none bg-white mb-2 @if(in_array($value->id, json_decode(isset($teacherSlot->slots)?$teacherSlot->slots:'[]')) && isset($teacherSlot->status) && $teacherSlot->status == '1') active @endif" >
                                <div class="card-body">
                                    <div class="row" >
                                        
                                        <h5 class="card-title  mb-0">{{ $value->day }} </h5>
                                        <p class="card-text">{{ $value->start_time }} - {{ $value->end_time }}</p>
                                        <h6 class=mb-0> {{ $value->max }} Slot Available</h6>
                                    </div>
                                </div>
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </form>
    @else
    <div class="card p-0 mb-4">
        <div class="card-body d-flex flex-column flex-md-row justify-content-between p-0 pt-4">
            <div class="app-academy-md-50 card-body d-flex align-items-md-center flex-column text-md-center">
                <h3 class="card-title mb-4 lh-sm px-md-5 text-center">
                Sorry !, You Account is not activated yet.
                </h3>
                <p class="mb-4">
                    Please fill up the information of your profile to complete your account
                </p>
                <a href="{{ route('profile' )}}" class="btn btn-primary"><i class="bx bx-user"></i> Complete Profile </a>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection