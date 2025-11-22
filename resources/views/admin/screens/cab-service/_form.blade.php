<div class="row">
    <div class="col-sm-8">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" id="title" name="title" class="form-control"
                                placeholder="Enter title" value="{{ old('title') }}" required>
                        </div>

                        @php
                            $defaultNote = '
                            <ol>
                                <li>Toll tax, Border tax and Parking will be charged extra as per actual.</li>
                                <li>⁠Driver allowance will be charged 300/- per night.</li>
                                <li>⁠Minimum 300kms per day would be charged.</li>
                                <li>⁠GST extra as applicable.</li>
                            </ol>';
                        @endphp

                        <div class="mb-3">
                            <label for="note" class="form-label">Note</label>
                            <textarea id="note" name="note" class="form-control text-editor" rows="15" placeholder="Enter note">{{ old('note', $defaultNote) }}</textarea>
                        </div>
                    </div>
                </div>
                <x-seo-detail />
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label for="image_file" class="form-label">Choose Banner Image</label>
                    <x-crop-image name="banner_image" image_file="banner_image_file" width="1500" height="500"
                        image="{{ @$cabService->banner_image }}" />
                </div>
            </div>
        </div>
    </div>
</div>
