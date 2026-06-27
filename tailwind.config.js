import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            colors: {
                'kayo-black': '#0B0B0B',
                'kayo-beige': '#F3EFEA',
                'kayo-orange': '#C45A2A',
                'kayo-violet': '#5B2D8B',
            },
            fontFamily: {
                title: ['Playfair Display', ...defaultTheme.fontFamily.serif],
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
