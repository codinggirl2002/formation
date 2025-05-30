/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./public/index.html","./public/me.html","./src/**/*.{html,js}"],
  theme: {
    extend: {
        colors: {
          primary: '#FF6363',
          secondary: {
            100: '#E2E2D5',
            200: '#888883',
          }
        },
        fontFamily: {
          DS: ['Dancing Script'],
          PY: ['Playwrite HR Lijeva'],
        }
    },
  },
  plugins: [],
}

