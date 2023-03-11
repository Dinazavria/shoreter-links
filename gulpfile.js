const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const rename = require('gulp-rename');
const uglify = require('gulp-uglify');
const autoprefixer = require('gulp-autoprefixer');
const { series } = require('gulp');

//Clone files without preprocesses

gulp.task('cloneHtml', async () => {
	return gulp.src('app/**/*.html')
	.pipe(gulp.dest('public/'));
});

gulp.task('clonePhp', async () => {
	return gulp.src('app/**/*.php')
	.pipe(gulp.dest('public/'));
});

//Preprocess CSS

gulp.task('sassToCss', async () => {
	return gulp.src('app/**/*.scss')
	.pipe(sass({
		errorLogToConsole: true,
		outputStyle: 'compressed',
	}))
	.on('error', console.error.bind(console))
	.pipe(rename({suffix: '.min'}))
	.pipe(gulp.dest('public/'));
});

gulp.task('autoprefix', async () => {
	return gulp.src('app/**/*.css')
	.pipe(autoprefixer({
		ovverideBrowserlist: ['last 20 versions'],
		cascade: true,
	}))
	.pipe(gulp.dest('public/css/'));
})

//Preprocess javascript

gulp.task('minifyJs', async () => {
	return gulp.src('app/**/*.js')
	.pipe(uglify())
	.pipe(gulp.dest('public/'));
});


gulp.task('default', async () => {
	gulp.watch('app/**/*.scss', gulp.series('sassToCss'));
	gulp.watch('app/**/*.css', gulp.series('autoprefix'));
	//gulp.watch('app/**/*.js', gulp.series('minifyJs'));
});


exports.init = series('clonePhp', 'sassToCss', 'autoprefix', 'minifyJs');



