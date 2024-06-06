import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class", // or 'media'

    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/wire-elements/modal/resources/views/*.blade.php",
        "./storage/framework/views/*.php",

        "./resources/views/**/*.blade.php",
        "node_modules/preline/dist/*.js",
    ],
    // safelist: [
    //     {
    //     //   pattern: /max-w-(sm|md|lg|xl|2xl|3xl|4xl|5xl|6xl|7xl)/,
    //       variants: ['sm', 'md', 'lg', 'xl', '2xl']
    //     }
    //   ],

    theme: {
        extend: {
            fontFamily: {
                // sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                primary: [
                    "source-sans-pro",
                    "sans-serif",
                    defaultTheme.fontFamily.primary,
                ],
            },
            colors: {
                primary: "#7367f0",
                bg_light: "#f8f7fa",
                bg_dark_main: "#25293c",
                bg_dark: "#2f3349",
            },
            boxShadow: {
                primary: "0 .25rem 1.125rem rgba(75, 70, 92, .1)",
            },
        },
    },

    plugins: [forms, require("preline/plugin")],
};
