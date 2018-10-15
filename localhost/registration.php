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

    <title>Регистрация нового пользователя</title>

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
    
    <div class="container">
      <hr>
      <form action="/db/registr.php" method="POST">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="login">Логин *</label>
            <input type="text" class="form-control" id="login" name="login" placeholder="Логин">
          </div>
          <div class="form-group col-md-6">
            <label for="number">Номер телефона *</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">+77</span>
              </div>
              <input type="number" class="form-control" id="number" name="number" placeholder="Номер">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="yurlitso">Юридическое Лицо *</label>
          <input type="text" class="form-control" id="yurlitso" name="yurlitso" placeholder="Юридическое Лицо">
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="name">Имя *</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Имя">
          </div>
          <div class="form-group col-md-4">
            <label for="surname">Фамилия *</label>
            <input type="text" class="form-control" id="surname" name="surname" placeholder="Фамилия">
          </div>
          <div class="form-group col-md-4">
            <label for="middlename">Отчество</label>
            <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Отчество">
          </div>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="password">Введите пароль *</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Пароль">
          </div>
          <div class="form-group col-md-6">
            <label for="password2">Подтвердите пароль *</label>
            <input type="password" class="form-control" id="password2" name="password2" placeholder="Подтверждение пароля">
          </div>
        </div>

        <br>
        
        <button type="submit" class="btn btn-primary btn-block">Зарегистрировать</button>
      </form>
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
