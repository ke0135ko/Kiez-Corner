<?php

include 'dbConnect.php';
session_start();

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//VARIABLES
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$Adv = $_REQUEST["correctAdv"];
$queryADV = "select * from advertisements a join pictures p on a.advid=p.assigned_adv where a.advid =$Adv";
$resultADV = mysqli_query($conn, $queryADV);
$rowADV = mysqli_fetch_array($resultADV);

//transmitted datas
$TypeAdvertisement = strtoupper($_REQUEST['typeAdvertisement']);
$membno = $_SESSION["USERID"];
//ADVTYPE Request or Offer
$AdvType;
if ($TypeAdvertisement == 'ANGEBOT') {
    $AdvType = 'OFFER';
} else {
    $AdvType = 'REQUEST';
}
$Headline = $_REQUEST['Headline'];
$Descrip = $_REQUEST['Descrip'];
$Zip = $_REQUEST['Zip'];
$phone = $_REQUEST['Phone'];
$mail = $_REQUEST['Mail'];
$Score = $_REQUEST['Score'];

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//UPDATE ADVERTISEMENT/PICTURE
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//FIRST: UPDATE ADVERTISEMENT IN DB
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Insert into DB
include 'dbConnect.php';
$sql2 = "UPDATE advertisements
         SET ADVTYPE='$AdvType', HEADLINE='$Headline', DESCRIP='$Descrip',A_ZIP='$Zip', A_PHONE='$phone', MAIL='$mail', SCORE='$Score'
         WHERE ADVID =$Adv";

if ($conn->query($sql2) === FALSE) {

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
                    //it there is already a picture run set method
                    //otherwise run insert method
                    if ($rowADV["ASSIGNED_ADV"] == $Adv) {

                        $sql1 = "UPDATE pictures
                             SET TITLE='$membno$fileName[0]',TYPE='$fileType[1]',SIZE='$fileSize'
                             WHERE ASSIGNED_ADV = $Adv";
                        if ($conn->query($sql1) === FALSE) {

                            echo "ERROR: " . $sql1 . "<br>" . $conn->error . "<br>";
                        } else {

                            if ($AdvType == 'REQUEST') {
                                header('location: ../../index.php?page=requests');
                            } else {
                                header('location: ../../index.php?page=offers');
                            }
                        }
                    } else {

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

                        $sql1 = "INSERT INTO pictures
                                VALUES ('$newPicid', '$membno', '$membno$fileName[0]', '$fileType[1]', '$fileSize', '$Adv')";
                        if ($conn->query($sql1) === TRUE) {
                            if ($AdvType == 'REQUEST') {
                                header('location: ../../index.php?page=requests');
                            } else {
                                header('location: ../../index.php?page=offers');
                            }
                        } else {
                            echo "ERROR: " . $sql1 . "<br>" . $conn->error . "<br>";
                        }
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

if ($AdvType == 'REQUEST') {
    header('location: ../../index.php?page=requests');
} else {
    header('location: ../../index.php?page=offers');
}


include 'dbClose.php';
