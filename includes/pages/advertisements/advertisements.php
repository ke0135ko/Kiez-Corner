<h1>Aktuell nur Gesuche</h1>
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
                   $row['RZIP']."<br>".
                   $row['RPHONE']."<br>".
                   $row['RMAIL']."<br>".
                   $row['RSCORE']."<br></li>";
    }
    include 'includes/functions/dbClose.php';
    ?>  
</ul>
</div>
