<?php
//change with each loop, also with weather
?>

<head>
	<style>
		@font-face { font-family: p5; src: url('p5hatty.ttf'); } 
		table, h1 {
			font-family: p5;
			font-size: 30;
			color: #EEEEEE;
		}
		th {
			padding-right: 50px;
		}
		body {
			background-color: black;
		}
	</style>
</head>

<audio id="audio-default" controls autoplay loop>
	<source id="source-default" src="music/beneath_the_mask.mp3" type="audio/mp3"></source>
</audio>

<audio id="audio-default-instr" controls autoplay loop>
	<source id="source-default-instr" src="music/beneath_the_mask_instr.mp3" type="audio/mp3"></source>
</audio>

<audio id="audio-rain" controls autoplay loop>
	<source id="source-rain" src="music/beneath_the_mask_rain.mp3" type="audio/mp3"></source>
</audio>

<audio id="audio-rain-instr" controls autoplay loop>
	<source id="source-rain-vocals" src="music/beneath_the_mask_rain_instr.mp3" type="audio/mp3"></source>
</audio>

<div>
	<table>
		<th id="instr" onclick="switchTrack('audio-default')" onmouseover="" style="cursor: pointer;">Default</th>
		<th id="vocals" onclick="switchTrack('audio-default-instr')" onmouseover="" style="cursor: pointer;">Instr</th>
		<th id="rain-instr" onclick="switchTrack('audio-rain')" onmouseover="" style="cursor: pointer;">Rain</th>
		<th id="rain-vocals" onclick="switchTrack('audio-rain-instr')" onmouseover="" style="cursor: pointer;">Rain Intr</th>
		<th id="mute" onclick="switchTrack('mute')" onmouseover="" style="cursor: pointer;">Mute</th>
		<th id="play" onclick="play_all()" onmouseover="" style="cursor: pointer;" hidden>Play</th>
	</table>
</div>

<h1 id="demo">test</h1>

<img src="crowd/image2vector.svg">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
	var audio_default = document.getElementById('audio-default');
	var audio_default_instr = document.getElementById('audio-default-instr');
	var audio_rain = document.getElementById('audio-rain');
	var audio_rain_instr = document.getElementById('audio-rain-instr');

	var currentTrack = audio_default;

	currentTrack.volume = 0.0;
	audio_default_instr.volume = 0.0;
	audio_rain.volume = 0.0;
	audio_rain_instr.volume = 0.0;

	var audio_array = [audio_default, audio_default_instr, audio_rain, audio_rain_instr];
	console.log('start script '+Date.now());
	Promise.all(audio_array.map(function(audio){
		return new Promise(function(resolve, reject){
			audio.oncanplaythrough = function(){
				console.log('Can play through ' + audio.id + ' ' + Date.now());
				resolve();
			};
		});
	}))
	.then(function(){
		console.log('Can play through everything, trying to play all ' + Date.now());
		play_all();
	});

	var promise_autoplay = document.querySelector('audio').play();

	if (promise_autoplay !== undefined) {
	  promise_autoplay.then(_ => {
	    // Autoplay started!
	  }).catch(error => {
	    // Autoplay was prevented.
	    // Show a "Play" button so that user can start playback.
	    document.getElementById('play').hidden = false;
	  });
	}

	function play_all(){
		audio_array.map(function(audio){
			audio.currentTime = 0;
			audio.play();
		});
		$(currentTrack).animate({volume: 1.0}, 1000);
		document.getElementById('play').hidden = true;
	}
	
	function switchTrack(trackName){

		if (currentTrack.id != trackName){

			var nextTrack = document.getElementById(trackName);

			$(currentTrack).animate({volume: 0.0}, 1000);
			$(nextTrack).animate({volume: 1.0}, 1000);

			currentTrack = nextTrack;
		}
	}
</script>
