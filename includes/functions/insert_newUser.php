<?php

if(!isset($_SESSION)) {
        session_start();
        session_cache_limiter(20);
    }
include "dbConnect.php";

$membno = date("dmis");
$name = $_SESSION["SURNAME"] . " " . $_SESSION["LASTNAME"];
$address = $_SESSION["STREET"] . " " . $_SESSION["HOUSENUMBER"];
$plz = $_SESSION["PLZ"];
$mail = $_SESSION["MAIL"];
$phone = $_SESSION["PHONE"];
$username = $_SESSION["USERNAME"];
$password = $_SESSION["PASSWORD"];

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

//Insert User information into member AND Login information into login
$userInformation = "INSERT INTO member
                  VALUES ('$membno', '$name', '$address', '$plz', 'ERFURT', '$mail', '$phone', '5')";

$loginInformation = "INSERT INTO login
                  VALUES ('$newLogID', '$membno', '$username', '$password')";

if ($conn->query($userInformation) === TRUE && $conn->query($loginInformation) === TRUE) {
    header('location: \Kiez-Corner\index.php?page=start');
} else {
    echo "ERROR: " . $userInformation . "<br>" . $conn->error . "<br>";
    echo "ERROR: " . $loginInformation . "<br>" . $conn->error . "<br>";
}

include "dbClose.php";