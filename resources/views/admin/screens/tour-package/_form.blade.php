<div class="row">
    <div class="col-sm-8">
        <div class="card">
            <div class="card-body">

                {{-- Basic Details --}}
                <div class="row">
                    <div class="col-sm-12">

                        {{-- Name --}}
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name"
                                value="{{ old('name', @$tour->name) }}" required>
                        </div>

                        {{-- Slug --}}
                        <div class="mb-3">
                            <label class="form-label">Slug</label>
                            <input type="text" name="slug" class="form-control" placeholder="Enter slug"
                                value="{{ old('slug', @$tour->slug) }}" required>
                        </div>

                        {{-- Type --}}
                        <div class="mb-3">
                            <label class="form-label">Type</label>
                            <select name="type" class="form-control">
                                <option value="sightseeing"
                                    {{ old('type', @$tour->type) == 'sightseeing' ? 'selected' : '' }}>Sightseeing
                                </option>
                                <option value="daytour" {{ old('type', @$tour->type) == 'daytour' ? 'selected' : '' }}>
                                    Day Tour</option>
                            </select>
                        </div>

                        {{-- Short Description --}}
                        <div class="mb-3">
                            <label class="form-label">Short Description</label>
                            <textarea name="description" class="form-control" rows="4" placeholder="Enter short description">{{ old('description', @$tour->description) }}</textarea>
                        </div>

                        {{-- Long Description --}}
                        <div class="mb-3">
                            <label class="form-label">Long Description</label>
                            <textarea name="long_description" class="form-control text-editor" rows="10" placeholder="Enter long description">{{ old('long_description', @$tour->long_description) }}</textarea>
                        </div>

                        {{-- Price --}}
                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="text" name="price" class="form-control" placeholder="50"
                                value="{{ old('price', @$tour->price) }}">
                        </div>

                        {{-- Duration --}}
                        <div class="mb-3">
                            <label class="form-label">Duration</label>
                            <input type="text" name="duration" class="form-control"
                                placeholder="Full Day / 4-5 Hours" value="{{ old('duration', @$tour->duration) }}">
                        </div>

                    </div>
                </div>

                <hr>
                <h5>Gallery Images</h5>

                <div id="gallery-wrapper">
                    @php
                        $gallery = old('gallery', @$tour->gallery ?? []);
                    @endphp

                    <div class="row">
                        @if (!empty($gallery))
                        @foreach ($gallery as $index => $img)
                            <div class="col-lg-2 gallery-item col-4">
                                <div class="mb-2 d-flex gap-2 align-items-center position-relative">
                                    <input type="hidden" name="gallery[]" class="form-control"
                                        value="{{ $img }}" placeholder="Enter image URL">
                                    <img src="{{ $img }}" alt="" class="w-100 rounded border">
                                    <button type="button"
                                        class="btn btn-link text-danger btn-sm remove-gallery position-absolute"
                                        style="top: -8px; right: -32px">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </div>
                            </div>
                        @endforeach
@endif
                    </div>
                </div>

                {{-- <button type="button" class="btn btn-primary mt-2" id="add-gallery">Add Image</button> --}}
                <button type="button" class="btn btn-primary mt-2" id="open-media">
                    Add Image
                </button>


                <!-- Media Library Modal -->
                <div class="modal fade" id="mediaModal" tabindex="-1">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Media Library</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">

                                <x-upload-media-image :width="800" :height="600" />

                                <div class="row" id="media-container">
                                    <div class="text-center w-100 py-5" id="media-loading">
                                        Loading images...
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <hr>
                <h5>Inclusions</h5>

                <div id="inclusion-wrapper">
                    @php
                        $inclusions = old('inclusions', @$tour->inclusions ?? []);
                    @endphp
                    @if (!empty($inclusions))
                        @foreach ($inclusions as $inc)
                            <div class="mb-2 d-flex gap-2 align-items-center inclusion-item">
                                <input type="text" name="inclusions[]" class="form-control" value="{{ $inc }}"
                                    placeholder="Enter inclusion">
                                <button type="button" class="btn btn-danger remove-inclusion">X</button>
                            </div>
                        @endforeach
                    @endif
                </div>

                <button type="button" class="btn btn-primary mt-2" id="add-inclusion">Add Inclusion</button>

                <hr>
                <h5>Exclusions</h5>

                <div id="exclusion-wrapper">
                    @php
                        $exclusions = old('exclusions', @$tour->exclusions ?? []);
                    @endphp

                    @foreach ($exclusions as $exc)
                        <div class="mb-2 d-flex gap-2 align-items-center exclusion-item">
                            <input type="text" name="exclusions[]" class="form-control"
                                value="{{ $exc }}" placeholder="Enter exclusion">
                            <button type="button" class="btn btn-danger remove-exclusion">X</button>
                        </div>
                    @endforeach
                </div>

                <button type="button" class="btn btn-primary mt-2" id="add-exclusion">Add Exclusion</button>

                <hr>
                <h5>Itinerary</h5>

                <div id="itinerary-wrapper">
                    @php
                        $itinerary = old('itinerary', @$tour->itinerary ?? []);
                    @endphp

                    @foreach ($itinerary as $index => $item)
                        <div class="row mb-2 itinerary-item">
                            <div class="col-sm-3">
                                <input type="text" name="itinerary[{{ $index }}][day]"
                                    class="form-control" placeholder="Day / Time" value="{{ @$item['day'] }}">
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="itinerary[{{ $index }}][description]"
                                    class="form-control" placeholder="Description"
                                    value="{{ @$item['description'] }}">
                            </div>
                            <div class="col-sm-1">
                                <button type="button" class="btn btn-danger remove-itinerary">X</button>
                            </div>
                        </div>
                    @endforeach
                </div>

                <button type="button" class="btn btn-primary mt-2" id="add-itinerary">Add Itinerary</button>

                <hr>

                {{-- SEO Details --}}
                <h5>SEO Details</h5>

                <div class="mb-3">
                    <label class="form-label">SEO Title</label>
                    <input type="text" name="seo_title" class="form-control"
                        value="{{ old('seo_title', @$tour->seo_title) }}" placeholder="Enter SEO Title">
                </div>

                <div class="mb-3">
                    <label class="form-label">SEO Keywords</label>
                    <input type="text" name="seo_keywords" class="form-control"
                        value="{{ old('seo_keywords', @$tour->seo_keywords) }}" placeholder="Enter SEO Keywords">
                </div>

                <div class="mb-3">
                    <label class="form-label">SEO Description</label>
                    <input type="text" name="seo_description" class="form-control"
                        value="{{ old('seo_description', @$tour->seo_description) }}"
                        placeholder="Enter SEO Description">
                </div>

            </div>
        </div>
    </div>

    {{-- Image Section --}}
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">

                <div class="mb-3">
                    <label class="form-label">Main Image</label>

                    <x-crop-image name="image" image_file="image_file" width="600" height="400"
                        image="{{ @$tour->image_url }}" />
                </div>

            </div>
        </div>
    </div>
</div>

@push('extra_scripts')
    <script>
        $(document).ready(function() {

            /* ----------------------
               Open Media Modal
            ----------------------- */
            $('#open-media').on('click', function() {
                $('#mediaModal').modal('show');
                fetchMedia();
            });

            /* ----------------------
               Fetch Media via API
            ----------------------- */
            function fetchMedia() {
                $('#media-container').html(`
            <div class="text-center w-100 py-5">Loading images...</div>
        `);

                $.ajax({
                    url: "{{ route('admin.media.index') }}",
                    type: 'GET',
                    success: function(response) {
                        if (response.status) {
                            let html = '';

                            response.data.forEach(item => {
                                html += `
                            <div class="col-lg-2 col-md-3 col-4 mb-3">
                                <div class="media-item border rounded p-1 cursor-pointer"
                                     data-image="${item.url}">
                                    <img src="${item.url}" class="img-fluid rounded">
                                </div>
                            </div>
                        `;
                            });

                            $('#media-container').html(html);
                        }
                    }
                });
            }

            /* ----------------------
               Select Image
            ----------------------- */
            $(document).on('click', '.media-item', function() {
                let imageUrl = $(this).data('image');

                // Prevent duplicates
                if ($(`input[name="gallery[]"][value="${imageUrl}"]`).length) {
                    alert('Image already added');
                    return;
                }

                $('#gallery-wrapper .row').append(`
            <div class="col-lg-2 gallery-item col-4">
                <div class="mb-2 d-flex gap-2 align-items-center position-relative">
                    <input type="hidden" name="gallery[]" value="${imageUrl}">
                    <img src="${imageUrl}" class="w-100 rounded border">
                    <button type="button"
                        class="btn btn-link text-danger btn-sm remove-gallery position-absolute"
                        style="top:-8px; right:-32px">
                        <i class="bx bx-trash"></i>
                    </button>
                </div>
            </div>
        `);

                $('#mediaModal').modal('hide');
            });

            /* ----------------------
               Remove Gallery
            ----------------------- */
            $(document).on('click', '.remove-gallery', function() {
                $(this).closest('.gallery-item').remove();
            });

        });
    </script>


    <script>
        $(document).ready(function() {

            /* ---------------------------
               Add Gallery Image Field
            ---------------------------- */
            $('#add-gallery').on('click', function() {
                $('#gallery-wrapper').append(`
            <div class="mb-2 d-flex gap-2 align-items-center gallery-item">
                <input type="text" name="gallery[]" class="form-control" placeholder="Enter image URL">
                <button type="button" class="btn btn-danger remove-gallery">X</button>
            </div>
        `);
            });

            /* ---------------------------
               Remove Gallery Field
            ---------------------------- */
            $(document).on('click', '.remove-gallery', function() {
                $(this).closest('.gallery-item').remove();
            });


            /* ---------------------------
               Add Inclusion Field
            ---------------------------- */
            $('#add-inclusion').on('click', function() {
                $('#inclusion-wrapper').append(`
            <div class="mb-2 d-flex gap-2 align-items-center inclusion-item">
                <input type="text" name="inclusions[]" class="form-control" placeholder="Enter inclusion">
                <button type="button" class="btn btn-danger remove-inclusion">X</button>
            </div>
        `);
            });

            /* ---------------------------
               Remove Inclusion Field
            ---------------------------- */
            $(document).on('click', '.remove-inclusion', function() {
                $(this).closest('.inclusion-item').remove();
            });


            /* ---------------------------
               Add Exclusion Field
            ---------------------------- */
            $('#add-exclusion').on('click', function() {
                $('#exclusion-wrapper').append(`
            <div class="mb-2 d-flex gap-2 align-items-center exclusion-item">
                <input type="text" name="exclusions[]" class="form-control" placeholder="Enter exclusion">
                <button type="button" class="btn btn-danger remove-exclusion">X</button>
            </div>
        `);
            });

            /* ---------------------------
               Remove Exclusion Field
            ---------------------------- */
            $(document).on('click', '.remove-exclusion', function() {
                $(this).closest('.exclusion-item').remove();
            });

            function reindexItinerary() {
                $('#itinerary-wrapper .itinerary-item').each(function(index) {
                    $(this).find('input[name^="itinerary"]').each(function() {
                        if ($(this).attr('name').includes('day')) {
                            $(this).attr('name', `itinerary[${index}][day]`);
                        }
                        if ($(this).attr('name').includes('description')) {
                            $(this).attr('name', `itinerary[${index}][description]`);
                        }
                    });
                });
            }



            /* ---------------------------
               Add Itinerary Field
            ---------------------------- */
            $('#add-itinerary').on('click', function() {
                $('#itinerary-wrapper').append(`
                    <div class="row mb-2 itinerary-item">
                        <div class="col-sm-3">
                            <input type="text" name="itinerary[][day]" class="form-control" placeholder="Day / Time">
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="itinerary[][description]" class="form-control" placeholder="Description">
                        </div>
                        <div class="col-sm-1">
                            <button type="button" class="btn btn-danger remove-itinerary">X</button>
                        </div>
                    </div>
                `);

                reindexItinerary();
            });

            /* ---------------------------
               Remove Itinerary Field
            ---------------------------- */
            $(document).on('click', '.remove-itinerary', function() {
                $(this).closest('.itinerary-item').remove();

                reindexItinerary();
            });

        });
    </script>
@endpush
