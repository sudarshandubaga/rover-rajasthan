@extends('admin.layouts.afterlogin')

@section('title', 'Tour Package')

@section('admin_content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <x-alert />
        <div class="card">
            <h5 class="card-header">View Tour Packages</h5>
            <div class="card-body">
                @if ($tourPackages->isEmpty())
                    <div>No data found.</div>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>SNo.</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tourPackages as $key => $tourPackage)
                                    <tr>
                                        <td>
                                            {{ $key + $tourPackages->firstItem() }}
                                        </td>
                                        <td>
                                            @if ($tourPackage->image)
                                                <img src="{{ $tourPackage->image }}" alt="{{ $tourPackage->name }}"
                                                    class="img img-thumbnail" style="max-height: 48px">
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                        <td>
                                            {{ $tourPackage->name }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.tour-package.edit', $tourPackage) }}" title="Edit"
                                                class="btn btn-link">
                                                <i class="bx bxs-pencil"></i>
                                            </a>
                                            <button type="button" class="btn btn-link text-danger btn-delete"
                                                data-href="{{ route('admin.tour-package.destroy', [$tourPackage]) }}">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="py-5">
                        {{ $tourPackages->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection

@push('extra_styles')
@endpush

@push('extra_scripts')
@endpush
