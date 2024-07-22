@extends('layouts.main')
@section('content')
<div class="col-xxl">
    @if($loggedInUser->is_approved == "1")
    <div class="row">
        <div class="col-lg-3 col-md-12 col-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <img src="{{ url('assets/administrator/img/icons/unicons/chart-success.png') }}" alt="chart success" class="rounded">
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                            </div>
                        </div>
                    </div>
                    <span class="fw-medium d-block mb-1">Total Customer</span>
                    <h3 class="card-title mb-2">{{ $totalCustomer }}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12 col-3 mb-4">
            <div class="card">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                    <img src="{{ url('assets/administrator/img/icons/unicons/wallet-info.png') }}" alt="Credit Card" class="rounded">
                </div>
                <div class="dropdown">
                    <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                    </div>
                </div>
                </div>
                <span>Total Earning</span>
                <h3 class="card-title text-nowrap mb-1"> ₹{{ $earning }}/-</h3>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12 col-3 mb-4">
            <div class="card">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                    <img src="{{ url('assets/administrator/img/icons/unicons/wallet-info.png') }}" alt="Credit Card" class="rounded">
                </div>
                <div class="dropdown">
                    <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                    </div>
                </div>
                </div>
                <span>Total Past Session</span>
                <h3 class="card-title text-nowrap mb-1">{{ $pastedBatches }}</h3>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12 col-3 mb-4">
            <div class="card">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                    <img src="{{ url('assets/administrator/img/icons/unicons/wallet-info.png') }}" alt="Credit Card" class="rounded">
                </div>
                <div class="dropdown">
                    <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                    </div>
                </div>
                </div>
                <span>Total Upcoming Session</span>
                <h3 class="card-title text-nowrap mb-1">{{ $upcomingBatches }}</h3>
            </div>
            </div>
        </div>
    </div>
    <!-- Striped Rows -->
    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-between gap-3">
            <div class="card-title mb-0 me-1">
                <h5 class="mb-1"> {{ count($reports) }} Records found</h5>
            </div>
        </div>
        <div class="card-body px-3">
            <div class="table-responsive text-nowrap">
                <table id="zero_config"  class="datatables-users table">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Course</th>
                            <th>Customer</th>
                            <th>Session Day</th>
                            <th>Session Start Time</th>
                            <th>Session End Time</th>
                            <th>Your Fee</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($reports as $order)
                        <tr>
                            <td><a href=""><span class="fw-medium">#{{$order->order_no}}</span></a></td>
                            <td> {{ $order->course }} </td>
                            <td>
                                <div class="d-flex justify-content-start align-items-center user-name">
                                    <div class="d-flex flex-column">
                                        <span class="emp_name text-truncate">{{$order->name}}</span>
                                    </div>
                                </div>
                            </td>	
                            <td> {{ $order->day }} </td>
                            <td> {{ $order->start_time }} </td>
                            <td> {{ $order->end_time }} </td>
                            <td> {{ $order->teacher_fee }} </td>	
                            <td> <span class="text-nowrap">{{ date('M d, Y h:i',strtotime($order->created_at)) }}</span> </td>	
                           	
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/ Striped Rows -->
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
                    <p class="mt-4">
                        <strong > NOTE </strong> : If you've complete your profile information. Please wait for admin approval <a href="mailto:support@baazar.live" > Contact Us</a>
                    </p>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection