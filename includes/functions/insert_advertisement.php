<?php

if(!isset($_SESSION)) {
        session_start();
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//VARIABLES
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//transmitted datas
$TypeAdvertisement = strtoupper($_REQUEST['typeAdvertisement']);
$Headline = $_REQUEST['Headline'];
$Descrip = $_REQUEST['Descrip'];
$Zip = $_REQUEST['Zip'];
$phone = $_REQUEST['Phone'];
$mail = $_REQUEST['Mail'];
$Score = $_REQUEST['Score'];

include 'dbConnect.php';

//assign correct Membno
$user = $_SESSION["USERNAME"];
$selectMembno = "select USERID from login where USERNAME = '$user'";
$queryMembno = mysqli_query($conn, $selectMembno);
$UserID = mysqli_fetch_array($queryMembno);
$membno = $UserID["USERID"];

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//INSERT ADVERTISEMENT/PICTURE
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//FIRST: INSERT ADVERTISEMENT IN DB
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//calculate new AdvID
$newAdvid;
$selectCurrentAdvid = 'select max(ADVID) from advertisements';
$queryAdvid = mysqli_query($conn, $selectCurrentAdvid) or die("Abfrage AdvID fehlgeschlagen");
$row2 = mysqli_fetch_array($queryAdvid);

if ($row2['max(ADVID)'] == NULL) {
    $newAdvid = 1;
} else {
    $newAdvid = $row2['max(ADVID)'] + 1;
}

//ADVTYPE Request or Offer
$AdvType;
if ($TypeAdvertisement == 'ANGEBOT') {
    $AdvType = 'OFFER';
} else {
    $AdvType = 'REQUEST';
}

//Insert into DB
$sql2 = "INSERT INTO advertisements
                  VALUES ('$newAdvid', '$membno', '$AdvType', '$Headline', '$Descrip', '$Zip', '$phone', '$mail', '$Score')";
if ($conn->query($sql2) === TRUE) {
    echo "Inserat erfolgreich eingefügt.<br>";
} else {
    echo "ERROR: " . $sql2 . "<br>" . $conn->error . "<br>";
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//SECOND: FILE UPLOAD
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//check if picture is available
if ($_FILES['Picture']['size'] > 0) {

    $fileName = explode('.', $_FILES['Picture']['name']);
    $fileType = explode('/', $_FILES['Picture']['type']);
    $fileSize = $_FILES['Picture']['size'];

    //check for error in FILES array
    if ($_FILES['Picture']['error'] == 0) {
        //check size of file
        if ($fileSize > 1000 * 1024) {
            echo "Die Datei ist zu groß. Erlaubt max. 1 MB.";
        } else {
            //check if MIME is JPG or PNG
            if (($fileType[1] == "png") || ($fileType[1] == "jpeg")) {
                $uploadDir = ('../../uploadedImages/');
                $uploadFile = $uploadDir . $membno . basename($_FILES['Picture']['name']);

                // Check Arrays $_FILES
                if (move_uploaded_file($_FILES['Picture']['tmp_name'], $uploadFile)) {

                    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    //INSERT PICTURE IN DB
                    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    
                    //calculate new Picid
                    $newPicid;
                    $selectCurrentPicid = 'select max(PICID) from pictures';
                    $queryPicid = mysqli_query($conn, $selectCurrentPicid) or die("Abfrage PicID fehlgeschlagen");
                    $row1 = mysqli_fetch_array($queryPicid);
                    
                    if ($row1['max(PICID)'] == NULL) {
                        $newPicid = 1;
                    } else {
                        $newPicid = $row1['max(PICID)'] + 1;
                    }
                    
                    //Insert into DB
                    $sql1 = "INSERT INTO pictures
                                VALUES ('$newPicid', '$membno', '$membno$fileName[0]', '$fileType[1]', '$fileSize', '$newAdvid')";
                    if ($conn->query($sql1) === FALSE) {

                        echo "ERROR: " . $sql1 . "<br>" . $conn->error . "<br>";
                    }
                } else {
                    echo "Möglicherweise eine Dateiupload-Attacke!\n"
                    . "Das Bild wurde nicht gespeichert.";
                }
            } else {
                echo "Falscher Dateityp:<strong> " . $fileType[1] . "</strong><br> Erlaubt sind nur PNG oder JPG.<br>";
            }
        }
    } else {
        echo "Fehler bei der Übertragung!<br>"
        . "Das Bild wurde nicht gespeichert.";
    }
}

include 'dbClose.php';
