/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.js",
        "./resources/js/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#272829",
                secondary: "#EC512E",
                darkSecondary: "#202020",
                grey: "#555555",
                delete: "#AB1E1E",
                layoutBg: "#323232",
            },
            fontFamily: {
                quicksand: ["Quicksand"],
            },
        },
    },
    plugins: [],
};
