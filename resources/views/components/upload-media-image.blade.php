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
        <div id="crop-actions-{{ $name }}">
            <button type="button" id="save-cropped-{{ $name }}" class="btn btn-success btn-save">Save</button>
            <button type="button" id="cancel-cropped-{{ $name }}" class="btn btn-secondary btn-cancel">Cancel</button>
        </div>
    </div>
</div>

<!-- Upload Button -->
<button type="button" id="upload-media-{{ $name }}" class="btn btn-primary mt-2">
    Upload to Media Library
</button>

@push('extra_scripts')
    <script>
        $(document).ready(function () {
            let cropper = null;

            $('#{{ $name }}_file').on('change', function (event) {
                let file = event.target.files[0];
                if (!file) return;

                let reader = new FileReader();
                reader.onload = function (e) {
                    let cropModal = $('#crop-modal-{{ $name }}');
                    let cropImg = $('#crop-img-{{ $name }}');
                    let previewImage = $('#preview-image-{{ $name }}');
                    let croppedInput = $('#cropped-image-{{ $name }}');

                    cropImg.attr('src', e.target.result);
                    cropModal.show();
                    cropImg.show();

                    if (cropper) cropper.destroy();

                    setTimeout(() => {
                        cropper = new Cropper(cropImg[0], {
                            aspectRatio: {{ $width }} / {{ $height }},
                            viewMode: 1,
                            autoCropArea: 1,
                            crop(event) {
                            let canvas = cropper.getCroppedCanvas({
                                width: {{ $width }},
                                height: {{ $height }}
                                    });
                            if(canvas) previewImage.attr('src', canvas.toDataURL('image/webp'));
                        }
                            });
                }, 100);

            $('#save-cropped-{{ $name }}').off('click').on('click', function () {
                let canvas = cropper.getCroppedCanvas({
                    width: {{ $width }},
                    height: {{ $height }}
                            });

                if (canvas) {
                    $('#drop-zone-{{ $name }} img').remove();
                    $('#drop-zone-{{ $name }}').append(`<img src="${canvas.toDataURL('image/webp')}" />`);
                    croppedInput.val(canvas.toDataURL('image/webp'));
                    cropModal.hide();
                    cropper.destroy();
                    cropper = null;
                }
            });

            $('#cancel-cropped-{{ $name }}').off('click').on('click', function () {
                if (cropper) cropper.destroy();
                cropper = null;
                cropModal.hide();
            });
        };
        reader.readAsDataURL(file);
                });

        $('#upload-media-{{ $name }}').on('click', function () {
            let base64 = $('#cropped-image-{{ $name }}').val();
            if (!base64) {
                alert('Please crop an image first');
                return;
            }

            let mime = base64.match(/data:(.*);base64/)[1];
            let byteString = atob(base64.split(',')[1]);
            let ab = new ArrayBuffer(byteString.length);
            let ia = new Uint8Array(ab);
            for (let i = 0; i < byteString.length; i++) ia[i] = byteString.charCodeAt(i);
            let blob = new Blob([ab], {
                type: mime
            });

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
                success: function (res) {
                    if (typeof fetchMedia === 'function') fetchMedia();
                },
                error: function (xhr) {
                    alert(xhr.responseJSON?.message || 'Upload failed');
                },
                complete: function () {
                    $('#upload-media-{{ $name }}').prop('disabled', false).text('Upload to Media Library');
                }
            });
        });
            });
    </script>
@endpush