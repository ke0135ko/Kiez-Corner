
<noscript>Diese Seite wird nur bei aktiviertem Javascript richtig angezeigt</noscript>

<div class="div">

    <a href="index.php?page=insertForm" class="KiezButton_newAdv">
        <i class="fa fa-plus"> Neues Inserat</i>
    </a>

    <h1>Gesuche</h1>

    <ul class="flex-container">

        <?php
        include('includes/functions/dbConnect.php');
        $queryADV = "select * from advertisements a join member m on a.memberid=m.membno left join pictures p on a.advid=p.assigned_adv where advtype like 'REQUEST'";
        $resultADV = mysqli_query($conn, $queryADV);
        $picType;
        
        //display all results
        while ($rowADV = mysqli_fetch_array($resultADV)) {
            
            //assign correct picture type
            if ($rowADV["TYPE"] == "jpeg") {
                $picType = "jpg";
            } else {
                $picType = $rowADV["TYPE"];
            }
            
            ?>
            <!--each result is one list-item in the flex container-->
            <li>
                <form action="index.php?page=modifyAdv" name="Advertisements" id="Advertisements<?php echo $rowADV['ADVID']; ?>" method="POST" enctype="multipart/form-data">
                    <table class="tableAdvertisement">
                        <tbody>
                            <tr>
                                <td></td>
                                <td>
                                    <?php echo $rowADV["ASSIGNED_ADV"]; ?>
                                    <span><img id="picture" src ="uploadedImages/<?php echo $rowADV["TITLE"] . "." . $picType; ?>" onclick="openPic(<?php echo $rowADV["ASSIGNED_ADV"]; ?>)" alt ="kein Bild verfügbar"></span>
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
                                <td>Inserent</td>
                                <td><?php echo $rowADV['NAME']; ?></td>
                            </tr>
                            <tr>
                                <td>PLZ</td>
                                <td><?php echo $rowADV['A_ZIP']; ?></td>
                            </tr>
                            <tr>
                                <td>Telefon</td>
                                <td><?php echo $rowADV['A_PHONE']; ?></td>
                            </tr>
                            <tr>
                                <td>Mail</td>
                                <td><?php echo $rowADV['MAIL']; ?></td>
                            </tr>
                            <tr>
                                <td>Kiez Punkte</td>
                                <td><?php echo $rowADV['SCORE']; ?></td>
                            </tr>
                            <?php
                            if ((isset($_SESSION["USERID"])) && ($_SESSION["USERID"] == $rowADV['MEMBNO'])) {
                                
                                ?>
                                <tr>
                        <td>
                            <button type="submit" class="KiezButton_Adv">
                                <i class="fa fa-pencil-square-o"> Ändern</i>
                            </button>
                            <input type="hidden" name="currAdv" value="<?php echo $rowADV['ADVID']; ?>" />
                        </td>
                        <td>
                            <button onclick="deleteAdv(<?php echo $rowADV['ADVID']; ?>);" class="KiezButton_Adv">
                                <i class="fa fa-times"> Löschen</i>
                            </button>
                            <input type="hidden" name="currAdv" value="<?php echo $rowADV['ADVID']; ?>" />
                        </td>
                    </tr>
                                <?php }
                            ?>
                        </tbody>
                    </table>
                </form>
            </li>
            <?php
        }
        include 'includes/functions/dbClose.php';
        ?>  
    </ul>
</div>

