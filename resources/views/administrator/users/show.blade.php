@extends('administrator.layouts.admin')
@section('content')
<!-- Basic Layout & Basic with Icons -->
<div class="row">
    <!-- Basic with Icons -->
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
    <div class="col-xxl">
        <div class="nav-align-top mb-4">
            <ul class="nav nav-pills flex-column flex-md-row mb-3" role="tablist">
                <li class="nav-item">
                    <button
                        type="button"
                        class="nav-link active"
                        role="tab"
                        data-bs-toggle="tab"
                        data-bs-target="#navs-pills-justified-home"
                        aria-controls="navs-pills-justified-home"
                        aria-selected="true"
                    >
                        <i class="tf-icons bx bx-home"></i> Edit General Settings
                    </button>
                </li>
                <li class="nav-item">
                    <button
                        type="button"
                        class="nav-link"
                        role="tab"
                        data-bs-toggle="tab"
                        data-bs-target="#navs-pills-justified-profile"
                        aria-controls="navs-pills-justified-profile"
                        aria-selected="false"
                    >
                        <i class="tf-icons bx bx-user"></i> Edit Profile Info
                    </button>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="navs-pills-justified-home" role="tabpanel">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Update User information</h5>
                    </div>
                    <form method="post" action="{{ route('admin-save-user') }}" enctype="multipart/form-data" >
                        @csrf
                        <div class="card-body">
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                @php 
                                    $url = ($user->avator)?url('/public/'.$user->avator):'assets/administrator/img/avatars/user.png'
                                @endphp
                                <img
                                    src="{{ $url }}"
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
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Name</label>
                                <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"
                                    ><i class="bx bx-user"></i
                                    ></span>
                                    <input
                                    type="text"
                                    name="name"
                                    value="{{ $user->name }}"
                                    class="form-control"
                                    id="basic-icon-default-fullname"
                                    placeholder="John Doe"
                                    aria-label="John Doe"
                                    aria-describedby="basic-icon-default-fullname2"
                                    />
                                </div>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Email</label>
                                <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                    <input
                                    type="text"
                                    name="email"
                                    value="{{ $user->email }}"
                                    id="basic-icon-default-email"
                                    class="form-control"
                                    placeholder="john.doe"
                                    aria-label="john.doe"
                                    aria-describedby="basic-icon-default-email2"
                                    />
                                </div>
                                <div class="form-text">You can use letters, numbers & periods</div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 form-label" for="basic-icon-default-phone">Phone No</label>
                                <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-phone2" class="input-group-text"
                                    ><i class="bx bx-phone"></i
                                    ></span>
                                    <input
                                    type="text"
                                    name="mobile"
                                    value="{{ $user->mobile }}"
                                    id="basic-icon-default-phone"
                                    class="form-control phone-mask"
                                    placeholder="658 799 8941"
                                    aria-label="658 799 8941"
                                    aria-describedby="basic-icon-default-phone2"
                                    />
                                </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 form-label" for="basic-icon-default-phone">Status</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="status">
                                        <option selected>Select Status</option>
                                        <option value="1" {{($user->status == 1)? 'selected':'' }}>Enable</option>
                                        <option value="0" {{($user->status == 0)? 'selected':'' }}>Disable</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update Record</button>
                                <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}" >
                                </div>
                            </div>
                            
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="navs-pills-justified-profile" role="tabpanel">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Update User information</h5>
                    </div>
                    <form id="formProfileSettings" method="POST"  action="{{ route('admin-save-profile') }}" >
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-md-3">
                                <label for="language" class="form-label">Language</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    id="language"
                                    name="language"
                                    value="{{ (isset($user_meta['language']))?$user_meta['language']:'' }}"
                                    placeholder="Enter Your Spoken Language"
                                    autofocus
                                    required
                                />
                                </div>
                                
                                <div class="mb-3 col-md-3">
                                    <label for="sebi_id" class="form-label">SEBI Registration ID</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="sebi_id"
                                        name="sebi_id"
                                        value="{{ (isset($user_meta['sebi_id']))?$user_meta['sebi_id']:'' }}"
                                        placeholder="Enter Your SEBI Registration ID"
                                        required
                                    />
                                </div>

                                <div class="mb-3 col-md-3">
                                    <label for="experience" class="form-label">Years of Experience</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        value="{{ (isset($user_meta['experience']))?$user_meta['experience']:'' }}"
                                        id="experience"
                                        name="experience"
                                        placeholder="Enter Your Years of Experience"
                                        required
                                    />
                                </div>
                                
                                <div class="mb-3 col-md-3">
                                    <label class="form-label" for="expertise">Expertise</label>
                                    <div class="input-group input-group-merge">
                                        <select
                                        type="text"
                                        id="expertise"
                                        name="expertise"
                                        class="form-control"
                                        required
                                        >
                                        <option value=""> Select Option </option>
                                        <option value="Index Option" {{ (isset($user_meta["expertise"]) && $user_meta["expertise"] == 'Index Option')?"selected":"" }}> Index Option </option>
                                        <option value="Equity Option" {{ (isset($user_meta["expertise"]) && $user_meta["expertise"] == 'Equity Option')?"selected":"" }}> Equity Option </option>
                                        <option value="Commodity" {{ (isset($user_meta["expertise"]) && $user_meta["expertise"] == 'Commodity')?"selected":"" }}> Commodity </option>
                                        <option value="Forex" {{ (isset($user_meta["expertise"]) && $user_meta["expertise"] == 'Forex')?"selected":"" }}> Forex </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label for="about_me" class="form-label">About Me</label>
                                    <textarea
                                        class="form-control editor"
                                        id="about_me"
                                        name="about_me"
                                    >
                                    {{ (isset($user_meta['about_me']))?$user_meta['about_me']:'' }}
                                    </textarea>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <input type="hidden" name="user_id" value="{{ $user->id }}" >
                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection