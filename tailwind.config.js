/** @type {import('tailwindcss').Config} */
export default {
  content: ["./resources/**/*.blade.php",
  "./resources/**/*.js",],
  theme: {
    extend: {
      fontFamily: {
        sora: ['Sora'],
        pacifico: ['Pacifico'],
      },
      fontSize: {
        10: '10px',
        12: '12px',
        14: '14px',
        16: '16px',
        18: '18px',
        20: '20px',
        22: '22px',
        24: '24px',
        26: '28px',
        28: '28px',
        32: '32px',
        36: '36px',
        48: '48px',
        56: '56px',
      },
      colors: {
        primary: {
          50: '#f1f6fd',
          100: '#e0eaf9',
          200: '#c7dbf6',
          300: '#a1c4ef',
          400: '#74a3e6',
          500: '#5484dd',
          600: '#3f69d1',
          700: '#3656bf',
          800: '#32489e',
          900: '#2c3f7c',
          950: '#1f284c',
        },
      },
    },
  },
  plugins: [],
}

