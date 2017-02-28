<noscript>Diese Seite wird nur bei aktiviertem Javascript richtig ausgeführt</noscript>

<div class="div">
    <?php
    if (!isset($_SESSION)) {
        session_start();
        session_cache_limiter(20);
    }
    //transmitted datas
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
                            <td><label for="Mail">E-Mail:</label></td>
                            <td><input type="email" maxlength="80" name="Mail" id="Mail"></td>
                        </tr>
                        <tr>
                            <td><label for="Phone">Telefon:</label></td>
                            <td><input type="text" name="Phone" id="Phone" maxlength="20"/></td>
                        </tr>
                            <td><button type="reset" name="reset" class="KiezButton">
                                    <i class="fa fa-undo"></i>
                                </button>
                            </td>
                            <td><button type="submit" name="sent" onclick=" return validatePhoneOrMail();" class="KiezButton">Weiter    
                                    <i class="fa fa-angle-double-right"></i>
                                </button>
                            </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </fieldset>
    </form>
</div>

