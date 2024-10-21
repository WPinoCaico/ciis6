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

/* mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css'); */

mix.js('resources/js/app.js', 'public/js')
    .scripts([
        //'resources/js/app.js',
        'resources/assets/plugins/global/plugins.bundle.js',
        'resources/assets/js/scripts.bundle.js',
        'resources/assets/js/widgets.bundle.js',
        'resources/assets/js/custom/widgets.js',
        'resources/assets/js/custom/apps/chat/chat.js',
        'resources/assets/js/custom/utilities/modals/upgrade-plan.js',
        'resources/assets/js/custom/utilities/modals/create-app.js',
        'resources/assets/js/custom/utilities/modals/new-target.js',
        'resources/assets/js/custom/utilities/modals/users-search.js',
        'resources/assets/plugins/custom/jstree/jstree.bundle.js',
    ], 'public/js/plantilla.js')
    .vue()
    //.sass('resources/sass/app.scss', 'public/css')
    .styles([
        'resources/assets/plugins/custom/jstree/jstree.bundle.css',
        'resources/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css',
        'resources/assets/plugins/custom/datatables/datatables.bundle.css',
        'resources/assets/plugins/global/plugins.bundle.css',
        'resources/assets/css/style.bundle.css',
    ], 'public/css/plantilla.css')
