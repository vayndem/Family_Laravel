// File: tailwind.config.js

import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

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
                poppins: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'primary': '#1E5631', // Hijau Tua
                'secondary': '#4CAF50', // Hijau Terang
                'success-custom': '#5CB85C', // Hijau Aksen
                'bg-gray-custom': '#f4f8f5',
            },
            animation: {
                'scroll': 'scroll 40s linear infinite',
            },
            keyframes: {
                scroll: {
                  '0%': { transform: 'translateX(0)' },
                  '100%': { transform: 'translateX(calc(-100% - 24px))' }
                }
            },
        },
    },

    // BAGIAN INI YANG DIUBAH:
    // Kita hanya menggunakan plugin 'forms' bawaan Breeze.
    plugins: [forms],
};
