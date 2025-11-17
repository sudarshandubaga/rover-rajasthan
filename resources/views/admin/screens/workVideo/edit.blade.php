@extends('admin.layouts.afterlogin')

@section('title', 'Edit Work Video')

@section('admin_content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <x-alert />
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <h5 class="card-header">
                        Edit Work Video
                    </h5>
                    <div class="card-body">
                        <form action="{{ route('admin.work-video.update', $workVideo) }}" method="post">
                            @csrf
                            @method('PUT')
                            @include('admin.screens.workVideo._form')
                            <div class="d-grid">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Content -->
@endsection
