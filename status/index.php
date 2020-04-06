<?php
	// Read querystring
	$status = htmlspecialchars($_GET["status"]);
	

	$dir = 'file';

	// create new directory with 744 permissions if it does not exist yet
	// owner will be the user/group the PHP script is run under
	if ( !file_exists($dir) ) {
		mkdir ($dir, 0744);
	}
	$filename = $dir.'/status.txt';
	file_put_contents ($filename, 'available');
	if ($status != null) {
		// Write status into file
		$myfile = fopen($filename, "w") or die("Unable to open file!");
		fwrite($myfile, $status);
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Status</title>
		<script src="jquery.min.js"></script>
		<style>
			/* carter-one-regular - latin */
			@font-face {
			  font-family: 'Carter One';
			  font-style: normal;
			  font-weight: 400;
			  src: local('Carter One'), local('CarterOne'),
				   url('fonts/carter-one-v11-latin-regular.woff2') format('woff2'), /* Chrome 26+, Opera 23+, Firefox 39+ */
				   url('fonts/carter-one-v11-latin-regular.woff') format('woff'); /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
			}
			
			body {
				font-family: 'Carter One', cursive;
			}

			.body {
				display: block;
				top: 0px;
				bottom: 0px;
				left: 0px;
				position: absolute;
				width: 100%;
			}

			#both-aligned {
				left: 50%;
				position: absolute;
				top: 50%;
				-webkit-transform: translateX(-50%) translateY(-50%);
				transform: translateX(-50%) translateY(-50%);
				text-align: center;
			}

		</style>
		<script type="text/javascript">
			$(document).ready(function () {
				$("body").on("keypress", function () {
					keyPress(event);
				});
			});

			function keyPress(event) {
				var x = event.which || event.keyCode;
				console.log(x);

				switch (x) {
					case 13:
						setStatus("available");
						break;
					case 32:
					case 109:
						setStatus("inMeeting");
						break;
					case 114:
						setStatus("recording");
						break;
				}
			}

			function setStatus(status) {
				$(".body").removeClass("available");
				$(".body").removeClass("inMeeting");
				$(".body").removeClass("recording");

				$(".body").addClass(status);
			}
		</script>
	</head>
	<body>
<!--
	
To change the status, set focus on the rendered page below, then press m, r, enter, or space to change the status dispalyed.

-->

		<section class="body available">
			<div id="both-aligned">
				<span id="status">
					<form action="" method="GET">
						<select name="status" id="status">
							<option value="available">Available</option>
							<option value="inMeeting">In a meeting</option>
							<option value="recording">Recording</option>
						</select>
						<input type="submit">
					</form>
				</span>
			</div>
		</section>
		<script>
			$(function() {
				$("#status").val("<?= $status ?>");
			});
		</script>
	</body>
</html>