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
		<th id="play" onclick="play()" onmouseover="" style="cursor: pointer;" hidden>Play</th>
	</table>
</div>

<h1 id="demo">test</h1>

<img src="crowd/image2vector.svg">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
	var currentTrack = "audio-default";
	var audio_default = document.getElementById('audio-default');
	var audio_default_instr = document.getElementById('audio-default-instr');
	var audio_rain = document.getElementById('audio-rain');
	var audio_rain_intr = document.getElementById('audio-rain-instr');

	document.getElementById(currentTrack).volume = 1.0;
	document.getElementById('audio-default-instr').volume = 0.0;
	document.getElementById('audio-rain').volume = 0.0;
	document.getElementById('audio-rain-instr').volume = 0.0;

	var promise = document.querySelector('audio').play();

	if (promise !== undefined) {
	  promise.then(_ => {
	    // Autoplay started!
	  }).catch(error => {
	    // Autoplay was prevented.
	    // Show a "Play" button so that user can start playback.
	    document.getElementById('play').hidden = false;
	  });
	}

	var date = new Date();
	console.log('start script '+date.getTime());
	audio_default.addEventListener('canplaythrough', function () {console.log('audio_default can play '+date.getTime())});
	audio_default_instr.addEventListener('canplaythrough', function () {console.log('audio_default_instr can play '+date.getTime())});
	audio_rain.addEventListener('canplaythrough', function () {console.log('audio_rain can play '+date.getTime())});
	audio_rain_instr.addEventListener('canplaythrough', function () {console.log('audio_rain_instr can play '+date.getTime())});

	function play(){
		document.getElementById('audio-default').play();
		document.getElementById('audio-default-instr').play();
		document.getElementById('audio-rain').play();
		document.getElementById('audio-rain-instr').play();
		document.getElementById('play').hidden = true;
	}
	
	function switchTrack(trackName){

		if (currentTrack != trackName){

			var currentAudio = document.getElementById(currentTrack);
			var nextAudio = document.getElementById(trackName);

			$(currentAudio).animate({volume: 0.0}, 1000);
			$(nextAudio).animate({volume: 1.0}, 1000);

			currentTrack = trackName;
		}
	}
</script>
