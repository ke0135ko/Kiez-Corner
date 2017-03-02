<div>
<!--    <h3>Jetzt registrieren und 5 Kiez Punkte erhalten!</h3>-->
    <form action="index.php?page=registrate2" name="newRegistrate1" method="POST" class="form">
        <fieldset>
            <legend>Personendaten</legend>
            <div>
                <table border="0">
                    <tbody>
                        <tr>
                            <td><label for="Surname">Vorname*:</label></td>
                            <td><input type="text" maxlength="25" name="Surname" required></td>
                        </tr>
                        <tr>
                            <td><label for="Lastname">Nachname*:</label></td>
                            <td><input type="text" name="Lastname" maxlength="25" required /></td>
                        </tr>
                        <tr>
                            <td><label for="Street">Straße*:</label></td>
                            <td><input type="text" name="Street" required /></td>
                        </tr>
                        <tr>
                            <td><label for="HouseNumber">Hausnummer*:</label></td>
                            <td><input type="text" name="HouseNumber" required /></td>
                        </tr>
                        <tr>
                            <td><label for="PLZ">PLZ*:</label></td>
                            <td><input type="number" name="PLZ"  id="PlzUser"placeholder="990.." required /></td>
                        </tr>
                        <tr>
                            <td><button type="reset" name="reset" class="KiezButton">
                                    <i class="fa fa-undo"></i>
                                </button>
                            </td>
                            <td><button type="submit" name="sent" onclick="return validateZipLength();"class="KiezButton">Weiter
                                    <i class="fa fa-angle-double-right"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
          <small>*Pflichtangaben</small>  
        </fieldset>
    </form>
</div>