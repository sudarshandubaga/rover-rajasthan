@extends('admin.layouts.afterlogin')

@section('title', 'Customized Tour Enquiries')

@section('admin_content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <x-alert />

        <div class="card">
            <h5 class="card-header">View Customized Tour Enquiries</h5>

            <div class="card-body">
                @if ($enquiries->isEmpty())
                    <div>No data found.</div>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>SNo.</th>
                                    <th>Contact</th>
                                    <th>Booking Details</th>
                                    <th>Budget</th>
                                    <th>Interests</th>
                                    <th>Accommodation</th>
                                    <th>Travel Pace</th>
                                    <th>Notes</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($enquiries as $key => $enquiry)
                                    <tr>
                                        <td>{{ $key + $enquiries->firstItem() }}</td>

                                        <td>
                                            <div>{{ $enquiry->name }}</div>
                                            <div class="text-secondary text-nowrap"><i class="bx bx-envelope"></i>
                                                {{ $enquiry->email }}
                                            </div>
                                            <div class="text-secondary text-nowrap"><i class="bx bx-phone"></i>
                                                {{ $enquiry->contact_no }}
                                            </div>
                                        </td>

                                        {{-- <td>{{ $enquiry->email }}</td> --}}

                                        <td>
                                            <div><strong>Destination: </strong><br />{{ $enquiry->destinations ?? '-' }}
                                            </div>
                                            <div>
                                                <strong>From Date: </strong><br />
                                                {{ $enquiry->start_date ? \Carbon\Carbon::parse($enquiry->start_date)->format('d M y') : '-' }}<br />
                                                <strong>To Date: </strong><br />
                                                {{ $enquiry->end_date ? \Carbon\Carbon::parse($enquiry->end_date)->format('d M y') : '-' }}
                                            </div>
                                            <div>
                                                <strong>Travelers:</strong><br />
                                                {{ $enquiry->travelers ?? '-' }}
                                            </div>
                                        </td>

                                        {{-- <td>
                                            {{ $enquiry->start_date ? \Carbon\Carbon::parse($enquiry->start_date)->format('d M Y') : '-' }}
                                        </td> --}}

                                        {{-- <td>
                                            {{ $enquiry->end_date ? \Carbon\Carbon::parse($enquiry->end_date)->format('d M Y') : '-' }}
                                        </td> --}}

                                        {{-- <td>{{ $enquiry->travelers ?? '-' }}</td> --}}

                                        <td>{{ $enquiry->budget ?? '-' }}</td>

                                        <td>
                                            @php
                                                $interests = is_string($enquiry->interests)
                                                    ? json_decode($enquiry->interests, true)
                                                    : $enquiry->interests;
                                            @endphp

                                            {{ !empty($interests) ? implode(', ', $interests) : '-' }}
                                        </td>

                                        <td>{{ ucfirst($enquiry->accommodation ?? '-') }}</td>

                                        <td>{{ ucfirst($enquiry->pace ?? '-') }}</td>

                                        <td>{{ $enquiry->notes ?? '-' }}</td>

                                        <td>
                                            <button type="button" class="btn btn-link text-danger btn-delete"
                                                data-href="{{ route('admin.customize-tour-enquiry.destroy', [$enquiry]) }}">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="py-4">
                        {{ $enquiries->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('extra_styles')
@endpush

@push('extra_scripts')
@endpush
