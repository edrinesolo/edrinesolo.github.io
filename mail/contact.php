<?php
if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));
$findUs = strip_tags(htmlspecialchars($_POST['findus']));
$expectedDate =strip_tags(htmlspecialchars($_POST['expectedDate']));
$endDate =strip_tags(htmlspecialchars($_POST['endDate']));
$people =strip_tags(htmlspecialchars($_POST['people']));
$budget =strip_tags(htmlspecialchars($_POST['bugdet']));

$to = "info@salvajegorillasafaris.com"; // Change this email to your //
$subject = "$m_subject:  $name";
$body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\n\nName: $name\n\n
Email: $email\n\nSubject: $m_subject\n\nMessage: $message\n\nexpected to come on: $expectedDate\n\nUntil: $endDate 
\n\nNumber of people: $people\n\nBudget Range: $budget per person per day";
$header = "From: $email";
$header .= "Reply-To: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
