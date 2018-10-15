<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a href="index.php" class="btn btn-default px-0 p-1">
      <img src="/img/astana-spk-logo.png">
      <span class="navbar-brand ml-2">SPK ASTANA</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <?php 
          if(isset($_SESSION['login'])){
            echo '<li class="nav-item">
                    <a class="nav-link" href="account.php">'.$_SESSION['login'].'</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-danger" href="db/logout.php">ВЫХОД</a>
                  </li>';
          } else {
            echo '<li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#signin">ВХОД</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="registration.php">РЕГИСТРАЦИЯ</a>
                  </li>';
          }
        ?>
      </ul>
    </div>
  </div>
</nav>