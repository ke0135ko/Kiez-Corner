<div>
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
                            <td><input type="number" name="PLZ"  placeholder="990.." required /></td>
                        </tr>
                        <tr>
                            <td><input type="reset" name="reset" value="Zurücksetzen"/></td>
                            <td><input type="submit" name="sent" value="Weiter"/></td>
                        </tr>
                    </tbody>
                </table>
            </div>
          <small>*Pflichtangaben</small>  
        </fieldset>
    </form>
</div>