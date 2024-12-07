/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./public/index.html",
            "./public/page1.html",
            "./public/page2.html",
           "./src/**/*.{html,js}"],
  theme: {
    extend: {
      fontFamily: {
        courgette :['Courgette'],
      },
      colors: {
        primary: '#10b981',
        secondary: '#f59e0b',
      },
    },
  },
  plugins: [],
}

