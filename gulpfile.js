var gulp         = require("gulp");
var sass         = require( "gulp-sass" );
var autoprefixer = require( "gulp-autoprefixer" );
var plumber      = require( "gulp-plumber" );
var browserSync  = require( "browser-sync" );
var del          = require( "del" );
var uglify       = require( "gulp-uglify" );
var gulpif       = require( "gulp-if" );
var imagemin     = require( "gulp-imagemin" );
var runSequence  = require( "run-sequence" );
var sourcemaps   = require('gulp-sourcemaps');
var concat       = require('gulp-concat');
var notify       = require('gulp-notify');
var cleancss     = require('gulp-clean-css');
var rename       = require('gulp-rename');

// Kompilacja Sass
gulp.task( "sass", function() {
    gulp.src( 'assets/scss/main.scss'  )
    .pipe( sourcemaps.init() )
    .pipe(plumber({errorHandler: notify.onError("Error: <%= error.message %>")}))
    .pipe( sass.sync({
            outputStyle: 'expanded'
        })
    )
    .pipe( autoprefixer({
        browsers: ["last 5 version", "IE 9", "iOS >= 8", "Safari >= 8"]
    }))
    .pipe( sourcemaps.write() )
    .pipe(concat('main.css'))
    .pipe( gulp.dest( "dist/css/" ))
    .pipe( browserSync.stream() );
});

// Minifikacja Css
gulp.task( "css", ['sass'], function() {
     gulp.src( "dist/css/main.css" )
        .pipe( cleancss() )
        .pipe( rename( { suffix: '.min' } ) )
        .pipe( gulp.dest( "dist/css/" ) )
        .pipe( browserSync.stream() );
});

// Minifikacja Js
gulp.task( "js", function() {
    gulp.src( "assets/js/*.js" )
    .pipe(concat('scripts.js'))
    .pipe( gulp.dest( 'dist/js' ) );
});
gulp.task( "jsMin", function() {
    gulp.src( "dist/js/scripts.js" )
    .pipe( rename( { suffix: '.min' } ) )
    .pipe( uglify() )
    .pipe( gulp.dest( 'dist/js' ) );
});

// Przeładowanie strony
gulp.task( "server", function() {
    browserSync.init({
    	proxy   : "localhost/starter" 
    });
});
// Pluginy Css Minifikacja i łączenie
gulp.task( "cssP", function() {
     gulp.src( "assets/css/**/*.css" )
        .pipe(concat('plugin.css'))
        .pipe( cleancss() )
        .pipe( rename( { suffix: '.min' } ) )
        .pipe( gulp.dest( "dist/css/" ) )
        .pipe( browserSync.stream() );
});
// Pluginy Js minifikacja i łączenie
gulp.task( "jsP", function() {
     gulp.src( "assets/js/vendor/**/*.js" )
        .pipe(concat('plugin.js'))
        .pipe( uglify() )
        .pipe( rename( { suffix: '.min' } ) )
        .pipe( gulp.dest( "dist/js/" ) )
        .pipe( browserSync.stream() );
});
// Watch
gulp.task( "watch", function() {
    gulp.watch( ['assets/scss/**/*.{scss,sass}', '!assets/scss/bootstrap/**/*.{scss,sass}'], ["sass"] );
    gulp.watch( 'assets/css/**/*.css', ["cssP"] );
    gulp.watch( 'assets/js/*.js', ["js"], browserSync.reload );
    gulp.watch( 'assets/js/vendor/**/*.js', ["jsP"], browserSync.reload );
    gulp.watch( ["**/*.html", "**/*.php"], browserSync.reload );
    gulp.watch( 'dist/css/main.css', ["css"] );
    // gulp.watch( 'dist/js/**/*.js', ["jsMin"], browserSync.reload );
    // gulp.watch( 'img/**/*(*.png|*.jpg|*.jpeg|*.gif|*.svg)', ["images"] );
});

// Default
gulp.task( "default", ["sass", "cssP", "js", "jsP", "server", "watch"] );


// Strona na serwer
gulp.task( "clean", function(){
    return del( "build/*" );
});

gulp.task( "html", function(){
    return gulp.src( "./*.html" )
    .pipe( gulpif( "*.js", uglify() ) )
    .pipe( gulp.dest( "build/" ))
});

gulp.task( "images", function(){
    return gulp.src( "img/**/*", {
        base: "./"
    } )
    .pipe( imagemin({
          progressive: true,
        }) )
    .pipe( gulp.dest( "build/" ) )
});

gulp.task( "copy", function(){
    return gulp.src([ "dist/css/**/*.css", "dist/js/**/*.js" ], {
        base: "./"
    })
    .pipe(gulp.dest("build/"));
});

gulp.task( "build", function() {
    runSequence("clean", "html", "css", "copy", "images");
});
