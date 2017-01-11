<?php

// using SendGrid's PHP Library
// https://github.com/sendgrid/sendgrid-php
// If you are using Composer (recommended)
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }


$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];

require 'vendor/autoload.php';
use Mailgun\Mailgun;

$mgClient = new Mailgun('e2a6a49ab0cb0710e93391521b3321f3');
$domain = "sandbox88871dbdd0b745779f875bed7bcbc12b.mailgun.org";

$result = $mgClient->sendMessage($domain, array(
    'from'    => $email_address,
    'to'      => "Katie.Register@me.com",
    'subject' => 'Email From Contact Page',
    'name'    => $name,
    'text'    => $message
));
// If you are not using Composer
// require("path/to/sendgrid-php/sendgrid-php.php");
// $from = new SendGrid\Email("Example User", "abiam222@gmail.com");
// $subject = "Sending with SendGrid is Fun";
// $to = new SendGrid\Email("Example User", "abiam222@gmail.com");
// $content = new SendGrid\Content("text/plain", "and easy to do anywhere, even with PHP");
// $mail = new SendGrid\Mail($from, $subject, $to, $content);
// $apiKey = getenv('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');
// $sg = new \SendGrid($apiKey);
// $response = $sg->client->mail()->send()->post($mail);
// echo $response->statusCode();
// echo $response->headers();
// echo $response->body();

?>
