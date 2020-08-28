var gulp = require('gulp');
var sass = require('gulp-sass');
var useref = require('gulp-useref');
var gulpif = require('gulp-if');
var uglify = require('gulp-uglify');
var minifyCss = require('gulp-clean-css');
var imagemin = require('gulp-imagemin');
const {
  series,
  watch,
  lastRun
} = require('gulp');
const autoprefixer = require('gulp-autoprefixer');

function compile_scss() {
  return gulp.src('./dev/scss/**/*.scss', {
      sourcemaps: true
    })
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(gulp.dest('./dev/css', {
      sourcemaps: true
    }));
};
// imagemin
function exec_image() {
  gulp.src('./dev/image/*.*', {
      since: lastRun(exec_image)
    })
    .pipe(imagemin())
    .pipe(gulp.dest('dist/Views/assets/image'));
}
//  function autoprefixer_exec(){

//  
// regroupement des fichiers
function exec_useref() {
  return gulp.src('dev/*.html')
    .pipe(useref())
    .pipe(gulpif('*.js', uglify()))
    .pipe(gulpif('*.css', minifyCss()))
    .pipe(gulp.dest('dist/Views/assets'));
};
/// watcher
function watcher() {
  watch('dev/image/*.*', exec_image),
    watch('dev/*.html', exec_useref),
    watch('dev/scss/**/*.scss', compile_scss)

}
// execution
module.exports = {
  default: series(compile_scss, exec_useref), // 
  watch: watcher
}