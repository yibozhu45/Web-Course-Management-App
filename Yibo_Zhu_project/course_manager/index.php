<?php
require('../model/database.php');
require('../model/course_db.php');
require('../model/student_db.php');
require('../model/student_courses_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'show_courses';
    }
}

switch($action){
    case 'show_courses':
        $option = filter_input(INPUT_POST, 'option');
        $text = filter_input(INPUT_POST, 'text');
        $courses = show_courses();
        include('show_course.php');
        break;
    case 'enroll_course':
        $option = filter_input(INPUT_POST, 'option');
        $text = filter_input(INPUT_POST, 'text');
        $courseID = filter_input(INPUT_POST, 'courseID');
        //check duplicate
        if($option == "email")
        {
            $student = get_studentBy_email($text);
            $userid = $student['studentID'];
            $result = check_duplicate($userid, $courseID);
            if(count($result) != 0)
            {
                echo '<script>alert("You already enrolled this course!")</script>';
                $courses = show_courses();
                include('show_course.php');
            }
            else
            {
                enroll_couse($userid, $courseID);
                echo '<script>alert("Enrolled Successfully!")</script>';
                $courses = show_courses();
                include('show_course.php');
            }
        }
        else
        {
            $result = check_duplicate($text, $courseID);
            if(count($result) != 0)
            {
                echo '<script>alert("You already enrolled this course!")</script>';
                $courses = show_courses();
                include('show_course.php');
            }
            else
            {
                enroll_couse($text, $courseID);
                echo '<script>alert("Enrolled Successfully!")</script>';
                $courses = show_courses();
                include('show_course.php');
            }
        }
        break;
    case 'search_courses':
        $selected = $_POST['search_by'];
        $content = filter_input(INPUT_POST,"search_content");
        $option = filter_input(INPUT_POST, 'option');
        $text = filter_input(INPUT_POST, 'text');
        if($selected == "courseName")
        {
            $courses = get_course_courseName($content);
        }
        else if($selected == "courseID")
        {
            $courses = get_course_courseID($content);
        }
        else
        {
            $courses = get_course_instructor($content);
        }
        
        if(count($courses) == 0)
        {
            $error = "0 result found in database! Please enter the correct name!";
        }
        
        include('show_course.php');
        
        break;
}
?>

