$(document).ready(function(){
    var yourPlaylistComponentSelector = "#yourPlaylistComponent";
    setFolderSlider(yourPlaylistComponentSelector);
});

function populateFolderNode(folderTrackCount, folderName, imageUrl="#"){
    var folderNode = $("<div>").append(
        $("<img>").addClass("sliderFolderCover").attr("src", imageUrl)
    ).append(
        $("<div>").addClass("info").append(
            $("<div>").addClass("name").append(
                $("<h3>").addClass("folderName").text(folderName)
            ).append(
                $("<p>").addClass("folderTrackCount").text(folderTrackCount)
            )
        )
    );
    return folderNode;
}

function getFolderArray(){
    var folderList = [];
    folderList.push(
        populateFolderNode("Avicii", "The Nights", "https://upload.wikimedia.org/wikipedia/en/6/64/The-Days-Nights-EP-by-Avicii.jpg"),
        populateFolderNode("Martin Garrix", "Don't Look Down", "https://i1.sndcdn.com/artworks-000110285449-17viu6-t500x500.jpg"),
        populateFolderNode("Bring Me The Horizon", "Avalanche", "https://s3-us-west-2.amazonaws.com/s.cdpn.io/308622/bmth-tts.jpg"),

        populateFolderNode("Avicii", "The Nights", "https://upload.wikimedia.org/wikipedia/en/6/64/The-Days-Nights-EP-by-Avicii.jpg"),
        populateFolderNode("Martin Garrix", "Don't Look Down", "https://i1.sndcdn.com/artworks-000110285449-17viu6-t500x500.jpg"),
        populateFolderNode("Bring Me The Horizon", "Avalanche", "https://s3-us-west-2.amazonaws.com/s.cdpn.io/308622/bmth-tts.jpg")
    )
    return folderList;
}

function setFolderSlider(componentSelector){
    var slickElementSelector = componentSelector+" .slider";
    try{ 
        $(slickElementSelector).slick('unslick'); 
        $(slickElementSelector).empty();
    }catch(error){ 
        //...
    }

    var folderArray = getFolderArray();
    $.each(folderArray, function(key, value){
        $(slickElementSelector).append(value);
    });

    var nextFolderSliderButton = $("<div>").append(
		$("<button>")
			.attr("class", "nextFolderSliderButton")
			.addClass("hidden")
			.text("next")
	);

	var prevFolderSliderButton = $("<div>").append(
		$("<button>")
			.attr("class", "prevFolderSliderButton")
			.addClass("hidden")
			.text("prev")
	);

    var slider = $(slickElementSelector).slick({
        // normal options...
        nextArrow: nextFolderSliderButton.html(),
        prevArrow: prevFolderSliderButton.html(),
    });

    $(componentSelector+' .jcarousel-prev').click(function() {
        $(componentSelector+" .prevFolderSliderButton").click();
    });

    $(componentSelector+' .jcarousel-next').click(function() {
        $(componentSelector+" .nextFolderSliderButton").click();
    });
}