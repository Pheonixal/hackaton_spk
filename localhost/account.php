<?php
  session_start();

  include ("db/db.php");
  $login = $_SESSION['login'];

  $result = $mysqli->query("SELECT `mobile_number`, `yurlitso`, `fullname`, `email`, `password`, `id` FROM `users` WHERE `login` = '$login'");

  $row = $result->fetch_array();

  $mobile_number = $row['mobile_number'];
  $yurlitso = $row['yurlitso'];
  $fullname = $row['fullname'];
  $email = $row['email'];
  $password =$row['password'];
  $id = $row['id'];

  $names = explode(" ", $fullname);
?>

<head>
  <?php echo '<title>'.$login.'</title>'; ?>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/vendor/bootstrap-3.3.7/css/bootstrap.min.css">
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap-3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container bootstrap snippet" style="margin-top: 30px">
    <div class="row">
      <?php 
      echo '<div class="col-sm-12" style="margin-bottom: 30px"><h1 style="margin-left: 35px; display: inline">'.$login.' </h1><a class="btn btn-primary btn-lg pull-right" href="index.php">Назад</a></div>';
      ?>
      <!-- <div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100"></a></div> -->
      
    </div>
    <div class="row">
      <div class="col-sm-4"><!--left col-->
              

      <div class="text-center">
        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">

      </div></hr>
      <a class="btn btn-warning btn-lg btn-block" style="margin-top: 20px; margin-bottom: 10px" data-toggle="modal" href="#message">Сообщение админу</a>
      <br>
          
          <ul class="list-group">
            <?php

            echo '<li class="list-group-item text-right"><span class="pull-left"><strong>Имя</strong></span>'.$names[0].'</li>';
            echo '<li class="list-group-item text-right"><span class="pull-left"><strong>Фамилия</strong></span>'.$names[1].'</li>';
            echo '<li class="list-group-item text-right"><span class="pull-left"><strong>Отчество</strong></span>'.$names[2].'</li>';
            echo '<li class="list-group-item text-right"><span class="pull-left"><strong>Моб. номер</strong></span>'.$mobile_number.'</li>';
            echo '<li class="list-group-item text-right"><span class="pull-left"><strong>Юрлицо</strong></span>'.$yurlitso.'</li>';
            echo '<li class="list-group-item text-right"><span class="pull-left"><strong>Email</strong></span>'.$email.'</li>';
           
           ?>
            
          </ul>

          <ul class="list-group">
           <?php
            $result_ntf = $mysqli->query("SELECT * FROM `notifications` WHERE `userid` = '$id'");
            $num_rows = $result_ntf->num_rows;
            $all = false;

            if($num_rows > 3) {
              $num_rows = 3;
              $all = false;
            }

            for($i = 0; $i < $num_rows; $i++){
              $row_ntf = mysqli_fetch_array($result_ntf);
              if($row_ntf['status'] == 0){
                echo '<li class="list-group-item card">
                  <p class="card-header" style="font-weight: bold">'.$row_ntf['title'].'<span class="pull-right">'.$row_ntf['date'].'</span></p>
                  <div class="card-body">'.$row_ntf['content'].'</div>
                </li>';
              } else {
                echo '<li class="list-group-item card" style="background: #DDDDDD">
                  <p class="card-header" style="font-weight: bold">'.$row_ntf['title'].'<span class="pull-right">'.$row_ntf['date'].'</span></p>
                  <div class="card-body">'.$row_ntf['content'].'</div>
                </li>';
              }
              
              $result_ntf_read = $mysqli->query("UPDATE `notifications` SET `status` = 1 WHERE `userid` = '$id'");
            }
            echo '<li class="list-group-item card text-center">
                  <a class="card-header btn btn-default">Показать все</a>
                </li>';
            
           
           ?>
            
          </ul>
          
        </div><!--/col-3-->
      <div class="col-sm-8">
              
          <div class="tab-content">
            <div class="tab-pane active" id="home">

                  <?php

                  $result2 = $mysqli->query("SELECT * FROM `projects` WHERE `userid` = '$id'");
            
                  $num_rows = $result2->num_rows;
                  for($i = 0; $i < $num_rows; $i++){
                    $row2 = $result2->fetch_array();
      
                    $name = $row2['name'];
                    $price = $row2['price'];
                    $tracknumber = $row2['tracknumber'];
                    $date = $row2['date'];
                    $experience = $row2['experience'];
                    $description = $row2['description'];
                    $status = $row2['status'];
                  
                    echo '<h2 class="text-center">'.$name.'</h2>
                  
                  <table class="table table-bordered">
                    <tbody style="font-size: 20px">';

                      //echo '<tr><th>Название</th><td>'.$name.'</td></tr>';
                      echo '<tr><th>Цена</th><td>'.$price.'</td></tr>';
                      echo '<tr><th>Трек номер</th><td>'.$tracknumber.'</td></tr>';
                      echo '<tr><th>Дата</th><td>'.$date.'</td></tr>';
                      echo '<tr><th>Опыт</th><td>'.$experience.'</td></tr>';
                      echo '<tr><th>Описание</th><td>'.$description.'</td></tr>';
                      echo '<tr><th>Статус</th><td>'.$status.'</td></tr>';

                      echo '
                    </tbody>
                  </table>';
                }

                ?>          
             </div>
          </div>
        </div>
    </div>

    <div id="message" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-between align-items-center">
        <h4 class="modal-title text-center d-inline">Написать сообщение</h4>
      </div>
      <br>
      <div class="modal-body">
        <?php 
        echo '<form class="form-signin" method="POST" action="db/send_message.php?id='.$id.'">';
        ?>
          <input type="text" class="form-control" name="title" placeholder="Тема" />
          <textarea name="message" class="form-control" rows="4" placeholder="Сообщение"></textarea>
          <br>
          <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Отправить</button>   
        </form>
      </div>
      <br>
    </div>

  </div>
</div>
  </body>
