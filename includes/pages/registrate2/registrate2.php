<div class="div">
    <?php
    if (!isset($_SESSION)) {
        session_start();
        session_cache_limiter(20);
    }
    $_SESSION["SURNAME"] = $_REQUEST["Surname"];
    $_SESSION["LASTNAME"] = $_REQUEST["Lastname"];
    $_SESSION["STREET"] = $_REQUEST["Street"];
    $_SESSION["HOUSENUMBER"] = $_REQUEST["HouseNumber"];
    $_SESSION["PLZ"] = $_REQUEST["PLZ"];
    ?>

    <form action="index.php?page=registrate3" name="newRegistrate2" method="POST" class="form">
        <fieldset>
            <legend>Kontaktinformationen</legend>
            <div>
                <table border="0">
                    <tbody>
                        <tr>
                            <td><label for="Mail">Mail:</label></td>
                            <td><input type="email" maxlength="80" name="Mail" id="Mail"></td>
                        </tr>
                        <tr>
                            <td><label for="Phone">Telefon:</label></td>
                            <td><input type="text" name="Phone" id="Phone" maxlength="20"/></td>
                        </tr>
                            <td><input type="reset" name="reset" value="Zurücksetzen"/></td>
                            <td><input type="submit" name="sent" value="Weiter" onclick=" return validatePhoneOrMail();"/></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </fieldset>
    </form>
</div>

