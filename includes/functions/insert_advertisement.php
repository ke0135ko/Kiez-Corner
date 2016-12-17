<?php
$typeAdvertisement = $_REQUEST['typeAdvertisement'];
$Headline = $_REQUEST['Headline'];
$Descrip = $_REQUEST['Descrip'];
$Zip= $_REQUEST['Zip'];
$Phone = $_REQUEST['Phone'];
$Mail = $_REQUEST['Mail'];
$Score= $_REQUEST['Score'];

// Check Arrays $_FILES
$uploadDir = 'C:/xampp/htdocs/Kiez-Corner/uploadedImages/';
$uploadFile = $uploaddir . basename($_FILES['Picture']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['Picture']['tmp_name'], $uploadfile)) {
    echo "Datei ist valide und wurde erfolgreich hochgeladen.\n";
} else {
    echo "Möglicherweise eine Dateiupload-Attacke!\n";
}

echo 'Weitere Debugging Informationen:';
print_r($_FILES);

print "</pre>";

echo $typeAdvertisement . "<br>" .
 $Headline . "<br>" .
 $Descrip . "<br>" .
 $Zip . "<br>" .
 $Phone . "<br>" .
 $Mail . "<br>" .
 $Score;
