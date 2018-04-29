var VlcInterface = (function() {
	var instance = null;
	function PrivateConstructor() {
		var updateStatusInterval;
		var STATE;
		var current_state;
		var current_track;
		var current_track_time;
		var current_track_length;
		var equalizerBarCount;
		var current_status;
		function init() {
			console.log("init VlcInterface start");
			STATE = {
				"STOPPED" : "stopped",
				"PAUSED" : "paused",
				"PLAYING" : "playing",
			}
			current_state = STATE["STOP"];
			equalizerBarCount = 6;
			current_status = null;
			current_track = null;
			current_track_time = 0;
			current_track_length = 0;
			startUpdateStatusScheduler();
			console.log("init VlcInterface end");
		}
		
		/* UI COMMANDS */

		function playCurrentTrack(){
			$(".player-commands .play-button").addClass("hidden");
			$(".player-commands .pause-button").removeClass("hidden");
			playEqualizer();
			playProgressBar();
		}
		
		function pauseCurrentTrack(){
			$(".player-commands .pause-button").addClass("hidden");
			$(".player-commands .play-button").removeClass("hidden");
			pauseEqualizer();
			pauseProgressBar();
		}
		function stopCurrentTrack(){
			$(".player-commands .pause-button").addClass("hidden");
			$(".player-commands .play-button").removeClass("hidden");
			pauseEqualizer();
			resetProgressBar();
		}
		
		function playNextTrack(){
			pauseEqualizer();
			resetProgressBar();
			//loadNextTrack();
			playCurrentTrack();
			
		}
		
		function playPrevTrack(){
			pauseEqualizer();
			resetProgressBar();
			//loadPrevTrack();
			playCurrentTrack();
		}

		/* CORE COMMANDS */
		function startUpdateStatusScheduler(){
			//console.log("sending an update request to server...");
			VlcAPI.getInstance().getStatusAPI(current_status).then(function(data){
				//console.log("Got a response from server, something changed, gonna update it!");	
				data = JSON.parse(data);
				updateStatus(data);
				current_status = data;
				//console.log("UI has been updated.");
				startUpdateStatusScheduler();
			}).catch(function(data){
				//console.log(data);
				//console.log("Something went wrong, gonna try again with next update.");
				startUpdateStatusScheduler();
			});
		}
		
		function stopUpdateStatusScheduler(){
			//...
		}
		
		function updateStatus(data){
			var prev_state = current_state;
			current_state = data.state;
			
			updateTrackInfo(data);

			if(prev_state == STATE["STOPPED"] && current_state == STATE["STOPPED"]){
				//do nothing
			}else if(prev_state == STATE["STOPPED"] && current_state == STATE["PAUSED"]){
				//do nothing
			}else if(prev_state == STATE["STOPPED"] && current_state == STATE["PLAYING"]){
				playCurrentTrack();
			}
			 
			 else if(prev_state == STATE["PAUSED"] && current_state == STATE["PAUSED"]){
				//do nothing
			}else if(prev_state == STATE["PAUSED"] && current_state == STATE["STOPPED"]){
				stopCurrentTrack();
			}else if(prev_state == STATE["PAUSED"] && current_state == STATE["PLAYING"]){
				playCurrentTrack();
			} 
			
			 else if(prev_state == STATE["PLAYING"] && current_state == STATE["PLAYING"]){
				//do nothing
			}else if(prev_state == STATE["PLAYING"] && current_state == STATE["STOPPED"]){
				stopCurrentTrack();
			}else if(prev_state == STATE["PLAYING"] && current_state == STATE["PAUSED"]){
				pauseCurrentTrack();
			}
			//console.log(data);
		}
		
		function updateTrackInfo(data){
		
			
			//update times
			current_track_time = parseInt(data["time"]);
			current_track_length = parseInt(data["length"]);
			
			//update track time
			$(".track-current-time").text(secondsTimeSpanToHMS(data["time"]));
			//update track length
			$(".track-total-time").text(secondsTimeSpanToHMS(data["length"]));
			
			//update track name
			if(current_track != data["track_name"]){
				pauseEqualizer();
				resetProgressBar();
				playEqualizer();
			}
			playProgressBar();
			current_track = data["track_name"];
			var track_id = parseInt(data["track_id"]) < 10 ? "0"+data["track_id"] : data["track_id"];
			$(".current-track-title div").text(track_id+". "+current_track);
			
			
		}
		
		function secondsTimeSpanToHMS(s) {
			var h = Math.floor(s/3600); //Get whole hours
			s -= h*3600;
			var m = Math.floor(s/60); //Get remaining minutes
			s -= m*60;
			h = (h == 0) ? "" : h+":";
			return h+(m < 10 ? '0'+m : m)+":"+(s < 10 ? '0'+s : s); //zero padding on minutes and seconds
		}

		function setEqualizer(){
			if ($(".equalizer-bar.noAnim").length == equalizerBarCount) {
				$(".equalizer-bar").removeClass("noAnim");
			} else {
				$(".equalizer-bar").addClass("noAnim");
			}
		}

		function playEqualizer(){
			$(".equalizer-bar").removeClass("noAnim");
		}

		function pauseEqualizer(){
			$(".equalizer-bar").addClass("noAnim");
		}

		function playProgressBar() {
			var getPercent = current_track_time/current_track_length;
			var getProgressWrapWidth = $('.progress-wrap').width();
			var progressTotal = getPercent * getProgressWrapWidth;
			var animationLength = current_track_length - current_track_time;
			$('.progress-bar').css("left", progressTotal);
			// on page load, animate percentage bar to data percentage length
			// .stop() used to prevent animation queueing
			$('.progress-bar').stop().animate({
				left: getProgressWrapWidth
			}, animationLength*1000, "linear");
		}

		function dragProgressBar(xPos){
			var getPercent = current_track_time/current_track_length;
			var getProgressWrapWidth = $('.progress-wrap').width();
			var progressTotal = getPercent * getProgressWrapWidth;
			var animationLength = current_track_length - current_track_time;
			$('.progress-bar').css("left", xPos);
			// on page load, animate percentage bar to data percentage length
			// .stop() used to prevent animation queueing
			$('.progress-bar').stop().animate({
				left: getProgressWrapWidth
			}, animationLength*1000, "linear");
		}

		function pauseProgressBar(){
			$('.progress-bar').stop();
		}

		function resetProgressBar(){
			$('.progress-bar').stop().css("left", 0);
		}
				
		return { //Return back the public methods
			init : init,
			playCurrentTrack : playCurrentTrack,
			pauseCurrentTrack : pauseCurrentTrack,
			playNextTrack : playNextTrack,
			playPrevTrack : playPrevTrack,
			stopUpdateStatusScheduler: startUpdateStatusScheduler,
			stopUpdateStatusScheduler: stopUpdateStatusScheduler,
			dragProgressBar : dragProgressBar
		};
	};

	function getInstance() {
		if (!instance) {
			instance = new PrivateConstructor();
			instance.init();
		}
		return instance;
	}

	return {
		getInstance: getInstance
	};
})();













function sendCommand(params, append) {
    if (current_que == 'stream') {
        $.ajax({
            url: 'requests/status.xml',
            data: params,
            success: function (data, status, jqXHR) {
                if (append != undefined) {
                    eval(append);
                }
                updateStatus();
            }
        });
    } else {
        if (params.plreload === false) {
            $.ajax({
                url: 'requests/status.xml',
                data: params,
                success: function (data, status, jqXHR) {
                    if (append != undefined) {
                        eval(append);
                    }
                }
            });
        } else {
            $.ajax({
                url: 'requests/status.xml',
                data: params,
                success: function (data, status, jqXHR) {
                    if (append != undefined) {
                        eval(append);
                    }
                }
            });
        }
    }
}

function browse(dir) {
    dir = dir == undefined ? 'file://~' : dir;
    $.ajax({
        url: 'requests/browse.xml',
        data: 'uri=' + encodeURIComponent(dir),
        success: function (data, status, jqXHR) {
            var tgt = browse_target.indexOf('__') == -1 ? browse_target : browse_target.substr(0, browse_target.indexOf('__'));
            $('#browse_elements').empty();
            $('element', data).each(function () {
                var ext = $(this).attr('name').substr($(this).attr('name').lastIndexOf('.') + 1).toLowerCase();
                if ($(this).attr('type') == 'dir' || $.inArray(ext, video_types) != -1 || $.inArray(ext, audio_types) != -1 || $.inArray(ext, playlist_types) != -1) {
                    $('#browse_elements').append(createElementLi($(this).attr('name'), $(this).attr('type'), $(this).attr('uri'), ext));
                }
            });
            $('[opendir]').dblclick(function () {
                browse($(this).attr('opendir'));
            });
            $('[openfile]').dblclick(function () {
                switch (tgt) {
                case '#stream_input':
                    $(browse_target).val($(this).attr('openfile'));
                    break;
                case '#mosaic_open':
                    $('li', browse_target).remove();
                    $(browse_target).append(this);
                    $(this).css({
                        'margin-left': -40,
                        'margin-top': -46,
                        'float': 'left'
                    });
                    break;
                case '#mobile':
                    break;
                default:
                    sendCommand('command=in_play&input=' + encodeURIComponent($(this).attr('openfile')));
                    updatePlayList(true);
                    break;
                }
                $('#window_browse').dialog('close');
            });
            $('[opendir]').click(function () {
                switch (tgt) {
                case '#mobile':
                    browse($(this).attr('opendir'));
                    break;
                default:
                    break;
                }
            });
            $('[openfile]').click(function () {
                switch (tgt) {
                case '#mobile':
                    sendCommand('command=in_play&input=' + encodeURIComponent($(this).attr('openfile')), "window.location='mobile.html'");
                    break;
                default:
                    break;
                }
            });
            switch (tgt) {
            case '#mobile':
                break;
            default:
                $('[selectable]').selectable();
                break;
            }
        },
        error: function (jqXHR, status, error) {
            setTimeout('browse("' + dir + '")', 1041);
        }
    });
}