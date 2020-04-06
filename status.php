<?php
	// Read querystring
	$status = htmlspecialchars($_GET["status"]);

	$filename = 'status.txt';

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
			
			.available {
				
				color: #006600;
				background: #000;
			}
			.inMeeting {
				
				color: #fff;
				background: #660000;
			}
			.recording {
				
				color: #fff;
				background: #bb4800;
			}

		</style>
		<script type="text/javascript">
			function setStatus(status) {
				$(".body").removeClass("available");
				$(".body").removeClass("inMeeting");
				$(".body").removeClass("recording");
				$(".body").addClass(status);
			}
		</script>
	</head>
	<body>
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
				setStatus("<?= $status ?>");
			});
		</script>
	</body>
</html>