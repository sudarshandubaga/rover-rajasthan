<div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input name="title" id="title" class="form-control" placeholder="Enter Title" value="{{ old('title') }}" />
</div>
<div class="mb-3">
    <label for="image_file" class="form-label">Choose Image</label>
    <x-crop-image name="image" image_file="image_file" width="600" height="425" image="{{ $page->image }}" />
</div>
<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea name="description" id="description" class="form-control text-editor" placeholder="Enter description"
        rows="15">{{ old('description') }}</textarea>
</div>

<h5>SEO Details</h5>
<div class="mb-3">
    <label for="seo_title" class="form-label">SEO Title</label>
    <input name="seo_title" id="seo_title" class="form-control" placeholder="Enter SEO Title"
        value="{{ old('seo_title') }}" />
</div>
<div class="mb-3">
    <label for="seo_keywords" class="form-label">SEO Keywords</label>
    <input name="seo_keywords" id="seo_keywords" class="form-control" placeholder="Enter SEO Keywords"
        value="{{ old('seo_keywords') }}" />
</div>
<div class="mb-3">
    <label for="seo_description" class="form-label">SEO Description</label>
    <input name="seo_description" id="seo_description" class="form-control" placeholder="Enter SEO Description"
        value="{{ old('seo_description') }}" />
</div>
