<?php
include "includes/functions/dbConnect.php";

//find datas about score in DB
$selectScore = "select grade from scoregrade";
$findScore = mysqli_query($conn, $selectScore);
?>

<div class="div">

    <form name="search" action="index.php?page=search_result" method="POST" enctype="multipart/form-data" class="form">
        <fieldset>
            <legend>Suchinformationen Inserat</legend>
            <div>
                <table border="0">
                    <tbody>
                        <tr>
                            <td><label for="typeAdvertisement">Typ:</label></td>
                            <td><select name="typeAdvertisement">
                                    <option value="no selection"></option>
                                    <option value="OFFER" selected="selected" >Angebot</option>
                                    <option value="REQUEST">Gesuch</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="Headline">Stichwort in Titel:</label></td>
                            <td><input type="text" name="Headline" maxlength="25"/></td>
                        </tr>
                        <tr>
                            <td><label for="Descrip">Stichwort in Beschreibung:</label></td>
                            <td><input type="text" name="Descrip" maxlength="25" ></td>
                        </tr>
                        <tr>
                            <td><label for="Score">Wert:</label></td>
                            <td><select name="Score">
                                    <option value="no Selection"></option>
                                    <?php
                                    while ($row = mysqli_fetch_array($findScore)) {
                                        echo "<option value\"" . $row['grade'] . "\">" . $row['grade'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="Operator">Auswahl Suchoperator:</label></td>
                            <td><select name="Operator">
                                    <option value="AND" selected="selected" >UND</option>
                                    <option value="OR">ODER</option>
                                </select>                            
                        </tr>
                        <tr>
                            <td><button type="reset" name="reset" class="KiezButton">
                                    <i class="fa fa-undo"></i>
                                </button>
                            </td>
                            <td><button type="submit" name="sent" class="KiezButton">
                                    <i class="fa fa-search"></i>

                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </form> 
    <?php
    include "includes/functions/dbClose.php";
    ?>
</div>