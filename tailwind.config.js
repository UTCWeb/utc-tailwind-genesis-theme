/**
 * This script adds the tailwind.config.js to the UTC Tailwind Genesis Theme.
 *
 * @package UTC\JS
 * @author Bridget Hornsby
 * @license GPL-2.0-or-later
 */
// tailwind.config.js
const colors = require("./tokens/colors.tailwind");
const fontFamily = require("./tokens/font-family.tailwind");

module.exports = {
  purge: {
    mode: "layers",
    content: [
      "./*.php",
      "./lib/**/*.php",
      "./config/**/*.php",
      "./page-templates/*.php",
      "./assets/**/*.js",
    ],
  },
  darkMode: false, // or 'media' or 'class'
  theme: {
    colors,
    fontFamily,
    extend: {
      gridTemplateRows: {
        // Adds a custom template for the utc hero block
        utchero: "40px 1fr 1fr 70px",
        utcheroreverse: "70px 1fr 1fr 40px",
        utcherocenter: "25px 1fr 1fr 25px",
      },
      gridTemplateColumns: {
        // Adds a custom template for the utc hero block
        utchero: "1fr 60% 35% 1fr",
        utcheroright: "1fr 35% 60% 1fr",
        utcherocenter: "1fr 45% 45% 1fr",
        utcmenufooter1: "1fr 37% 1fr",
        utcmenufooter2: "1fr 0% 1fr",
        utcmapfooter: "1fr 30% 1fr",
      },
      zIndex: {
        less1: "-1",
        1: "1",
        98: "98",
        99: "99",
        100: "100",
        999: "999",
        1000: "1000",
        1001: "1001",
        9999: "9999",
        100000: "100000",
      },
      minHeight: {
        5: "5rem",
        6: "1.5rem",
        8: "2rem",
        21: "21rem",
        23: "23rem",
      },
      maxWidth: {
        auto: "auto",
        "1/4": "25%",
        "1/2": "50%",
        "3/5": "60%",
        "3/4": "75%",
        xxs: "13.75rem",
        xs: "19rem",
        "6.5xl": "75rem",
        "screen-lg": "1024px",
        18: "18rem",
        38: "38rem",
      },
      maxHeight: {
        80: "5rem",
        660: "41.25rem",
      },
      width: {
        fit: "fit-content",
        90: "90%",
        95: "95%",
        17: "4.375rem",
      },
      height: {
        18: "4.5rem",
        fit: "fit-content",
      },
      borderWidth: {
        12: "12px",
      },
      margin: {
        18: "4.5rem",
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
};
