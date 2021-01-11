<?php

function show_courses()
{
    global $db;
    $query = 'SELECT * FROM courses';
    $statement = $db ->prepare($query);
    $statement->execute();
    $courses = $statement->fetchAll();
    $statement->closeCursor();
    return $courses;   
}

function get_course_courseName($text)
{
    global $db;
    $query = 'SELECT * FROM courses WHERE courseName = :text';
    $statement = $db ->prepare($query);
    $statement->bindValue(':text', $text);
    $statement->execute();
    $courses = $statement->fetchAll();
    $statement->closeCursor();
    return $courses;
}

function get_course_courseID($text)
{
    global $db;
    $query = 'SELECT * FROM courses WHERE courseID = :text';
    $statement = $db ->prepare($query);
    $statement->bindValue(':text', $text);
    $statement->execute();
    $courses = $statement->fetchAll();
    $statement->closeCursor();
    return $courses;
}

function get_course_instructor($text)
{
    global $db;
    $query = 'SELECT * FROM courses WHERE instructor = :text';
    $statement = $db ->prepare($query);
    $statement->bindValue(':text', $text);
    $statement->execute();
    $courses = $statement->fetchAll();
    $statement->closeCursor();
    return $courses;
}
?>

