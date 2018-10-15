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

    <title>Меню админа</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/one-page-wonder.min.css" rel="stylesheet">

  </head>

  <body>

    <div class="container-fluid">
      <?php 
        $category = $_GET['category'];
        echo '
        <div class="d-flex justify-content-center">
        <form method="post" class="form-inline mb-3 mt-3" action="db/set_category.php">
          <select class="form-control" name="category">
            <option selected value="Выберите категорию...">Выберите категорию...</option>
            <option value="Торговля">Торговля</option>
            <option value="Спорт">Спорт</option>
            <option value="Транспорт">Транспорт</option>
            <option value="Развитие">Развитие</option>
            <option value="Здравохранение">Здравохранение</option>
            <option value="F\'n\'B">F\'n\'B</option>
          </select>
          <button type="submit" class="ml-2 btn btn-success">Выбрать категорию</button>
          <a class="btn btn-warning ml-3" href="messages.php">Сообщения</a>
        </form>
        </div>';
      ?>
      <table class="table">
        <thead>
          <tr>
            <th>Трек.код</th>
            <th>Логин</th>
            <th>Юрлицо</th>
            <th>ФИО</th>
            <th>Моб. Номер</th>
            <th>Email</th>
            <th>Пароль</th>
            <th>Название</th>
            <th>Категория</th>
            <th>Цена</th>
            <th>Описание</th>
            <th>Опыт</th>
            <th>Заявка</th>
            <th>Резюме</th>
            <th>Схема</th>
            <th>Дата</th>
            <th>Статус</th>
            <th>Изменить</th>
          </tr>
        <tbody>
          <?php 
            include "db/db.php";

            if(isset($category)){
              $result = $mysqli->query("SELECT projects.*, `users`.`id` as users_id, `users`.`login`, `users`.`yurlitso`, `users`.`fullname`, `users`.`mobile_number`, `users`.`email`, `users`.`password` FROM `projects` JOIN `users` ON `projects`.`userid` = `users`.`id` WHERE `projects`.`category` = '$category'");
            } else {
              $result = $mysqli->query("SELECT projects.*, `users`.`id` as users_id, `users`.`login`, `users`.`yurlitso`, `users`.`fullname`, `users`.`mobile_number`, `users`.`email`, `users`.`password` FROM `projects` JOIN `users` ON `projects`.`userid` = `users`.`id`");
            }

            $result_status = $mysqli->query("SELECT * FROM `options` WHERE `field` = 'status'");
            $num_rows_status = $result_status->num_rows;
            $row_status = array();

            for($i = 0; $i < $num_rows_status; $i++){
              $row_temp = mysqli_fetch_array($result_status);
              $row_status[] = $row_temp['option'];
            }
            
            $num_rows = $result->num_rows;
            for($i = 0; $i < $num_rows; $i++){
              $row = mysqli_fetch_array($result);
              $id = $row['id'];
              echo '<tr>
                <th>'.$row['tracknumber'].'</th>
                <th>'.$row['login'].'</th>
                <th>'.$row['yurlitso'].'</th>
                <th>'.$row['fullname'].'</th>
                <th>'.$row['mobile_number'].'</th>
                <th>'.$row['email'].'</th>
                <th>'.$row['password'].'</th>
                <th>'.$row['name'].'</th>
                <th>'.$row['category'].'</th>
                <th>'.$row['price'].'</th>
                <th>'.$row['description'].'</th>
                <th>'.$row['experience'].'</th>
                <th>'.$row['request'].'</th>
                <th>'.$row['cv'].'</th>
                <th>'.$row['scheme'].'</th>
                <th>'.$row['date'].'</th>
                <th>'.$row['status'].'</th>
                <th>';
                
                echo '
                  <select class="form-control statuschange" style="width:200px">
                  <option selected value="Выберите статус...">Выберите статус...</option>';
                  for($j = 0; $j < $num_rows_status; $j++){
                    echo '<option data-href="changestatus.php?id='.$id.'&status='.$row_status[$j].'">'.$row_status[$j].'</option>';
                  }
                    echo '
                  </select>
                </th>
              </tr>';
            }

          ?>
        </tbody>
      </table>
    </div>
    
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/statuschange.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
