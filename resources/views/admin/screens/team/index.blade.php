@extends('admin.layouts.afterlogin')

@section('title', 'Team')

@section('admin_content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <x-alert />
        <div class="card">
            <h5 class="card-header">View Teams</h5>
            <div class="card-body">
                @if ($teams->isEmpty())
                    <div>No data found.</div>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>SNo.</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>IMDB Link</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teams as $key => $team)
                                    <tr>
                                        <td>
                                            {{ $key + $teams->firstItem() }}
                                        </td>
                                        <td>
                                            @if ($team->image)
                                                <img src="{{ $team->image }}" alt="{{ $team->name }}"
                                                    class="img img-thumbnail" style="max-height: 48px">
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                        <td>
                                            {{ $team->name }}
                                        </td>
                                        <td>
                                            {{ $team->position }}
                                        </td>
                                        <td>
                                            {{ $team->imdb_link }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.team.edit', $team) }}" title="Edit"
                                                class="btn btn-link">
                                                <i class="bx bxs-pencil"></i>
                                            </a>
                                            <button type="button" class="btn btn-link text-danger btn-delete"
                                                data-href="{{ route('admin.team.destroy', [$team]) }}">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="py-5">
                        {{ $teams->links() }}
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
