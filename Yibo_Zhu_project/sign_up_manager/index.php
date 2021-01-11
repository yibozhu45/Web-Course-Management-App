<?php
require('../model/database.php');
require('../model/student_db.php');

require('../model/validate.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

if($action == 'add_student')
{
    $name = filter_input(INPUT_POST, 'name');
    $userid = filter_input(INPUT_POST,'userid');
    $gender = filter_input(INPUT_POST, 'gender');
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    $c_password = filter_input(INPUT_POST, 'c_password');
    
    $validate = new Validate($name,$userid,$gender,$email,$password,$c_password);
    $validate ->checkName();
    $validate ->checkUserid();
    $validate ->checkGender();
    $validate ->checkEmail();
    $validate ->checkPassword();
    $fields = $validate ->getFields();
    
    if(empty($fields["name"])&&empty($fields["userid"])&&empty($fields["gender"])&&empty($fields["email"])&&empty($fields["password"]))
    {
        //set $option and $text
        $option = "email";
        $text = $email;
    
        $first_name = $validate ->getFirstName();
        $last_name = $validate->getLastName();
        add_student($first_name, $last_name, $userid, $gender, $email, $password);
        include('../Home.php');
    }
    else {
        include('sign_up_result.php');
    }
}

    /*
    $space = strrpos($name," ");
    if($space == NULL)
    {
        $m_name = "Please enter first name and last name like Yibo Zhu";
        include('sign_up_1.php');
    }
     */
?>
