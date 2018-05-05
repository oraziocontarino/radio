<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Bootstrap Example</title>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, minimal-ui" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
        
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/player.css') }}" rel="stylesheet">
        <link href="{{ asset('css/equalizer.css') }}" rel="stylesheet">

        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <!-- -->
			<script src="{{ asset('js/routes.js') }}"></script>
        	<script src="{{ asset('js/router.js') }}"></script>
        <!-- -->
		<script src="{{ asset('js/VlcAPI.js') }}"></script>
        <script src="{{ asset('js/VlcInterface.js') }}"></script>

	</head>
<body>
<script>

$(document).ready(function(){
	var vlcInterface = VlcInterface.getInstance();
	$( ".player-commands .play-button" ).on("click",function() {
			VlcInterface.getInstance().playPauseCurrentTrack();
		}
	);
	
	$( ".player-commands .pause-button" ).on("click",function() {
			//VlcInterface.getInstance().pauseCurrentTrack();
		}
	);
	$( ".player-commands .prev-button" ).on("click",function() {
			//VlcInterface.getInstance().playPrevTrack();
		}
	);
	$( ".player-commands .next-button" ).on("click",function() {
			//VlcInterface.getInstance().playNextTrack();
		}
	);

/*
$('.progress-pointer').draggable({
    axis: "x",
	containment: ".progress-wrap"
});

$('.progress-pointer').draggable({
  axis: 'x',
  containment: ".progress-wrap"
});

$('.progress-pointer').draggable({
  drag: function() {
    var offset = $(this).offset();
    var xPos = (100 * parseFloat($(this).css("left"))) / (parseFloat($(this).parent().css("width"))) + "%";
   //VlcInterface.getInstance().playProgressBar();
   console.log(xPos);
    //$('#audio-progress-bar').css({
      //'width': xPos
    //});
  }
});
$('.progress-pointer').on('mousedown', function() {
		var y1 = y2 = $(".progress-pointer").position().top;
		var y1 = $(".progress-pointer").position().left;
		var y2 = ($(".progress-wrap").width() + $(".progress-pointer").position().left);
		$(".progress-pointer").draggable('option', 'containment', [x1, y1, x2, y2]);
	});



*/
});
</script>
<nav class="navbar navbar-inverse navbar-fixed-bottom">
	<div class="container-fluid">

		<ul class="nav navbar-nav">
			<li class="nav-header">
				<div class="col-xs-12">
					<div class="equalizer col-xs-2">
						<div id="equalizer-bar-1" class="equalizer-bar noAnim"></div>
						<div id="equalizer-bar-2" class="equalizer-bar noAnim"></div>
						<div id="equalizer-bar-3" class="equalizer-bar noAnim"></div>
						<div id="equalizer-bar-4" class="equalizer-bar noAnim"></div>
						<div id="equalizer-bar-5" class="equalizer-bar noAnim"></div>
						<div id="equalizer-bar-6" class="equalizer-bar noAnim"></div>
					</div>
					
					<div class="col-xs-10 current-track-title">
						<div><!-- track name --></div>
					</div>
				</div>
			</li>
			
			<li>
				<div class="col-sm-12 player-commands">
					<div class="col-xs-5">
						<div class="col-xs-4">
							<div class="prev-button"></div>
						</div>
						<div class="col-xs-4">
							<div class="play-button"></div>
							<div class="pause-button hidden"></div>
						</div>
						<div class="col-xs-4">
							<div class="next-button"></div>
						</div>
					</div>
					<div class="col-xs-1">&nbsp;</div>
					<div class="col-xs-6">
						<div class="col-xs-3">
							<div class="categories-button"></div>
						</div>
						<div class="col-xs-3">
							<div class="playlist-button"></div>
						</div>
						<div class="col-xs-3">
							<div class="replay-button"></div>
						</div>
						<div class="col-xs-3">
							<div class="change-wallpaper-button"></div>
						</div>
					</div>
					

				</div>
			</li>
			<li>
				<div class="col-xs-12 track-time">
					<div class="col-xs-2 track-current-time">00:00</div>
					<div class="col-xs-8 track-bar-time">
					
						<div class="progress-wrap progress">
							<div class="progress-bar progress"></div>
						</div>
						<div class="progress-pointer hidden"></div>


					</div>
					<div class="col-xs-2 track-total-time">00:00</div>
				</div>
			</li>
		</ul>

	</div>
</nav>

<div class="container no-padding no-margin">
	<div class="container-content default-container hidden"></div>
	<div class="container-content categories-container">
	
<ul class="categoriesList">
    <li class="category">
		<div class="categoryElement">
			<div class="categoryElementImage col-md-12" style="height: 80%"></div>
			<div class="categoryElementInfo col-md-12" style="height: 15%">Rock1 - 255 tracks</div>
		</div>
	</li>
    <li class="category">
		<div class="categoryElement">
			<div class="categoryElementImage col-md-12" style="height: 80%"></div>
			<div class="categoryElementInfo col-md-12" style="height: 15%">Rock2 - 255 tracks</div>
		</div>
	</li>
</ul>

	</div>
	<div class="container-content tracks-list-container hidden"></div>
</div>

</body>
</html>