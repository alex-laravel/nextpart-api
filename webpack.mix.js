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

mix.sass('resources/scss/app.scss', 'public/css')
    .js('resources/js/app.js', 'public/js')
    // .copy('resources/assets', 'public/assets')
    .copy('resources/assets/avatars', 'public/assets/avatars')
    .copy('resources/assets/icons', 'public/assets/icons')
    .sourceMaps();

if (mix.inProduction()) {
    mix.version();
}
