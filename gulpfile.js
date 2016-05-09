var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
//    mix.sass('app.scss');

    mix.styles([
        'bootstrap.min.css',
        'jquery-ui.min.css',
        'font-awesome.css',
        'app.css',
    ]);

    mix.scripts([
        'jquery.js',
        'jquery-ui.min.js',
        'bootstrap.min.js',
        'general.js',
    ])
});
