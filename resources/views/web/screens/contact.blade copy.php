@extends('web.layouts.page')

@section('page_content')
    <section class="py-16 bg-white">
        <div class="container">
            <div class="grid lg:grid-cols-2 grid-cols-1 gap-10">
                <div>
                    <h3 class="text-3xl text-orange-500 font-bold ps-5 border-s-4 border-s-orange-500 mb-5">
                        Enquiry Now:
                    </h3>
                    <form id="enquiryForm" action="{{ route('enquiry.submit') }}" method="POST" class="flex flex-col gap-5"
                        novalidate>
                        @csrf
                        <div class="form-group">
                            <label class="block font-bold mb-2" for="name">Name:</label>
                            <input type="text" id="name" name="name" class="w-full p-2 border rounded"
                                value="{{ old('name') }}" required>
                            <div class="text-red-500 text-sm hidden" id="nameError">
                                Please provide your name.
                            </div>
                            @error('name')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="block font-bold mb-2" for="phone">Contact No.:</label>
                            <input type="tel" id="phone" name="phone" class="w-full p-2 border rounded"
                                value="{{ old('phone') }}" required>
                            <div class="text-red-500 text-sm hidden" id="phoneError">
                                Please provide your contact number.
                            </div>
                            @error('phone')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="block font-bold mb-2" for="email">Email:</label>
                            <input type="email" id="email" name="email" class="w-full p-2 border rounded"
                                value="{{ old('email') }}" required>
                            <div class="text-red-500 text-sm hidden" id="emailError">
                                Please provide a valid email address.
                            </div>
                            @error('email')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="block font-bold mb-2" for="message">Message:</label>
                            <textarea id="message" name="message" class="w-full h-72 p-2 border rounded" rows="4" required>{{ old('message') }}</textarea>
                            <div class="text-red-500 text-sm hidden" id="messageError">
                                Please provide a message.
                            </div>
                            @error('message')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded">Send Message <i
                                class="bi bi-chevron-right"></i></button>
                    </form>
                </div>
                <div>
                    <h3 class="text-3xl text-orange-500 font-bold ps-5 border-s-4 border-s-orange-500 mb-5">
                        Get in Touch:
                    </h3>
                    <div class="text-lg">
                        <div class="flex gap-3 items-center py-5 border-b-2">
                            <i class="bi bi-phone text-orange-500 text-3xl"></i>
                            <div>
                                <div class="font-bold">
                                    Contact No.:
                                </div>
                                <a href="tel:{{ $site->phone }}">{{ $site->phone }}</a>
                            </div>
                        </div>
                        <div class="flex gap-3 items-center py-5 border-b-2">
                            <i class="bi bi-envelope text-orange-500 text-3xl"></i>
                            <div>
                                <div class="font-bold">
                                    Email Address:
                                </div>
                                <a href="mailto:{{ $site->email }}">{{ $site->email }}</a>
                            </div>
                        </div>
                        <div class="flex gap-3 py-5">
                            <i class="bi bi-geo-alt text-orange-500 text-3xl"></i>
                            <address>
                                <span class="font-bold">{{ $site->title }}</span>,<br />
                                {!! nl2br($site->address) !!}
                            </address>
                        </div>

                        <div class="border">
                            <iframe src="{{ $site->google_map }}" class="w-full aspect-[2/1]" allowfullscreen=""
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('enquiryForm');
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                event.stopPropagation();
                let isValid = true;

                const name = document.getElementById('name');
                const phone = document.getElementById('phone');
                const email = document.getElementById('email');
                const message = document.getElementById('message');

                if (!name.value) {
                    isValid = false;
                    document.getElementById('nameError').classList.remove('hidden');
                } else {
                    document.getElementById('nameError').classList.add('hidden');
                }

                if (!phone.value) {
                    isValid = false;
                    document.getElementById('phoneError').classList.remove('hidden');
                } else {
                    document.getElementById('phoneError').classList.add('hidden');
                }

                if (!email.value) {
                    isValid = false;
                    document.getElementById('emailError').classList.remove('hidden');
                } else {
                    document.getElementById('emailError').classList.add('hidden');
                }

                if (!message.value) {
                    isValid = false;
                    document.getElementById('messageError').classList.remove('hidden');
                } else {
                    document.getElementById('messageError').classList.add('hidden');
                }

                if (isValid) {
                    const formData = new FormData(form);
                    fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content')
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('Message sent successfully!');
                                form.reset();
                            } else {
                                alert('An error occurred. Please try again.');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('An error occurred. Please try again.');
                        });
                }
            }, false);
        });
    </script>
@endsection
