/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        './vendor/hup234design/filament-cms/resources/**/*.blade.php',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                brand: {
                    skyblue:     '#24bff8',
                    crimson:     '#f43f5e',
                    blue:        '#0d6efd',
                    'dark-blue': '#06377e'
                }
            }
            // typography: ({ theme }) => ({
            //     DEFAULT: {
            //         css: {
            //             color: '#0000ff',
            //             '--tw-prose-headings': theme('colors.pink[900]'),
            //             '--tw-prose-lead': theme('colors.pink[700]'),
            //             a: {
            //                 color: '#00ff00',
            //                 '&:hover': {
            //                     color: '#ff0000',
            //                 },
            //             },
            //         },
            //     },
            // }),
        },
    },
    // corePlugins: {
    //     aspectRatio: false,
    // },
    plugins: [
        require('@tailwindcss/typography'),
        require('@tailwindcss/forms'),
        // require('@tailwindcss/aspect-ratio'),
    ],
}
