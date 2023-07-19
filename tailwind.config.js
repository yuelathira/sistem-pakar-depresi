/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    container: {
      center: true,
      padding: "24px",
    },
    extend: {
      colors: {
        "secondary": "#7FBCD2",
        "secondary-2": "#fc5185",
        "tertiary": "#3f72af",
        "cream": "#DAC9C9",
        "orange": "#E9A178",
        "red": "#A84448",
      },
    },
  },
  plugins: [],
}