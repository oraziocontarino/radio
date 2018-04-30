var elixir = require('laravel-elixir');
var del = require('del');

elixir.extend('remove', function(path) {
    new elixir.Task('remove', function() {
        del(path);
    });
});

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

// Gentelella vendors path : vendor/bower_components/gentelella/vendors

elixir(function(mix) {
    
    /**************/
    /* Copy Resources */
    /**************/

    mix.copy('resources/assets/images', 'public/images'); 
    mix.copy('resources/assets/css', 'public/css');       
    mix.copy('resources/assets/js', 'public/js');    
   
   });


