const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

console.log(colors)

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Century Gothic', ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            "custom-white": "#ffffff",
            "custom-gray-dark": "#b8b8b8",
            "custom-gray": "#d7d7d7",
            "custom-gray-light": "#d3dce6",
            "text-color": "#48443e",
            "footer-gray": "#ababab",
            "footer-gray-dark": "#717171",
            ...colors
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
