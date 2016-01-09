//var elixir = require('laravel-elixir');
var gulp = require('gulp');
var concat = require('gulp-concat');
var minify = require('gulp-minify');

gulp.task('default', function() {


    gulp.src('resources/assets/css/app.css')
        .pipe(gulp.dest('public/assets/css'));

    gulp.src([
            //'node_modules/bootstrap/dist/css/bootstrap.min.css',
            'resources/assets/css/readable-bootstrap.min.css'
        ])
        .pipe(concat('lib.css'))
        .pipe(gulp.dest('public/assets/css'));

    gulp.src([
            'node_modules/bootstrap/dist/fonts/*'
        ])
        .pipe(gulp.dest('public/assets/fonts'));

    gulp.src([
            'node_modules/bootstrap/dist/js/bootstrap.min.js'
        ])
        .pipe(concat('lib.js'))
        .pipe(gulp.dest('public/assets/js'));

    // assets that load in the head
    gulp.src([
            'node_modules/google-maps/lib/Google.min.js'
        ])
        .pipe(concat('head-lib.js'))
        .pipe(gulp.dest('public/assets/js'));

    // place code for your default task here
});
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

//elixir(function(mix) {
//    mix.sass('app.scss');
//});
