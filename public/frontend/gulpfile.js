/*
* Dependencias
*/
var gulp = require('gulp'),
  concat = require('gulp-concat'),
  uglify = require('gulp-uglify'),
  minifyCSS = require('gulp-minify-css');

var autoprefixer = require('gulp-autoprefixer');
var rename = require('gulp-rename');
var sass = require('gulp-sass')

gulp.task('sass', function () {
  return gulp.src('css/estilo.scss')
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(rename('fcodigo.min.css'))
    .pipe(gulp.dest('dist-css'));
});

gulp.task('css:watch', function () {
  gulp.watch('css/estilos.scss', ['produccion']);
  gulp.watch('css/style.min.css', ['produccion']);
  gulp.watch('css/materialize.min.css', ['produccion']);
});

/*
* Configuración de la tarea 'demo'
*/
gulp.task('produccion', function () {

 	gulp.src([
	  	'css/materialize.min.css',
      'plugins/preloader/css/effect1.css',
	  	'plugins/animate/animate.min.css',
      'css/flaticon.css',
      'material-icons/css/materialdesignicons.min.css',
      'css/owl.carousel.css',
      'js/plugins/perfect-scrollbar/perfect-scrollbar.css'

  	])
    .pipe(minifyCSS())
    .pipe(autoprefixer())
    .pipe(concat('frameworks.min.css'))
    .pipe(gulp.dest('dist-css'));

  	gulp.src([
	  	'css/style.min.css',
	  	'css/layouts/style-fullscreen.css',
	  	'css/custom/custom.min.css',
	  	'css/estilos.min.css'
  	])
    .pipe(minifyCSS())
    .pipe(autoprefixer())
    .pipe(concat('cursania.min.css'))
    .pipe(gulp.dest('dist-css'));

    /*gulp.src(['MegaNavbar/assets/css/MegaNavbar.min.css','MegaNavbar/assets/css/animation/animation.css'])
    .pipe(minifyCSS())
    .pipe(autoprefixer())
    .pipe(concat('menu.min.css'))
    .pipe(gulp.dest('dist-css'));*/
});
/*
gulp.task('prod', function () {
  gulp.src('css/*.css')
  .pipe(concat('fcodigo.min.css'))
  .pipe(uglify())
  .pipe(gulp.dest('css/prod/'))
});
*/
