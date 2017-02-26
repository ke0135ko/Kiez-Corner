 <?php

//transmitted datas
$username = $_REQUEST["Username"];
$password = $_REQUEST["Password"];

//validate datas
include "dbConnect.php";

$selectUser = "select * from login where USERNAME = '$username'";
$queryUser = mysqli_query($conn, $selectUser);
$row = mysqli_fetch_array($queryUser);

//only if username and password are correct start a session
if (($row["USERNAME"] == $username) && $row["PASSWORD"] == $password) {

    session_start();
    session_name ('LOGGEDIN');
    $_SESSION["USERNAME"] = $username;
    $_SESSION["USERID"] = $row["USERID"];
    $session = session_id();
    include "dbClose.php";
    header('location: \Kiez-Corner\index.php?page=start');
} else {

    echo "Ungültige Eingaben!";
    include "dbClose.php";
}
