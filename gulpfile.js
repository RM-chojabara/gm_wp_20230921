var gulp = require('gulp'),
  sass = require('gulp-sass')(require('sass')),
  htmlhint = require('gulp-htmlhint'),
  browserSync = require('browser-sync'),
  notify = require('gulp-notify'),
  plumber = require('gulp-plumber'),
  autoprefixer = require('gulp-autoprefixer'),
  uglify = require("gulp-uglify"),
  imagemin = require("gulp-imagemin"),
  pngquant = require("imagemin-pngquant"),
  mozjpeg = require('imagemin-mozjpeg'),
  concat = require('gulp-concat'),
  rename = require("gulp-rename");

var browserSync = require('browser-sync').create();
var reload = browserSync.reload;

//SCSS
var compOptions = {
  outputStyle: 'compressed',
  sourceMap: false,
  sourceComments: true,
  errLogToConsole: false
};
gulp.task('scss', function () {
  return gulp.src('./library/scss/**/*.scss')
    // .pipe(plumber({
    //   errorHandler: notify.onError({
    //     title: "失敗してるよ！", // 任意のタイトルを表示させる
    //     message: "<%= error.message %>" // エラー内容を表示させる
    //   })
    // }))
    .pipe(sass(compOptions))
    .pipe(autoprefixer())
    .pipe(gulp.dest('./library/css'))
    .pipe(browserSync.stream())
    .pipe(notify({
      title: 'Sassをコンパイルしました。',
      message: new Date(),
      sound: 'Glass'
    }));
});


//JS
gulp.task("script", function () {
  return gulp.src("./library/js/*.js")
    .pipe(plumber({
      errorHandler: notify.onError("Error: <%= error.message %>")
    }))
    .pipe(concat('script.js'))
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(uglify())
    .pipe(gulp.dest("./library/js/min"));
});

//IMAGEMIN
gulp.task('image', function () {
  return gulp.src(['./library/images/**/*.jpg', './library/images/**/*.png', './library/images/**/*.gif'])
    .pipe(plumber())
    .pipe(imagemin([
      pngquant({
        quality: [.7, .8]
      }),
      mozjpeg({
        quality: 85,
        progressive: true
      })
    ]))
    .pipe(gulp.dest('./library/images'));
});


//HTML
gulp.task('html', function () {
  gulp.src('./**/*.php')
    .pipe(htmlhint())
    .pipe(htmlhint.reporter())
    .pipe(gulp.dest('./'));
});


//browserSync
gulp.task('serve', done => {
  browserSync.init({
    files: './**/*.php',
    proxy: 'http://localhost:10008/',
    startPath: '/'
  })
  done()
});

gulp.task('watch', () => {
  const browserReload = done => {
    browserSync.stream()
    done()
  }
  const browserReload2 = done => {
    browserSync.reload()
    done()
  }
  gulp.watch('./library/scss/**/*.scss', browserReload)
  gulp.watch('./library/scss/**/*.scss', gulp.series('scss'))
  gulp.watch('./library/js/*.js', browserReload2)
  gulp.watch('./library/js/*.js', gulp.series('script'))
  gulp.watch('./library/images/**/*', browserReload)
  gulp.watch('./library/images/**/*', gulp.series('image'))
})
gulp.task('default', gulp.series('serve', 'watch'));