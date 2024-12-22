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
