@extends('admin.layouts.afterlogin')

@section('title', 'Enquiries')

@section('admin_content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <x-alert />
        <div class="card">
            <h5 class="card-header">View Enquiries</h5>
            <div class="card-body">
                @if ($enquiries->isEmpty())
                    <div>No data found.</div>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>SNo.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact No.</th>
                                    <th>Message</th>
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
                                            {{ $enquiry->name }}
                                        </td>
                                        <td>
                                            {{ $enquiry->email }}
                                        </td>
                                        <td>
                                            {{ $enquiry->phone }}
                                        </td>
                                        <td>
                                            {{ $enquiry->message }}
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-link text-danger btn-delete"
                                                data-href="{{ route('admin.enquiry.destroy', [$enquiry]) }}">
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
