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
            <form id="formAccountSettings" method="POST" onsubmit="return false">
            <div class="row">
            
                <div class="mb-3 col-md-12">
                    <label for="spoken_language" class="form-label">E-mail</label>
                    <input
                        class="form-control"
                        type="text"
                        value=""
                        id="spoken_language"
                        name="spoken_language"
                        value="john.doe@example.com"
                        placeholder="john.doe@example.com"
                    />
                </div>
                
                <div class="mb-3 col-md-12">
                    <label class="form-label" for="sebi_id">SEBI Registered ID</label>
                    <div class="input-group input-group-merge">
                        <input
                        type="text"
                        id="sebi_id"
                        name="sebi_id"
                        value=""
                        class="form-control"
                        placeholder="Enter SEBI Registered ID Here"
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