<div class="div">    
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
                        <td><button type="reset" name="reset" class="KiezButton">
                                <i class="fa fa-undo"></i>
                            </button>
                        </td>
                        <td><button type="submit" name="sent" class="KiezButton">
                                <i class="fa fa-sign-in"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <small>*Pflichtangaben</small>
        </fieldset>
    </form>
</div>