<div class="row">
    <div class="col-sm-8">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="vehicle_type" class="form-label">Vehicle Type</label>
                            <input type="text" id="vehicle_type" name="vehicle_type" class="form-control"
                                placeholder="Enter vehicle type" value="{{ old('vehicle_type') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="capacity" class="form-label">Capacity (No. of Seats)</label>
                            <input type="text" id="capacity" name="capacity" class="form-control"
                                placeholder="Enter capacity" value="{{ old('capacity') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="regular_fare" class="form-label">Regular Fare (Per Km)</label>
                            <input type="text" id="regular_fare" name="regular_fare" class="form-control"
                                placeholder="Enter regular fare" value="{{ old('regular_fare') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="fare" class="form-label">Fare (Per Km)</label>
                            <input type="text" id="fare" name="fare" class="form-control"
                                placeholder="Enter fare" value="{{ old('fare') }}" required>
                        </div>

                        <x-seo-detail />
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
                    <x-crop-image name="image" image_file="image_file" width="800" height="450"
                        image="{{ @$cab->image }}" />
                </div>
            </div>
        </div>
    </div>
</div>
