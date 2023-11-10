/** @type {import('tailwindcss').Config} */
export default {
    content: ['./resources/**/*.blade.php', './resources/**/*.js'],
    theme: {
        extend: {
            colors: {
                text: {
                    light: '#4c4f69',
                    dark: '#cdd6f4',
                },
                light: '#eff1f5',
                dark: '#1e1e2e',
            },
        },
    },
    plugins: [],
};
