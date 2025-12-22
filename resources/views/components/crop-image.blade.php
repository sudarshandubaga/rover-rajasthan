@props(['width' => 300, 'height' => 300, 'name' => 'image', 'image' => ''])

<label class="drop-zone" id="drop-zone-{{ $name }}">
    <p>Click to upload image</p>
    <input type="file" id="{{ $name }}_file" name="{{ $name }}_file" class="crop-image-picker" accept="image/*">
    <textarea name="{{ $name }}" id="cropped-image-{{ $name }}" class="d-none"></textarea>
    @if (!empty($image))
        <img src="{{ $image }}" alt="Preview Image">
    @endif
</label>

<!-- Modal for Cropping Image -->
<div id="crop-modal-{{ $name }}" class="crop-modal" style="display: none;">
    <div class="crop-modal-content">
        <span id="close-modal-{{ $name }}" class="close-modal">&times;</span>
        <div id="preview-container-{{ $name }}" style="display: none;">
            <img id="preview-image-{{ $name }}" alt="Cropped Image">
        </div>
        <img id="crop-img-{{ $name }}" style="max-width: 100%;">
        <div id="crop-actions-{{ $name }}" style="display: block;">
            <button type="button" id="save-cropped-{{ $name }}" class="btn btn-success btn-save">Save</button>
            <button type="button" id="cancel-cropped-{{ $name }}" class="btn btn-secondary btn-cancel">Cancel</button>
        </div>
    </div>
</div>