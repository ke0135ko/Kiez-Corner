<script>
    function updateScoreInput(val)
    {
        document.getElementById('scoreInput').value = val;
    }
</script>

<noscript>Diese Seite wird nur bei aktiviertem Javascript richtig angezeigt</noscript>

    <?php
    //check for valid Session
    if (!isset($_SESSION["USERNAME"])) {
        ?>
        <div class="div">

            <h3>Bitte melden Sie sich an</h3>

        <?php } else { ?>

            <h3>Bitte gib folgende Daten ein:</h3>
            <form action="includes/functions/insert_advertisement.php" name="NewAdvertisement" method="POST" enctype="multipart/form-data" class="form">
                <fieldset>
                    <legend>Beschreibung Inserat</legend>
                    <table border="0">
                        <tbody>
                            <tr>
                                <td><label for="typeAdvertisement">Art des Inserates:</label></td>
                                <td><select name="typeAdvertisement" default   >
                                        <option selected="selected" >Angebot</option>
                                        <option>Gesuch</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="Headline">Überschrift*:</label></td>
                                <td><input type="text" name="Headline" maxlength="50" required /></td>
                            </tr>
                            <tr>
                                <td><label for="Descrip">Beschreibung*:</label></td>
                                <td><textarea name="Descrip" cols="34" rows="5" maxlength="200" required 
                                              placeholder="Bitte geben Sie eine Beschreibung  mit max. 200 Zeichen ein..."></textarea></td>
                            </tr>
                            <tr>
                                <td><label for="Score">Kiez Punkte*:</label></td>
                                <td><input type="range" name="Score" max="10" min="0" onchange="updateScoreInput(this.value);"required/>
                                    <input type="text" placeholder="5" style="width: 70px" id="scoreInput"/>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="Picture">Bild (.jpg/.png):</label></td>
                                <td><input type="file" size="40" value="" name="Picture" accept=".jpeg,.jpg,.jpe,.png"/></td>
                            </tr>
                        </tbody>
                    </table>
                    <small>*Pflichtangaben</small>
                </fieldset><br>
                <fieldset>
                    <legend>Kontaktinformationen</legend>
                    <table>
                        <tbody>
                            <tr>
                                <td><label for="Zip">Postleitzahl*:</label></td>
                                <td><input type="number" name="Zip" id="Zip" minlength="5" maxlength="5"  placeholder="990.." required/></td>
                            </tr>
                            <tr>
                                <td><label for="Phone">Telefon:</label></td>
                                <td><input type="text" name="Phone"  id="Phone" maxlength="20"/></td>
                            </tr>
                            <tr>
                                <td><label for="Mail">E-Mail:</label></td>
                                <td><input type="email" name="Mail" id="Mail" maxlength="80"/></td>
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
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <small>*Pflichtangaben</small>
                </fieldset>
            </form>
        </div>
    <?php } ?>
</div>