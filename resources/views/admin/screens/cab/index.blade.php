@extends('admin.layouts.afterlogin')

@section('title', 'Cab Type')

@section('admin_content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <x-alert />
        <div class="card">
            <h5 class="card-header">View Cab Types</h5>
            <div class="card-body">
                @if ($cabs->isEmpty())
                    <div>No data found.</div>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>SNo.</th>
                                    <th>Image</th>
                                    <th>Vehicle Type</th>
                                    <th>Capacity</th>
                                    <th>Fare</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cabs as $key => $cab)
                                    <tr>
                                        <td>
                                            {{ $key + $cabs->firstItem() }}
                                        </td>
                                        <td>
                                            @if ($cab->image)
                                                <img src="{{ $cab->image }}" alt="{{ $cab->name }}"
                                                    class="img img-thumbnail" style="max-height: 48px">
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                        <td>
                                            {{ $cab->vehicle_type }}
                                        </td>
                                        <td>
                                            {{ $cab->capacity }} Seater
                                        </td>
                                        <td>
                                            ₹{{ $cab->fare }} Per Person
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.cab.edit', $cab) }}" title="Edit"
                                                class="btn btn-link">
                                                <i class="bx bxs-pencil"></i>
                                            </a>
                                            <button type="button" class="btn btn-link text-danger btn-delete"
                                                data-href="{{ route('admin.cab.destroy', [$cab]) }}">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="py-5">
                        {{ $cabs->links() }}
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
