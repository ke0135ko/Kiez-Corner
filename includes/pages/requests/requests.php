<a  id="requests" href="index.php?page=insert" class="button">Gesuch aufgeben</a>

<h3>Hier finden Sie alle Gesuche</h3>

<?php
//$ID1 = 1;
//$memberid = '08155678901';
//$rheadline = 'Beispielüberschrift';
//$rdescrip = 'Anzeigentext';
//$address = 'Schnullerstr. 5';
//$rcontact = 'Kevin Kosinski';
//$rscore = 5;
//include('includes/functions/dbConnect.php');
//
//    $sql="INSERT INTO requests
//                  VALUES ('$ID1', '$memberid', '$rheadline', '$rdescrip', '$address', '$rcontact', '$rscore')";
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
    
    for ($index = 0; $index < 7; $index++) {
        include('includes/functions/dbConnect.php');
        $query = "select * from requests";
        $result = mysqli_query($conn, $query);
        $row= mysqli_fetch_array($result);
        echo "<li>".$row['REQUESTID']."<br>". 
                   $row['MEMBERID']."<br>".
                   $row['RHEADLINE']."<br>".
                   $row['RDESCRIP']."<br>".
                   $row['RADDRESS']."<br>".
                   $row['RCONTACT']."<br>".
                   $row['RSCORE']."<br></li>";
    }
    include 'includes/functions/dbClose.php';
    ?>  
</ul>
</div>