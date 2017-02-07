<div class="div">
    
<?php
    
?>
    
    <form action="includes/functions/chkLogin.php" name="validateLogin" method="POST" enctype="multipart/form-data" class="form">
        <fieldset>
            <legend>Anmeldung</legend>
            <table border="0">
                <tbody>
                    <tr>
                        <td><label for="Username">Benutzername*:</label></td>
                        <td><input type="text" name="Username"  id="Username" required></td>
                    </tr>
                    <tr>
                        <td><label for="Password">Passwort*:</label></td>
                        <td><input type="password" name="Password" maxlength="80" id="Password" required /></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="sent" value="Anmelden"/></td>
                        <td><input type="reset" name="reset" value="Zurücksetzen"/></td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
    </form>
</div>