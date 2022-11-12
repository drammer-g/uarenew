const defaultTheme = require('tailwindcss/defaultTheme');

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
            blue: "#1fb6ff",
            white: "#ffffff",
            pink: "#ff49db",
            orange: "#ff7849",
            green: "#13ce66",
            "gray-dark": "#b8b8b8",
            gray: "#d7d7d7",
            "gray-light": "#d3dce6",
            "text-color": "#48443e",
            "gray-footer": "#ababab",
            "gray-dark-footer": "#717171",
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
