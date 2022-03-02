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

mix.
    sass('resources/sass/style.scss', 'public/css/bootstrap.css').
    /*js('node_modules/jquery/dist/jquery.min.js','public/js/dependencies/jquery.js').*/
    js('resources/js/dependencies/jquery.js','public/js/dependencies/jquery.js').
    js('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', 'public/js/dependencies/bootstrap.js').
    js('resources/js/dependencies/functions.js', 'public/js/dependencies/functions.js').
    js('resources/js/checkout.js', 'public/js/checkout.js').
    js('resources/js/contact.js', 'public/js/contact.js').
    js('resources/js/debug.js', 'public/js/debug.js').
    js('resources/js/listContacts.js', 'public/js/listContacts.js').
    js('resources/js/login.js', 'public/js/login.js').
    js('resources/js/portifolioUser.js', 'public/js/portifolioUser.js').
    js('resources/js/register.js', 'public/js/register.js').
    js('resources/js/orders.js', 'public/js/orders.js').
    js('resources/js/store.js', 'public/js/store.js').
    js('resources/js/teste.js', 'public/js/teste.js').
    js('resources/js/uploadImages.js', 'public/js/uploadImages.js').
    postCss('resources/css/style.css','public/css/style.css');
