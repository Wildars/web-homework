<?php
session_start();

require_once ("db.php");

$strSQL = "SELECT * FROM contact";

$result = $mysqli->query($strSQL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require_once 'vendor/autoload.php';


$mail = new PHPMailer(true);

if(isset($_POST['submit'])){
    $name = $_POST['theme'];
    $email = $_POST['email'];
    $message = $_POST['text'];


    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.mail.ru';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'askar.omurkanov@mail.ru';
        $mail->Password   = 'Dgv3G5QfeTYdG8Q9KCeq';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;


        $mail->setFrom('askar.omurkanov@mail.ru', 'Askar');
        $mail->addAddress('azizcity860@gmail.com', $name);

        $sendMessage = $message."
        
        
От: ".$name."
Почта: ".$email;


        $mail->Subject = 'Portfolio Message';
        $mail->Body = $sendMessage;


        $mail->send();

    } catch (\Exception $e) {
        $mailSend = false;
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        $mailError = "Сообщение не отправлено";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta content="width=device-width,initial-scale=1" name="viewport">
  <meta content="description" name="description">
  <meta name="google" content="notranslate" />
  <meta content="Mashup templates have been developped by Orson.io team" name="author">

  <!-- Disable tap highlight on IE -->
  <meta name="msapplication-tap-highlight" content="no">
  
  <link rel="apple-touch-icon" sizes="180x180" href="./assets/apple-icon-180x180.png">
  <link href="./assets/favicon.ico" rel="icon">

  <title>Title page</title>  

<link href="./main.3f6952e4.css" rel="stylesheet">
</head>

<body class="">
<div id="site-border-left"></div>
<div id="site-border-right"></div>
<div id="site-border-top"></div>
<div id="site-border-bottom"></div>
 <!-- Add your content of header -->
<header>
  <nav class="navbar  navbar-fixed-top navbar-default">
    <div class="container">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

      <div class="collapse navbar-collapse" id="navbar-collapse">
          <ul class="nav navbar-nav ">
              <li><a href="./index.php" title="">01 : Главная страница</a></li>
              <li><a href="works.php" title="">02 : Мои работы</a></li>
              <li><a href="about.php" title="">03 : Обо мне</a></li>
              <li><a href="./contact.php" title="">04 : Контакты</a></li>
              <li><a href="./login.php" title="">05 : Войти</a></li>
                        <li><a href="./2048/index.html" title="">06 : Игра 2048</a></li>
                        <li><a href="1234.html" title="">07 : Игра рулетка</a></li>
                        <li><a href="./Astray-master/index.html" title="">08 : Игра шарик</a></li>
          </ul>
      </div> 
    </div>
  </nav>
</header>

<div class="section-container">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section-container-spacer text-center">
                    <h1 class="h2">03 : Contact me</h1>
                </div>
          
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <form action="contact.php" method="post" class="reveal-content">
                          <div class="row">
                            <div class="col-md-7">
                              <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                              </div>
                              <div class="form-group">
                                <input type="text" class="form-control" name="theme" id="subject" placeholder="Subject">
                              </div>
                              <div class="form-group">
                                <textarea class="form-control" name="text" rows="5" placeholder="Enter your message"></textarea>
                              </div>
                              <button type="submit" name="submit" class="btn btn-default btn-lg">Send</button>
                            </div>
                        </form>


                    <?php
                        while($row = mysqli_fetch_array($result)) {
                            $t = '
                                <div class="col-md-5 address-container">
                                    <ul class="list-unstyled">
                                        <li>
                                          <span class="fa-icon">
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                          </span>
                                          '.$row['number'].'
                                        </li>
                                        <li>
                                          <span class="fa-icon">
                                            <i class="fa fa-at" aria-hidden="true"></i>
                                          </span>
                                          '.$row['mail'].'
                                        </li>
                                        <li>
                                          <span class="fa-icon">
                                            <i class="fa fa fa-map-marker" aria-hidden="true"></i>
                                          </span>
                                          '.$row['address'].'
                                        </li>
                                    </ul>
                                    <h3>Follow me on social networks</h3>
                                    <a href="'.$row['insta'].'" title="" class="fa-icon">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                    <a href="'.$row['facebook'].'" title="" class="fa-icon">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="'.$row['linkedin'].'" title="" class="fa-icon">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </div>  
                            ';
                        }
                        echo $t;
                    ?>



                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<script>
  document.addEventListener("DOMContentLoaded", function (event) {
     navActivePage();
  });
</script>

<script type="text/javascript" src="./main.70a66962.js"></script></body>

</html>