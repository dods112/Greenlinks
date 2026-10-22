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
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                teal: {
                    50: '#effefc',
                    100: '#d2fbf6',
                    200: '#a6f5ed',
                    300: '#74e9df',
                    400: '#3fd6cb',
                    500: '#22bdb2',
                    600: '#16a095',
                    700: '#117f78',
                    800: '#0e6360',
                    900: '#0d4f4d',
                    950: '#042f2e',
                },
            },
        },
    },

    plugins: [forms],
};