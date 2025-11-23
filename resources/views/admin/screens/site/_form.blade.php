<div class="row">
    <div class="col-sm-8 col-lg-9">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Enter title"
                value="{{ old('title', $site->title ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="tagline" class="form-label">Tagline</label>
            <input type="text" name="tagline" id="tagline" class="form-control" placeholder="Enter tagline"
                value="{{ old('tagline', $site->tagline ?? '') }}">
        </div>

        <div class="row">
            <div class="col-sm-6 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter email"
                    value="{{ old('email', $site->email ?? '') }}">
            </div>
            <div class="col-sm-6 mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter phone"
                    value="{{ old('phone', $site->phone ?? '') }}">
            </div>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea name="address" id="address" class="form-control" placeholder="Enter address" rows="3">{{ old('address', $site->address ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="google_map" class="form-label">Google Map URL</label>
            <textarea name="google_map" id="google_map" class="form-control" placeholder="Enter Google Map URL" rows="5">{{ old('google_map', $site->google_map ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="footer_scripts" class="form-label">Extra Scripts</label>
            <textarea name="footer_scripts" id="footer_scripts" class="form-control"
                placeholder="Add scripts for Webmaster, Analytics, Adsense, Search Console, etc." rows="10">{{ old('footer_scripts', $site->footer_scripts ?? '') }}</textarea>
        </div>

        <div class="row">
            <div class="col-sm-4 mb-3">
                <label for="facebook_link" class="form-label">Facebook Link</label>
                <input type="text" name="facebook_link" id="facebook_link" class="form-control"
                    placeholder="Enter Facebook link" value="{{ old('facebook_link', $site->facebook_link ?? '') }}">
            </div>
            <div class="col-sm-4 mb-3">
                <label for="twitter_link" class="form-label">Twitter Link</label>
                <input type="text" name="twitter_link" id="twitter_link" class="form-control"
                    placeholder="Enter Twitter link" value="{{ old('twitter_link', $site->twitter_link ?? '') }}">
            </div>
            <div class="col-sm-4 mb-3">
                <label for="instagram_link" class="form-label">Instagram Link</label>
                <input type="text" name="instagram_link" id="instagram_link" class="form-control"
                    placeholder="Enter Instagram link" value="{{ old('instagram_link', $site->instagram_link ?? '') }}">
            </div>
        </div>
    </div>
    <div class="col-sm-4 col-lg-3">
        <div class="mb-3">
            <label for="logo_file" class="form-label">Choose Logo</label>
            <x-crop-image name="logo" image_file="logo_file" width="210" height="150"
                image="{{ $site->logo }}" />
        </div>
        <div class="mb-3">
            <label for="favicon_file" class="form-label">Choose Favicon</label>
            <x-crop-image name="favicon" image_file="favicon_file" width="300" height="300"
                image="{{ $site->favicon }}" />
        </div>
    </div>
</div>
