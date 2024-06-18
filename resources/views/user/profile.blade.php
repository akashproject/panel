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
                    <span class="input-group-text">IN (+19)</span>
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

                <div class="mb-3 col-md-12">
                    <label class="form-label" for="sebi_id">Extertise</label>
                    <div class="input-group input-group-merge">
                        <select
                        id="expertise"
                        name="expertise"
                        value=""
                        class="form-control"
                        >
                           <option value="" >Select Expertise</option>
                           <option value="Index Option" >Index Option</option>
                           <option value="Equity Option" >Equity Option</option>
                           <option value="Commodity" >Commodity</option>
                           <option value="Forex" >Forex</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 col-md-12">
                    <label class="form-label" for="sebi_id">About Me</label>
                    <div class="input-group input-group-merge">
                        <textarea
                        id="about_me"
                        name="about_me"
                        value=""
                        class="form-control editor"
                        >
                           
                        </textarea>
                    </div>
                </div>
            </div>
            <div class="mt-2">
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