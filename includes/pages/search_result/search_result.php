<div class="div">

    <?php
    include "includes/functions/dbConnect.php";

    //transmitted datas
    $typeAdv = $_REQUEST["typeAdvertisement"];
    $operator = $_REQUEST["Operator"];
    $headline = $_REQUEST["Headline"];
    $descrip = $_REQUEST["Descrip"];
    $score = $_REQUEST["Score"];

    //execute search in DB
    $selectAdvertisement = "select * from advertisements a join member m on a.memberid=m.membno left join pictures p on a.advid=p.assigned_adv where (advtype = '$typeAdv') $operator (headline like '%$headline%') $operator (descrip like '%$descrip%') $operator (score = '$score')";
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


            $queryPicture = "select name, type from pictures where assigned_adv = " . $rowAdvertisement['ADVID'];;
            $resultPicture = mysqli_query($conn, $queryPicture);
            $rowPicture = mysqli_fetch_array($resultPicture);

            //assign correct picture type
            if ($rowPicture["type"] == "jpeg") {
                $picType = "jpg";
            } else {
                $picType = $rowPicture["tpye"];
            }
            ?>
            <li>
                <table class="tableAdvertisement">
                    <tbody>
                        <tr>
                            <td></td>
                            <td>
                                <img id="picture" src ="uploadedImages/<?php echo $rowPicture["name"] . "." . $picType; ?>" onclick="window.open(this.src)" alt ="kein Bild verfügbar">
                            </td>
                        </tr>
                        <tr>
                        <tr>
                            <td>Art</td>
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
                            <td>PLZ</td>
                            <td><?php echo $rowAdvertisement['ZIP']; ?></td>
                        </tr>
                        <tr>
                            <td>Telefon</td>
                            <td><?php echo $rowAdvertisement['PHONE']; ?></td>
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
                    if ((isset($_SESSION["USERID"])) && ($_SESSION["USERID"] == $rowAdvertisement['MEMBERID'])) {
                    ?>
                    <tr>
                        <td>
                            <a href="index.php?page=insertForm" class="KiezButton_Adv">
                                <i class="fa fa-pencil-square-o"></i> Ändern
                            </a>
                        </td>
                        <td>
                            <a href="index.php?page=insertForm" class="KiezButton_Adv">
                                <i class="fa fa-times"></i> Löschen
                            </a>
                        </td>
                    </tr>
                    <?php
                    } ?>
                    </tbody>
                </table>
            </li>
    <?php
}
include "includes/functions/dbClose.php";
?>  
    </ul>  
</div>