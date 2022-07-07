const mix = require('laravel-mix');

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

/*mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();*/

//mix.css('public/css/test.css', 'public/css/test.min.css').version();
mix.js('public/js/pages/auth.js', 'public/js/pages/compiled/auth.min.js').version();

mix.sass('public/styles/pages/home.scss', 'public/styles/compiled/pages/home.min.css').version();
mix.sass('public/styles/pages/login.scss', 'public/styles/compiled/pages/login.min.css').version();

