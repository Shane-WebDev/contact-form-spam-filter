<?php

// FETCHES & DECODES THE BLACKLIST IN THE URL
function fetchBlacklist($url) {
	$content = file_get_contents($url);
	if ($content === false) {
		die("Failed to retrieve blacklist data.");
	}
	
	// DECODES BLACKLIST JSON DATA INTO AN ARRAY
	$blacklist = json_decode($content, true);
	if (json_last_error() !== JSON_ERROR_NONE) {
		die("Error decoding blacklist data.");
	}
	
	return $blacklist;
}


// URLS OF THE BLACKLISTS
$names_url = 'https://raw.githubusercontent.com/VirtualJester/contact-form-spam-filter/main/blacklists/names.json';
$emails_url = 'https://raw.githubusercontent.com/VirtualJester/contact-form-spam-filter/main/blacklists/emails.json';
$messages_url = 'https://raw.githubusercontent.com/VirtualJester/contact-form-spam-filter/main/blacklists/messages.json';


// RUNS FETCH BLACKLISTS FUNCTION
$names = fetchBlacklist($names_url);
$emails = fetchBlacklist($emails_url);
$messages = fetchBlacklist($messages_url);


// CHECK IF THE FORM IS SUBMITTED
if (isset($_POST['contact_submit'])) {

	// VALIDATE AND SANITIZE FORM DATA
	$name = trim($_POST['name']);
	$email = trim($_POST['email']);
	$message = trim($_POST['message']);
	
	// VALIDATE EMAIL ADDRESS
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo "Invalid email address";
		exit;
	}

	// CONVERT INPUTS TO LOWERCASE FOR CASE-INSENSITIVE SPAM COMPARISON
	$name_lower = strtolower($name);
	$email_lower = strtolower($email);
	$message_lower = strtolower($message);

	// CHECK IF THE NAME, EMAIL, OR MESSAGE, IS BLACKLISTED
	if (in_array($name_lower, array_map('strtolower', $names)) ||
		in_array($email_lower, array_map('strtolower', $emails)) ||
		in_array($message_lower, array_map('strtolower', $messages))) {

		// RETURN A FAUX SUCCESS PAGE IF THEY ARE BLACKLISTED
		?>
		<h1>Thanks for getting in touch!</h1>
		<h2>We'll endeavor to get back to you ASAP <3</h2>
		<?php
	
	// SEND EMAIL ONLY IF NOT BLACKLISTED		
	} else {
				
		// YOUR EMAIL ADDRESS
		$youremail = 'your@email.com';

		// YOUR WEBSITE
		$yourwebsite = 'yourwebsite.com';
		
		// IF YOU WOULD LIKE ME TO MONITOR MESSAGES FOR SPAM SENT VIA YOUR CONTACT FORM, FEEL FREE TO UNCOMMENT THE FOLLOWING LINES AND I WILL KEEP THESE BLACKLISTS UPDATED WITH ANY SPAM I DETECT. IT MERELY SENDS ME A COPY OF WHAT YOUR EMAIL ADDRESS RECEIVES. COMMENTED OUT BY DEFAULT FOR PRIVACY. ALTERNATIVELY, FEEL FREE TO FORWARD ANY SPAM YOU RECEIVE TO THAT EMAIL ADDRESS AND IT WILL BE ADDED TO THESE BLACKLISTS.

		// UNCOMMENT THESE TWO LINES FOR ME TO MONITOR SPAM
		// $bbc = ['spam@virtualjester.com'];
		// $headers .= 'BCC: ' . implode(",", $bbc) . "\r\n";


		// EMAIL LAYOUT YOUR RECEIVE
		$subject = "$name filled out the contact form on $yourwebsite";
		$message = "Name: $name\n\n";
		$message .= "Email: $email\n\n";
		$message .= "Message: $message\n\n";
		$headers = "From: $yourwebsite <notification@$yourwebsite>\r\n";
		$headers .= "Reply-To: $email\r\n";


		// SENDS EMAIL TO YOUR EMAIL ADDRESS
		if (mail($youremail, $subject, $message, $headers)) {
			// RETURNS A REAL SUCCESS PAGE
			?>
			<h1>Thanks for getting in touch!</h1>
			<h2>We'll endeavor to get back to you ASAP <3</h2>
			<?php 

		// ERROR PAGE INCASE OF EXTRA CONDITIONS
		} else {
			echo "Failed to send email. Please try again later.";
		}
	}

// IF THE FORM IS NOT SUBMITTED, REDIRECT BACK TO THE FORM PAGE
} else {	
	header("Location: /contact");
	exit;
}

?>
