<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/login_style.css" />
    <style>
        li {
            margin-top: 20px;
            margin-left: 40px;
            margin-bottom: 20px;
        }
    </style>
    <title>AUM</title>
  </head>
  <body>
    <div class="container">
      <div class="header">
        <h2>Content</h2>
      </div>
        <form action="../course_manager/index.php" method="post" id="form" class="form">
        <div class="form-control">
            <input type="hidden" name="option" value="<?php echo $option; ?>">
            <input type="hidden" name="text" value="<?php echo $text; ?>">
          <input type="submit" value="Course Info">
        </div>
        </form>
        
        <form action="../personInfo_manager/index.php" method="post" id="form" class="form">
        <div class="form-control">
            <input type="hidden" name="option" value="<?php echo $option; ?>">
            <input type="hidden" name="text" value="<?php echo $text; ?>">
          <input type="submit" value="Personal Info">
        </div>
        </form>
    </div>
  </body>
</html>

