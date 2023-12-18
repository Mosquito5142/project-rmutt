
<?php
  session_start();
  session_destroy();
?>
<?php include "../config.php"; ?>

<!DOCTYPE html>
<html>
<head>

</head>
<body class="hold-transition sidebar-mini">
                <h3 class="card-title">Login Form</h3>
              </div>
              
              <form class="form-horizontal" action="2login.php" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Login</label>
                    <div class="col-sm-10">
                      <input autofocus type="text" name="login" class="form-control" id="inputEmail3" placeholder="Login">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" >
                    </div>
                  </div>                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Login</button>
                  <a href="../main/index.php" class="btn btn-info" >Cancel</a>
                <div>
                  <a href="users_form.php"> สมัคร</a>
                </div>
                </div>
                <!-- /.card-footer -->
              </form>

</body>
</html>
