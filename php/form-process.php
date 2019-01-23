<?php

$errorMSG = "";

// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Nombre Requerido ";
} else {
    $name = $_POST["name"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email requerido ";
} else {
    $email = $_POST["email"];
}

// MSG SUBJECT
if (empty($_POST["msg_subject"])) {
    $errorMSG .= "Asunto Requerido ";
} else {
    $msg_subject = $_POST["msg_subject"];
}


// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Mensaje Requerido ";
} else {
    $message = $_POST["message"];
}


$EmailTo = "info@solitel.com.ar";
$Subject = "NUEVO MENSAJE DESDE LA WEB";

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Subject: ";
$Body .= $msg_subject;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, "From:".$email);

// redirect to success page
if ($success && $errorMSG == ""){
   echo "success";
}else{
    if($errorMSG == ""){
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}

?>
