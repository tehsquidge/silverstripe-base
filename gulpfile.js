var fs = require('fs'),
    gulp = require('gulp'),
    concat = require("gulp-concat"),
    insert = require('gulp-insert'),
    cleanCSS = require("gulp-clean-css"),
    uglify = require("gulp-uglify"),
    rename = require('gulp-rename'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    pump = require('pump');


    gulp.task('sass', function () {
        pump([
            gulp.src('./app/sass/*.scss'),
            sass().on('error', sass.logError),
            autoprefixer(),
            insert.prepend('/** AUTOMATICALLY GENERATED! DO NOT EDIT! **/\n'),
            gulp.dest('./public/css/')
        ]);
    });

    gulp.task('minify', function () {
        pump([
          gulp.src('./public/css/main.css'),
          concat('css.css'),
          gulp.dest('./public/css/'),
          cleanCSS(),
          insert.prepend('/** AUTOMATICALLY GENERATED! DO NOT EDIT! **/\n'),
          rename('css.min.css'),
          gulp.dest('./public/css/')
        ]);
        return pump([
          gulp.src(['./app/js/plugins.js','./app/js/main.js']),
          concat('js.js'),
          insert.prepend('/** AUTOMATICALLY GENERATED! DO NOT EDIT! **/\n'),
          gulp.dest('./public/js/'),
          rename('js.min.js'),
          gulp.dest('./public/js/')
        ]);
    });

    gulp.task('copy-assets', function (){
        return pump([
            gulp.src('./app/js/vendor/*'),
            gulp.dest('./public/js/vendor/')
        ]);
    });



    gulp.task('watch', function () {
        gulp.watch('./app/sass/**/*.scss',  gulp.series('sass','minify','copy-assets') );
        gulp.watch(['./app/js/*.js',], gulp.series('minify','copy-assets') );

    });

