var elixir = require('laravel-elixir');
var gulp = require('gulp');
var sass = require('gulp-sass');

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
    mix.sass(['style.scss'], 'public/assets/web/css');
});





