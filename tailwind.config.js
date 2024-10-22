/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./index.html",
    "./tugas/*.html",
    "./admin/*.php",
    "./auth/*.php",
    "./admin/jumbotron/*.php",
    "./admin/postkata/*.php",
  ],
  theme: {
    container: {
      center: true,
      padding: "16px",
    },

    extend: {
      screens: {
        "2xl": "1300px",
      },
    },
    extend: {},
  },
  plugins: [],
};
