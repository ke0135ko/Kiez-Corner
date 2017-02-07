<?php
include "includes/functions/dbConnect.php";

$selectScore = "select grade from scoregrade";
$findScore= mysqli_query($conn, $selectScore);

?>

<div class="div">

    <form name="search" action="index.php?page=search_result" method="POST" enctype="multipart/form-data" class="form">
        <fieldset>
            <legend>Suchinformationen Inserat</legend>
            <table border="0">
                <tbody>
                    <tr>
                        <td><label for="typeAdvertisement">Art des Inserates:</label></td>
                        <td><select name="typeAdvertisement">
                                <option value="no selection"></option>
                                <option value="OFFER" selected="selected" >Angebot</option>
                                <option value="REQUEST">Gesuch</option>
                            </select>
                        </td>
<!--                    <tr>
                        <td></td>
                        <td><input type="radio" name="Operator1" value="AND">UND<br>
                            <input type="radio" name="Operator1" value="OR" checked="checked">ODER</td>
                    </tr>-->
                    </tr>
                    <tr>
                        <td><label for="Headline">Stichwort in Titel:</label></td>
                        <td><input type="text" name="Headline" maxlength="25"/></td>
                    </tr>
<!--                    <tr>
                        <td></td>
                        <td><input type="radio" name="Operator2" value="AND">UND<br>
                            <input type="radio" name="Operator2" value="OR" checked="checked">ODER</td>
                    </tr>-->
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
                        <td><input type="submit" name="search" value="Suchen"/></td>
                        <td><input type="reset" name="reset" value="Zurücksetzen"/></td>
                    </tr>
                </tbody>
            </table>
<!--        </fieldset><br>
        <fieldset>
            <legend>Suchinformationen Autor</legend>
            <table border="0">
                <tbody>
                    <tr>
                        <td><label for="Name">Name:</label></td>
                        <td><input type="text" name="Name" maxlength="50"/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="radio" name="Operator5" value="AND">UND<br>
                            <input type="radio" name="Operator5" value="OR" checked="checked">ODER</td>
                    </tr>
                    <tr>
                        <td><label for="Zip">PLZ:</label></td>
                        <td><input type="number" name="Zip" /></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="search" value="Suchen"/></td>
                        <td><input type="reset" name="reset" value="Zurücksetzen"/></td>
                    </tr>
                </tbody>
            </table>
        </fieldset>-->
    </form> 
<?php
include "includes/functions/dbClose.php";
?>
</div>