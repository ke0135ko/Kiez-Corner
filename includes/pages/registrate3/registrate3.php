<noscript>Diese Seite wird nur bei aktiviertem Javascript richtig ausgeführt</noscript>

<div>
    
    <?php
    if(!isset($_SESSION)) {
        session_start();
        session_cache_limiter(20);
    }
    $_SESSION["MAIL"] = $_REQUEST["Mail"];
    $_SESSION["PHONE"] = $_REQUEST["Phone"];
    ?>
    
     <form action="index.php?page=registrate4" name="newRegistrate3" method="POST" class="form">
        <fieldset>
            <legend>Anmeldeinformationen</legend>
            <div>
                <table border="0">
                    <tbody>
                        <tr>
                            <td><label for="Username">Benutzername(8 Zeichen)*:</label></td>
                            <td><input type="text" name="Username" id="Username" required></td>
                        </tr>
                        <tr>
                            <td><label for="Password1">Passwort*:</label></td>
                            <td><input type="password" name="Password1" id="Password1" required /></td>
                        </tr>
                        <tr>
                            <td><label for="Password2">Passwort wiederholen*:</label></td>
                            <td><input type="password" name="Password2" id="Password2" required /></td>
                        </tr>
                        <tr>
                            <td><button type="reset" name="reset" class="KiezButton">
                                    <i class="fa fa-undo"></i> 
                                </button>
                            </td>
                            <td><button class="KiezButton" type="submit" name="sent" onclick="return (comparePwds() && validatePwd() && validateUsername());">
                                    Übersicht <i class="fa fa-angle-double-right"></i>
                                </button>    
                            </td>
                        </tr>
                    </tbody>
                </table>
                <small>*Pflichtangaben</small>
            </div>
        </fieldset>
    </form>
</div>
