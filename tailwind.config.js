// tailwind.config.js
const colors = require('./tokens/colors.tailwind');
const fontFamily = require('./tokens/font-family.tailwind');


module.exports = {
    purge: {
        mode: 'layers',
        content: ['./*.php', './lib/**/*.php', './config/**/*.php', './page-templates/*.php', './assets/**/*.js'],
    },
    darkMode: false, // or 'media' or 'class'
    theme: {
        colors,
        fontFamily,
        extend: {
            gridTemplateRows: {
                // Adds a custom template for the utc hero block
                'utchero': '40px 1fr 1fr 70px',
                'utcheroreverse': '70px 1fr 1fr 40px',
                'utcherocenter': '25px 1fr 1fr 25px',
            },
            gridTemplateColumns: {
                // Adds a custom template for the utc hero block
                'utchero': '1fr 60% 35% 1fr',
                'utcheroright': '1fr 35% 60% 1fr',
                'utcherocenter': '1fr 45% 45% 1fr',
            }
        },
        minHeight: {
            '23': '23rem'
        }
    },
    variants: {
        extend: {},
    },
    plugins: [],
}