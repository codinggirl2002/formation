/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./public/index.html",
            "./public/page1.html",
            "./public/page2.html",
            "./public/page3.html",
           "./src/**/*.{html,js}"],
  theme: {
    extend: {
      fontFamily: {
        courgette :['Courgette'],
      },
      colors: {
        primary: '#10b981',
        secondary: '#f59e0b',
        primary3:  '#f59e0b',
        secondary3: '#f8fafc',
      },
    },
  },
  plugins: [],
}

