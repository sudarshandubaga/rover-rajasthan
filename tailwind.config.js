import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                "roberto-dark": "#123447", // Deep teal/navy (Kept the dark primary color)
                "roberto-teal": "#18B99E", // Primary accent color (Kept the mint accent)
            },
            fontFamily: {
                sans: ["Inter", "sans-serif"],
            },
            container: {
                center: true,
                padding: 15,
            },
        },
    },
    plugins: [],
};
