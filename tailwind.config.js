/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        \"./resources/**/*.blade.php\",
        \"./resources/**/*.js\", 
        \"./resources/**/*.vue\",
    ],
    theme: {
        extend: {
            maxWidth: {
                '7xl': '80rem',
                '8xl': '88rem',
            },
            container: {
                center: true,
                padding: '1rem',
            }
        },
    },
    plugins: [],
};
