<div id="signin" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-between align-items-center">
        <h4 class="modal-title text-center">Вход в свой личный кабинет</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <br>
      <div class="container">
        <form class="form-signin" method="POST" action="db/signin.php">
          <input type="text" class="form-control mb-2" name="login" placeholder="Логин" required="" autofocus="" />

          <input type="password" class="form-control" name="password" placeholder="Пароль" required=""/>      
          <label class="checkbox">
            <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Запомнить меня
          </label>
          <br>
          <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Login</button>   
        </form>
      </div>
      <br>
    </div>

  </div>
</div>