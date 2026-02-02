@extends('admin.layouts.afterlogin')

@section('title', 'Cab Service')

@section('admin_content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <x-alert />
        <div class="card">
            <h5 class="card-header">View Cab Services</h5>
            <div class="card-body">
                @if ($cabServices->isEmpty())
                    <div>No data found.</div>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>SNo.</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Details</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cabServices as $key => $cabService)
                                    <tr>
                                        <td>
                                            {{ $key + $cabServices->firstItem() }}
                                        </td>
                                        <td>
                                            @if ($cabService->banner_image)
                                                <img src="{{ $cabService->banner_image }}" alt="{{ $cabService->name }}"
                                                    class="img img-thumbnail" style="max-height: 48px">
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                        <td>
                                            {{ $cabService->title }}
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm"
                                                data-bs-target="#cabServiceModal{{ $cabService->id }}" data-bs-toggle="modal">
                                                Add / View Data
                                            </button>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.cab-service.edit', $cabService) }}" title="Edit"
                                                class="btn btn-link">
                                                <i class="bx bxs-pencil"></i>
                                            </a>
                                            <button type="button" class="btn btn-link text-danger btn-delete"
                                                data-href="{{ route('admin.cab-service.destroy', [$cabService]) }}">
                                                <i class="bx bx-trash"></i>
                                            </button>

                                            <!-- Cab Service Details Modal -->
                                            <div class="modal fade" id="cabServiceModal{{ $cabService->id }}" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Cab Service Details</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>


                                                        <input type="hidden" name="cab_service_id" id="cab_service_id">

                                                        <div class="modal-body">
                                                            <div class="list-data">
                                                                <table class="table table-bordered align-middle">
                                                                    <thead class="table-light">
                                                                        <tr>
                                                                            <th width="35%">Image</th>
                                                                            <th width="20%">Title</th>
                                                                            <th width="45%">Description</th>
                                                                            <th>Actions</th>
                                                                        </tr>
                                                                    </thead>

                                                                    <tbody>
                                                                        @for ($i = 1; $i <= 6; $i++)
                                                                            <tr>
                                                                                <td>
                                                                                    <img src="{{ $cabService['image' . $i] }}"
                                                                                        alt="{{ $cabService['title' . $i] }}"
                                                                                        id="image_{{ $cabService->id }}_{{ $i }}"
                                                                                        style="height: 80px;">
                                                                                </td>
                                                                                <td id="title_{{ $cabService->id }}_{{ $i }}">
                                                                                    {{ $cabService['title' . $i] ?? '-' }}
                                                                                </td>
                                                                                <td id="description_{{ $cabService->id }}_{{ $i }}">
                                                                                    {{ $cabService['description' . $i] ?? '-' }}
                                                                                </td>
                                                                                <td>
                                                                                    <button type="button"
                                                                                        class="btn btn-primary btn-sm add_edit_data_btn"
                                                                                        style="white-space: nowrap;"
                                                                                        data-index="{{ $i }}"
                                                                                        data-id="{{ $cabService->id }}"
                                                                                        data-cabdata='@json($cabService)'>
                                                                                        Add / Edit
                                                                                    </button>
                                                                                </td>
                                                                            </tr>
                                                                        @endfor
                                                                    </tbody>
                                                                </table>
                                                            </div>

                                                            {{-- FORM View - Hidden by default --}}
                                                            <form action="{{ route('admin.cab-service.details', $cabService) }}"
                                                                data-id="{{ $cabService->id }}" class="details-form d-none"
                                                                method="post">
                                                                @csrf
                                                                <input type="hidden" name="row_index"
                                                                    id="row_index_{{ $cabService->id }}">

                                                                <div class="mb-3">
                                                                    <label class="form-label fw-bold">Title</label>
                                                                    <input type="text" class="form-control" name="row_title"
                                                                        id="row_title_{{ $cabService->id }}">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label fw-bold">Description</label>
                                                                    <textarea name="row_description"
                                                                        id="row_description_{{ $cabService->id }}"
                                                                        class="form-control" rows="10"></textarea>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label fw-bold">Image</label>
                                                                    <x-crop-image name="row_image"
                                                                        id="row_image_{{ $cabService->id }}" image_file="row_image"
                                                                        width="700" height="500" image="" />
                                                                </div>

                                                                <button type="submit" class="btn btn-success">Save</button>
                                                                <button type="button"
                                                                    class="btn btn-secondary btn-cancel-edit">Cancel</button>
                                                            </form>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            {{-- Cab Details Model --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="py-5">
                        {{ $cabServices->links() }}
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
    <script>
        $(document).ready(function () {

            $(document).on("click", ".add_edit_data_btn", function () {
                let self = $(this),
                    index = self.data('index'),
                    cabData = self.data('cabdata');

                console.log('ID : ', cabData);


                $('.details-form').removeClass('d-none');
                $('.list-data').addClass('d-none');

                // console.log('cab data : ', cabData.title);
                $('#row_index_' + cabData.id).val(index);
                $('#row_title_' + cabData.id).val(cabData[`title${index}`]);
                $('#row_description_' + cabData.id).val(cabData[`description${index}`]);

                // Update Image Preview
                let uniqueId = 'row_image_' + cabData.id;
                let dropZone = $('#drop-zone-' + uniqueId);
                let imageSrc = cabData[`image${index}`];

                dropZone.find('img').remove(); // Remove existing
                $('#cropped-image-' + uniqueId).val(''); // Clear hidden input value

                if (imageSrc) {
                    dropZone.append(`<img src="${imageSrc}" alt="Preview Image" style="max-width: 100%; max-height: 200px; display: block; margin: 0 auto;">`);
                }
            });

            $(document).on("click", ".btn-cancel-edit", function () {
                $('.details-form').addClass('d-none');
                $('.list-data').removeClass('d-none');
            });

            // Save Form AJAX (Optional)
            $(".details-form").on("submit", function (e) {
                e.preventDefault();

                let formData = new FormData(this);
                let id = $(this).data('id');
                let index = $('#row_index_' + id).val();

                $.ajax({
                    url: $(this).attr('action'),
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (res) {
                        // alert("Saved Successfully!");

                        $(`#title_${id}_${index}`).html(res[`title${index}`]);
                        $(`#description_${id}_${index}`).html(res[`description${index}`]);
                        $(`#image_${id}_${index}`).attr('src', res[`image${index}`]);

                        // Update stored data on all buttons for this ID
                        $(`.add_edit_data_btn[data-id='${id}']`).each(function () {
                            $(this).data('cabdata', res);
                        });

                        $('.details-form').addClass('d-none');
                        $('.list-data').removeClass('d-none');
                    }
                });
            });

        });

        // Load existing saved rows (if needed)
        function loadServiceDetails(url) {
            $.ajax({
                url,
                type: "GET",
                success: function (data) {
                    // Loop six rows
                    for (let i = 1; i <= 6; i++) {
                        $(`input[name="title${i}]`).val(data[`title${i}`] ?? '');
                        $(`textarea[name="description]`).val(data[`description${i}`] ?? '');

                        // Image
                        if (data[`image${i}`]) {
                            $("#img_preview_" + i).attr("src", data[`image${i}`]).show();
                        } else {
                            $("#img_preview_" + i).hide();
                        }
                    }
                }
            });
        }
    </script>
@endpush