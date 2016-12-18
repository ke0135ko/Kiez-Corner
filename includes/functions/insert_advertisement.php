<?php

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//VARIABLES
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//transmitted datas
$typeAdvertisement = strtoupper($_REQUEST['typeAdvertisement']);
$Headline = $_REQUEST['Headline'];
$Descrip = $_REQUEST['Descrip'];
$Zip = $_REQUEST['Zip'];
$Phone = $_REQUEST['Phone'];
$Mail = $_REQUEST['Mail'];
$Score = $_REQUEST['Score'];
$fileName = explode('.', $_FILES['Picture']['name']);
$fileType = explode('/', $_FILES['Picture']['type']);
$fileSize = $_FILES['Picture']['size'];
$membno = '11815';

//Vars for validation Check
$zipBegin = substr($Zip, 0, 3);
$phoneOrMail = ((empty($Mail)) && (empty($Phone)));

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//INSERT ADVERTISEMENT/PICTURE
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Zip belongs to Erfurt and at least Phone or Mail is set
if (($zipBegin == '990') && (!$phoneOrMail)) {
    
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //FILE UPLOAD
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $uploadDir = ('../../uploadedImages/');
    $uploadFile = $uploadDir . basename($_FILES['Picture']['name']);
    // Check Arrays $_FILES
    echo '<pre>';
    if (move_uploaded_file($_FILES['Picture']['tmp_name'], $uploadFile)) {
        echo "Datei ist valide und wurde erfolgreich hochgeladen.\n";
    } else {
        echo "Möglicherweise eine Dateiupload-Attacke!\n";
    }

    //echo 'Weitere Debugging Informationen:';
    //print_r($_FILES);

    print "</pre>";

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //INSERT PICTURE
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    include 'dbConnect.php';
    //calculate new Picid
    $newPicid;
    $selectCurrentPicid = 'select max(PICID) from pictures';
    $ergPicid = mysqli_query($conn, $selectCurrentPicid) or die("Abfrage PicID fehlgeschlagen");
    $row1 = mysqli_fetch_array($ergPicid);
    //    var_dump($row);
    if ($row1['max(PICID)'] == NULL) {
        $newPicid = 1;
    } else {
        $newPicid = $row1['max(PICID)'] + 1;
    }
    
    //    echo "neue ID = ".$newAdvid;
    //Insert into DB
    $sql1 = "INSERT INTO pictures
                  VALUES ('$newPicid', '$membno', '$fileName[0]', '$fileType[1]', '$fileSize')";
    if ($conn->query($sql1) === TRUE) {
        echo "Bild erfolgreich eingefügt.<br>";
    } else {
        echo "ERROR: " . $sql1 . "<br>" . $conn->error . "<br>";
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //INSERT ADVERTISEMENT
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //calculate new AdvID and 
    $newAdvid;
    $selectCurrentAdvid = 'select max(ADVID) from advertisements';
    $ergAdvid = mysqli_query($conn, $selectCurrentAdvid) or die("Abfrage AdvID fehlgeschlagen");
    $row2 = mysqli_fetch_array($ergAdvid);
    //    var_dump($row);
    if ($row2['max(ADVID)'] == NULL) {
        $newAdvid = 1;
    } else {
        $newAdvid = $row2['max(ADVID)'] + 1;
    }
    //ADVTYPE Request or Offer
    $AdvType;
    if ($typeAdvertisement == 'ANGEBOT') {
        $AdvType = 'OFFER';
    } else {
        $AdvType = 'REQUEST';
    }
    $sql2 = "INSERT INTO advertisements
                  VALUES ('$newAdvid', '$membno', '$AdvType', '$Headline', '$Descrip', '$Zip', '$Phone', '$Mail', '$Score', '$newPicid')";
    if ($conn->query($sql2) === TRUE) {
        echo "Inserat erfolgreich eingefügt.<br>";
    } else {
        echo "ERROR: " . $sql2 . "<br>" . $conn->error . "<br>";
    }
} else {
    echo "<strong>Bitte geben Sie eine Mailadresse oder eine Telefonnummer an!</strong>";
}
include 'dbClose.php';
