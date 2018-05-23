$(document).ready(function(){
    $(".play").click(function() {
        $(".play").toggleClass("active");
        if($(".play i").hasClass("fa-play")) {
            $(".play i").removeClass("fa-play").addClass("fa-pause");
        }
        else {
            $(".play i").removeClass("fa-pause").addClass("fa-play");
        }
        
        if($(".play").hasClass("active") && $("#jcarousel-item3").hasClass("active")) {
            var audio = $(".audio-avalanche")[0];
        audio.play();
        } else {
        var audio = $(".audio-avalanche")[0];
        audio.pause();
        }
        
        if($(".play").hasClass("active") && $("#jcarousel-item2").hasClass("active")) {
            var audio = $(".audio-dont-look-down")[0];
        audio.play();
        } else {
        var audio = $(".audio-dont-look-down")[0];
        audio.pause();
        }
        
        if($(".play").hasClass("active") && $("#jcarousel-item1").hasClass("active")) {
            var audio = $(".audio-the-nights")[0];
        audio.play();
        } else {
        var audio = $(".audio-the-nights")[0];
        audio.pause();
        }
    });

    $(".volume").click(function(){
            $(".volume").removeClass("active");
            $(".volume-slider").animate({marginTop: '-40%'}, 500);
    });

    $(".volume-slider .close").click(function(){
            $(".volume-slider").animate({marginTop: '100%'}, 500);
    })

    $('.volume-slider input[type="range"]').on('input', function () {
                var percent = Math.ceil(((this.value - this.min) / (this.max - this.min)) * 100);
                console.log(this.min);
                $(this).css('background', '-webkit-linear-gradient(left, #e74c3c 0%, #e74c3c ' + percent + '%, #999 ' + percent + '%)');
            });

    $(".volume-slider").slider({
        min: 0,
        max: 100,
        value: 0,
            range: "min",
            animate: true,
        slide: function(event, ui) {
        setVolume((ui.value) / 100);
        }
    });
    setTrackSlider();
});

function setVolume(myVolume) {
    var myMedia = document.getElementByClass('audio-avalanche');
    myMedia.volume = myVolume;
}

function populateTrackNode(artist, trackName, imageUrl="#"){
    var trackNode = $("<div>").append(
        $("<img>").addClass("sliderTrackCover").attr("src", imageUrl)
    ).append(
        $("<div>").addClass("info").append(
            $("<div>").addClass("name").append(
                $("<h3>").addClass("song").text(trackName)
            ).append(
                $("<p>").addClass("artist").text(artist)
            )
        )
    );
    return trackNode;
}

function getTrackArray(){
    var trackList = [];
    trackList.push(
        populateTrackNode("Avicii", "The Nights", "https://upload.wikimedia.org/wikipedia/en/6/64/The-Days-Nights-EP-by-Avicii.jpg"),
        populateTrackNode("Martin Garrix", "Don't Look Down", "https://i1.sndcdn.com/artworks-000110285449-17viu6-t500x500.jpg"),
        populateTrackNode("Bring Me The Horizon", "Avalanche", "https://s3-us-west-2.amazonaws.com/s.cdpn.io/308622/bmth-tts.jpg"),

        populateTrackNode("Avicii", "The Nights", "https://upload.wikimedia.org/wikipedia/en/6/64/The-Days-Nights-EP-by-Avicii.jpg"),
        populateTrackNode("Martin Garrix", "Don't Look Down", "https://i1.sndcdn.com/artworks-000110285449-17viu6-t500x500.jpg"),
        populateTrackNode("Bring Me The Horizon", "Avalanche", "https://s3-us-west-2.amazonaws.com/s.cdpn.io/308622/bmth-tts.jpg")
    )
    return trackList;
}

function setTrackSlider(){
    var slickElementSelector = "#currentPlayingView .slider";
    try{ 
        $(slickElementSelector).slick('unslick'); 
        $(slickElementSelector).empty();
    }catch(error){ 
        //...
    }

    var trackArray = getTrackArray();
    $.each(trackArray, function(key, value){
        $(slickElementSelector).append(value);
    });

    var nextTrackSliderButton = $("<div>").append(
		$("<button>")
			.attr("class", "nextTrackSliderButton")
			.addClass("hidden")
			.text("next")
	);

	var prevTrackSliderButton = $("<div>").append(
		$("<button>")
			.attr("class", "prevTrackSliderButton")
			.addClass("hidden")
			.text("prev")
	);

    var slider = $(slickElementSelector).slick({
        // normal options...
        nextArrow: nextTrackSliderButton.html(),
        prevArrow: prevTrackSliderButton.html(),
    });

    $('#currentPlayingView .jcarousel-prev').click(function() {
        $("#currentPlayingView .prevTrackSliderButton").click();
        /*
        $('.jcarousel').jcarousel('scroll', '-=1');
        
            $(".audio-avalanche")[0].pause();
            $(".audio-the-nights")[0].pause();
            $(".audio-dont-look-down")[0].pause();
            $(".play i").removeClass("fa-pause").addClass("fa-play");
            $(".play").removeClass("active")
        
            if ($('#jcarousel-item1').hasClass('active')) {
            $('.dont-look-down, .avalanche').removeClass('active');
            $('.the-nights').addClass('active');
            $(".song").html("The Nights");
            $(".artist").html("Avicii");
            $(".duration").html($(".audio-the-nights").duration);
        };
        
        if ($('#jcarousel-item2').hasClass('active')) {
            $('.the-nights, .avalanche').removeClass('active');
            $('.dont-look-down').addClass('active');
            $(".song").text("Don't Look Down");
            $(".artist").text("Martin Garrix");
        };
        
        if ($('#jcarousel-item3').hasClass('active')) {
            $('.the-nights, .dont-look-down').removeClass('active');
            $('.avalanche').addClass('active');
            $(".song").html("Avalanche");
            $(".artist").html("Bring Me The Horizon");
        };
        */
    });

    $('#currentPlayingView .jcarousel-next').click(function() {
        $("#currentPlayingView .nextTrackSliderButton").click();
        /*
        $('.jcarousel').jcarousel('scroll', '+=1');
        
            $(".audio-avalanche")[0].pause();
            $(".audio-the-nights")[0].pause();
            $(".audio-dont-look-down")[0].pause();
            $(".play i").removeClass("fa-pause").addClass("fa-play");
            $(".play").removeClass("active")
        
                    if ($('#jcarousel-item1').hasClass('active')) {
            $('.dont-look-down, .avalanche').removeClass('active');
            $('.the-nights').addClass('active');
            $(".song").html("The Nights");
            $(".artist").html("Avicii");
        };
        
        if ($('#jcarousel-item2').hasClass('active')) {
            $('.the-nights, .avalanche').removeClass('active');
            $('.dont-look-down').addClass('active');
            $(".song").html("Don't Look Down");
            $(".artist").html("Martin Garrix");
        };
        
        if ($('#jcarousel-item3').hasClass('active')) {
            $('.the-nights, .dont-look-down').removeClass('active');
            $('.avalanche').addClass('active');
            $(".song").html("Avalanche");
            $(".artist").html("Bring Me The Horizon");
        };
        */
    });
}