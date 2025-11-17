@extends('admin.layouts.afterlogin')

@section('title', 'Dashboard')

@section('admin_content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-3">
            <div class="card-body">
                <h4>Welcome To</h4>
                <h1>{{ $site->title }} Admin Control</h1>
            </div>
        </div>
    </div>
@endsection
