import forms from '@tailwindcss/forms';
/** @type {import('tailwindcss').Config} */
module.exports = {
   content: [
      './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
      './storage/framework/views/*.php',
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
   ],
   theme: {
      extend: {
         colors: {
            'nav': {
               DEFAULT: '#016064',
               'hover': '#02989d'
            },
         }
      },
   },
   plugins: [forms],
}
