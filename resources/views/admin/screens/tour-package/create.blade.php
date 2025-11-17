@extends('admin.layouts.afterlogin')

@section('title', 'Tour Package » Add New')

@section('admin_content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <form action="{{ route('admin.tour-package.store') }}" method="post">
            @csrf
            <div class="card mb-4 position-sticky top-0" style="z-index: 1;">
                <div class="card-body py-2">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h3 class="m-0">Add New Tour Package</h3>
                        </div>
                        <div class="text-end">
                            <button class="btn btn-primary px-5">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            <x-alert />
            @include('admin.screens.tour-package._form')
        </form>
    </div>
    <!-- /Content -->
@endsection



@push('scripts')
    <script>
        $(document).ready(function() {

            /* ---------------------------
               Add Gallery Image Field
            ---------------------------- */
            $('#add-gallery').on('click', function() {
                $('#gallery-wrapper').append(`
            <div class="mb-2 d-flex gap-2 align-items-center gallery-item">
                <input type="text" name="gallery[]" class="form-control" placeholder="Enter image URL">
                <button type="button" class="btn btn-danger remove-gallery">X</button>
            </div>
        `);
            });

            /* ---------------------------
               Remove Gallery Field
            ---------------------------- */
            $(document).on('click', '.remove-gallery', function() {
                $(this).closest('.gallery-item').remove();
            });


            /* ---------------------------
               Add Inclusion Field
            ---------------------------- */
            $('#add-inclusion').on('click', function() {
                $('#inclusion-wrapper').append(`
            <div class="mb-2 d-flex gap-2 align-items-center inclusion-item">
                <input type="text" name="inclusions[]" class="form-control" placeholder="Enter inclusion">
                <button type="button" class="btn btn-danger remove-inclusion">X</button>
            </div>
        `);
            });

            /* ---------------------------
               Remove Inclusion Field
            ---------------------------- */
            $(document).on('click', '.remove-inclusion', function() {
                $(this).closest('.inclusion-item').remove();
            });


            /* ---------------------------
               Add Exclusion Field
            ---------------------------- */
            $('#add-exclusion').on('click', function() {
                $('#exclusion-wrapper').append(`
            <div class="mb-2 d-flex gap-2 align-items-center exclusion-item">
                <input type="text" name="exclusions[]" class="form-control" placeholder="Enter exclusion">
                <button type="button" class="btn btn-danger remove-exclusion">X</button>
            </div>
        `);
            });

            /* ---------------------------
               Remove Exclusion Field
            ---------------------------- */
            $(document).on('click', '.remove-exclusion', function() {
                $(this).closest('.exclusion-item').remove();
            });


            /* ---------------------------
               Add Itinerary Field
            ---------------------------- */
            $('#add-itinerary').on('click', function() {
                $('#itinerary-wrapper').append(`
            <div class="row mb-2 itinerary-item">
                <div class="col-sm-3">
                    <input type="text" name="itinerary[][day]" class="form-control" placeholder="Day / Time">
                </div>
                <div class="col-sm-8">
                    <input type="text" name="itinerary[][description]" class="form-control" placeholder="Description">
                </div>
                <div class="col-sm-1">
                    <button type="button" class="btn btn-danger remove-itinerary">X</button>
                </div>
            </div>
        `);
            });

            /* ---------------------------
               Remove Itinerary Field
            ---------------------------- */
            $(document).on('click', '.remove-itinerary', function() {
                $(this).closest('.itinerary-item').remove();
            });

        });
    </script>
@endpush
