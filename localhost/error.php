<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ошибка!</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="css/main.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/one-page-wonder.min.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    
    <?php
      include "add/navbar.php";
    ?>
    
    <div class="container text-center">
      <hr>
      <?php
        $error = $_GET['error'];
        if($error == "project"){
          echo '<h3 class="text-center text-danger">Ошибка добавления задачи!</h3>';
        }
        if($error == "user"){
          echo '<h3 class="text-center text-danger">Ошибка регистрации!</h3>';
        }
        if($error == "signin"){
          echo '<h3 class="text-center text-danger">Неправильный логин или пароль!</h3>';
        }
        if($error == "track"){
          echo '<h3 class="text-center text-danger mb-3">Трек код не существует!</h3>';
          echo '<a class="btn btn-success" href="track.php">Ввести трек код заново</a>';
        }
      ?>
      <hr>
    </div>


    <!-- Footer -->
    <div class="container">
    <footer class="py-5">
      <div class="container">
        <p class="m-0 text-center small">Copyright &copy; SPK ASTANA 2018</p>
      </div>
      <!-- /.container -->
    </footer>
    </div>

    <?php 
      include "add/modal.php";
    ?>

    <!-- <div class="text-center">
      <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalLoginForm">Launch Modal Login Form</a>
    </div> -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
