<a  id="requests" href="index.php?page=insertForm" class="button">Inserat aufgeben</a>

<h3>Hier finden Sie alle Gesuche</h3>

<?php
//$ID1 = 1;
//$memberid = '08155678901';
//$rheadline = 'Beispielüberschrift';
//$rdescrip = 'Anzeigentext';
//$rzip = '99092';
//$rphone = '0815-1234';
//$rmail = 'testmail.com';
//$rscore = 5;
//include('includes/functions/dbConnect.php');
//
//    $sql="INSERT INTO requests
//                 VALUES ('$ID1','$memberid', '$rheadline', '$rdescrip', '$rzip', '$rphone','$rmail', '$rscore')";
//            if ($conn->query($sql)=== TRUE) {
//                echo "Produkt erfolgreich eingefügt.<br>";
//                
//            } else 
//            {
//                echo "ERROR: ".$sql."<br>".$conn->error."<br>";
//            }
?>
<div>
<ul class="flex-container">
    <?php
        include('includes/functions/dbConnect.php');
        $queryADV = "select * from advertisements where advtype like 'OFFER'";
        $resultADV = mysqli_query($conn, $queryADV);        
        $picType;
        
        
        while ($rowADV= mysqli_fetch_array($resultADV)) {
            
            $queryPIC = "select name, type from pictures where picid =".$rowADV['PICTURE'];
            $resultPIC = mysqli_query($conn, $queryPIC);
            $rowPIC= mysqli_fetch_array($resultPIC);
        
            //assign correct picture type
            if ($rowPIC["type"]=="jpeg") {
                $picType = "jpg";
            } else {
                $picType = $rowPIC["tpye"];
            }
        
            echo "<li><strong>Titel</strong><br>".$rowADV['HEADLINE']."<br>"
            . "<strong>Beschreibung</strong><br>".$rowADV['DESCRIP']."<br>"
            . "<strong>PLZ</strong><br>".$rowADV['ZIP']."<br>"
            . "<strong>Telefon</strong><br>".$rowADV['PHONE']."<br>"
            . "<strong>Mail</strong><br>".$rowADV['MAIL']."<br>"
            . "<strong>Bewertung</strong><br>".$rowADV['SCORE']."<br>"
            . "<img src =\"uploadedImages/".$rowPIC["name"].".".$picType."\" alt = \"Foto\">"
            . "</li>";
        }
    include 'includes/functions/dbClose.php';
    ?>  
</ul>
</div>