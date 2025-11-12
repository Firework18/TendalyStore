/** @type {import('tailwindcss').Config} */
export default {
  darkMode:false,
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",

  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['"Poppins"', 'sans-serif'], // <-- aquí agregas la fuente
      },
    },
  },
  plugins: [],
}

