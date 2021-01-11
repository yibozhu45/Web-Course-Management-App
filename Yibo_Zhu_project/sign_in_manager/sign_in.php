<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/login_style.css" />
    <style>
        #sign_out {
            margin-right: 600px;
            float: right;
            margin-top: -54px;
        }
    </style>
    <title>AUM</title>
  </head>
  <body>
    <div class="container">
      <div class="header">
        <h2>Sign In</h2>
      </div>
        <form action="../index.php" method="post" id="form" class="form">
        <input type="hidden" name="action" value="sign_in">
        <div class="form-control">
          <label for="username">Email/User ID</label>
          <?php if(isset($_SESSION['text'])): ?>
          <input type="text" name="text" value="<?php echo $_SESSION['text'];?>" id="email" />
          <?php else: ?>
          <input type="text" name="text" id="email" />
          <?php endif; ?>
        </div>
        <div class="form-control">
          <label for="username">Password</label>
          <?php if(isset($_SESSION['password'])): ?>
          <input type="password" name="password" value="<?php echo $_SESSION['password'];?>" id="password" />
          <?php else: ?>
          <input type="password" name="password" id="password" />
          <?php endif; ?>
        </div>
          <a href="sign_up_manager/sign_up.php">Don't have account? Sign Up</a>
        <br>
        <input type="submit" value="Sign in"><br>
      </form>
    </div>
  </body>
</html>

