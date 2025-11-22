@extends('admin.layouts.afterlogin')

@section('title', 'City')

@section('admin_content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <x-alert />
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <h5 class="card-header">
                        Add City
                    </h5>
                    <div class="card-body">
                        <form action="{{ route('admin.city.store') }}" method="post">
                            @csrf
                            @include('admin.screens.city._form')
                            <div class="d-grid">
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-8">
                <div class="card">
                    <h5 class="card-header">View Cities</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S. No.</th>
                                        <th>Title</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cities as $key => $city)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $city->name }}</td>
                                            <td>
                                                <a href="{{ route('admin.city.edit', $city) }}" title="Edit"
                                                    class="btn btn-link">
                                                    <i class="bx bxs-pencil"></i>
                                                </a>
                                                <button type="button" class="btn btn-link text-danger btn-delete"
                                                    data-href="{{ route('admin.city.destroy', [$city]) }}">
                                                    <i class="bx bx-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
