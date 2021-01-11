<?php
function get_enrolled_courses($userid)
{
   global $db;
   $query = 'SELECT courses.courseID, courses.courseName, courses.semester, courses.instructor, courses.classroom, courses.courseTime 
                FROM courses INNER JOIN student_courses ON courses.courseID = student_courses.courseID
                WHERE student_courses.studentID = :userid';
   $statement = $db->prepare($query);
   $statement->bindValue(':userid', $userid);
   $statement->execute();
   $courses = $statement->fetchAll();
   $statement->closeCursor();
   return $courses;
}

function withdraw_course($userid, $courseID)
{
    global $db;
    $query = 'DELETE FROM student_courses
                WHERE studentID = :userid AND courseID = :courseID';
   $statement = $db->prepare($query);
   $statement->bindValue(':userid', $userid);
   $statement->bindValue(':courseID', $courseID);
   $statement->execute();
   $statement->closeCursor();   
}

function check_duplicate($userid, $courseID)
{
    global $db;
    $query = 'SELECT * FROM student_courses
                WHERE studentID = :userid AND courseID = :courseID';
   $statement = $db->prepare($query);
   $statement->bindValue(':userid', $userid);
   $statement->bindValue(':courseID', $courseID);
   $statement->execute();
   $result = $statement->fetchAll();
   $statement->closeCursor();
   return $result;  
}

function enroll_couse($userid, $courseID)
{
   global $db;
   $query = 'INSERT INTO student_courses
             VALUES (:userid,:courseID)';
   $statement = $db->prepare($query);
   $statement->bindValue(':userid', $userid);
   $statement->bindValue(':courseID', $courseID);
   $statement->execute();
   $statement->closeCursor(); 
}

?>

