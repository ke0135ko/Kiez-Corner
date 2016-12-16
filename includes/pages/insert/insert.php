<?php
if ($_GET['page']=='insert') {?>
<b><p>Bitte geben Sie folgende Daten für Ihr Gesuch ein:</p></b>
    <form action="includes/functions/insert_advertisement.php" name="NewAdvertisement" method="POST">
            <table border="0">
                <tbody>
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
                        <td><input type="number" name="Zip" maxlength="5" required/></td>
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
                        <td><input type="number" name="Score" maxlength="2" required/></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="sent" value="Senden"/></td>
                        <td><input type="reset" name="reset" value="Zurücksetzen"/></td>
                    </tr>
                </tbody>
            </table>
        </form>
<?php    
}else if ($_GET['page']=='offers') {?>
<h1>Bitte geben Sie folgende Daten für Ihr Angebot ein:</h1>
    <form action="../../functions/insert_advertisement.php" name="NewAdvertisement" method="POST">
            <table border="0">
                <tbody>
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
                        <td><input type="number" name="Zip" maxlength="5" required/></td>
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
                        <td><input type="number" name="Score" maxlength="2" required/></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="sent" value="Senden"/></td>
                        <td><input type="reset" name="reset" value="Zurücksetzen"/></td>
                    </tr>
                </tbody>
            </table>
        </form>
<?php
} else {
    echo "Es ist ein Fehler bei der Übertragung aufgetreten!";
}
