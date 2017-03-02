<noscript>Diese Seite wird nur bei aktiviertem Javascript richtig angezeigt</noscript>
<?php
include 'includes/functions/dbConnect.php';

$Adv = $_REQUEST["currAdv"];
$queryADV = "select * from advertisements where advid ='". $_REQUEST["currAdv"]."'";
$resultADV = mysqli_query($conn, $queryADV);
$rowADV = mysqli_fetch_array($resultADV);

?>
<div>
    
   <h3>Fülle die zu ändernden Felder aus:</h3>
            <div>
            <form action="includes/functions/insert_modified_Adv.php" name="ModifyAdvertisement" method="POST" enctype="multipart/form-data" class="form">
                <fieldset>
                    <legend>Beschreibung Inserat</legend>
                    <table border="0">
                        <tbody>
                            <tr>
                                <td><label for="typeAdvertisement">Typ:</label></td>
                                <td><select name="typeAdvertisement">
<!--                                        display current type-->
                                        <option><?php if ($rowADV["ADVTYPE"] == "REQUEST") {
                                                      echo "Gesuch"; 
                                                    } else {
                                                      echo "Angebot";
                                                    } ?>
                                        </option>
<!--                                        display type that is currently not selected in DB-->
                                        <option><?php if ($rowADV["ADVTYPE"] == "REQUEST") {
                                                      echo "Angebot"; 
                                                    } else {
                                                      echo "Gesuch";
                                                    } ?>
                                        </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="Headline">Überschrift:</label></td>
                                <td><input type="text" name="Headline" value="<?php echo $rowADV["HEADLINE"]; ?>" maxlength="50" required /></td>
                            </tr>
                            <tr>
                                <td><label for="Descrip">Beschreibung:</label></td>
                                <td><textarea name="Descrip" cols="34" rows="4" maxlength="200" required><?php echo $rowADV["DESCRIP"]; ?></textarea></td>
                            </tr>
                            <tr>
                                <td><label for="Score">Kiez Punkte*:</label></td>
                                <td><input type="range" name="Score" max="10" min="0" onchange="updateScoreInput(this.value);" required/>
                                    <input type="text" value="<?php echo $rowADV["SCORE"]; ?>" style="width: 100px" id="scoreInput"/>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="Picture">Bild (.jpg/.png):</label></td>
                                <td><input type="file" size="40" name="Picture" accept=".jpeg,.jpg,.jpe,.png"/></td>
                            </tr>
                        </tbody>
                    </table>
                </fieldset><br>
                <fieldset>
                    <legend>Kontaktinformationen</legend>
                    <table>
                        <tbody>
                            <tr>
                                <td><label for="Zip">Postleitzahl:</label></td>
                                <td><input type="number" name="Zip" id="Zip" minlength="5" maxlength="5" value="<?php echo $rowADV["A_ZIP"]; ?>"required/></td>
                            </tr>
                            <tr>
                                <td><label for="Phone">Telefon:</label></td>
                                <td><input type="text" name="Phone"  id="Phone" maxlength="20" value="<?php echo $rowADV["A_PHONE"]; ?>"/></td>
                            </tr>
                            <tr>
                                <td><label for="Mail">E-Mail:</label></td>
                                <td><input type="email" name="Mail" id="Mail" maxlength="80" value="<?php echo $rowADV["MAIL"]; ?>" /></td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="reset" name="reset" class="KiezButton">
                                        <i class="fa fa-undo"></i>
                                    </button>
                                </td>
                                 <td>
                                     <button type="submit" name="sent" onclick=" return (validateZip() && validatePhoneOrMail());" class="KiezButton">
                                         Senden</button>
                                     <input type="hidden" value="<?php echo $Adv ?>" name="correctAdv"/>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <small>*Pflichtangaben</small>
                </fieldset>
            </form>
            </div>
</div>
