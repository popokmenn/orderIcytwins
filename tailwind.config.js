module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
        fontFamily: {
            'montserrat': ['"Montserrat"', 'sans-serif']
        },
        colors: {
            icytwins: {
                light: '#f0c4a3',
                DEFAULT: '#dfb28e',
                dark: '#a47e56',
            }
        },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
