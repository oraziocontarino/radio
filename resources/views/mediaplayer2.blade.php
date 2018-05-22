<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Bootstrap Example</title>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, minimal-ui" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <!--
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/material-design-iconic-font.css') }}" rel="stylesheet">
		    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>

          -->
          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">


		    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
        <link href="{{ asset('css/template1.css') }}" rel="stylesheet">
        <script type="text/javascript" src="{{ asset('js/template1.js') }}"></script>
	</head>

<body class="fullPage">
<div class="fullPage defaultBackground"></div>
<div class="mhn-player fullPage">
<div class="play-list hidden">
	<a href="#" class="play"
		data-id="1"
		data-album=""
		data-artist="Wiz Khalifa feat. Charlie Puth"
		data-title="See You Again"
		data-albumart="http://static.djbooth.net/pics-tracks/wiz-khalifa-see-you-again.jpg"></a>

	<a href="#" class="play"
		data-id="2"
		data-album="Fifty Shades of Grey"
		data-artist="Ellie Goulding"
		data-title="Love Me Like You Do"
		data-albumart="http://cdnrf.securenetsystems.net/file_radio/album_art/B/1/5/51B2BHP42pDL.jpg"></a>

	<a href="#" class="play"
		data-id="3"
		data-album="All I Ever Wanted"
		data-artist="Kelly Clarkson"
		data-title="Already Gone"
		data-albumart="https://3.bp.blogspot.com/_mupIVJbjvuU/TKgPuOEekII/AAAAAAAAHd4/HGTyRWuhw2c/s1600/Made+by+In+For+The+Kill.png"></a>

	<a href="#" class="play"
		data-id="4"
		data-album="Bringing Back the Sunshine"
		data-artist="Blake Shelton"
		data-title="Sangria"
		data-albumart="http://img02.cdn2-rdio.com/album/d/3/d/000000000039fd3d/2/square-600.jpg"></a>

	<a href="#" class="play"
		data-id="5"
		data-album="The Unforgiving"
		data-artist="Within Tempation"
		data-title="Faster"
		data-albumart="http://www.aceshowbiz.com/images/news/00038227.jpg"></a>

	<a href="#" class="play"
		data-id="6"
		data-album="Californication"
		data-artist="Red Hot Chili Peppers"
		data-title="Californication"
		data-albumart="https://eyespytz.files.wordpress.com/2011/11/6837-gif.jpeg"></a>

	<a href="#" class="play"
		data-id="7"
		data-album="V"
		data-artist="Maroon 5"
		data-title="Sugar"
		data-albumart="http://media.fanfire.com/images/product/large/MAR/MAR61934.jpg"></a>

	<a href="#" class="play"
		data-id="8"
		data-album="Meteora"
		data-artist="Linkin Park"
		data-title="Numb"
		data-albumart="https://upload.wikimedia.org/wikipedia/en/6/64/MeteoraLP.jpg"></a>
</div>
<div class="audio"></div>
<div class="current-info hidden">
	<div class="song-artist"></div>
	<div class="song-album"></div>
	<div class="song-title"></div>
</div>
<div class="controls">
<a href="#" class="toggle-play-list"><i class="fa fa-list-ul"></i></a>
<div class="duration clearfix pull-right">

	<span class="pull-right play-position">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
	<span class="pull-right"><span class="play-current-time">00:00</span> / <span class="play-total-time">00:00</span></span>
</div>
<div class="progress"><div class="bar"></div></div>
<div class="action-button">
	<a href="#" class="prev"><i class="fa fa-step-backward"></i></a>
	<a href="#" class="play-pause"><i class="fa fa-pp"></i></a>
	<a href="#" class="stop"><i class="fa fa-stop"></i></a>
	<a href="#" class="next"><i class="fa fa-step-forward"></i></a>
	<input type="range" class="track-length-bar" min="0" max="1" step="0.1" value="0.5" data-css="0.5">
</div>

</div>
</div>
</body>
</html>




