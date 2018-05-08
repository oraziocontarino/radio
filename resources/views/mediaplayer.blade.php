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

        <link href="{{ asset('css/template1.css') }}" rel="stylesheet">
		<script src="{{ asset('js/template1.js') }}"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">

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
<div class="item-mb">
	<div class="col-sm-3 text-center">
		<img src="http://localhost/radio/img/prev-button.png">
	</div>
	<div class="col-sm-9 text-center">
		<h3 class="title-medium-dark mb-none">
		<a href="category-grid-layout1.html">Electronics</a>
	</h3>
	<div class="view">(19,805)</div>
		<p>Emply dummy text of the printing and taypng industrxt ever sincknown.</p>
	</div>
</div>

<div class="container no-padding no-margin">
	<div class="container-content default-container hidden"></div>
	<div class="container-content default-container categories-container">
	
<nav id="pnProductNav" class="pn-ProductNav">
    <div id="pnProductNavContents" class="pn-ProductNav_Contents">
        <a href="#" class="pn-ProductNav_Link" aria-selected="true">Chairs</a>
        <a href="#" class="pn-ProductNav_Link">Tables</a>
        <a href="#" class="pn-ProductNav_Link">Cookware</a>
        <a href="#" class="pn-ProductNav_Link">Beds</a>
        <a href="#" class="pn-ProductNav_Link">Desks</a>
        <a href="#" class="pn-ProductNav_Link">Flooring</a>
        <a href="#" class="pn-ProductNav_Link">Lighting</a>
        <a href="#" class="pn-ProductNav_Link">Mattresses</a>
        <a href="#" class="pn-ProductNav_Link">Solar Panels</a>
        <a href="#" class="pn-ProductNav_Link">Bookcases</a>
        <a href="#" class="pn-ProductNav_Link">Mirrors</a>
        <a href="#" class="pn-ProductNav_Link">Rugs</a>  
        <a href="#" class="pn-ProductNav_Link">Curtains &amp; Blinds</a>  
        <a href="#" class="pn-ProductNav_Link">Frames &amp; Pictures</a>  
        <a href="#" class="pn-ProductNav_Link">Wardrobes</a>  
        <a href="#" class="pn-ProductNav_Link">Storage</a>  
        <a href="#" class="pn-ProductNav_Link">Decoration</a>  
        <a href="#" class="pn-ProductNav_Link">Appliances</a>
		 <a href="#" class="pn-ProductNav_Link">Racks</a>
        <a href="#" class="pn-ProductNav_Link">Worktops</a>
    </div>
</nav>

	</div>
	<div class="container-content tracks-list-container hidden"></div>
</div>

<!-- bottom bar -->
<footer>
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
</footer>
</body>
</html>