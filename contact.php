<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Contact</title>
</head>
<body>
  
  <?php
  $name = $_POST["nom"];
  $email = $_POST["email"];
  $subject = "Nouveau message Portfolio : ". $_POST["sujet"] ;
  $message = "Ce message vous a été envoyé via la page contact du site
  portfoliokevinly.site
  Nom : " . $_POST["nom"] ."
  Email : " . $_POST["email"] ."
  Message : " . $_POST["message"];



  require 'vendor/autoload.php';
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;


  // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

  $mail = new PHPMailer(true);

  $mail->isSMTP();                                            //Send using SMTP
  $mail->SMTPAuth   = true;

  $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->Port = 587;

  require_once ('vendor/autoload.php');

  if (file_exists(__DIR__ . '/.env')) {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
}

  $variableEnvEmail = $_ENV["EMAIL_USERNAME"];
  $variableEnvPassword = $_ENV["EMAIL_PASSWORD"];

  $mail->Username = $variableEnvEmail;
  $mail->Password = $variableEnvPassword;

  $mail->setFrom($email, $name);
  $mail->addAddress("kevin.ly.dev@gmail.com", "Kevin");

  $mail->Subject = $subject;
  $mail->Body = $message;

  $mail->send();


  header("Location: sent.html");
  ?>

<!-- if (isset($_POST[message])) {
  $message = "Ce message vous a été envoyé via la page contact du site
  portfoliokevinly.site
  Nom : " . $POST["nom"] ."
  Email : " . $POST["email"] ."
  Message : " . $POST["message"];


  $retour = mail("kevin.ly.dev@gmail.com", $POST["sujet"], $message, "Reply-to:" . $POST["email"]);
  if ($retour) {
    echo "<p>Message Envoyé</p>";
  }
}


$message = (new Swift_Message())
->setSubject($POST["sujet"])
->setFrom([$POST["email"]])
->setTo(['kevin.ly.dev@gmail.com' => 'Kevin']);

$headers = ($message->getHeaders())
  -> addTextHeader('X-CloudMTA-Class', 'standard');

$message->setBody(
  '<body>'.
  '<h1>hello from php</h1>'.
  '</body>'
);
$message->addPart('hello from PHP', 'text/plain');
$mailer->send($message); -->

</body>
</html>
