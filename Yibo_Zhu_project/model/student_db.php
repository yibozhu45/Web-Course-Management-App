<?php
function add_student($first_name, $last_name, $userid, $gender, $email, $password) {
    global $db;
    $query = 'INSERT INTO students
              VALUES
                 (:userid, :first_name, :last_name, :email, :gender, :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':userid', $userid);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->bindValue(':gender', $gender);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor();
}

function check_email($email) {
    global $db;
    $query = 'SELECT email FROM students
              WHERE email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
}

function check_password($password) {
    global $db;
    $query = 'SELECT password FROM students
              WHERE password = :password';
    $statement = $db->prepare($query);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
}

function check_id($userid) {
    global $db;
    $query = 'SELECT studentID FROM students
              WHERE studentID = :userid';
    $statement = $db->prepare($query);
    $statement->bindValue(':userid', $userid);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
}

function get_studentBy_userid($text)
{
    global $db;
    $query = 'SELECT * FROM students
              WHERE studentID = :userid';
    $statement = $db->prepare($query);
    $statement->bindValue(':userid', $text);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();
    return $result;
}

function get_studentBy_email($text)
{
    global $db;
    $query = 'SELECT * FROM students
              WHERE email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $text);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();
    return $result;
}

function update_student($userid, $first_name, $last_name, $email, $gender, $n_password)
{
    global $db;
    $query = 'UPDATE students
              SET firstName = :first_name,
                  lastName = :last_name,
                  email = :email,
                  gender = :gender,
                  password = :password
              WHERE studentID = :userid';
    $statement = $db->prepare($query);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':gender', $gender);
    $statement->bindValue(':password', $n_password);
    $statement->bindValue(':userid', $userid);
    $statement->execute();
    $statement->closeCursor();  
}
?>

