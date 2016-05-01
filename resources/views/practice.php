<!DOCTYPE html>
<html>
	<head>
		<script src="https://connect.soundcloud.com/sdk/sdk-3.0.0.js"></script>
		<script>
		SC.initialize({
		  client_id: '20c47993de6f3540cfce0197c2ac7efb'
		});

		// find all sounds of buskers licensed under 'creative commons share alike'
		SC.get('/tracks', {
		  playback_count: '1231'
		}).then(function(tracks) {
		  console.log(tracks);
		});
		</script>
	</head>
	<body>
	</body>
</html>