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

@push('extra_scripts')
    <script>
        $(document).ready(function () {
            $('#{{ $name }}_file').on('change', function (event) {
                let file = event.target.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        let imageFileId = event.target.id;
                        let cropModal = $(`#crop-modal-{{ $name }}`);
                        let cropImg = $(`#crop-img-{{ $name }}`);
                        let previewContainer = $(`#preview-container-{{ $name }}`);
                        let previewImage = $(`#preview-image-{{ $name }}`);
                        let croppedImageInput = $(`#cropped-image-{{ $name }}`);
                        let cropActions = $(`#crop-actions-{{ $name }}`);

                        // Show the modal
                        cropModal.show();
                        cropImg.attr('src', e.target.result);

                        // Initialize Cropper after image is loaded
                        cropImg.on('load', function () {
                            let cropper = new Cropper(cropImg[0], {
                                aspectRatio: {{ $width }} /
                                                            {{ $height }},
                                viewMode: 1,
                                autoCropArea: 1,
                                crop(event) {
                                    let canvas = cropper.getCroppedCanvas({
                                        width: {{ $width }},
                                        height: {{ $height }}
                                                            });
                                    previewImage.attr('src', canvas.toDataURL(
                                        'image/webp'));
                                }
                            });

                            // Save button: Update the textarea with the cropped image
                            $(`#save-cropped-{{ $name }}`).on('click', function () {
                                let canvas = cropper.getCroppedCanvas({
                                    width: {{ $width }},
                                    height: {{ $height }}
                                                        });

                                $(`#drop-zone-{{ $name }} img`).remove();
                                $(`#drop-zone-{{ $name }}`).append(
                                    `<img src="${canvas.toDataURL('image/webp')}" />`
                                );

                                croppedImageInput.val(canvas.toDataURL('image/webp'));
                                previewImage.attr('src', canvas.toDataURL(
                                    'image/webp'));
                                cropModal.hide(); // Close the modal after saving
                            });

                            // Cancel button: Close the modal and reset everything
                            $(`#cancel-cropped-{{ $name }}`).on('click', function () {
                                cropper.destroy();
                                cropModal.hide();
                            });
                        });
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endpush