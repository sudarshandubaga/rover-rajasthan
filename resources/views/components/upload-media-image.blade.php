@props(['width' => 300, 'height' => 300, 'name' => 'image', 'image' => ''])

<label class="drop-zone" id="drop-zone-{{ $name }}">
    <p>Click to upload image</p>
    <input type="file" id="{{ $name }}_file" name="{{ $name }}_file" class="crop-image-picker"
        accept="image/*">
    <textarea name="{{ $name }}" id="cropped-image-{{ $name }}" class="d-none"></textarea>

    @if (!empty($image))
        <img src="{{ $image }}" alt="Preview Image">
    @endif
</label>

<!-- Modal for Cropping Image -->
<div id="crop-modal-{{ $name }}" class="crop-modal">
    <div class="crop-modal-content">
        <span id="close-modal-{{ $name }}" class="close-modal">&times;</span>
        <div id="preview-container-{{ $name }}" style="display: none;">
            <img id="preview-image-{{ $name }}" alt="Cropped Image">
        </div>
        <img id="crop-img-{{ $name }}" style="max-width: 100%;">
        <div id="crop-actions-{{ $name }}">
            <button type="button" id="save-cropped-{{ $name }}" class="btn btn-success btn-save">Save</button>
            <button type="button" id="cancel-cropped-{{ $name }}"
                class="btn btn-secondary btn-cancel">Cancel</button>
        </div>
    </div>
</div>

<!-- Upload Button -->
<button type="button" id="upload-media-{{ $name }}" class="btn btn-primary mt-2">
    Upload to Media Library
</button>

<!-- Include Cropper.js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>

<style>
    .crop-modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .crop-modal-content {
        background-color: #fff;
        margin: 10% auto;
        padding: 20px;
        border-radius: 6px;
        width: 80%;
        max-width: 600px;
        position: relative;
    }

    .close-modal {
        color: #aaa;
        font-size: 28px;
        font-weight: bold;
        position: absolute;
        top: 10px;
        right: 15px;
        cursor: pointer;
    }

    .close-modal:hover {
        color: black;
    }
</style>

<script>
    $(document).ready(function() {

        let cropper = null;

        $('#{{ $name }}_file').on('change', function(event) {
            let file = event.target.files[0];
            if (!file) return;

            let reader = new FileReader();
            reader.onload = function(e) {
                let cropModal = $('#crop-modal-{{ $name }}');
                let cropImg = $('#crop-img-{{ $name }}');
                let previewImage = $('#preview-image-{{ $name }}');
                let croppedInput = $('#cropped-image-{{ $name }}');

                cropImg.attr('src', e.target.result);

                // Show the modal and make image visible
                cropModal.show();
                cropImg.show();

                // Destroy previous cropper if exists
                if (cropper) cropper.destroy();

                // Wait a tiny bit to ensure DOM is rendered
                setTimeout(() => {
                    cropper = new Cropper(cropImg[0], {
                        aspectRatio: {{ $width }} / {{ $height }},
                        viewMode: 1,
                        autoCropArea: 1,
                        ready() {
                            // Optionally show preview container
                            previewImage.parent().show();
                        },
                        crop(event) {
                            let canvas = cropper.getCroppedCanvas({
                                width: {{ $width }},
                                height: {{ $height }}
                            });
                            if (canvas) previewImage.attr('src', canvas.toDataURL(
                                'image/webp'));
                        }
                    });
                }, 100); // 100ms delay ensures image is visible in DOM

                // Save button
                $('#save-cropped-{{ $name }}').off().on('click', function() {
                    if (!cropper) {
                        alert('Cropper not ready');
                        return;
                    }

                    let canvas = cropper.getCroppedCanvas({
                        width: {{ $width }},
                        height: {{ $height }}
                    });

                    if (!canvas) {
                        // alert('Failed to crop image');
                        return;
                    }

                    $('#drop-zone-{{ $name }} img').remove();
                    $('#drop-zone-{{ $name }}').append(
                        `<img src="${canvas.toDataURL('image/webp')}" />`);
                    croppedInput.val(canvas.toDataURL('image/webp'));

                    cropModal.hide();
                    cropper.destroy();
                    cropper = null;
                });

                // Cancel button
                $('#cancel-cropped-{{ $name }}').off().on('click', function() {
                    if (cropper) cropper.destroy();
                    cropper = null;
                    cropModal.hide();
                });
            };

            reader.readAsDataURL(file);
        });


        // Close modal on X click
        $('#close-modal-{{ $name }}').on('click', function() {
            $('#crop-modal-{{ $name }}').hide();
        });

        // Close modal if clicking outside
        $(window).on('click', function(event) {
            if ($(event.target).hasClass('crop-modal')) {
                $(event.target).hide();
            }
        });

        // -----------------------------
        // AJAX Upload to Media Library
        // -----------------------------
        function base64ToBlob(base64, mime) {
            let byteString = atob(base64.split(',')[1]);
            let ab = new ArrayBuffer(byteString.length);
            let ia = new Uint8Array(ab);
            for (let i = 0; i < byteString.length; i++) ia[i] = byteString.charCodeAt(i);
            return new Blob([ab], {
                type: mime
            });
        }

        $('#upload-media-{{ $name }}').on('click', function() {
            let base64 = $('#cropped-image-{{ $name }}').val();
            if (!base64) {
                alert('Please crop an image first');
                return;
            }

            let mime = base64.match(/data:(.*);base64/)[1];
            let blob = base64ToBlob(base64, mime);
            let formData = new FormData();
            formData.append('image', blob, 'cropped-image.webp');
            formData.append('_token', '{{ csrf_token() }}');

            $(this).prop('disabled', true).text('Uploading...');

            $.ajax({
                url: "{{ route('admin.media.store') }}",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {
                    // Optionally refresh media library
                    if (typeof fetchMedia === 'function') fetchMedia();
                },
                error: function(xhr) {
                    alert(xhr.responseJSON?.message || 'Upload failed');
                },
                complete: function() {
                    $('#upload-media-{{ $name }}').prop('disabled', false).text(
                        'Upload to Media Library');
                }
            });
        });

    });
</script>
