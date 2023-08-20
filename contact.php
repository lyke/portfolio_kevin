<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Contact</title>
</head>
<body>
  <form action="post">

    <label>Noms</label>
    <input type="text" name="nom" required>

    <label for="email">Email</label>
    <input type="email" name="email" required>

    <label for="sujet">Sujet</label>
    <input type="text" name="sujet" required>

    <textarea name="message" id="message" cols="30" rows="10" required></textarea>
    <input type="submit" value="Envoyer">
  </form>


  <?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  require 'vendor/autoload.php';

  $mail = new PHPMailer(true);

  $mail->isSMTP();                                            //Send using SMTP
  $mail->SMTPAuth   = true;

  $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->Port = 587;

  $mail->Username = "you@example.com";
  $mail->Password = "password";

  $mail->setFrom($email, $name);
  $mail->addAddress("dave@example.com", "Dave");

  $mail->Subject = $subject;
  $mail->Body = $message;

  $mail->send();

  // header("Location: sent.html");



  if (isset($_POST[message])) {
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
  $mailer->send($message);






  ?>



</body>
</html>
