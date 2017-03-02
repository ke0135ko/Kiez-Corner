
<noscript>Diese Seite wird nur bei aktiviertem Javascript richtig angezeigt</noscript>

<div>

    <?php
    
    include "includes/functions/dbConnect.php";

    //transmitted datas
    $typeAdv = $_REQUEST["typeAdvertisement"];
    $operator = $_REQUEST["Operator"];
    $headline = $_REQUEST["Headline"];
    $descrip = $_REQUEST["Descrip"];
    $score = $_REQUEST["Score"];

    //execute search in DB
    $selectAdvertisement = "select * from advertisements a join member m on a.memberid=m.membno left join pictures p on a.advid=p.assigned_adv where (advtype = '$typeAdv') "
                         . "$operator (headline like '%$headline%') $operator (descrip like '%$descrip%') $operator (score = '$score')";
    $queryAdvertisement = mysqli_query($conn, $selectAdvertisement) or die("$selectAdvertisement");
    
    //display result
    
    ?>

    <a href="index.php?page=insertForm" class="KiezButton_newAdv">
       <i class="fa fa-plus"> Neues Inserat</i>
    </a>
    
    <ul class="flex-container">
        <?php
        $picType;

        while ($rowAdvertisement = mysqli_fetch_array($queryAdvertisement)) {
            
            //assign correct picture type
            if ($rowAdvertisement["TYPE"] == "jpeg") {
                $picType = "jpg";
            } else {
                $picType = $rowAdvertisement["TYPE"];
            }
            ?>
        
        <li>
            <form action="index.php?page=modifyAdv" name="Advertisements" id="Advertisements<?php echo $rowAdvertisement['ADVID']; ?>" method="POST" enctype="multipart/form-data">
                <table class="tableAdvertisement">
                    <tbody>
                        <tr>
                            <td></td>
                            <td>
                                <img id="picture" src ="uploadedImages/<?php echo $rowAdvertisement["TITLE"] . "." . $picType; ?>" onclick="openPic(<?php echo $rowAdvertisement["ASSIGNED_ADV"]; ?>)" alt ="kein Bild verfügbar">
                            </td>
                        </tr>
                        <tr>
                        <tr>
                            <td>Typ</td>
                            <td><?php 
                                    if($rowAdvertisement['ADVTYPE'] === "OFFER"){
                                        echo "Angebot";
                                    }else {
                                    echo "Gesuch";
                                    } ?>
                            </td>
                        </tr>
                            <td>Titel</td>
                            <td><?php echo $rowAdvertisement['HEADLINE']; ?> </td>
                        </tr>
                        <tr>
                            <td>Beschreibung</td>
                            <td><?php echo $rowAdvertisement['DESCRIP']; ?></td>
                        </tr>
                        <tr>
                            <td>Inserent</td>
                            <td><?php echo $rowAdvertisement['NAME']; ?></td>
                        </tr>
                        <tr>
                            <td>PLZ</td>
                            <td><?php echo $rowAdvertisement['A_ZIP']; ?></td>
                        </tr>
                        <tr>
                            <td>Telefon</td>
                            <td><?php echo $rowAdvertisement['A_PHONE']; ?></td>
                        </tr>
                        <tr>
                            <td>Mail</td>
                            <td><?php echo $rowAdvertisement['MAIL']; ?></td>
                        </tr>
                        <tr>
                            <td>Kiez Punkte</td>
                            <td><?php echo $rowAdvertisement['SCORE']; ?></td>
                        </tr>
                        <?php
                    if ((isset($_SESSION["USERID"])) && ($_SESSION["USERID"] == $rowAdvertisement['MEMBNO'])) {
                    ?>
                    <tr>
                        <td>
                            <button type="submit" class="KiezButton_Adv">
                                <i class="fa fa-pencil-square-o"> Ändern</i>
                            </button>
                            <input type="hidden" name="currAdv" value="<?php echo $rowAdvertisement['ADVID']; ?>" />
                        </td>
                        <td>
                            <button onclick="deleteAdv(<?php echo $rowAdvertisement['ADVID']; ?>);" class="KiezButton_Adv">
                                <i class="fa fa-times"> Löschen</i>
                            </button>
                        </td>
                    </tr>
                    <?php
                    } ?>
                    </tbody>
                </table>
                </form>
            </li>
        
    <?php
        }
    include "includes/functions/dbClose.php";
    ?>
    </ul>  
</div>