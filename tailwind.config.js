import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import filters from 'tailwindcss-filters';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            filter: {
                'invert': 'invert(1)',
            },
        },
    },

    plugins: [
        forms,
        filters,
    ],
};
