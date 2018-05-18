var fs = require('fs'),
    gulp = require('gulp'),
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
            gulp.dest('./public/css/')
        ]);
    });
    
    gulp.task('minify', function () {
        pump([
          gulp.src('./public/css/main.css'),
          cleanCSS(),
          rename('css.min.css'),
          gulp.dest('./public/css/'),
    
        ]);
        pump([
          gulp.src(['./app/js/plugins.js','./app/js/main.js']),
          rename('js.min.js'),
          uglify(),
          gulp.dest('./dist/'),
    
        ]);
    });


    
    gulp.task('watch', function () {
        gulp.watch('./app/sass/**/*.scss', ['sass','minify']);
        gulp.watch(['./app/js/*.js',], ['minify']);

    });
      
