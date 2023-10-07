/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            container: {
                center: true, // Menengahkan konten di dalam container
                padding: {
                    default: "1rem", // Padding default container
                    sm: "6rem", // Padding pada breakpoint sm
                    lg: "9rem", // Padding pada breakpoint lg
                },
            },
        },
    },
    plugins: [],
};
