<?php 
  include 'database3.php';

if(isset($_GET["validate"])){

 
    $delete = $bdd->prepare('DELETE FROM notifs ');
    $delete->execute();

    header("location: index.php");

}
if(isset($_GET["id"])){
    $id=$_GET["id"];

    $delete = $bdd->prepare("DELETE FROM notifs WHERE id= '$id'");
    $delete->execute();

    header("location: index.php");

}


if(isset($_GET["doc_id"])){
    $titre = $_GET["doc_id"];

    $delete = $bdd->prepare("DELETE FROM documents WHERE id= '$titre'");
    $delete->execute();

    header("location: documents.php?niveau=tous");

}
if(isset($_GET["user_id"])){
    $user_id = $_GET["user_id"];

    $delete = $bdd->prepare("DELETE FROM users WHERE id= '$user_id'");
    $delete->execute();

    header("location: users.php");

}
if(isset($_GET["message_id"])){
    $message_id = $_GET["message_id"];

    $delete = $bdd->prepare("DELETE FROM messages WHERE id= '$message_id'");
    $delete->execute();

    header("location: messages.php");

}

?>