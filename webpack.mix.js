// webpack.mix.js

let mix = require('laravel-mix');

// webpack.mix.js
mix.js("./src/app.js", "dist")
    .postCss("./style.css", "dist", [
        require("tailwindcss"),
    ]);