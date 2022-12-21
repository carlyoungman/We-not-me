const gulp = require('gulp');
const uglify = require('gulp-uglify');
const del = require('del');
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const cssnano = require('gulp-cssnano');
const rename = require('gulp-rename');
const webpackStream = require('webpack-stream');
const webpack = require('webpack');
const imagemin = require('gulp-imagemin');
const webp = require('imagemin-webp');
const extReplace = require('gulp-ext-replace');
const config = require('./webpack.config.js');

const paths = {
  styles: {
    src: 'assets/scss/main.scss',
    dest: 'dist/assets/css/'
  },
  scripts: {
    src: 'assets/javascript/main.js',
    dest: 'dist/assets/javascript/'
  },
  images: {
    src: 'assets/images/**/**/*',
    webp: 'assets/images/raster/**/*.{jpg,png}',
    dest: 'dist/',
    uploads: '../../uploads/**/*.{jpg,png}'
  },
  video: {
    src: 'assets/videos/**/*',
    dest: 'dist/'
  },
  fonts: {
    src: 'assets/fonts/*',
    dest: 'dist/'
  },
  favicons: {
    src: 'assets/favicons/*',
    dest: 'dist/'
  }
};

export const clean = () => del(['dist']);

export function styles() {
  return gulp
    .src(paths.styles.src)
    .pipe(
      sass({
        outputStyle: 'expanded'
      })
    )
    .pipe(autoprefixer('last 4 version'))
    .pipe(cssnano())
    .pipe(
      rename({
        basename: 'main',
        suffix: '.min'
      })
    )
    .pipe(gulp.dest(paths.styles.dest));
}

export function scripts() {
  return gulp
    .src(paths.scripts.src)
    .pipe(
      webpackStream(config),
      webpack
    )
    .pipe(uglify())
    .pipe(gulp.dest(paths.scripts.dest));
}

export function images() {
  return gulp
    .src([paths.images.src], {
      base: '.'
    })
    .pipe(
      imagemin([
        imagemin.gifsicle({
          interlaced: true
        }),
        imagemin.jpegtran({
          progressive: true
        }),
        imagemin.optipng({
          optimizationLevel: 5
        }),
        imagemin.svgo({
          plugins: [
            {
              removeViewBox: false,
              collapseGroups: true
            },
            {
              cleanupIDs: false
            }
          ]
        })
      ])
    )
    .pipe(gulp.dest(paths.images.dest));
}

export function webP() {
  return gulp
    .src([paths.images.webp], {
      base: '.'
    })
    .pipe(
      imagemin([
        webp({
          quality: 75
        })
      ])
    )
    .pipe(extReplace('.webp'))
    .pipe(gulp.dest('dist/'));
}

export function uploadImages() {
  return gulp
    .src([paths.images.uploads], {
      base: '.'
    })
    .pipe(
      imagemin([
        imagemin.gifsicle({
          interlaced: true
        }),
        imagemin.jpegtran({
          progressive: true
        }),
        imagemin.optipng({
          optimizationLevel: 5
        }),
        imagemin.svgo({
          plugins: [
            {
              removeViewBox: false,
              collapseGroups: true
            },
            {
              cleanupIDs: false
            }
          ]
        })
      ])
    );
}

export function uploadWebP() {
  return gulp
    .src([paths.images.uploads], {
      base: '.'
    })
    .pipe(
      imagemin([
        webp({
          quality: 75
        })
      ])
    )
    .pipe(extReplace('.webp'))
    .pipe(gulp.dest('.'));
}

export function video() {
  return gulp
    .src([paths.video.src], {
      base: '.'
    })
    .pipe(gulp.dest(paths.video.dest));
}

export function fonts() {
  return gulp
    .src([paths.fonts.src], {
      base: '.'
    })
    .pipe(gulp.dest(paths.fonts.dest));
}

export function favicons() {
  return gulp
    .src([paths.favicons.src], {
      base: '.'
    })
    .pipe(gulp.dest(paths.favicons.dest));
}

export function watch() {
  gulp.watch('assets/scss/**/*.scss', styles);
  gulp.watch('assets/javascript/**/*.js', scripts);
  gulp.watch(paths.images.src, images);
}

gulp.task(
  'default',
  gulp.series(
    clean,
    gulp.parallel(styles, scripts, images, webP, video, fonts, favicons)
  )
);

gulp.task('uploads', gulp.series(gulp.parallel(uploadImages, uploadWebP)));
