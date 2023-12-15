<?php
session_start();
if(!isset($_SESSION["username"])){
    header("location: ../login.php");
    exit();
}
require_once "config.php";

$strSQL = "SELECT * FROM contact";

$strSQL2 = "SELECT * FROM about2";

$result = $link->query($strSQL);

$result2 = $link->query($strSQL2);

$sql = "UPDATE contact SET name=?, surname=?, address=?, mail=?, insta=?, facebook=?, linkedin=?, number=? WHERE id=1";

$sql2 = "UPDATE contact SET photoprofile=? WHERE id=1";

$sql3 = "UPDATE contact SET photoindex=? WHERE id=1";

$sql4 = "UPDATE contact SET status=? WHERE id=1";

$sql5 = "UPDATE contact SET status2=? WHERE id=1";

$sql7 = "UPDATE about2 SET Title=? WHERE id=1";

$sql8 = "UPDATE about2 SET Text=? WHERE id=1";

$sql10 = "UPDATE about2 SET img=? WHERE id=1";

if (isset($_POST["name"])) {
    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "ssssssss", $param_name, $param_surname, $param_address, $param_mail, $param_insta, $param_facebook, $param_linkedin, $param_number );

        $param_name = $_POST["name"];
        $param_surname = $_POST["surname"];
        $param_address = $_POST["address"];
        $param_mail = $_POST["mail"];
        $param_insta = $_POST["insta"];
        $param_facebook = $_POST["facebook"];
        $param_linkedin = $_POST["linkedin"];
        $param_number = $_POST["number"];

        if (mysqli_stmt_execute($stmt)) {
            header("location: user.php");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    mysqli_stmt_close($stmt);
}

if (isset($_POST["file"])){
    if ($stmt = mysqli_prepare($link, $sql2)) {
        mysqli_stmt_bind_param($stmt, "s", $param_photo);

        $param_photo = $_POST["file"];
        if (mysqli_stmt_execute($stmt)) {
            header("location: user.php");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
}

if (isset($_POST["file3"])){
    if ($stmt = mysqli_prepare($link, $sql10)) {
        mysqli_stmt_bind_param($stmt, "s", $param_photo);

        $param_photo = $_POST["file3"];
        if (mysqli_stmt_execute($stmt)) {
            header("location: user.php");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
}
if (isset($_POST["abouttitle"])){
    if ($stmt = mysqli_prepare($link, $sql7)) {
        mysqli_stmt_bind_param($stmt, "s", $param_title);

        $param_title = $_POST["abouttitle"];
        if (mysqli_stmt_execute($stmt)) {
            header("location: user.php");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
}

if (isset($_POST["abouttext"])){
    if ($stmt = mysqli_prepare($link, $sql8)) {
        mysqli_stmt_bind_param($stmt, "s", $param_text);

        $param_text = $_POST["abouttext"];
        if (mysqli_stmt_execute($stmt)) {
            header("location: user.php");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
}

if (isset($_POST["status"])){
    if ($stmt = mysqli_prepare($link, $sql4)) {
        mysqli_stmt_bind_param($stmt, "s", $param_status);

        $param_status = $_POST["status"];
        if (mysqli_stmt_execute($stmt)) {
            header("location: user.php");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
}

if (isset($_POST["status2"])){
    if ($stmt = mysqli_prepare($link, $sql5)) {
        mysqli_stmt_bind_param($stmt, "s", $param_status);

        $param_status = $_POST["status2"];
        if (mysqli_stmt_execute($stmt)) {
            header("location: user.php");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
}

if (isset($_POST["status"])){
    if ($stmt = mysqli_prepare($link, $sql2)) {
        mysqli_stmt_bind_param($stmt, "s", $param_photo);

        $param_photo = $_POST["file"];
        if (mysqli_stmt_execute($stmt)) {
            header("location: user.php");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
}


if (isset($_POST["file2"])){
    if ($stmt = mysqli_prepare($link, $sql3)) {
        mysqli_stmt_bind_param($stmt, "s", $param_photo2);

        $param_photo2 = $_POST["file2"];

        if (mysqli_stmt_execute($stmt)) {
            header("location: user.php");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Now UI Dashboard by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

</head>

<body class="user-profile">
  <div class="wrapper ">
      <div class="sidebar" data-color="orange">
          <div class="logo">
              <a href="../index.php" class="simple-text logo-normal text-center">
                  Home
              </a>
          </div>
          <div class="sidebar-wrapper" id="sidebar-wrapper">
              <ul class="nav">
                  <li class="text-center">
                      <a href="index.php">
                          <p>Dashboard</p>
                      </a>
                  </li>
                  <li class="text-center">
                      <a href="create.php">
                          <p>Create</p>
                      </a>
                  </li>
                  <li class="active text-center">
                      <a href="user.php">
                          <p>User Profile</p>
                      </a>
                  </li>
              </ul>
          </div>
      </div>

      <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="">User Profile</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link" href="../login.php?logout=1">
                      <i class="bi bi-box-arrow-in-right"></i>
                      <p>
                          <span class="d-lg-none d-md-block">Logout</span>
                      </p>
                  </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Edit Profile</h5>
              </div>

              <div class="card-body">
                <?php

                while ($row = mysqli_fetch_array($result2)) {
                    $t10 = '
                               <form action="user.php" method="post">
                                <div class="row">
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <label class="text-dark">Title</label>
                                        <input type="text" name="abouttitle" class="form-control" placeholder="' . $row['Title'] . '" value="' . $row['Title'] . '">
                                      </div>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Submit">
                                </form>
        ';
                    $t11 = '
                               <form action="user.php" method="post">
                                <div class="row">
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <label class="text-dark">Текст</label>
                                        <input type="text" name="abouttext" class="form-control" placeholder="' . $row['Text'] . '" value="' . $row['Text'] . '">
                                      </div>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Submit">
                                </form>
        ';
                    $t12 = '

            <form action="user.php" method="post">
                           <div class="row">
                            <div class="col-md-12">
                              <div>
                                <label class="text-dark">Photo about</label>
                                <br>
                                <input type="file" name="file3">
                              </div>
                            </div>
                           </div>
                           <br>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        </form>
                    ';

                }


                while($row = mysqli_fetch_array($result)) {
                    $t1 = '
                        <form action="user.php" method="post">
                          <div class="row">
                            <div class="col-md-4 pr-1">
                              <div class="form-group">
                                <label class="text-dark">Email address</label>
                                <input type="email" name="mail" class="form-control" placeholder="' . $row['mail'] . '" value="' . $row['mail'] . '">
                              </div>
                            </div>
                            <div class="col-md-4 pr-1">
                              <div class="form-group">
                                <label class="text-dark">First Name</label>
                                <input type="text" name="name" class="form-control" placeholder="' . $row['name'] . '" value="' . $row['name'] . '">
                              </div>
                            </div>
                            <div class="col-md-4 pl-1">
                              <div class="form-group">
                                <label class="text-dark">Last Name</label>
                                <input type="text" name="surname" class="form-control" placeholder="' . $row['surname'] . '" value="' . $row['surname'] . '">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="text-dark">Address</label>
                                <input type="text" name="address" class="form-control" placeholder="' . $row['address'] . '" value="' . $row['address'] . '">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="text-dark">Phone</label>
                                <input type="text" name="number" class="form-control" placeholder="' . $row['number'] . '" value="' . $row['number'] . '">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="text-dark">Instagram</label>
                                <input type="text" name="insta" class="form-control" placeholder="' . $row['insta'] . '" value="' . $row['insta'] . '">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="text-dark">Facebook</label>
                                <input type="text" name="facebook" class="form-control" placeholder="' . $row['facebook'] . '" value="' . $row['facebook'] . '">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="text-dark">Linkedin</label>
                                <input type="text" name="linkedin" class="form-control" placeholder="' . $row['linkedin'] . '" value="' . $row['linkedin'] . '">
                              </div>
                            </div>
                          </div>    
                        <input type="submit" class="btn btn-primary" value="Submit">
                        </form>
                        ';


                    $t2 = '
                      <div class="col-md-4">
                        <div class="card card-user">
                          <div class="image">
                            <img src="assets/img/bg5.jpg" alt="...">
                          </div>
                          <div>
                            <div class="author">
                              <a class="text-decoration-none" href="" >
                                <img class="avatar border-gray" src="assets/img/'.$row['photoprofile'].'" alt="..." >
                                <h5 class="title">' . $row['name'] . " " . $row['surname'].'</h5>
                              </a>
                            </div>
                          </div>
                          <hr>
                          <div class="button-container">
                            <a href="' . $row['facebook'] . '" class="btn btn-neutral btn-icon btn-round btn-lg p-3">
                              <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="' . $row['insta'] . '" class="btn btn-neutral btn-icon btn-round btn-lg p-3">
                              <i class="fab fa-twitter"></i>
                            </a>
                            <a href="' . $row['linkedin'] . '" class="btn btn-neutral btn-icon btn-round btn-lg p-3">
                              <i class="fab fa-google-plus-g"></i>
                            </a>
                          </div>
                        </div>
                      </div>
                        ';

                    $t3 = '
                        <form action="user.php" method="post">
                          <div class="row">
                            <div class="col-md-12">
                              <div>
                                <label class="text-dark">Photo profile</label>
                                <br>
                                <input type="file" name="file" >
                              </div>
                            </div>
                           </div>
                           <br>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        </form>
                    ';

                    $t4 = '
                        <form action="user.php" method="post">
                           <div class="row">
                            <div class="col-md-12">
                              <div>
                                <label class="text-dark">Photo index</label>
                                <br>
                                <input type="file" name="file2">
                              </div>
                            </div>
                           </div>
                           <br>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        </form>
                    ';

                    $t5 = '
                        <form action="user.php" method="post">
                        <div class="row">
                           <div class="col-md-4">
                              <div class="form-group">
                                <label class="text-dark">Имя</label>
                                <input type="text" name="status" class="form-control" placeholder="' . $row['status'] . '" value="' . $row['status'] . '">
                              </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        </form>
                    ';

                    $t6 = '
                        <form action="user.php" method="post">
                        <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="text-dark">Текст</label>
                                <input type="text" name="status2" class="form-control" placeholder="' . $row['status2'] . '" value="' . $row['status2'] . '">
                              </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        </form>
                    ';
                }
                echo $t1;

                echo "<br>";

                echo $t3;


                echo "<br>";

                echo $t4;

                echo $t5;

                echo $t6;

                echo $t10;

                echo $t11;

                echo $t12;


                ?>
              </div>
            </div>
          </div>


                <?php
                echo $t2;

                ?>
        </div>

      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
</body>

</html>