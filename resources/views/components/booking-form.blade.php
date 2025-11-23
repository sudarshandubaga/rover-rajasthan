<section id="booking-form" class="relative -mt-16 lg:-mt-24 z-20 container mx-auto px-4">
    <div class="bg-white rounded-xl shadow-2xl p-6 lg:p-8">

        <div class="flex gap-4 mb-4">
            <button class="trip-tab bg-roberto-teal text-white px-4 py-2 rounded-lg border shadow" data-trip="local">Local
                Trip</button>
            <button class="trip-tab bg-white text-gray-600 px-4 py-2 rounded-lg border shadow" data-trip="oneway">One Way
                Trip</button>
            <button class="trip-tab bg-white text-gray-600 px-4 py-2 rounded-lg border shadow" data-trip="round">Round
                Trip</button>
        </div>

        <form id="bookingForm">
            @csrf
            <input type="hidden" name="booking_type" id="booking_type">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-4">

                <div class="space-y-1">
                    <label class="block text-xs font-semibold uppercase text-gray-500">From City</label>
                    <x-select-dropdown id="source_city" name="source_city" class="w-full border rounded-lg p-3"
                        required>
                        <option value="">--select--</option>
                        @foreach ($cities as $id => $name)
                            <option value="{{ $name }}">{{ $name }}</option>
                        @endforeach
                    </x-select-dropdown>
                </div>

                <div class="space-y-1" id="destination-wrapper">
                    <label class="block text-xs font-semibold uppercase text-gray-500">Destination City</label>
                    <x-select-dropdown id="destination_city" name="destination_city"
                        class="w-full border rounded-lg p-3">
                        <option value="">--select--</option>
                        @foreach ($cities as $id => $name)
                            <option value="{{ $name }}">{{ $name }}</option>
                        @endforeach
                    </x-select-dropdown>
                </div>

                <div class="space-y-1">
                    <label class="block text-xs font-semibold uppercase text-gray-500">Travel Date</label>
                    <input type="date" id="travel_date" name="travel_date" class="w-full border rounded-lg p-3"
                        required />
                </div>

                <div class="space-y-1">
                    <label class="block text-xs font-semibold uppercase text-gray-500">Contact No.</label>
                    <input type="tel" id="contact_no" name="contact_no" class="w-full border rounded-lg p-3"
                        required />
                </div>

                <div class="space-y-1">
                    <label class="block text-xs font-semibold uppercase text-gray-500">Vehicle Type</label>
                    <x-select-dropdown id="vehicle_type" name="vehicle_type" class="w-full border rounded-lg p-3"
                        required>
                        <option value="">--select--</option>
                        @foreach ($cabs as $cab)
                            <option value="{{ $cab->vehicle_type }} ({{ $cab->capacity }} Seater)">
                                {{ $cab->vehicle_type }} ({{ $cab->capacity }} Seater)
                            </option>
                        @endforeach
                    </x-select-dropdown>
                </div>

                <!-- Submit -->
                <button id="submitBtn" type="submit"
                    class="lg:col-span-1 mt-5 bg-roberto-teal text-white font-bold text-lg rounded-lg py-3 px-6 hover:bg-teal-400 transition duration-300 shadow-md">
                    SUBMIT
                </button>
            </div>
        </form>
    </div>
</section>

@push('extra_scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            function setActiveTab(trip) {
                $(".trip-tab").removeClass("bg-roberto-teal text-white").addClass("bg-white text-gray-600");
                $('.trip-tab[data-trip="' + trip + '"]').removeClass("bg-white text-gray-600").addClass(
                    "bg-roberto-teal text-white");

                $('#booking_type').val(trip);
            }

            function updateFormFields(trip) {
                if (trip === "local") {
                    $("#destination-wrapper").hide();
                } else {
                    $("#destination-wrapper").show();
                }
            }

            // default
            let currentTrip = "local";
            setActiveTab(currentTrip);
            updateFormFields(currentTrip);

            // on tab click
            $(".trip-tab").on("click", function() {
                let trip = $(this).data("trip");
                setActiveTab(trip);
                updateFormFields(trip);
            });
        });
    </script>
    <script>
        $("#bookingForm").on("submit", function(e) {
            e.preventDefault();

            let btn = $("#submitBtn");
            btn.prop("disabled", true).text("Processing...");

            $.ajax({
                url: "{{ route('booking-enquiry.store') }}",
                method: "POST",
                data: $(this).serialize(),
                success: function(res) {
                    btn.prop("disabled", false).text("SUBMIT");

                    if (res.success) {
                        Swal.fire("Success!", "Booking request submitted!", "success");
                        $("#bookingForm")[0].reset();
                    } else {
                        Swal.fire("Error!", "Something went wrong.", "error");
                    }
                },
                error: function() {
                    btn.prop("disabled", false).text("SUBMIT");
                    Swal.fire("Error!", "Server error occurred.", "error");
                }
            });
        });
    </script>
@endpush
