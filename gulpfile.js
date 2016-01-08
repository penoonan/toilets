//var elixir = require('laravel-elixir');
var gulp = require('gulp');
var concat = require('gulp-concat');

gulp.task('default', function() {

    gulp.src([
        'node_modules/bootstrap/dist/css/bootstrap.min.css',
        'resources/assets/css/readable-bootstrap.min.css'
    ])
        .pipe(concat('lib.css'))
        .pipe(gulp.dest('public/assets/css'));

    gulp.src('node_modules/bootstrap/dist/js/bootstrap.min.js')
        .pipe(concat('lib.js'))
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
