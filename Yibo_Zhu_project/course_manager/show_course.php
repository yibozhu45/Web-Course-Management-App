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
    margin-left: 10px;
}

    </style>
    <title>AUM</title>
  </head>
  <body>
    <div class="container">
      <div class="header">
        <h2>Course Info</h2>
        <br>
        <form action="../personInfo_manager/index.php" method="post">
            <input type="hidden" name="action" value="enrolled_courses">
            <input type="hidden" name="option" value="<?php echo $option; ?>">
            <input type="hidden" name="text" value="<?php echo $text; ?>">
            <input type = "submit" value="Personal Info">
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
            <?php foreach ($courses as $course) : ?>
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
                               value="enroll_course">
                        <input type="hidden" name="courseID"
                               value="<?php echo $course['courseID']; ?>">
                        <input type="hidden" name="option"
                               value="<?php echo $option; ?>">
                        <input type="hidden" name="text"
                               value="<?php echo $text; ?>">
                        <input type = "submit" value="Enroll">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        </div>
        <div class="search">
        <form action="index.php" method="post" id="form" class="form">
        <input type="hidden" name="action" value="search_courses">
        <select name="search_by">
            <option value="courseID">course ID</option>
            <option value="courseName">course name</option>
            <option value="instructor">instructor</option>
        </select>
        <input type="text" name="search_content" />
        <input type="hidden" name="option" value="<?php echo $option; ?>">
        <input type="hidden" name="text" value="<?php echo $text; ?>">
        <input type="submit" value="Search"><br>
      </form>
       </div> 
    </div>
  </body>
</html>
