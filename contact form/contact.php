<html>
<style>

	html, body { float: left; width: 100%; height: 100%; margin: 0 auto; padding: 0; background: #990; font-family: 'Calibri'; }

	form { float: left; width: 100%; background: #1235; }

	.firstname { display: none; }

	.formspacer > label:after { content: ' \25be'; }

	.formspacer > label, .formspacer > input, .formspacer > textarea { clear: both; float: left; position: relative; width: 39.5%; margin: 7px 0 0 25%; z-index: 1000; text-align: left; }

	.formspacer > input, .formspacer > textarea { padding: 0 0 0 0.5%; background: #ccc; border: none; color: #000; font-size: 1.4em; line-height: 1.5em; outline: none; border-radius: 15px; font-weight: 600; }

	.formspacer > label { font-size: 1.5em; font-weight: 600; }
	.formspacer > input { height: 2em; margin-bottom: 10px; }
	.formspacer > textarea { display: inline-block; min-width: 39.5%; max-width: 39.5%; padding: 10px; min-height: 7.5em; box-shadow: none; }

	.formspacer > input#submit { clear: both; float: left; width: auto; height: auto; margin: 12px 0 100px 25%; padding: 10px 20px; color: #555; font-weight: 900; text-shadow: none; }

	.formspacer > label, .formspacer > input, .formspacer > textarea, .formspacer > ::placeholder { font-family: 'Calibri'; }
	.formspacer > ::placeholder { color: #333; font-weight: 600; }

	@media only screen and (min-width: 100px) and (max-width: 768px) {
		.formspacer > label, .formspacer > input, .formspacer > textarea { width: 91%; margin: 7px 3% 0 3%; }
		.formspacer > input, .formspacer > textarea { padding: 0 0 0 3%; }
		.formspacer > textarea { min-width: 91%; max-width: 91%; padding: 10px 0 10px 3%; }
		.formspacer > input#submit { margin: 12px 0 100px 3%; }
	}
	@media only screen and (min-width: 100px) and (max-width: 480px) {
		.formspacer > label, .formspacer > input, .formspacer > textarea { font-size: 1em; }
	}

</style>

<body>

	<!-- MAKE SURE THE congrats.php LOCATION IS IN YOUR CORRECT PATH -->
	<form method="post" action="/congrats.php">

		<div class="formspacer">

			<!-- THE FOLLOWING TWO LINES ARE A DEFAULT CATCH THAT DO NOT DISPLAY FOR HUMAN VISITORS, BUT BOTS WILL TRY AND ACCESS -->
			<label for="firstname" class="firstname">First Name</label>
			<input type="text" class="firstname" id="firstname" name="firstname" placeholder="First Name">

			<label for="name">Name</label>
			<input type="text" id="name" name="name" placeholder="Your Name...">

			<label for="email">Email</label>
			<input type="email" id="email" name="email" placeholder="your@email.com...">

			<label for="message">Message</label>
			<textarea id="message" name="message" placeholder="Hi, I have a question about your contact form spam filter..."></textarea>

		</div>

		<div class="formspacer">

			<input type="submit" class="button next" id="submit" name="contact_submit" value="SEND MESSAGE!">
			
		</div>

	</form>

</body>
</html>
