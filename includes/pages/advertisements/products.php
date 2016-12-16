<?php
        include './includes/functions/swConnect.php';
?>

<h1>Unser Produktangebot</h1>
<section class="products-list">
    <div class="product">
        <?php
        global $conn;
        $query = "select * from products";
        $result = mysqli_query($conn, $query);
        
        while ($row = mysqli_fetch_array($result))
        { 
            echo '<div class="product">';
            //Ausgabe
            echo $row['PRODID'] . " " . $row['DESCRIP'] . " " . $row['CAT'] . " " . $row['VENDORID'] . " ". $row['STDPRICE']."<br>";
            echo '</div>';     
        }
        include './includes/functions/swClose.php';
        ?>   
    </div>
     <div class="product">
        
    </div>
</section>
