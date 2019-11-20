var gulp = require('gulp');
var iconfont = require('gulp-iconfont');
var iconfontcss = require('gulp-iconfont-css');

gulp.task('icons', function() {
    return gulp.src('resources/assets/svg/**/*')
    .pipe(iconfontcss({
        fontName: 'icons',
        targetPath: '../sass/common/_icons.scss',
        fontPath: '../fonts/'
    }))
    .pipe(iconfont({
        fontName: 'icons',
        formats: ['eot', 'svg', 'ttf', 'woff', 'woff2']
    }))
    .pipe(gulp.dest('resources/assets/fonts'))
});

gulp.task('default', ['icons']);
