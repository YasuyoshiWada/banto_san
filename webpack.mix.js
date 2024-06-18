const mix = require('laravel-mix');
const { VueLoaderPlugin } = require('vue-loader');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .js('resources/js/dashboard.js', 'public/js')
    .sourceMaps();
   .sass('resources/sass/app.scss', 'public/css')
   .version();

