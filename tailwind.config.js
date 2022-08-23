/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')
const plugin = require('tailwindcss/plugin')

module.exports = {
  content: [
      './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
      './storage/framework/views/*.php',
      './resources/views/**/*.{blade.php,css,js}',
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
