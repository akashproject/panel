@extends('layouts.main')
@section('content')
    <div class="row">
    <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
            <li class="nav-item">
                <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile') }}"
                ><i class="bx bx-bell me-1"></i> Bio </a
                >
            </li>
        </ul>
        <div class="card mb-4">
            <h5 class="card-header">Profile Details</h5>
            <form id="formAccountSettings" method="POST" action="{{ route('save-account') }}" enctype="multipart/form-data" >
                @csrf
                <!-- Account -->
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img
                        src="{{ url('/public/'.$loggedInUser->avator) }}"
                        alt="user-avatar"
                        class="d-block rounded"
                        height="100"
                        width="100"
                        id="uploadedAvatar"
                    />
                    <div class="button-wrapper">
                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                        <span class="d-none d-sm-block">Upload new photo</span>
                        <i class="bx bx-upload d-block d-sm-none"></i>
                        <input
                            type="file"
                            id="upload"
                            class="account-file-input"
                            name="avator"
                            hidden
                            accept="image/png, image/jpeg"
                        />
                        </label>
                        <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                    </div>
                    </div>
                </div>
                <hr class="my-0" />
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                        <label for="firstName" class="form-label">Name</label>
                        <input
                            class="form-control"
                            type="text"
                            id="firstName"
                            value="{{$loggedInUser->name}}"
                            name="firstName"
                            value="John"
                            autofocus
                        />
                        </div>
                        
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input
                                class="form-control"
                                type="text"
                                value="{{$loggedInUser->email}}"
                                id="email"
                                name="email"
                                value="john.doe@example.com"
                                placeholder="john.doe@example.com"
                            />
                        </div>
                        
                        <div class="mb-3 col-md-6">
                        <label class="form-label" for="phoneNumber">Phone Number</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text">IN (+91)</span>
                            <input
                            type="text"
                            id="phoneNumber"
                            name="phoneNumber"
                            value="{{$loggedInUser->mobile}}"
                            class="form-control"
                            placeholder="202 555 0111"
                            />
                        </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Save changes</button>
                        <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                    </div>
                </div>
                <!-- /Account -->
            </form>
        </div>
        <!-- <div class="card">
            <h5 class="card-header">Delete Account</h5>
            <div class="card-body">
                <div class="mb-3 col-12 mb-0">
                <div class="alert alert-warning">
                    <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
                    <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                </div>
                </div>
                <form id="formAccountDeactivation" onsubmit="return false">
                <div class="form-check mb-3">
                    <input
                    class="form-check-input"
                    type="checkbox"
                    name="accountActivation"
                    id="accountActivation"
                    />
                    <label class="form-check-label" for="accountActivation"
                    >I confirm my account deactivation</label
                    >
                </div>
                <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
                </form>
            </div>
        </div> -->
    </div>
    </div>
@endsection