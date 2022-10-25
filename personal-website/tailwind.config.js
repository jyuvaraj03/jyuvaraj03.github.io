/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./pages/**/*.{js,ts,jsx,tsx}",
    "./components/**/*.{js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {
      fontFamily: {
        'patrick-hand': ['"Patrick Hand"', 'cursive'],
        'patua-one': ['"Patua One"', 'cursive'],
        'cabin': ['Cabin', 'sans-serif']
      }
    },
  },
  plugins: [],
}
