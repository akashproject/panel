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
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Streaming Player</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin-save-stream-player') }}" enctype="multipart/form-data" >
                    @csrf
                    <div class="mb-3 col-md-12">
                        <label for="about_me" class="form-label">Streaming Player</label>
                        <textarea
                            class="form-control"
                            id="streaming_player"
                            name="streaming_player"
                        >{{ (isset($user_meta['streaming_player']))?$user_meta['streaming_player']:'' }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Save Streaming Player</button>
                            <input type="hidden" name="user_id" id="user_id" value="{{$user_meta['user_id']}}" >
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
@section('script')

@endsection