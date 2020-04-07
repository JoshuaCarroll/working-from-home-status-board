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
		<link rel="stylesheet" href="style.css" type="text/css">
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
				<span>
					<form action="" method="GET">
						<select name="status" class="select-css" id="status" onchange="this.form.submit()">
							<option value="available">Available</option>
							<option value="inMeeting">In a meeting</option>
							<option value="recording">Recording</option>
						</select><br>
						<br>
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