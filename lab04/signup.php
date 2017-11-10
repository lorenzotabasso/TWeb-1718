<?php include("top.html"); ?>

<?php
/**
 * Author: Lorenzo Tabasso, st159210, st159210@educ.di.unito.it
 * Esercizio:
 * Corso: TWeb 2017-2018
 * Descrizione: una pagina contenente un form che l'utente può compilare per richiedere la registrazione di un nuovo account.
 * Contenuto:
 */
?>

<form action="signup-submit.php" method="post" enctype="multipart/form-data">
    <fieldset>
        <ul>
            <li>
                <label>
                    Name: <input type="text" name="name" size="10" maxlength="8">
                </label>
            </li>
            <li>
                <label>
                    Gender:
                    <input type="radio" name="gender" value="Male"> Male
                    <input type="radio" name="gender" value="Female" checked="checked"> Female
                </label>
            </li>
            <li>
                <label>
                    Age: <input type="text" name="age" size="6" maxlength="2">
                </label>
            </li>
            <li>
                <label>
                    Personality Type: <input type="text" name="personality" size="6" maxlength="4">
                    (<a href="http://www.humanmetrics.com/cgi-win/JTypes2.asp">Don't know your type?</a>)
                </label>
            </li>
            <li>
                <label>
                    Favorite OS:
                    <select name="favoriteOS">
                        <option>Windows</option>
                        <option>Mac OS X</option>
                        <option selected="selected">Linux</option>
                    </select>
                </label>
            </li>
            <li>
                <label>
                    Seeking Age:
                    <textarea rows="1" cols="6" name="fromAge" maxlength="2"> Age </textarea> to
                    <textarea rows="1" cols="6" name="toAge" maxlength="2"> Age </textarea>
                </label>
            </li>
            <li>
                <label>
                    <input type="submit" value="Sign Up">
                </label>
            </li>
        </ul>
    </fieldset>
</form>

<?php include("bottom.html"); ?>