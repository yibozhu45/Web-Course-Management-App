<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/login_style.css" />
    <title>AUM</title>
  </head>
  <body>
    <div class="container">
      <div class="header">
        <h2>Profile</h2>
        <br>
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="enrolled_courses">
            <input type="hidden" name="option" value="<?php echo $option; ?>">
            <input type="hidden" name="text" value="<?php echo $text; ?>">
            <input type = "submit" value="Personal Info">
        </form>
      </div>
        
        <form action="index.php" method="post" id="form" class="form">
          <input type="hidden" name="action" value="modify_profile">
        <div class="form-control">
            <label for="username">Username</label>
            <input type="text" name="name" value="<?php echo "$first_name $last_name" ?>" id="username" />
        </div>
          <input type="hidden" name="userid" value="<?php echo "$userid" ?>" id="userid" />
        <div class="form-control">
            <label for="gender">Gender</label>
            <input type="text" name="gender" value="<?php echo "$gender" ?>" id="gender" />
        </div>
        <div class="form-control">
          <label for="username">Email</label>
          <input type="email" name="email" value="<?php echo "$email" ?>" id="email" />
        </div>
        <div class="form-control">
          <label for="username">Current Password</label>
          <input type="password" name="c_password"  id="password" />
          
          <?php if(isset($message)): ?>
            <p style="color: red;"><?php echo "$message" ?></p>
          <?php endif; ?>
          
        </div>
        <div class="form-control">
          <label for="username">New Password</label>
          <input type="password" name="n_password"  id="password" />
        </div>
        <input type="hidden" name="option" value="<?php echo $option; ?>">
        <input type="hidden" name="text" value="<?php echo $text; ?>">
        <input type="submit" value="Modify"><br>
      </form>
    </div>
  </body>
</html>