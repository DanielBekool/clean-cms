/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
// tailwind.config.js
theme: {
  extend: {
    spacing: Object.fromEntries(
      Array.from({ length: 300 }, (_, i) => [i + 1, `${(i + 1) * 0.25}rem`])
    ),
  },
},

  plugins: [],
}
