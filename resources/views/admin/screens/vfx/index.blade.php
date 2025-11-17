@extends('admin.layouts.afterlogin')

@section('title', 'VFX')

@section('admin_content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <x-alert />
        <div class="card">
            <h5 class="card-header">View VFXs</h5>
            <div class="card-body">
                @if ($vfxs->isEmpty())
                    <div>No data found.</div>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>SNo.</th>
                                    <th>Title</th>
                                    <th>Before Image</th>
                                    <th>After Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vfxs as $key => $vfx)
                                    <tr>
                                        <td>
                                            {{ $key + $vfxs->firstItem() }}
                                        </td>
                                        <td>
                                            {{ $vfx->title }}
                                        </td>
                                        <td>
                                            @if ($vfx->before_image)
                                                <img src="{{ $vfx->before_image }}" alt="{{ $vfx->title }} Before"
                                                    class="img img-thumbnail" style="max-height: 48px">
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                        <td>
                                            @if ($vfx->after_image)
                                                <img src="{{ $vfx->after_image }}" alt="{{ $vfx->title }} After"
                                                    class="img img-thumbnail" style="max-height: 48px">
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.vfx.edit', $vfx) }}" title="Edit"
                                                class="btn btn-link">
                                                <i class="bx bxs-pencil"></i>
                                            </a>
                                            <button type="button" class="btn btn-link text-danger btn-delete"
                                                data-href="{{ route('admin.vfx.destroy', [$vfx]) }}">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="py-5">
                        {{ $vfxs->links() }}
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
