@extends('admin.layouts.afterlogin')

@section('title', 'Edit Studio Category')

@section('admin_content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <x-alert />
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <h5 class="card-header">
                        Edit Studio Category
                    </h5>
                    <div class="card-body">
                        <form action="{{ route('admin.studio-category.update', $studioCategory) }}" method="post">
                            @csrf
                            @method('PUT')
                            @include('admin.screens.studio-category._form')
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
