/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
         // custom color here
        'custom-color': '#36383C',
        'custom-color-2':'#6C757D'
      }
    }
  },
  plugins: [
    require('daisyui'),
    require('flowbite/plugin'),
  ],
}
