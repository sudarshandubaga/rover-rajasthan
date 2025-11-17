@extends('web.layouts.page')

@section('page_content')
    <section class="py-16 bg-white">
        <div class="container">
            <div id="faq-accordion" class="space-y-4">
                @foreach ($faqs as $index => $faq)
                    <div class="border rounded-lg shadow-md mb-5">
                        <button class="w-full text-left p-4 font-semibold text-gray-800"
                            onclick="toggleFaq({{ $index }})">
                            Q. {{ $faq['question'] }}
                        </button>
                        <div id="faq-answer-{{ $index }}" class="p-4 text-gray-600 {{ $index > 0 ? 'hidden' : '' }}">
                            {!! $faq['answer'] !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <script>
        function toggleFaq(index) {
            let allAnswers = document.querySelectorAll('[id^="faq-answer-"]');
            allAnswers.forEach(answer => answer.classList.add('hidden'));

            let selectedAnswer = document.getElementById('faq-answer-' + index);
            selectedAnswer.classList.toggle('hidden');
        }
    </script>
@endsection
