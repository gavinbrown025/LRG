<?php
require_once '../../load.php';

// Include contact form scripts
require_once './scripts.php';

$data = $_POST;
$required = getRequiredFields($data["subject"]);


$failedInputs = checkAllFields($data, $required);

// If invalid then fail
if (count($failedInputs) > 0) {
  $template = 'Invalid form type: %s';
  $message = sprintf($template, $failedInputs[0]);
  // fail with message
  response($message);
} 


    // email in londonrefereesgroup to be sent to
    // $admin_email = 'contact@londonrefereesgroup.com';
    $admin_email = 'nategrift@gmail.com';

    // email subject and message
    $email_subject = 'LRG - Contact Request';
    $email_message = getEmailMessage($data);

    // Email headers
    $email_headers = array(
      'From'=>'noreply@londonrefereesgroup.com',
      'Reply-To'=>$data["email"]
    );  
    // send email and respond according to result
     $mailsuccess = mail($admin_email, $email_subject, $email_message, $email_headers);
    if ($mailsuccess) {
      response('Successfully sent! We will get back to you in 48 hours.');
    } else {
      response('Error sending mail, please try again later');
    }



// RESPOND FUNCTION - to redirect to contact page with error
function response($msg) {
  $msg = urlencode($msg);
  redirect_to("../../contact.php?msg=$msg");
}




