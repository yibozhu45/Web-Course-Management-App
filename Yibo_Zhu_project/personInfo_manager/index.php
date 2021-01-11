<?php
require('../model/database.php');
require('../model/student_db.php');
require('../model/student_courses_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'enrolled_courses';
    }
}
//echo "$option + $text";
switch($action){
    case 'enrolled_courses':
        $option = filter_input(INPUT_POST, 'option');
        $text = filter_input(INPUT_POST, 'text');
        if($option == "email")
        {
            $student = get_studentBy_email($text);
            $userid = $student['studentID'];
            //echo $userid;
            $enrolled_courses = get_enrolled_courses($userid);
        }
        else
        {
            $enrolled_courses = get_enrolled_courses($text);
        }
        //echo count($enrolled_courses);
        include('show_enrolled_courses.php');
        break;
    case 'withdraw_course':
        $option = filter_input(INPUT_POST, 'option');
        $text = filter_input(INPUT_POST, 'text');
        $courseID = filter_input(INPUT_POST, 'courseID');
        if($option == "email")
        {
            $student = get_studentBy_email($text);
            $userid = $student['studentID'];
            withdraw_course($userid, $courseID);
            $enrolled_courses = get_enrolled_courses($userid);
        }
        else
        {
            withdraw_course($text, $courseID);
            $enrolled_courses = get_enrolled_courses($text);
        }
        include('show_enrolled_courses.php');
        break;  
    case 'show_profile':
        $option = filter_input(INPUT_POST, 'option');
        $text = filter_input(INPUT_POST, 'text');
        if($option == "email")
        {
            $student = get_studentBy_email($text);
        }
        else
        {
            $student = get_studentBy_userid($text);
        }
        $first_name = $student['firstName'];
        $last_name = $student['lastName'];
        $userid = $student['studentID'];
        $email = $student['email'];
        $gender = $student['gender'];
        include('profile.php');
        break; 
    case 'modify_profile':
        $option = filter_input(INPUT_POST, 'option');
        $text = filter_input(INPUT_POST, 'text');
        $c_password = filter_input(INPUT_POST, 'c_password');
        $n_password = filter_input(INPUT_POST, 'n_password');
        $name = filter_input(INPUT_POST, 'name');
        $pieces = explode(" ", $name);
        $first_name = $pieces[0];
        $last_name = $pieces[1];
        $userid = filter_input(INPUT_POST,'userid');
        $gender = filter_input(INPUT_POST, 'gender');
        $email = filter_input(INPUT_POST, 'email');
        if($option == "email")
        {
            $student = get_studentBy_email($text);
        }
        else
        {
            $student = get_studentBy_userid($text);
        }
        if($student['password'] != $c_password)
        {
            $message = "Current Password doesn't fit! Please enter it again!";
            $first_name = $student['firstName'];
            $last_name = $student['lastName'];
            $userid = $student['studentID'];
            $email = $student['email'];
            $gender = $student['gender'];
            include('profile.php');
        }
        else
        {
            update_student($userid, $first_name, $last_name, $email, $gender, $n_password);
            echo '<script>alert("Profile modified successfully!")</script>';
            include('show_enrolled_courses.php');
        }
        break;    
}

