// Include gulp
var gulp = require('gulp'); 

// Include Our Plugins
var sass = require('gulp-sass');

//define paths
var resource_path = './resources/assets';
var public_path = './public';

// Compile Our Sass
gulp.task('sass', function() {
    return gulp.src(resource_path+'/scss/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest(public_path+'/css'));
});

//Move all resources to public folder
gulp.task('move_css', function() {
    return gulp.src(resource_path+'/css/*.css')
    .pipe(gulp.dest(public_path+'/css'));
});

gulp.task('move_js', function() {
    return gulp.src(resource_path+'/js/*.css')
    .pipe(gulp.dest(public_path+'/js'));
});

gulp.task('move_images', function() {
    return gulp.src(resource_path+'/images/*')
    .pipe(gulp.dest(public_path+'/images'));
});


// Default Task
gulp.task('default', ['sass', 'move_css', 'move_js', 'move_images']);

