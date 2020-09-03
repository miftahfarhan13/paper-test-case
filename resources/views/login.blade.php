<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <link href="{{'css/login.css'}}" rel='stylesheet' type='text/css'>

     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </head>
  <body class="page-container">
    <img src="img/paperlogowhite.svg" alt="paper logo" class="mx-auto d-block paper-logo">
      
    <div class="card login-card">
        <div class="card-body">
          <h2 class="login-title">Masuk ke Paper.id<span><img src="img/check-login.svg" alt="check" style="margin-left: 11px;"></span></h2>
          <hr class="login-line">
          <p class="login-desc">Masuk dengan akun yang terdaftar di<br>Paper.id/PayPer</p>

          <form name="form" action="/getLogin" method="post">
            @csrf
            <div class="form-group input-div">
              <div class="i">
                <i><img src="img/icon_account_white.svg" alt="logo account"></i>
              </div>
              <input type="text" class="form-control input-form no-border" id="username" name="username" aria-describedby="emailHelp" placeholder="Username">
            </div>
            <div class="form-group input-div">
                <div class="i">
                    <i><img src="img/icon_lock_white.svg" alt="logo account"></i>
                </div>
              <input type="password" class="form-control input-form no-border"  id="password" name="password" placeholder="Kata Sandi">
            </div>
            <div class="login-forgot">
                <a href="#">Lupa kata sandi?</a>
            </div>
            <button type="submit" class="btn btn-primary btn-login mx-auto d-block">Masuk</button>
          </form>
        </div>
      </div>
  </body>
</html>

