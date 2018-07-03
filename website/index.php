<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Tesina Di Francesco</title>
		<?php // no cache in this page
		header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
		header("Pragma: no-cache"); // HTTP 1.0.
		header("Expires: 0"); // Proxies.
		?>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-115310552-1"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			gtag('config', 'UA-115310552-1');
		</script>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link href="style.css" type="text/css" rel="stylesheet">
		<script>
			// when checkbox is clicked change record in database
			$(document).ready( function () {
				$('input[type="checkbox"]').change( function () {
					var ledNumber = $( this ).val();
					if ( this.checked ) {
						var ledState = 1;
					} else {
						var ledState = 0;
					}
					$.ajax( {
						url: "insert.php",
						method: "POST",
						data: {
							ledState: ledState,
							ledNumber: ledNumber
						},
						success: function(risposta) {
							$('#result').html("Update "+risposta);
						}
					} );
				} );
			} );
		</script>
		<script>
		// check in onload if the led is on or off
		$(document).ready(function(){
			$('[onload]').each(function updateLed() {
				var ledNumber = $(this).val();
				$.ajax( {
					url: "check.php",
					method: "POST",
					data: {
						ledNumber: ledNumber
					},
					success: function (ledState) {
						if ( ledState == 0 ) {
							document.getElementById( ledNumber ).checked = false;
						} else {
							document.getElementById( ledNumber ).checked = true;
						}
					}
				} );
			} );
		} );
		</script>
		<script>
		$(document).ready(function(){
			$('[onload]').each(function updateTable(){
				$.ajax({
					url:"updateTable.php",
					success:
					function(tableResult){
						$('#tableResult').html(tableResult);
						setTimeout(function(){
							updateTable();
						},1000); // update every sec
					}
				});
			});
		});
		</script>
	</head>
	<body>
		<h1>Controllo casa domotica</h1>
		<h2><a href="testo.html" style="color:black; text-decoration:none;">Thesis</a></h2>
		<h2><a href="https://docs.google.com/presentation/d/1DRQywpCJoIvB2dvbATTB59T-y3Fjk74rXPHJMoNFCEQ/edit?usp=sharing" style="color:black; text-decoration:none;">Presentation</a>
		<a href="https://chrome.google.com/webstore/detail/cbonncglhpmonkjnpnkiihpehlnhlhhf" style="color:black; text-decoration:none; font-size:small;">(Extension)</a></h2>
		<h2><a href="https://github.com/MarcoDiFrancesco/HomeAutomation/" style="color:black; text-decoration:none;">Code</a></h2>

		<div>
			<div>
				Living room &nbsp&nbsp&nbsp
				<label class="switch">
					<input type="checkbox" name="state" id="1" value="1" onload="updateLed();">
					<span class="slider round"></span>
				</label>

			</div>
			<div>Kitchen &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				<label class="switch">
					<input type="checkbox" name="state" id="2" value="2" onload="updateLed();">
					<span class="slider round"></span>
				</label>

			</div>
			<div>Red room &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				<label class="switch">
					<input type="checkbox" name="state" id="3" value="3" onload="updateLed();">
					<span class="slider round"></span>
				</label>

			</div>
			<div>Blue room &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				<label class="switch">
					<input type="checkbox" name="state" id="4" value="4" onload="updateLed();">
					<span class="slider round"></span>
				</label>
			</div>

			<div>Yellow room &nbsp&nbsp&nbsp
				<label class="switch">
					<input type="checkbox" name="state" id="5" value="5" onload="updateLed();">
					<span class="slider round"></span>
				</label>

			</div>
			<br/>
		</div>
		<!-- Adding data from the database with updateTable.php -->
		<div id="tableResult"></div>
	</body>
</html>
