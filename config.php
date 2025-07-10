<?php

$conn = mysqli_connect("serveurlocal", "root", "", "site");

if (!$conn) {
    echo "Connection Failed";
}