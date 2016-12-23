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
    
    for ($index = 0; $index < 7; $index++) {
        include('includes/functions/dbConnect.php');
        $query = "select * from advertisements";
        $result = mysqli_query($conn, $query);
        $row= mysqli_fetch_array($result);
        echo "<li>".$row['ADVID']."<br>". 
                   $row['MEMBERID']."<br>".
                   $row['ADVTYPE']."<br>".
                   $row['HEADLINE']."<br>".
                   $row['DESCRIP']."<br>".
                   $row['ZIP']."<br>".
                   $row['PHONE']."<br>".
                   $row['MAIL']."<br>".
                   $row['SCORE']."<br>".
                   $row['PICTURE']."</li>";
    }
    include 'includes/functions/dbClose.php';
    ?>  
</ul>
</div>