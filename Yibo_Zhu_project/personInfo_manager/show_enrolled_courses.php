<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/login_style.css" />
    <style>
        table {
    border: 1px solid #001963;
    border-collapse: collapse;
    margin-top: 50px;
    margin-bottom: 20px;
    margin-right: 50px;
    margin-left: 50px;
}
td, th {
    border: 1px dashed #001963;
    padding: .2em .5em .2em .5em;
    text-align: left;
}
p {margin-left: 50px;}

.search {
    margin-left: 40px;
    margin-bottom: 50px;
    margin-top: 50px;
}

    </style>
    <title>AUM</title>
  </head>
  <body>
    <div class="container">
      <div class="header">
        <h2>Personal Info</h2>
        <br>
        <form action="../course_manager/index.php" method="post">
            <input type="hidden" name="action" value="show_courses">
            <input type="hidden" name="option" value="<?php echo $option; ?>">
            <input type="hidden" name="text" value="<?php echo $text; ?>">
            <input type = "submit" value="Course Info">
        </form>
      </div>
        
        <?php if (isset($error)) : ?>
            <p><?php echo $error; ?></p>
        <?php endif; ?>
            
        <div class="table"> 
        <table>
            <tr>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Semester</th>
                <th>Instructor</th>
                <th>Classroom</th>
                <th>Time</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($enrolled_courses as $course) : ?>
            <tr>
                <td><?php echo $course['courseID']; ?></td>
                <td><?php echo $course['courseName']; ?></td>
                <td><?php echo $course['semester']; ?></td>
                <td><?php echo $course['instructor']; ?></td>
                <td><?php echo $course['classroom']; ?></td>
                <td><?php echo $course['courseTime']; ?></td>
                <td>
                    <form action="index.php" method="post">
                        <input type="hidden" name="action"
                               value="withdraw_course">
                        <input type="hidden" name="courseID"
                               value="<?php echo $course['courseID']; ?>">
                        <input type="hidden" name="option"
                               value="<?php echo $option; ?>">
                        <input type="hidden" name="text"
                               value="<?php echo $text; ?>">
                        <input type = "submit" value="withdraw">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        </div>
        <div class="search">
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="show_profile">
                <input type="hidden" name="option" value="<?php echo $option; ?>">
                <input type="hidden" name="text" value="<?php echo $text; ?>">
                <input type = "submit" value="Modify Profile">
            </form>
       </div> 
    </div>
  </body>
</html>