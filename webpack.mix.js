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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();


mix.sass('resources/views/scss/bootstrap.scss', 'public/site/css/bootstrap.css')
.sass('resources/views/scss/load.scss', 'public/site/css/load.css')
.sass('resources/views/scss/message.scss', 'public/site/css/message.css');
mix.css('resources/views/site/css/style.css', 'public/site/css/style.css');
mix.scripts('node_modules/jquery/dist/jquery.js', 'public/site/js/jquery.js')
.scripts('node_modules/bootstrap/dist/js/bootstrap.bundle.js', 'public/site/js/bootstrap.bundle.js')
.scripts('resources/views/site/js/insertMessage.js', 'public/site/js/insertMessage.js')
.scripts('resources/views/site/js/ajaxLoad.js', 'public/site/js/ajaxLoad.js')
.scripts('resources/views/site/js/formAjax.js', 'public/site/js/formAjax.js');
