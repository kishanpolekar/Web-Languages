<?php
if (isset($_POST['send'])) {
	$headers = "From: noreply@ucmo.edu\r\n";
	$headers .= 'Content-Type: text/plain; charset=utf-8';
	$to = 'kxp30120@ucmo.edu'; // use your real email here
	$subject = 'Answers from my web form';
	$message = 'Name: ' . $_POST['name'] . "\r\n\r\n";
	$message .= 'Email: ' . $_POST['email'] . "\r\n\r\n";
	$message .= 'Phone: ' . $_POST['phone'] . "\r\n\r\n";
	$message .= 'Mood: ' . $_POST['mood'] . "\r\n\r\n";
	$message .= 'Favorite Color: ' . $_POST['favcolor'] . "\r\n\r\n";
	$message .= 'Secret Word: ' . $_POST['psw'] . "\r\n\r\n";
	$message .= 'Comments: ' . $_POST['comments'];
	$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
	if ($email) {
	$headers .= "\r\nReply-To: $email";
	}
	// use -f and then your real email below
	$success = mail($to, $subject, $message, $headers, '-fkxp30120@ucmo.edu');
}
?>
<!-- https://learning.linkedin.com/blog/tech-tips/send-email-from-a-web-form-with-php -->
<!DOCTYPE html>
<html>
<head>
<style>
body { font-family: sans-serif; color: white; }
.response-box { margin: 10vh auto; width: 80vw; height: 80vh; background: lime; border-radius: 25px; text-align: center; }
#not-sent { background: orange; }
h2 { margin-top: 50px; text-transform: uppercase; font-size: 10vw;}
p { font-size: 3vw; }
</style>
</head>
<body>
<?php if (isset($success) && $success) { ?>
<div class="response-box" id="sent">
&nbsp;
<h2>Thank You</h2>
<p>Your message has been sent.</p>
</div>
<?php } else { ?>
<div class="response-box" id="not-sent">
&nbsp;
<h2>Oops!</h2>
<p>Sorry, there was a problem sending your message.</p>
</div>
<?php } ?>
</body>
</html>
