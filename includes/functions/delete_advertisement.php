<?php

include 'dbConnect.php';

//transmitted AdvID
$Adv = $_REQUEST["currAdv"];

//select AdvType for header location
$queryAdvType = "select advtype from advertisements where advid = $Adv";
$resultAdvType = mysqli_query($conn, $queryAdvType);
$rowAdvType = mysqli_fetch_array($resultAdvType);
$AdvType = $rowAdvType["advtype"];

//check if a picture belongs to the advertisement
//if so, delete picture first
$queryPic = "select assigned_adv from pictures where assigned_adv =$Adv";
$resultPic = mysqli_query($conn, $queryPic);
$rowPic = mysqli_fetch_array($resultPic);

if ($rowPic != NULL) {

    $sqlPic = "delete from pictures where assigned_adv = $Adv";

    if ($conn->query($sqlPic) === FALSE) {

        echo "ERROR: " . $sqlPic . "<br>" . $conn->error . "<br>";
    }
}

//delete advertisement
$sqlAdv = "delete from advertisements where advid = $Adv";

if ($conn->query($sqlAdv) === FALSE) {

    echo "ERROR: " . $sqlAdv . "<br>" . $conn->error . "<br>";
}

if ($rowAdvType["advtype"] == 'REQUEST') {
    header('location: ../../index.php?page=requests');
} else {
    header('location: ../../index.php?page=offers');
}

include 'dbClose.php';
