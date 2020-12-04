const mix = require('laravel-mix');
require('mix-tailwindcss');
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */
// mix.postCss('resources/css/main.css', 'public/css', [
//     require('tailwindcss'),
// ])
  
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css', [
        //
        // require('tailwindcss'),
    ])
    .tailwind();
