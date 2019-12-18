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
    .sass('resources/sass/app.scss', 'public/css');




mix.js('resources/js/admin/app_admin.js', 'public/admin/js')
	.sass('resources/sass/admin/app_admin.scss', 'public/admin/css');



mix.browserSync('http://127.0.0.1:8000')
