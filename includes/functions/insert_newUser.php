<?php

if(!isset($_SESSION)) {
        session_start();
        session_cache_limiter(20);
    }
include "dbConnect.php";

//transmitted datas
$name = $_SESSION["SURNAME"] . " " . $_SESSION["LASTNAME"];
$address = $_SESSION["STREET"] . " " . $_SESSION["HOUSENUMBER"];
$plz = $_SESSION["PLZ"];
$mail = $_SESSION["MAIL"];
$phone = $_SESSION["PHONE"];
$username = $_SESSION["USERNAME"];
$password = $_SESSION["PASSWORD"];

//create new member number with function date
$membno = date("dmis");

//calculate new LogID
$newLogID;
$selectCurrentLogID = "select max(LOGID) from login";
$ergPicid = mysqli_query($conn, $selectCurrentLogID) or die("Abfrage LogID fehlgeschlagen");
$row = mysqli_fetch_array($ergPicid);

if ($row["max(LOGID)"] == NULL) {
    $newLogID = 1;
} else {
    $newLogID = $row["max(LOGID)"] + 1;
}

//Insert user information into member table AND Login information into login table
$userInformation = "INSERT INTO member
                  VALUES ('$membno', '$name', '$address', '$plz', 'ERFURT', '$mail', '$phone', '5')";

$loginInformation = "INSERT INTO login
                  VALUES ('$newLogID', '$membno', '$username', '$password')";

//if insert was successful redirect to start page
//otherwise print error information
if ($conn->query($userInformation) === TRUE && $conn->query($loginInformation) === TRUE) {
    header('location: \Kiez-Corner\index.php?page=start');
} else {
    echo "ERROR: " . $userInformation . "<br>" . $conn->error . "<br>";
    echo "ERROR: " . $loginInformation . "<br>" . $conn->error . "<br>";
}

include "dbClose.php";
