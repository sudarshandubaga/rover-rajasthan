@php
    $whatsappNumber = preg_replace('/[^0-9]/', '', $site->phone);
    if (strlen($whatsappNumber) === 10) {
        $whatsappNumber = '91' . $whatsappNumber;
    }
    $message = urlencode('Hello, I need a taxi service. Please share details.');
    $whatsappUrl = "https://wa.me/{$whatsappNumber}?text={$message}";
@endphp

<div class="fixed bottom-8 right-8 z-[9999] flex flex-col items-end gap-3">
    {{-- Chat Bubble/Tooltip --}}
    <div class="mb-2 transition-all duration-500 transform translate-y-4 opacity-0 pointer-events-none group-hover:translate-y-0 group-hover:opacity-100"
        id="whatsapp-tooltip">
        <div
            class="bg-white/90 backdrop-blur-md border border-white/20 px-4 py-2 rounded-2xl shadow-2xl text-gray-800 text-sm font-medium flex items-center gap-2">
            <span class="flex h-2 w-2 rounded-full bg-green-500 animate-ping"></span>
            Need help? Chat with us!
        </div>
    </div>

    {{-- Main Button & Animations --}}
    <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer" class="relative group"
        aria-label="Chat on WhatsApp">

        {{-- Pulse Animation Rings (Non-clickable) --}}
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute -inset-1 bg-[#25D366] rounded-full opacity-20 animate-ping"></div>
            <div class="absolute -inset-2 bg-[#25D366] rounded-full opacity-10 animate-ping"
                style="animation-delay: 0.5s"></div>
        </div>

        {{-- The Icon Button --}}
        <div
            class="flex items-center justify-center w-16 h-16 bg-[#25D366] text-white rounded-full shadow-[0_10px_30px_rgba(37,211,102,0.4)] transition-all duration-300 group-hover:scale-110 group-hover:-translate-y-1 group-hover:shadow-[0_15px_40px_rgba(37,211,102,0.5)] active:scale-95 relative z-10">
            <i class="bi bi-whatsapp text-3xl"></i>

            {{-- Notification Dot --}}
            <span class="absolute top-0 right-0 block h-4 w-4 rounded-full bg-red-500 border-2 border-white"></span>
        </div>
    </a>
</div>


<script>
    // Logic to show/hide tooltip on scroll or timer
    document.addEventListener('DOMContentLoaded', function () {
        const tooltip = document.getElementById('whatsapp-tooltip');
        setTimeout(() => {
            if (tooltip) {
                tooltip.classList.remove('opacity-0', 'translate-y-4', 'pointer-events-none');
            }
        }, 3000);
    });
</script>

<style>
    /* Custom animations if needed beyond Tailwind */
    @keyframes slow-bounce {

        0%,
        100% {
            transform: translateY(-5%);
        }

        50% {
            transform: translateY(0);
        }
    }

    .animate-slow-bounce {
        animation: slow-bounce 3s infinite ease-in-out;
    }
</style>