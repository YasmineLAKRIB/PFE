<?php
session_start();

$postData = $_POST;

if (!isset($postData['name']) || !isset($postData['email']) || !isset($postData['subject']) || !isset($postData['message']))
{
	echo('Il faut votre nom, un email , objet de email et un message pour soumettre le formulaire.');
    return;
}	

$name = $postData['name'];
$email = $postData['email'];
$subject = $postData['subject'];
$message = $postData['message'];



$insertmessage = $mysqlClient->prepare('INSERT INTO messages(nom, email, objet, message) VALUES (:name, :email, :subject, :message)');
$insertmessage->execute([
    'name' => $name,
    'email' => $email,
    'subject' => $subject,
    'message' => $message,
]);
?>
