let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.scripts(['resources/assets/js/googleMaps.js','resources/assets/js/events.js'], 'public/js/app.js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .version();
