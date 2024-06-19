import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import filters from "tailwindcss-filters";
const { addIconSelectors } = require("@iconify/tailwind");

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],
    plugins: [addIconSelectors(["mdi", "mdi-light"])],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            filter: {
                invert: "invert(1)",
            },
            colors: {
                orangered: "#FFC080",
            },
            backgroundImage: {
                "hero-pattern":
                    "linear-gradient(to right bottom, rgba(0, 0, 0, .9), rgba(43, 108, 176, 0.3)), url('assets/img-1.jpg')",

                "service-pattern":
                    "linear-gradient(to right bottom, rgba(0, 0, 0, .9), rgba(43, 108, 176, 0.9)), url('assets/img-5.jpg')",

                "gallery-pattern1": "url('assets/img-12.jpg')",

                "gallery-pattern2": "url('assets/img-14.jpg')",

                "gallery-pattern3": "url('assets/img-19.jpg')",

                "gallery-pattern4": "url('assets/img-16.jpg')",

                "gallery-pattern5": "url('assets/img-17.jpg')",

                "footer-pattern":
                    "linear-gradient(to right bottom, rgba(0, 0, 0, .8), rgba(0, 0, 0, 0.8)), url('assets/img-7.jpg')",
            },
        },
    },

    plugins: [forms, filters],
};
