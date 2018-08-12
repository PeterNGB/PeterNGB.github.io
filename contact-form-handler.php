<?php 
$errors = '';
$myemail = 'nocoinproject@gmx.net';//<-----Put Your email address here.
if(empty($_POST['email'])  || 
   empty($_POST['name']) ||
   empty($_POST['noaddress']) ||
   empty($_POST['payid']))
{
    $errors .= "\n Error: all fields are required";
}

$email_address = $_POST['email']; 
$name = $_POST['name']; 
$message = $_POST['noaddress'];
$payid = $_POST['payid']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Contact form submission: $name";
	$email_body = "You have received a new message. ".
	" Here are the details:\n Name: $name \n Email: $email_address \n NoAddress: \n $message \n Payment ID: \n $payid"; 
	
	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: index.html');
} 
?>
