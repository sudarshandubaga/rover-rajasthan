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
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" name="description" class="form-control text-editor" rows="15"
                                placeholder="Enter description">{{ old('description') }}</textarea>
                        </div>
                    </div>
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
                    <input name="seo_description" id="seo_description" class="form-control"
                        placeholder="Enter SEO Description" value="{{ old('seo_description') }}" />
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
                        image="{{ @$blog->image }}" />
                </div>
            </div>
        </div>
    </div>
</div>
