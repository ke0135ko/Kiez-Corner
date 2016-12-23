<?php 
//generate Session, just for testing
//session_save_path('Sessions');
//session_start();

//check for valid Session
if (!isset($_SESSION)) {
    ?>
    <strong>Bitte melden Sie sich an</strong>
    <a  id='requests' href=index.php?page=login class='button'>Anmelden</a>
<?php } else { ?>
    <div>
        <b><p>Bitte geben Sie folgende Daten ein:</p></b>
        <form action="includes/functions/insert_advertisement.php" name="NewAdvertisement" method="POST" enctype="multipart/form-data">
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
                        <td><label for="Headline">Überschrift:</label></td>
                        <td><input type="text" name="Headline" maxlength="50" required /></td>
                    </tr>
                    <tr>
                        <td><label for="Descrip">Beschreibung:</label></td>
                        <td><input type="text" name="Descrip" maxlength="200"/></td>
                    </tr>
                    <tr>
                        <td><label for="Zip">Postleitzahl:</label></td>
                        <td><input type="number" name="Zip" minlength="5" maxlength="5"  placeholder="99092" required/></td>
                    </tr>
                    <tr>
                        <td><label for="Phone">Telefon:</label></td>
                        <td><input type="text" name="Phone" maxlength="20"/></td>
                    </tr>
                    <tr>
                        <td><label for="Mail">E-Mail:</label></td>
                        <td><input type="text" name="Mail" maxlength="80"/></td>
                    </tr>
                    <tr>
                        <td><label for="Score">Wert:</label></td>
                        <td><input type="number" name="Score" maxlength="2" max="10" min="0" required/></td>
                    </tr>
                    <tr>
                        <td><label for="Picture">Bild (*.jpg/*.png):</label></td>
                        <td><input type="file" size="40" value="" name="Picture" accept="jpeg,jpg,jpe,png" /></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="sent" value="Senden"/></td>
                        <td><input type="reset" name="reset" value="Zurücksetzen"/></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div><?php
}