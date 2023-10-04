/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    '../../config/**/*.yaml',
    '../../pages/**/*.md',
    './blueprints/**/*.yaml',
    './js/**/*.js',
    './templates/**/*.twig',
    './custom-theme.yaml',
    './custom-theme.php'
  ],
  darkMode: 'class', //false or 'media' or 'class'
  theme: {
    extend: {
        colors: {
            primary: '#1299A7',
            secondary: '#F87010',
            gray: {
                '900': '#808080'
            },
        },
        fontFamily: {
            sans: ['Hind Vadodara'],
        },
    },
  },
  variants: {
    extend: {}
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
    require('tailwindcss-debug-screens')
  ]
}
