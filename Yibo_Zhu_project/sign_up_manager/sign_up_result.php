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
        <h2>Sign up</h2>
      </div>
        <form action="." method="post" id="form" class="form">
          <input type="hidden" name="action" value="add_student">
        <div class="form-control">
            <label for="username">Username</label>
            <input type="text" name="name" placeholder="Yibo Zhu" id="username" />
            <?php echo $fields["name"]; ?>
        </div>
        <div class="form-control">
          <label for="userid">UserID</label>
          <input type="text" name="userid" placeholder="yzhu4" id="userid" />
          <?php echo $fields["userid"]; ?>
        </div>
        <div class="form-control">
            <label for="gender">Gender</label>
            <input type="text" name="gender" placeholder="Please enter 'F' for Female, 'M' for Male" id="gender" />
            <?php echo $fields["gender"]; ?>
        </div>
        <div class="form-control">
          <label for="username">Email</label>
          <input type="email" name="email" placeholder="a@email.com" id="email" />
          <?php echo $fields["email"]; ?>
        </div>
        <div class="form-control">
          <label for="username">Password</label>
          <input type="password" name="password" placeholder="Password" id="password" />
        </div>
        <div class="form-control">
          <label for="username">Password check</label>
          <input type="password" name="c_password" placeholder="Confirm Password" id="password2" />
          <?php echo $fields["password"]; ?>
        </div>
        <input type="submit" value="Sign Up"><br>
      </form>
    </div>
  </body>
</html>
