@extends('admin.layouts.afterlogin')

@section('title', 'Feedbacks')

@section('admin_content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <x-alert />
        <div class="card">
            <h5 class="card-header d-flex justify-content-between align-items-center">
                View Feedbacks
            </h5>
            <div class="card-body">
                @if ($feedbacks->isEmpty())
                    <div>No feedback found.</div>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>SNo.</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Rating</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($feedbacks as $key => $feedback)
                                    <tr>
                                        <td>{{ $key + $feedbacks->firstItem() }}</td>
                                        <td>{{ $feedback->name }}</td>
                                        <td>
                                            <div class="small">
                                                {{ $feedback->email }}<br>
                                                {{ $feedback->mobile }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-warning">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <i class="bx bxs-star {{ $i <= $feedback->rating ? '' : 'text-muted' }}"></i>
                                                @endfor
                                            </div>
                                        </td>
                                        <td>{{ Str::limit($feedback->message, 100) }}</td>
                                        <td>
                                            <form action="{{ route('admin.feedback.toggle-status', $feedback) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="btn btn-xs {{ $feedback->is_active ? 'btn-success' : 'btn-secondary' }}">
                                                    {{ $feedback->is_active ? 'Active' : 'Inactive' }}
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <button type="button" class="btn btn-link text-danger btn-delete"
                                                    data-href="{{ route('admin.feedback.destroy', $feedback) }}">
                                                    <i class="bx bx-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="py-5">
                        {{ $feedbacks->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection