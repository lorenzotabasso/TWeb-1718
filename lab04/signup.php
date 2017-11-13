<?php include("top.html"); ?>

<?php
/**
 * Authore: Lorenzo Tabasso, st159210, st159210@educ.di.unito.it
 * Esercizio: lab04
 * Corso: TWeb 2017-2018
 * Descrizione: una pagina contenente un form che l'utente può compilare per richiedere la registrazione di un nuovo account.
 */
?>

<form action="signup-submit.php" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>New User Signup:</legend>
        <ul>
            <li> <!-- TODO: togliere LABEL (tranne checkbox)-->
                <strong>Name:</strong> <input type="text" name="name" size="10" maxlength="8">
            </li>
            <li>
                <label>
                    <strong>Gender:</strong>
                    <input type="radio" name="gender" value="Male"> Male
                    <input type="radio" name="gender" value="Female" checked="checked"> Female
                </label>
            </li>
            <li>
                <strong>Age:</strong> <input type="text" name="age" size="6" maxlength="2">
            </li>
            <li>
                <strong>Personality Type:</strong> <input type="text" name="personality" size="6" maxlength="4">
                (<a href="http://www.humanmetrics.com/cgi-win/JTypes2.asp">Don't know your type?</a>)
            </li>
            <li>
                <label>
                    <strong>Favorite OS:</strong>
                    <select name="favoriteOS">
                        <option>Windows</option>
                        <option>Mac OS X</option>
                        <option selected="selected">Linux</option>
                    </select>
                </label>
            </li>
            <li>
                <strong>Seeking Age:</strong>
                <input type="text" name="minAge" size="6" maxlength="2" placeholder="min"> to
                <input type="text" name="maxAge" size="6" maxlength="2" placeholder="max">
            </li>
            <li>
                <input type="submit" value="Sign Up">
            </li>
        </ul>
    </fieldset>
</form>

<?php include("bottom.html"); ?>