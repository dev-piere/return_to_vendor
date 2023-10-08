/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./application/views/**/*.{php,js}", "./application/views/component/*.{php,js}", "./assets/**/*.{php,js}"],
  theme: {
    container: {
      center: true,
    },
    extend: {},
  },
  plugins: [],
}

// npx tailwindcss -i ./assets/css/main.css -o ./assets/dist/output.css --watch