import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'et-skyblue': {
                    DEFAULT: '#24BFF8',
                    50: '#D6F3FE',
                    100: '#C2EDFD',
                    200: '#9BE2FC',
                    300: '#73D6FB',
                    400: '#4CCBF9',
                    500: '#24BFF8',
                    600: '#07A3DD',
                    700: '#057BA6',
                    800: '#045370',
                    900: '#022B3A',
                    950: '#01171F'
                },
                'et-crimson': {
                    DEFAULT: '#F43F5E',
                    50: '#FEEDF0',
                    100: '#FDD9DF',
                    200: '#FBB3BF',
                    300: '#F88C9F',
                    400: '#F6667E',
                    500: '#F43F5E',
                    600: '#ED0E34',
                    700: '#B80B28',
                    800: '#83081D',
                    900: '#4E0411',
                    950: '#34030B'
                },
                'et-blue': {
                    DEFAULT: '#0D6EFD',
                    50: '#C3DBFF',
                    100: '#AFCFFE',
                    200: '#86B7FE',
                    300: '#5E9EFE',
                    400: '#3586FD',
                    500: '#0D6EFD',
                    600: '#0255D0',
                    700: '#013E99',
                    800: '#012861',
                    900: '#001129',
                    950: '#00050D'
                },
                'et-navy': {
                    DEFAULT: '#06377E',
                    50: '#458EF6',
                    100: '#3282F5',
                    200: '#0C6AF3',
                    300: '#0A59CC',
                    400: '#0848A5',
                    500: '#06377E',
                    600: '#032048',
                    700: '#010813',
                    800: '#000000',
                    900: '#000000',
                    950: '#000000'
                }, // Adjusted darker version of et-darkblue
            }
        },
    },
    plugins: [
        require('@tailwindcss/typography'),
    ],
};
