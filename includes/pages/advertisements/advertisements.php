<h1>Aktuell nur Gesuche</h1>
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
                   $row['SCORE']."</li>";
    }
    include 'includes/functions/dbClose.php';
    ?>  
</ul>
</div>
