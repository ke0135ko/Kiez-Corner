<div class="div">

    <a href="index.php?page=insertForm" class="KiezButton_newAdv">
       <i class="fa fa-plus"> Neues Inserat</i>
    </a>

    <ul class="flex-container">

        <h3>Hier finden Sie alle Angebote</h3>

        <?php
        include('includes/functions/dbConnect.php');
        $queryADV = "select * from advertisements where advtype like 'OFFER'";
        $resultADV = mysqli_query($conn, $queryADV);
        $picType;

        //display all results
        while ($rowADV = mysqli_fetch_array($resultADV)) {

            //find picture
            $queryPIC = "select name, type from pictures where assigned_adv = " . $rowADV['ADVID'];
            $resultPIC = mysqli_query($conn, $queryPIC);
            $rowPIC = mysqli_fetch_array($resultPIC);

            //assign correct picture type
            if ($rowPIC["type"] == "jpeg") {
                $picType = "jpg";
            } else {
                $picType = $rowPIC["tpye"];
            }
            ?>
            <!--each result is one list-item in the flex container-->
            <li>
                <table class="tableAdvertisement">
                    <tbody>
                        <tr>
                            <td></td>
                            <td>
                                <span><img id="picture" src ="uploadedImages/<?php echo $rowPIC["name"] . "." . $picType; ?>" onclick="window.open(this.src)" alt ="kein Bild verfügbar"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Titel</td>
                            <td><?php echo $rowADV['HEADLINE']; ?> </td>
                        </tr>
                        <tr>
                            <td>Beschreibung</td>
                            <td><p><?php echo $rowADV['DESCRIP']; ?></p></td>
                        </tr>
                        <tr>
                            <td>PLZ</td>
                            <td><?php echo $rowADV['ZIP']; ?></td>
                        </tr>
                        <tr>
                            <td>Telefon</td>
                            <td><?php echo $rowADV['PHONE']; ?></td>
                        </tr>
                        <tr>
                            <td>Mail</td>
                            <td><?php echo $rowADV['MAIL']; ?></td>
                        </tr>
                        <tr>
                            <td>Kiez Punkte</td>
                            <td><?php echo $rowADV['SCORE']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </li>
            <?php
        }
        include 'includes/functions/dbClose.php';
        ?>  
    </ul>
</div>