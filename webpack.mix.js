const mix = require('laravel-mix');

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

mix.js('resources/js/script.js','public/js');
mix.js('resources/js/jquery-1.7.1.min.js','public/js');
mix.postCss('resources/css/app.css', 'public/css', [
    
]);
    