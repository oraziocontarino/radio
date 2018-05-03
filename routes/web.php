<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::match(array('GET','POST'),'/', 'RadioController@mediaplayer')->name('mediaplayer');
Route::match(array('GET','POST'),'/api/vlc/status', 'VlcApiController@status')->name('VlcApiControllerStatus');
Route::match(array('GET','POST'),'/api/vlc/playPauseTrack', 'VlcApiController@playPauseTrack')->name('VlcApiControllerPlayPauseTrack');

// Routes

Route::get('/js/routes.js', function () {
    Log::debug("route reloaded!");
	//$routes = Cache::rememberForever('routes.js', function () {
		$base_url = route('mediaplayer');
		$routes = [];
		foreach (Route::getRoutes() as $route) {
			$route_uri = $route->uri();
			$routes[$route->getName()] = strncmp($route_uri, "/", 1) === 0 ? $base_url.$route_uri : $base_url.'/'.$route_uri;
		}
		//return $routes;
	//});
    header('Content-Type: text/javascript');
	echo('window.routes = ' . json_encode($routes) . ';');
    exit();
})->name('assets.routes');
