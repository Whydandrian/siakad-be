import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './app/Modules/**/*.blade.php',
        './app/Modules/**/*.php',
        './app/Modules/**/*.js',
        './node_modules/preline/dist/*.js',
    ],
    safelist: [
        'border-white/40',
        'border-gray-300',
        'bg-white/30',
        'bg-white/50',
        'backdrop-blur-sm',
        'border-2',
        'focus:ring-blue-500/50',
        'focus:border-blue-400',
        'focus:border-blue-500'
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            width: {
                '64': '16rem',
            }
        },
    },
    plugins: [
        require('preline/plugin'),
        require('tailwindcss-motion')
    ],
};
