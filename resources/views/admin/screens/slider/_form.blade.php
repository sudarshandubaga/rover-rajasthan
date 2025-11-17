<div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" id="title" name="title" class="form-control" placeholder="Enter title"
        value="{{ old('title', '') }}">
</div>

<div class="mb-3">
    <label for="image_file" class="form-label">Choose Image</label>
    <x-crop-image name="image" image_file="image_file" width="2100" height="700" :image="@$slider->image" />
</div>
