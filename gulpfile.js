// Include gulp
var gulp = require('gulp'); 

// Include Our Plugins
var sass = require('gulp-sass');

//define paths
var resource_path = './resources/assets';
var public_path = './public';

// Compile and move Sass to public folder
gulp.task('copy_sass', function() {
    return gulp.src(resource_path+'/scss/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest(public_path+'/css'));
});

//Move all resources to public folder
gulp.task('copy_resources', function() {
    var local_resources = ['css', 'img', 'js', 'fonts'];
    var task_resp = null;
    local_resources.forEach(function(src){
        task_resp = gulp.src(resource_path+'/'+src+'/*')
        .pipe(gulp.dest(public_path+'/'+src));
    });
    return task_resp;
});


//Move node_modules to public folder
gulp.task('copy_node_modules', function() {
    var node_modules = [
        //'owl-carousel'
    ];
    var node_modules_components = ['css', 'ico', 'img', 'js'];
    var node_path = './node_modules';
    var task_resp = null;
    node_modules.forEach(function(node_module){
        var node_resource_path = node_path+"/"+node_module+"/assets";
        node_modules_components.forEach(function(component){
            task_resp = gulp.src(node_resource_path+'/'+component+'/*')
            .pipe(gulp.dest(public_path+'/'+component));
        });
    });
    return task_resp;
});

// Default Task
gulp.task('default', ['copy_sass', 'copy_resources', 'copy_node_modules']);

