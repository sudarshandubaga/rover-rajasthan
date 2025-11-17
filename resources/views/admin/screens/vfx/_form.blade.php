<div class="card">
    <div class="card-body">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" class="form-control" placeholder="Enter title"
                value="{{ old('title') }}" required>
        </div>
        <div class="row">
            <div class="col-sm-6 mb-3">
                <label for="before_image_file" class="form-label">Choose Before Image</label>
                <x-crop-image name="before_image" image_file="before_image_file" width="500" height="300"
                    image="{{ @$vfx->before_image }}" />
            </div>
            <div class="col-sm-6 mb-3">
                <label for="after_image_file" class="form-label">Choose After Image</label>
                <x-crop-image name="after_image" image_file="after_image_file" width="500" height="300"
                    image="{{ @$vfx->after_image }}" />
            </div>
        </div>
    </div>
</div>
