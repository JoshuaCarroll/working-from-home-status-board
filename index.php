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

			.available {
				font-size: 200px;
				color: #006600;
				background: #000;
			}
			.available #status::after {
				content: "Available";
			}

			.inMeeting {
				font-size: 150px;
				color: #fff;
				background: #660000;
			}
			@-webkit-keyframes blinker {
				from {
					opacity: 1;
				}
				to {
					opacity: 0;
				}
			}
			.inMeeting #status::after {
				content: "In a meeting";

				text-decoration: blink;
				-webkit-animation-name: blinker;
				-webkit-animation-duration: 0.6s;
				-webkit-animation-iteration-count: infinite;
				-webkit-animation-timing-function: ease-in-out;
				-webkit-animation-direction: alternate;
			}

			.recording {
				font-size: 150px;
				color: #006600;
				background: #000;
			}
			.recording #status::after {
				content: "Recording";
			}
			
			.onTheAir {
				font-size: 80px;
				color: #fff;
				background: #bb4800;
			}
			.onTheAir #status::after {
				content: "On the air (come on in)";
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
				setInterval(function(){ getStatus(); }, 3000);
			});
			
			var status = "";
			
			function getStatus() {
				$.get( "status_getter.php", function( data ) {
					status = data;
					setStatus(status);
				});
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
				<span id="status"></span>
			</div>
		</section>
	</body>
</html>