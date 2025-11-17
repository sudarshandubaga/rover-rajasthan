import Swiper from "swiper";

import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";
import "swiper/css/effect-fade"; // Import fade effect

import {
    Autoplay,
    Navigation,
    Pagination,
    EffectCoverflow,
    EffectFade, // Added EffectFade for testimonials slider
} from "swiper/modules";

document.addEventListener("DOMContentLoaded", function () {
    // Main Banner Swiper (using .mySwiper) - Existing
    new Swiper(".mySwiper", {
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        modules: [Navigation, Pagination, Autoplay, EffectCoverflow],
        effect: "coverflow",
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });

    // Testimonials Swiper - NEW
    new Swiper(".testimonials-swiper", {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 30,
        effect: "fade", // Clean transition for testimonials
        modules: [Autoplay, Pagination, EffectFade],
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".testimonials-swiper .swiper-pagination",
            clickable: true,
        },
    });

    // Gallery Swiper - NEW
    new Swiper(".gallery-swiper", {
        loop: true,
        spaceBetween: 24,
        modules: [Autoplay, Navigation, Pagination],
        autoplay: {
            delay: 3500,
            disableOnInteraction: true,
        },
        breakpoints: {
            // Show 1 slide on smaller phones
            0: { slidesPerView: 1, spaceBetween: 10 },
            // Show 2 slides on tablets
            640: { slidesPerView: 2, spaceBetween: 20 },
            // Show 3 slides on desktops
            1024: { slidesPerView: 3, spaceBetween: 30 },
        },
        navigation: {
            nextEl: ".gallery-swiper .swiper-button-next",
            prevEl: ".gallery-swiper .swiper-button-prev",
        },
        pagination: {
            el: ".gallery-swiper .swiper-pagination",
            clickable: true,
        },
    });

    new Swiper(".carousel", {
        modules: [Autoplay],
        loop: true,
        autoplay: {
            delay: 0,
            pauseOnMouseEnter: true,
            waitForTransition: true,
        },
        speed: 2000,
        spaceBetween: 20,
        freeMode: true,
        breakpoints: {
            800: {
                slidesPerView: 4,
            },
            0: {
                slidesPerView: 2.5,
            },
        },
    });

    $(document).on("click", ".toggle-menu", function () {
        $(".navbar").toggleClass("active");
    });
});
