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

// FUNCTION TO DETECT SUSPICIOUS NAME PATTERNS
function isSuspiciousName($name) {
    // Regex to match names with unusual patterns
	$patterns = [
	    // Mix of 3 uppercase, 3 lowercase, no spaces, 6+ characters (e.g., gABDdsUDokVQ, CLtVLrYop)
	    '/^(?=(.*[a-z]){2,})(?=(.*[A-Z]){3,})[a-zA-Z]{6,}$/',
	    
	    // Alphanumeric with at least one uppercase and one digit, to catch mixed alphanumeric names like iZkEY8n3, j0hnD0e
	    '/^(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9]+$/',  
	    
	    // Long single-word names (20+ letters) without spaces (e.g., Supercalifragilisticexpialidocious)
	    '/^[a-zA-Z]{20,}$/',  
	    
	    // Only non-alphabetic characters (e.g., Доход-)
	    '/^[^\p{L}\s]+$/u',

	    // Short mixed alphanumeric strings, 6 to 10 characters long, all lowercase and/or numeric
		'/^(?![a-z]{6,}$)[a-z0-9]{6,}$/',

		// Names containing '@' (to prevent emails as names)
	    '/@/'
	];

    // Check each pattern
    foreach ($patterns as $pattern) {
        if (preg_match($pattern, $name)) {
            return true;
        }
    }
    return false;
}

// FUNCTION TO DETECT SUSPICIOUS EMAIL PATTERNS
function isSpamEmail($email) {
    // Catch common spam-related keywords
    $keywords = [
    	'admin',
    	'contact',
    	'do-not-respond',
    	'generic',
    	'help',
    	'info',
    	'no-reply',
    	'office',
    	'sales',
    	'support'];
    foreach ($keywords as $keyword) {
        if (stripos($email, $keyword) !== false) {
            return true;
        }
    }

    // Catch repetitive domains
    $blacklistedDomains = [
        'dont-reply.me',
        'godaddy',
        'kirgiz',
        'mail.ru',
        'serviseantilogin.com'
    ];
    foreach ($blacklistedDomains as $domain) {
        if (stripos($email, $domain) !== false) {
            return true;
        }
    }

    return false;
}

// FUNCTION TO CHECK IF MESSAGE CONTAINS ANY BLACKLISTED PHRASES
function containsBlacklistedMessage($message, $blacklistedMessages) {
    foreach ($blacklistedMessages as $blacklistedMessage) {
        // If the blacklisted message is found in the user's message
        if (stripos($message, $blacklistedMessage) !== false) {
            return true;
        }
    }
    return false;
}

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

	if (empty($message)){
		// RETURN A FAUX SUCCESS PAGE IF THEY ARE BLACKLISTED
		?>
		<div class="cartb">
		<div class="cartw">
		<h1>Thanks for getting in touch!</h1>
		<h2>I'll endeavor to get back to you ASAP :3</h2>
		</div>
		</div>
		<?php

	// CHECK IF THE NAME, EMAIL, OR MESSAGE, IS BLACKLISTED
	} elseif ( 
		isSuspiciousName($name) || 
		isSpamEmail($email) ||  
		in_array($name_lower, array_map('strtolower', $names)) ||
		in_array($email_lower, array_map('strtolower', $emails)) ||
		containsBlacklistedMessage($message_lower, $messages)) {

		// RETURN A FAUX SUCCESS PAGE IF THEY ARE BLACKLISTED
		?>
		<div class="cartb">
		<div class="cartw">
		<h1>Thanks for getting in touch!</h1>
		<h2>I'll endeavor to get back to you ASAP :3</h2>
		</div>
		</div>
		<?php
	
	// SEND EMAIL ONLY IF NOT BLACKLISTED		
	} else {
				
		// UPDATE TO YOUR EMAIL ADDRESS
		$youremail = 'your@email.com';

		// UPDATE TO YOUR WEBSITE
		$yourwebsite = 'yourwebsite.com';
		
		// IF YOU WOULD LIKE ME TO MONITOR MESSAGES FOR SPAM SENT VIA YOUR CONTACT FORM, FEEL FREE TO UNCOMMENT THE FOLLOWING LINES AND I WILL KEEP THESE BLACKLISTS UPDATED WITH ANY SPAM I DETECT. IT MERELY SENDS ME A COPY OF WHAT YOUR EMAIL ADDRESS RECEIVES. THIS HAS BEEN COMMENTED OUT BY DEFAULT FOR PRIVACY. ALTERNATIVELY, FEEL FREE TO FORWARD ANY SPAM YOU RECEIVE TO THAT EMAIL ADDRESS AND IT WILL BE ADDED TO THESE BLACKLISTS.

		// UNCOMMENT THE FOLLOWING LINE (1/2) FOR ME TO MONITOR SPAM
		// $bbc = ['spam@virtualjester.com'];
		

		// EMAIL LAYOUT YOUR RECEIVE
		$subject = "$name filled out the contact form on $yourwebsite";
		$body = "CONTACT FORM FILLED OUT:\n\n"; 
		$body .= "Name: $name\n\n";
		$body .= "Email: $email\n\n";
		$body .= "Message: $message\n\n";
		$headers = "From: $yourwebsite <notification@$yourwebsite>\r\n";
		$headers .= "Reply-To: $email\r\n";
		// UNCOMMENT THE FOLLOWING LINE (2/2) FOR ME TO MONITOR SPAM
		// $headers .= 'BCC: ' . implode(",", $bbc) . "\r\n";


		// SENDS EMAIL TO YOUR EMAIL ADDRESS
		if (mail($youremail, $subject, $message, $headers)) {
			// RETURNS A REAL SUCCESS PAGE
			?>
			<h1>Thanks for getting in touch!</h1>
			<h2>We'll endeavor to get back to you ASAP :)</h2>
			<?php 

		// ERROR PAGE INCASE OF EXTRA CONDITIONS
		} else {
			echo "Failed to send email. Please try again later.";
		}
	}

// IF THE FORM IS NOT SUBMITTED, REDIRECT BACK TO THE FORM PAGE (contact.php)
} else {	
	header("Location: /contact");
	exit;
}

?>
