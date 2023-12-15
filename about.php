<?php
    require_once ("db.php");

	$strSQL = "SELECT * FROM about2";

    $result = $mysqli->query($strSQL);
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

<link href="./main.3f6952e4.css" rel="stylesheet"></head>

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
            <h1 class="h2">03 : Обо мне</h1>
          </div>
          
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <div class="row">
                <div>
                    <?php
                    while($row = mysqli_fetch_array($result)) {
                        $t = '
                            <div class="col-md-6">
                            <h3>'.$row["Title"].'</h3>
                            <p>'.$row["Text"].'</p>
                            </div>
                            <div class="col-md-6">
                            <img src="./assets/images/' . $row["img"] . '" style="height: 500px" class="img-responsive" alt="">
                            </div>
                        ';
                        echo $t;
                    }
                    ?>
                </div>
              </div>
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