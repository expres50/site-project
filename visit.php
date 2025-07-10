<?php

include 'admin/database1.php';
$sql="update visitor_counter set visitor_counter=visitor_counter+1";
$stmt=$con->prepare($sql);
$stmt->execute();

$sql="select visitor_counter from visitor_counter";
$stmt=$con->prepare($sql);
$stmt->execute();
$arr=$stmt->fetchAll(PDO::FETCH_ASSOC);
$counter=$arr[0]['visitor_counter'];
$count=strlen($counter);
?>
