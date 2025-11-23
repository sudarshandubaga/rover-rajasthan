@extends('admin.layouts.afterlogin')

@section('title', 'Booking Enquiries')

@section('admin_content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <x-alert />
        <div class="card">
            <h5 class="card-header">View Booking Enquiries</h5>
            <div class="card-body">
                @if ($enquiries->isEmpty())
                    <div>No data found.</div>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>SNo.</th>
                                    <th>Travel Type</th>
                                    <th>From City</th>
                                    <th>Destination City</th>
                                    <th>Date</th>
                                    <th>Vehicle Type</th>
                                    <th>Contact</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($enquiries as $key => $enquiry)
                                    <tr>
                                        <td>
                                            {{ $key + $enquiries->firstItem() }}
                                        </td>
                                        <td>
                                            {{ $enquiry->booking_type }}
                                        </td>
                                        <td>
                                            {{ $enquiry->source_city }}
                                        </td>
                                        <td>
                                            {{ $enquiry->destination_city ?? '-' }}
                                        </td>
                                        <td>
                                            {{ $enquiry->travel_date }}
                                        </td>
                                        <td>
                                            {{ $enquiry->vehicle_type }}
                                        </td>
                                        <td>
                                            {{ $enquiry->contact_no }}
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-link text-danger btn-delete"
                                                data-href="{{ route('admin.booking-enquiry.destroy', [$enquiry]) }}">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="py-5">
                        {{ $enquiries->links() }}
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
