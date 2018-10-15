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

    <title>SPK Astana</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/one-page-wonder.min.css" rel="stylesheet">

  </head>

  <body>
    <?php
      include "add/navbar.php";
    ?>

    <header class="masthead text-center text-white">
      <div class="masthead-content">
        <div class="container">
          <h1 class="masthead-heading mb-0">Инвестируйте в СПК</h1>
          <h2 class="masthead-subheading mb-0">За СПК наше будущее!</h2>
          <a href="project.php" class="btn btn-primary btn-xl rounded-pill mt-5">Подать заявку</a>
          <a href="track.php" class="btn btn-primary btn-xl rounded-pill mt-5 ml-3">Посмотреть по трек коду</a>
        </div>
      </div>
    </header>

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
