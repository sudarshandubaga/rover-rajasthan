<x-mail::message>
    # New Feedback Received

    You have received new feedback from the website.

    **Name:** {{ $feedback->name }}
    **Email:** {{ $feedback->email }}
    **Mobile:** {{ $feedback->mobile }}
    **Rating:** {{ $feedback->rating }}/5

    **Message:**
    {{ $feedback->message }}

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>