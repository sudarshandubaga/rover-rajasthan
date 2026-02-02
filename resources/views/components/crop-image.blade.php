@props(['width' => 300, 'height' => 300, 'name' => 'image', 'image' => '', 'id' => null])
@php
    $elementId = $id ?? $name;
@endphp

<label class="drop-zone" id="drop-zone-{{ $elementId }}">
    <p>Click to upload image</p>
    <input type="file" id="{{ $elementId }}_file" name="{{ $name }}_file" class="crop-image-picker" accept="image/*">
    <textarea name="{{ $name }}" id="cropped-image-{{ $elementId }}" class="d-none"></textarea>
    @if (!empty($image))
        <img src="{{ $image }}" alt="Preview Image">
    @endif
</label>

<!-- Modal for Cropping Image -->
<div id="crop-modal-{{ $elementId }}" class="crop-modal" style="display: none;">
    <div class="crop-modal-content">
        <span id="close-modal-{{ $elementId }}" class="close-modal">&times;</span>
        <div id="preview-container-{{ $elementId }}" style="display: none;">
            <img id="preview-image-{{ $elementId }}" alt="Cropped Image">
        </div>
        <img id="crop-img-{{ $elementId }}" style="max-width: 100%;">
        <div id="crop-actions-{{ $elementId }}" style="display: block;">
            <button type="button" id="save-cropped-{{ $elementId }}" class="btn btn-success btn-save">Save</button>
            <button type="button" id="cancel-cropped-{{ $elementId }}"
                class="btn btn-secondary btn-cancel">Cancel</button>
        </div>
    </div>
</div>

@push('extra_scripts')
    <script>
        $(document).ready(function () {
            console.log('Crop Image component initialized for: {{ $elementId }}');

            $('#{{ $elementId }}_file').on('change', function (event) {
                let file = event.target.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        let cropModal = $(`#crop-modal-{{ $elementId }}`);
                        let cropImg = $(`#crop-img-{{ $elementId }}`);
                        let previewImage = $(`#preview-image-{{ $elementId }}`);
                        let croppedImageInput = $(`#cropped-image-{{ $elementId }}`);

                        // Show the modal
                        cropModal.show();
                        cropImg.attr('src', e.target.result);

                        // Initialize Cropper after image is loaded
                        let cropper = new Cropper(cropImg[0], {
                            aspectRatio: {{ $width }} / {{ $height }},
                            viewMode: 1,
                            autoCropArea: 1,
                            crop(event) {
                            let canvas = cropper.getCroppedCanvas({
                                width: {{ $width }},
                                height: {{ $height }}
                                            });
                            previewImage.attr('src', canvas.toDataURL('image/webp'));
                        }
                                    });

            // Save button
            $(`#save-cropped-{{ $elementId }}`).off('click').on('click', function () {
                let canvas = cropper.getCroppedCanvas({
                    width: {{ $width }},
                    height: {{ $height }}
                                        });

                $(`#drop-zone-{{ $elementId }} img`).remove();
                $(`#drop-zone-{{ $elementId }}`).append(
                    `<img src="${canvas.toDataURL('image/webp')}" />`
                );

                croppedImageInput.val(canvas.toDataURL('image/webp'));
                cropModal.hide();
                cropper.destroy();
            });

            // Cancel button
            $(`#cancel-cropped-{{ $elementId }}`).off('click').on('click', function () {
                cropper.destroy();
                cropModal.hide();
            });
        };
        reader.readAsDataURL(file);
                            }
                        });
                    });
    </script>
@endpush