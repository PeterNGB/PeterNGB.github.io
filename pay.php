<!Doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Pay - Bag holder package</title>
  <link rel="icon" href="https://preview.ibb.co/jYM639/newcut.gif">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,900' rel='stylesheet' type='text/css'>
  
  <link href="css/pay.css" rel="stylesheet">
</head>
<body>

<div class="back"></div>
<div class="registration-form">
    <header>
        <h1>Buy Nocoin</h1>
        <p>Fill in all the information</p>
    </header>
    <form method="post" name="contactform" action="send_form_email.php">
        <div class="input-section email-section"><input class="email" type="email" name="email" placeholder="ENTER YOUR E-MAIL HERE" autocomplete="off" />
            <div class="animated-button"><span class="icon-paper-plane"><i class="fa fa-envelope-o"></i></span><span class="next-button email"><i class="fa fa-arrow-up"></i></span></div>
        </div>
        <div class="input-section password-section folded"><input class="password" name="name" placeholder="ENTER YOUR NAME HERE" />
            <div class="animated-button"><span class="icon-lock"><i class="fa fa-user"></i></span><span class="next-button password"><i class="fa fa-arrow-up"></i></span></div>
        </div>
        <div class="input-section repeat-password-section folded"><input class="repeat-password" name="noaddress" placeholder="PASTE YOUR NOADDRESS HERE" />
            <div class="animated-button"><span class="icon-repeat-lock"><i class="fa fa-qrcode"></i></span><a href="https://bitcoin.com" target="_blank" title="Get redirected to our payment page"><span class="next-button repeat-password"><i class="fa fa-external-link"></i></span></a></div>
        </div>
        <div class="input-section pay-section folded"><input class="pay" name="payid" placeholder="ENTER YOUR PAYMENT ID HERE" autocomplete="off" />
            <div class="animated-button"><span class="icon-pay"><i class="fa fa-lock"></i></span><input type="submit" value=""><span class="next-button pay"><i class="fa fa-paper-plane"></i></span></div>
        </div>
        <div class="success">
            <p>REQUEST SEND</p>
        </div>
    </form>
</div>
      
      <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
      <script src='js/pay.js'></script>
      
   </body>
   </html>

<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "NocoinProject@gmx.net";
    $email_subject = "Buy Nocoin Request";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['email']) ||
        !isset($_POST['name']) ||
        !isset($_POST['noaddress']) ||
        !isset($_POST['payid'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $email_form = $_POST['email']; // required
    $name = $_POST['name']; // required
    $noaddress = $_POST['noaddress']; // required
    $payid = $_POST['payid']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
 
  if(!preg_match($string_exp,$noaddress)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }
 
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "NoAddress: ".clean_string($noaddress)."\n";
    $email_message .= "Payment ID: ".clean_string($payid)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
 
Thank you for contacting us. We will be in touch with you very soon.
 
<?php
 
}
?>
