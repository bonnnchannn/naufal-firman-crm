import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    darkMode: 'class', // Menambahkan dukungan untuk dark mode berbasis kelas

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Menambahkan beberapa warna khusus untuk dark mode (jika diperlukan)
                darkBackground: '#181818', // Contoh untuk latar belakang gelap
                lightBackground: '#ffffff', // Latar belakang terang
            },
        },
    },

    plugins: [forms],
};
