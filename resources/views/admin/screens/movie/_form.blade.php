<div class="row">
    <div class="col-sm-8">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" name="name" class="form-control"
                                placeholder="Enter name" value="{{ old('name') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>
                            <input type="text" id="type" name="type" class="form-control"
                                placeholder="Enter type" value="{{ old('type') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" name="description" class="form-control" rows="15" placeholder="Enter description">{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label for="image_file" class="form-label">Choose Image</label>
                    <x-crop-image name="image" image_file="image_file" width="600" height="900"
                        image="{{ @$movie->image }}" />
                </div>
            </div>
        </div>
    </div>
</div>
