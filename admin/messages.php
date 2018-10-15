<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Сообщения</title>

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
      include "db/db.php";
    ?>
    
    <div class="container text-center">
      <hr>
      <?php
        $result = $mysqli->query("SELECT * FROM `messages`");
        $num_rows = $result->num_rows;
        for($i = 0; $i < $num_rows; $i++){
          $row = mysqli_fetch_array($result);
          echo '<div class="row">
            <div class="col-md-1 border">
              '.$row['userid'].'
            </div>
            <div class="col-md-2 border">
              '.$row['date'].'
            </div>
            <div class="col-md-3 border">
              '.$row['title'].'
            </div>
            <div class="col-md-6 border">
              '.$row['content'].'
            </div>
          </div>';
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
