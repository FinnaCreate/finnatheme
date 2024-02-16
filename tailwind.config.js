const defaultTheme = require('tailwindcss/defaultTheme')
const theme = require('./theme.json')
const finna = require('./src/scripts/index')

module.exports = {
    content: [
        './*.php',
        './assets/src/scripts/**/*.php',
        './assets/svg/**/*.php',
        './classes/**/*.php',
        './inc/**/*.php',
        './page-templates/**/*.php',
        './safelist.txt',
        './src/scripts/*.ts',
        './src/scripts/*.js',
        './template-parts/**/*.php',
        './templates/**/*.php',
        './views/**/*.php'
    ],
    theme: {
        container: {
            padding: {
                DEFAULT: '1rem',
                sm: '2rem',
                lg: '0rem'
            }
        },
        fontFamily: {
            lato: ['Lato', 'Roboto', ...defaultTheme.fontFamily.sans]
        },
        extend: {
            colors: finna.colorMapper(finna.theme('settings.color.palette', theme))
        },
        screens: {
            sm: '640px',
            md: '768px',
            lg: '1024px',
            xl: finna.theme('settings.layout.wideSize', theme)
        }
    },
    plugins: [finna.tailwind]
}
