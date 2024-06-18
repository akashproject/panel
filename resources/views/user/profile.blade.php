@extends('layouts.main')
@section('content')
    <div class="row">
    <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('account') }}"><i class="bx bx-user me-1"></i> Account</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="javascript:void(0)"
            ><i class="bx bx-bell me-1"></i> Bio </a
            >
        </li>
        
        </ul>
        <div class="card mb-4">
        <h5 class="card-header">Profile Details</h5>
        <!-- Account -->
        
        <div class="card-body">
            <form id="formProfileSettings" method="POST"  action="{{ route('save-profile') }}" >
                @csrf
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
                    <button type="submit" class="btn btn-primary me-2">Save changes</button>
                    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                </div>
            </form>
        </div>
        <!-- /Account -->
        </div>
        
        </div>
    </div>
    </div>
@endsection