<h1>Aktuell nur Gesuche</h1>
<div>
<ul class="flex-container">
    <?php
    
    for ($index = 0; $index < 7; $index++) {
        include('includes/functions/dbConnect.php');
        $queryAdv = "select * from advertisements";
        $resultAdv = mysqli_query($conn, $queryAdv);
        $row= mysqli_fetch_array($resultAdv);
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
