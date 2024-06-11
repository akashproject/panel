@extends('layouts.main')
@section('content')
<div class="col-xxl">
    @if($loggedInUser->is_approved == "1")
    <div class="card mb-4">
            <div class="card-header d-flex flex-wrap justify-content-between gap-3">
                <div class="card-title mb-0 me-1">
                    <h5 class="mb-1">All Session</h5>
                    <p class="text-muted mb-0">Total {{ count($batches) }} session you have created</p>
                </div>
            </div>
            <div class="card-body">
                <div class="row gy-4 mb-4">
                    @foreach ($batches as $value)
                    <div class="col-sm-6 col-lg-4">
                        <div class="card p-2 h-100 shadow-none border">
                            <div class="rounded-2 text-center mb-3">
                                <a href="javascript:void(0)">
                                    <img class="img-fluid" src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/pages/app-academy-tutor-2.png" alt="tutor image 1">
                                </a>
                            </div>
                            <div class="card-body p-3 pt-2">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="d-flex align-items-center justify-content-center gap-1 mb-0">
                                        4.4 <span class="text-warning"><i class="bx bxs-star me-1"></i></span><span class="text-muted">(1.23k)</span>
                                    </h6>
                                </div>
                                <a href="javascript:void(0)" class="h5 mb-2" style="display: block;">{{ $value->name }}</a>
                                <p class="d-flex align-items-center"><i class="bx bx-time-five me-2"></i>Timing : {{ $value->start_time }} - {{ $value->end_time }}</p>
                                <div class="row mb-3 g-3">
                                    <div class="col-6">
                                        <div class="d-flex">
                                        <div class="avatar flex-shrink-0 me-2">
                                            <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-time-five bx-sm"></i></span>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-nowrap">{{ $value->day }}</h6>
                                            <small>Day</small>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex">
                                            <div class="avatar flex-shrink-0 me-2">
                                                <span class="avatar-initial rounded bg-label-primary">
                                                    <i class="bx bx-rupee bx-sm"></i>
                                                </span>
                                            </div>
                                            <div>
                                                <h6 class="mb-0 text-nowrap"><strong>{{ $value->teacher_fee }}/-</strong></h6>
                                                <small>Price</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    @endforeach		
                </div>
                
            </div>
        </div>
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
                    <a href="{{ route('profile')}}" class="btn btn-primary"><i class="bx bx-user"></i> Complete Profile </a>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection