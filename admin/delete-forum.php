<?php 

include 'database_forum1.php';

if(isset($_GET["user_forum_id"])){
    $user_forum_id = $_GET["user_forum_id"];

    $delete = $con->prepare("DELETE FROM users WHERE id= '$user_forum_id'");
    $delete->execute();

    header("location: forum_users.php");

}

if(isset($_GET["question_forum_id"])){
    $question_forum_id = $_GET["question_forum_id"];

    $delete = $con->prepare("DELETE FROM questions WHERE id= '$question_forum_id'");
    $delete->execute();

    header("location: forum_question.php");

}
?>