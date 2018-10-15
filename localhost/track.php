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

    <title>Поиск по трек коду</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="css/main.css" rel="stylesheet">

    <link href="/vendor/track.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/one-page-wonder.min.css" rel="stylesheet">

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </head>

  <body>

    <!-- Navigation -->
    
    <?php
      include "add/navbar.php";
    ?>
    
    <div class="container mb-5">
      <hr>
      <h2 class="text-center mt-5">Введите трек код</h2>
      <form class="mb-5 mt-2 col-md-3 mr-auto ml-auto" method="POST" action="db/search_track.php">
        <input class="form-control mb-3" type="text" name="track">
        <button class="btn btn-success btn-block" type="submit">Поиск</button>
      </form>
      <?php
        $id = $_GET['id'];
        if($id != 0){
          include ("db/db.php");
          $login = $_SESSION['login'];

          $result_userid = $mysqli->query("SELECT `id` FROM `users` WHERE `login`= '$login'");
          $row_userid = mysqli_fetch_array($result_userid);
          $userid = $row_userid['id'];

          if(isset($login)){
            $result_lt = $mysqli->query("SELECT `id` FROM `projects` WHERE `userid` = '$userid' AND `id` = '$id'");
            $row_lt = mysqli_fetch_array($result_lt);
            if(isset($row_lt['id'])){
              $result = $mysqli->query("SELECT * FROM `projects` WHERE `id` = '$id'");
            } else {
              $result = $mysqli->query("SELECT `status` FROM `projects` WHERE `id` = '$id'");
            }
          } else {
            $result = $mysqli->query("SELECT `status` FROM `projects` WHERE `id` = '$id'");
          }
          
          echo '<table class="table table-bordered">
            <tbody>';
            $row = mysqli_fetch_array($result);
            $num_fields = mysqli_num_fields($result);
            $fields = mysqli_fetch_fields($result);
            for($i = 0; $i < $num_fields; $i++){
              
              echo '<tr>';
              echo '<th>'.$fields[$i]->name.'</th>';
              echo '<td>'.$row[$i].'</td>';
              echo '</tr>';
            }

            echo'
            </tbody>
          </table>';
        }
      ?>
    </div>

  <div class="container">
    <?php
    $status = $row['status'];

    if(isset($status)){

    $result_status = $mysqli->query("SELECT * FROM `options` WHERE `field` = 'status'");
    $num_rows = $result_status->num_rows;
    $str = array();

    for($i = 0; $i < $num_rows; $i++){
      $row_status = mysqli_fetch_array($result_status);
      $str[] = $row_status['option'];
    }
    
    for($i = 0; $i < count($str); $i++){
      if($str[$i] == $status){
        $index = $i;
      }
    }

    echo '
    <div class="row align-items-center how-it-works d-flex">
      <div class="col-2 text-center bottom d-inline-flex justify-content-center align-items-center">
        ';
        if(0 == $index){
          echo '<div class="circle font-weight-bold bg-warning">1</div>';
        } else if(0 < $index){
          echo '<div class="circle font-weight-bold bg-success">1</div>';  
        } else {
          echo '<div class="circle font-weight-bold bg-danger">1</div>';
        }
        echo '
      </div>
      <div class="col-6">
        <h5>В обработке</h5>
        <p>Ваша заявка принята и обрабатывается.</p>
      </div>
    </div>
    
    <div class="row timeline">
      <div class="col-2">
        <div class="corner top-right"></div>
      </div>
      <div class="col-8">
        <hr/>
      </div>
      <div class="col-2">
        <div class="corner left-bottom"></div>
      </div>
    </div>
    

    <div class="row align-items-center justify-content-end how-it-works d-flex">
      <div class="col-6 text-right">
        <h5>Одобрение / Отказ</h5>
        <p>Правление 1-й этап (Выписка Правления об одобрении/отказе участия в Проекте)</p>
      </div>
      <div class="col-2 text-center full d-inline-flex justify-content-center align-items-center">
        ';
        if(1 == $index){
          echo '<div class="circle font-weight-bold bg-warning">2</div>';
        } else if(1 < $index){
          echo '<div class="circle font-weight-bold bg-success">2</div>';  
        } else {
          echo '<div class="circle font-weight-bold bg-danger">2</div>';
        }
        echo '
      </div>
    </div>

    <div class="row timeline">
      <div class="col-2">
        <div class="corner right-bottom"></div>
      </div>
      <div class="col-8">
        <hr/>
      </div>
      <div class="col-2">
        <div class="corner top-left"></div>
      </div>
    </div>
    
    <div class="row align-items-center how-it-works d-flex">
      <div class="col-2 text-center fullleft d-inline-flex justify-content-center align-items-center">
        ';
        if(2 == $index){
          echo '<div class="circle font-weight-bold bg-warning">3</div>';
        } else if(2 < $index){
          echo '<div class="circle font-weight-bold bg-success">3</div>';  
        } else {
          echo '<div class="circle font-weight-bold bg-danger">3</div>';
        }
        echo '
      </div>
      <div class="col-6">
        <h5>Поиск земельных участков</h5>
        <p>Письмо в ГУ «Управление архитектуры, градостроительства и земельных отношений города Астаны» о наличии свободных и подходящих для реализации проекта земельных участках</p>
      </div>
    </div>

    <div class="row timeline">
      <div class="col-2">
        <div class="corner top-right"></div>
      </div>
      <div class="col-8">
        <hr/>
      </div>
      <div class="col-2">
        <div class="corner left-bottom"></div>
      </div>
    </div>
    
    <div class="row align-items-center justify-content-end how-it-works d-flex">
      <div class="col-6 text-right">
        <h5>Заявка в ЦОН</h5>
        <p>Заявка в Цон на получение земельного участка</p>
      </div>
      <div class="col-2 text-center full d-inline-flex justify-content-center align-items-center">
        ';
        if(3 == $index){
          echo '<div class="circle font-weight-bold bg-warning">4</div>';
        } else if(3 < $index){
          echo '<div class="circle font-weight-bold bg-success">4</div>';  
        } else {
          echo '<div class="circle font-weight-bold bg-danger">4</div>';
        }
        echo '
      </div>
    </div>

    <div class="row timeline">
      <div class="col-2">
        <div class="corner right-bottom"></div>
      </div>
      <div class="col-8">
        <hr/>
      </div>
      <div class="col-2">
        <div class="corner top-left"></div>
      </div>
    </div>
    
    <div class="row align-items-center how-it-works d-flex">
      <div class="col-2 text-center fullleft d-inline-flex justify-content-center align-items-center">
        ';
        if(4 == $index){
          echo '<div class="circle font-weight-bold bg-warning">5</div>';
        } else if(4 < $index){
          echo '<div class="circle font-weight-bold bg-success">5</div>';  
        } else {
          echo '<div class="circle font-weight-bold bg-danger">5</div>';
        }
        echo '
      </div>
      <div class="col-6">
        <h5>Краткосрочная аренда</h5>
        <p>Получение постановления и договора краткосрочной аренды на земельный участок</p>
      </div>
    </div>

    <div class="row timeline">
      <div class="col-2">
        <div class="corner top-right"></div>
      </div>
      <div class="col-8">
        <hr/>
      </div>
      <div class="col-2">
        <div class="corner left-bottom"></div>
      </div>
    </div>
    

    <div class="row align-items-center justify-content-end how-it-works d-flex">
      <div class="col-6 text-right">
        <h5>Получение документов</h5>
        <p>Получение документов от Инвестора на 2-й этап рассмотрения проектов</p>
      </div>
      <div class="col-2 text-center full d-inline-flex justify-content-center align-items-center">
        ';
        if(5 == $index){
          echo '<div class="circle font-weight-bold bg-warning">6</div>';
        } else if(5 < $index){
          echo '<div class="circle font-weight-bold bg-success">6</div>';  
        } else {
          echo '<div class="circle font-weight-bold bg-danger">6</div>';
        }
        echo '
      </div>
    </div>

    <div class="row timeline">
      <div class="col-2">
        <div class="corner right-bottom"></div>
      </div>
      <div class="col-8">
        <hr/>
      </div>
      <div class="col-2">
        <div class="corner top-left"></div>
      </div>
    </div>
    
    <div class="row align-items-center how-it-works d-flex">
      <div class="col-2 text-center fullleft d-inline-flex justify-content-center align-items-center">
        ';
        if(6 == $index){
          echo '<div class="circle font-weight-bold bg-warning">7</div>';
        } else if(6 < $index){
          echo '<div class="circle font-weight-bold bg-success">7</div>';  
        } else {
          echo '<div class="circle font-weight-bold bg-danger">7</div>';
        }
        echo '
      </div>
      <div class="col-6">
        <h5>Выписка от правления</h5>
        <p>Правление 2-й этап (Выписка Правления об участии в Проекте путем создания Совместного Предприятия/ заключения Договора о совместной деятельности)</p>
      </div>
    </div>

    <div class="row timeline">
      <div class="col-2">
        <div class="corner top-right"></div>
      </div>
      <div class="col-8">
        <hr/>
      </div>
      <div class="col-2">
        <div class="corner left-bottom"></div>
      </div>
    </div>

    <div class="row align-items-center justify-content-end how-it-works d-flex">
      <div class="col-6 text-right">
        <h5>Долгосрочная аренда</h5>
        <p>Получение постановления и договора долгосрочной аренды (5 и более лет) на земельный участок</p>
      </div>
      <div class="col-2 text-center full d-inline-flex justify-content-center align-items-center">
        ';
        if(7 == $index){
          echo '<div class="circle font-weight-bold bg-warning">8</div>';
        } else if(7 < $index){
          echo '<div class="circle font-weight-bold bg-success">8</div>';  
        } else {
          echo '<div class="circle font-weight-bold bg-danger">8</div>';
        }
        echo '
      </div>
    </div>

    <div class="row timeline">
      <div class="col-2">
        <div class="corner right-bottom"></div>
      </div>
      <div class="col-8">
        <hr/>
      </div>
      <div class="col-2">
        <div class="corner top-left"></div>
      </div>
    </div>
    
    <div class="row align-items-center how-it-works d-flex">
      <div class="col-2 text-center top d-inline-flex justify-content-center align-items-center">
        ';
        if(8 == $index){
          echo '<div class="circle font-weight-bold bg-warning">9</div>';
        } else if(8 < $index){
          echo '<div class="circle font-weight-bold bg-success">9</div>';  
        } else {
          echo '<div class="circle font-weight-bold bg-danger">9</div>';
        }
        echo '
      </div>
      <div class="col-6">
        <h5>Заключение Договора</h5>
        <p>Создания Совместного Предприятия / заключения Договора о совместной деятельности</p>
      </div>
    </div>

  </div>';
}
?>


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
    

  </body>

</html>
