/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./public/*.html","./public/*.js","./src/**/*.{html,js}"],
  theme: {
    extend: {
      colors: {
        primary: '#2563eb',
      },
      boxShadow: {
        inset:'inset 0 0 10px #2563eb, 0 0 10px #2563eb',
      }
    },
  },
  plugins: [ require('tailwind-scrollbar'),],
  darkMode: "class",
}

