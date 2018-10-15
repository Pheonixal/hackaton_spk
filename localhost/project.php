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

    <title>Подача новой заявки</title>

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
      <?php 
      if(isset($_SESSION['login'])){
        $id = $_SESSION['id'];
        echo '<hr>
      <form action="db/add_project.php?id='.$id.'" method="POST">
        <div class="form-group">
          <label for="name">Название проекта *</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Название">
        </div>

        <div class="form-group">
          <label for="price">Стоимость проекта *</label>
          <input type="number" class="form-control" step="0.01" id="price" name="price" placeholder="Цена">
        </div>

        <div class="form-group">
          <label for="name">Категория проекта *</label>
          <select class="form-control" name="category">
            <option selected value="Выберите категорию...">Выберите категорию...</option>
            <option value="Торговля">Торговля</option>
            <option value="Спорт">Спорт</option>
            <option value="Транспорт">Транспорт</option>
            <option value="Развитие">Развитие</option>
            <option value="Здравохранение">Здравохранение</option>
            <option value="F\'n\'B">F\'n\'B</option>
          </select>
        </div>
        
        <div class="form-group">
          <label for="description">Описание проекта *</label>
          <textarea rows="3" class="form-control" id="description" name="description" placeholder="Описание"></textarea>
        </div>

        <div class="form-group">
          <label for="experience">Опыт реализации подобных проектов</label>
          <input type="text" class="form-control" id="experience" name="experience" placeholder="">
        </div>

        
        <div class="form-group">
          <label for="request">Заявка (Памятка Партнера) *</label>
          <input disabled type="file" class="form-control-file" id="request" name="request" placeholder="Заявка">
        </div>
        <div class="form-group">
          <label for="cv">Резюме команды партнера *</label>
          <input disabled type="file" class="form-control-file" id="cv" name="cv" placeholder="Резюме">
        </div>
        <div class="form-group">
          <label for="scheme">Предварительная схема расположения земельного участка с официального сайта ГУ "Управление архитектуры и градостроительства города Астаны http://genplan.saulet.astana.kz/</label>
          <input disabled type="file" class="form-control-file" id="scheme" name="scheme" placeholder="Схема">
        </div>

        <br>
        
        <button type="submit" class="btn btn-primary btn-block">Зарегистрировать</button>
      </form>
      <hr>';
      } else {
        echo '<br><h3 class="text-center">Пожалуйста, войдите в свой аккаунт!</h3>';
      }
      
      ?>

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
