<?php
//transmitted datas
$username = $_REQUEST["Username"];
$password = $_REQUEST["Password"];

//validate datas
include "dbConnect.php";

$selectUser = "select * from login where USERNAME = '$username'";
$queryUser = mysqli_query($conn, $selectUser);
$row = mysqli_fetch_array($queryUser);

if (($row["USERNAME"] == $username) && $row["PASSWORD"] == $password) {

    session_start();
    session_cache_limiter(20);
    $_SESSION["USERNAME"] = $username;
    $_SESSION["USERID"] = row["USERID"];
    include "dbClose.php";
    header('location: \Kiez-Corner\index.php?page=start');
} else {
    
    echo "Ungültige Eingaben!";
    include "dbClose.php";
}
