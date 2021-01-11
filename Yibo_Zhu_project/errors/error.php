<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/login_style.css" />
    <title>Document</title>
  </head>
  <body>
    <div class="container">
      <div class="header">
        <h2>Error</h2>
      </div>
        <div class="form-control">
            <p style="margin-left: 40px;"><?php echo htmlspecialchars($error); ?></p>
            <a href="../sign_up_manager/sign_up.php" style="margin-left: 40px;">Sign Up</a>
            <a href="../index.php" style="margin-left: 40px;">Sign In</a>
        </div>
    </div>
  </body>
</html>