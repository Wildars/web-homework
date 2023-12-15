<?php
session_start();
if(isset($_GET["logout"])){
    session_destroy();
}
if(isset($_SESSION["username"])){
    header("location: dashboard/index.php");
    exit();
}

$error = '';
if(isset($_POST['submit'])){
    $username = ''; $password = '';
    require_once ("db.php");
    $sql = "SELECT * FROM portfolio";
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if ($row['username'] == $_POST['username'])
            {
                $username = $row['username'];
                $password = $row['password'];
                break;
            }
        }
    }
    if($username == $_POST['username'] AND $row['password'] == md5($_POST['password'])){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header("Location: dashboard/index.php");
        exit;
    }
    else $error = 'Логин или пароль неверны!';

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/aaa.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

</head>
<style>
    body {
        background-image: url(assets/images/123.png);
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
    }
</style>
<body>
<div class="login-area">
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-xl-3 offset-xl-9" style="margin-left: 70%">
                <div class="ptb--100">
            <form action="login.php" method="post">

                <div class="login-form-head">
                    <h4 >Sign In</h4>
                </div>

                <div class="login-form-body">
                    <div class="form-gp">
                        <label for="exampleInputName1">Login</label>
                        <input type="text" id="exampleInputName1" name="username">
                        <i class="bi bi-person"></i>
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-gp">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" id="exampleInputPassword1" name="password">
                        <i class="bi bi-lock-fill"></i>
                        <div class="text-danger"></div>
                    </div>
                    <div class="submit-btn-area">
                        <button id="form_submit" type="submit" name="submit">Submit <i class="bi bi-arrow-right"></i></button>
                    </div>
                    <div class="form-footer text-center mt-5">
                        <p class="text-muted">Don't have an account? <a href="registration.php">Sign up</a></p>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- jquery latest version -->
<script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
<!-- bootstrap 4 js -->
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/metisMenu.min.js"></script>
<script src="assets/js/jquery.slimscroll.min.js"></script>
<script src="assets/js/jquery.slicknav.min.js"></script>

<!-- others plugins -->
<script src="assets/js/plugins.js"></script>
<script src="assets/js/scripts.js"></script>
</body>

</html>
<!--<!DOCTYPE html>-->
<!--<html xmlns="http://www.w3.org/1999/xhtml" xmlns:th="https://www.thymeleaf.org"-->
<!--      xmlns:sec="https://www.thymeleaf.org/thymeleaf-extras-springsecurity3">-->
<!--<head>-->
<!--    <title>Spring Security Example </title>-->
<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->
<!---->
<!--</head>-->
<!---->
<!--<style>-->
<!--    .gradient-custom {-->
<!--        /* fallback for old browsers */-->
<!--        background: #6a11cb;-->
<!---->
<!--        /* Chrome 10-25, Safari 5.1-6 */-->
<!--        background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));-->
<!---->
<!--        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */-->
<!--        background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))-->
<!--    }-->
<!---->
<!--</style>-->
<!---->
<!--<body>-->
<!---->
<!--<section class="vh-100 gradient-custom text-center">-->
<!--    <div class="container py-5 ">-->
<!--        <div class="row d-flex justify-content-center align-items-center h-100">-->
<!--            <div class="w-50">-->
<!--                <br>-->
<!--                <div class="card bg-dark text-white" style="border-radius: 1rem;">-->
<!--                    <div class="card-body p-5 text-center">-->
<!--                        <div class="mb-md-5 mt-md-4 pb-5">-->
<!---->
<!--                            <h2 class="fw-bold mb-2 text-uppercase">Login</h2>-->
<!--                            <p class="text-white-50 mb-5">Please enter your login and password!</p>-->
<!---->
<!--                            <form th:action="@{/login}" method="post">-->
<!--                                <div class="form-outline form-white mb-4">-->
<!--                                    <input type="text" name="username" class="form-control form-control-lg" placeholder="Login" />-->
<!--                                </div>-->
<!---->
<!--                                <br>-->
<!---->
<!--                                <div class="form-outline form-white mb-4">-->
<!--                                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" />-->
<!--                                </div>-->
<!---->
<!--                                <br>-->
<!---->
<!--                                <button class="btn btn-outline-light btn-lg px-5" name="submit" type="submit">Sigh in</button>-->
<!--                            </form>-->
<!---->
<!--                            <a href="registration.php">Регистрация</a>-->
<!---->
<!--                            <a href="index.php">Назад</a>-->
<!---->
<!--                            <h4 class="text-warning">-->
<!--                                --><?php
//                                echo $error;
//                                ?><!--</h4>-->
<!---->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!---->
<!--</body>-->
<!--</html>-->