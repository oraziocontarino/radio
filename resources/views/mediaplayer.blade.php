
<!DOCTYPE html>
<html lang="en">
	<head>
	<title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, minimal-ui" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jcarousel/0.3.7/jquery.jcarousel.min.js"></script>
        <script type="text/javascript" src="{{ asset('js/Common.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/CurrentPlayingComponent.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/YourPlaylistComponent.js') }}"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="{{ asset('css/Common.css') }}">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"/>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"/>
</head>
<body>

<div class="container">
	<div class="top">
		{!! view('TopBarComponent')->render() !!}
	</div>
	<div class="side-menu">
		{!! view('SideMenuComponent')->render() !!}
	</div>
	<div id="currentPlayingComponent">
		{!! view('CurrentPlayingComponent')->render() !!}
	</div>
	<div id="yourPlaylistComponent" class="hidden">
		{!! view('YourPlaylistComponent')->render() !!}
	</div>
</div>

<audio class="audio-avalanche" src="http://emilcarlsson.se/assets/bring-me-the-horizon-avalanche.mp3" type="audio/mpeg"> 
 Your browser does not support the audio tag!
</audio>

<audio class="audio-dont-look-down" src="http://emilcarlsson.se/assets/Martin Garrix feat. Usher - Don't Look Down (Lyric Video).mp3" type="audio/mpeg"> 
 Your browser does not support the audio tag!
</audio>

<audio class="audio-the-nights" src="http://emilcarlsson.se/assets/Avicii - The Nights.mp3" type="audio/mpeg"> 
 Your browser does not support the audio tag!
</audio>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

</body>
</html>