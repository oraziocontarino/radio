
<div class="center">
	<div class="nav">
		<a href="#" class="side-menu-trigger"><i class="fa fa-bars"></i></a>
	</div>


	<div class="cover">
		<div class="jcarousel">
			<div class="slider" data-slick="{centerMode: true}">
			<!-- Loaded tracks -->
			</div>
		</div>
	</div>
	<ul class="jcarousel-pagination"></ul>
</div>
<div class="bottom">
	<div class="action">
		<a href="#" class="previous jcarousel-prev"><i class="fa fa-step-backward"></i></a>
		<a href="#" class="play"><i class="fa fa-play fa-fw"></i></a>
		<a href="#" class="next jcarousel-next"><i class="fa fa-step-forward"></i></a>
	</div>
	<div class="length">
		<label for="fader">1:00</label>
		<input type="range" min="0" max="100" value="40" id="fader" step="1">
		<output for="fader" class="duration">3:40</output>
	</div>
	<div class="options">
		<a href="#" class="shuffle active"><i class="fa fa-random"></i></a>
		<a href="#" class="replay"><i class="fa fa-refresh"></i></a>
		<a href="#" class="volume"><i class="fa fa-volume-up"></i></a>
		<a href="#" class="favorite active"><i class="fa fa-heart"></i></a>
	</div>
	<div class="volume-slider">
		<a href="#" class="close"><i class="fa fa-chevron-down"></i></a>
		<div class="volume-slider-inner">
			<i class="fa fa-volume-down"></i>
			<input class="volume-slider" type=range min=0 max=100 value=0 id=fader step=1 oninput="outputUpdate(value)">
			<i class="fa fa-volume-up"></i>
		</div>
	</div>
</div>
<div class="overlay-image the-nights active"></div>
<div class="overlay-image dont-look-down"></div>
<div class="overlay-image avalanche"></div>
<div class="overlay"></div>
