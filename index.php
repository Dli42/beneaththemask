<?php
//change with each loop, also with weather
?>

<head>
	<style>
		@font-face { font-family: p5; src: url('p5hatty.ttf'); } 
		table {
			font-family: p5;
			font-size: 30;
		}
		th {
			padding-right: 50px;
		}
	</style>
</head>

<audio id="audio-default" autoplay loop>
	<source id="source-default" src="music/beneath_the_mask.mp3" type="audio/mp3"></source>
</audio>

<audio id="audio-default-instr" autoplay loop>
	<source id="source-default-instr" src="music/beneath_the_mask_instr.mp3" type="audio/mp3"></source>
</audio>

<audio id="audio-rain" autoplay loop>
	<source id="source-rain" src="music/beneath_the_mask_rain.mp3" type="audio/mp3"></source>
</audio>

<audio id="audio-rain-instr" autoplay loop>
	<source id="source-rain-vocals" src="music/beneath_the_mask_rain_instr.mp3" type="audio/mp3"></source>
</audio>

<div>
	<table>
		<th id="instr" onclick="switchTrack('audio-default')">Default</th>
		<th id="vocals" onclick="switchTrack('audio-default-instr')">Instr</th>
		<th id="rain-instr" onclick="switchTrack('audio-rain')">Rain</th>
		<th id="rain-vocals" onclick="switchTrack('audio-rain-instr')">Rain Intr</th>
	</table>
</div>

<h1 id="demo"></h1>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
	var currentTrack = "audio-default";
	document.getElementById(currentTrack).volume = 1.0;
	document.getElementById('audio-default-instr').volume = 0.0;
	document.getElementById('audio-rain').volume = 0.0;
	document.getElementById('audio-rain-instr').volume = 0.0;
	document.getElementById('demo').innerHTML = currentTrack;
	
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
