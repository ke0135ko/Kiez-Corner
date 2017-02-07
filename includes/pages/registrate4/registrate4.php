<div class="div">
    <?php
    if(!isset($_SESSION)) {
        session_start();
        session_cache_limiter(20);
    }
    $_SESSION["USERNAME"] = $_REQUEST["Username"];
    $_SESSION["PASSWORD"] = $_REQUEST["Password2"];
    ?>
        <h3>Bitte überprüfen Sie die Daten und klicken zum Abschluss des Vorgangs auf "Abschicken"</h3>
        
        <form action="includes/functions/insert_newUser.php" name="newRegistrate4" method="POST" class="form">
            <div>
                <table border="0">
                    <tbody>
                        <tr>
                            <td><label for="Surname">Vorname:</label></td>
                            <td name="Surname"><?php echo $_SESSION["SURNAME"] ?></td>
                        </tr>
                        <tr>
                            <td><label for="Lastname">Nachname:</label></td>
                            <td name="Lastname"><?php echo $_SESSION["LASTNAME"] ?></td>
                        </tr>
                        <tr>
                            <td><label for="Street">Straße:</label></td>
                            <td name="Street"><?php echo $_SESSION["STREET"] ?></td>
                        </tr>
                        <tr>
                            <td><label for="HouseNumber">Hausnummer:</label></td>
                            <td name="HouseNumber"><?php echo $_SESSION["HOUSENUMBER"] ?></td>
                        </tr>
                        <tr>
                            <td><label for="PLZ">PLZ:</label></td>
                            <td name="PLZ"><?php echo $_SESSION["PLZ"] ?></td>
                        </tr>
                        <tr>
                            <td><label for="Mail">Mail:</label></td>
                            <td name="Mail"><?php echo $_SESSION["MAIL"] ?></td>
                        </tr>
                        <tr>
                            <td><label for="Phone">Telefon:</label></td>
                            <td name="Phone"><?php echo $_SESSION["PHONE"] ?></td>
                        </tr>
                        <tr>
                            <td><label for="Username">Benutzername:</label></td>
                            <td name="Username"><?php echo $_SESSION["USERNAME"] ?></td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="submit" value="Abschicken"/></td>
                            <td><a href ="/Kiez-Corner/includes/functions/destroySession.php" name="home" value="Startseite">zurück zur Startseite</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
</div>
