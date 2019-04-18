<!DOCTYPE html>
<html>
<?php require './../templates/partial/validator.php'; require './../templates/partial/profile-pic-getter.php' ?>
<head>
    <title> <?=$title;?> </title>
    <link rel="stylesheet" href="/css/edit.css" />
</head>

<body>

    <!-- Stellt das Profilbild des Benutzers gross dar -->
    <div class="container text-center">
        <div class="row justify-content-md-center">
            <div class="col-md-8 edit-bg">
                <div class="form-group">
                    <div>
                        <img id="profile-pic" src="<?= $grav_url; ?>" alt="#">
                    </div>
                    <a href="https://de.gravatar.com/site/login/"><button class="btn text-primary">Profilbild
                            ändern</button></a>
                </div>

                <!-- Wird kein Passwort angegebn, wird eine Warnung angezeigt -->
                <?php 
                if (isset($_SESSION['cannotEdit'])) {
                    echo '<h4 class="text-danger">You must input or change your password!</h4>';
                    unset($_SESSION['cannotEdit']);
                } elseif (isset($_SESSION['falseEmail'])) {
                    echo '<h4 class="text-danger">Your email is not valid!</h4>';
                    unset($_SESSION['falseEmail']);
                } else {
                    echo "<br />";
                }
                ?>

                <!-- Form zum Bearbeiten des Profils -->
                <form method="post" action="update">
                    <div class="form-group text-left">

                        <!-- Feld für den Benutzernamen -->
                        <label for="exampleInputUsername1" class="titles1">Username</label>
                        <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            value="<?= $_SESSION['username'];?>"><br />
                    </div>
                    <div class="form-group text-left">

                        <!-- Feld für den namen -->
                        <label for="exampleInputName1" class="titles1">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            value="<?= $_SESSION['name']; ?>"><br />
                    </text-leftv>
                    <div class="form-group text-left">

                        <!-- Feld für die Email-Adresse -->
                        <label for="exampleInputEmail1" class="titles1">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            value="<?= $_SESSION['email']; ?>"><br />
                    </text-leftv>
                    <div class="form-group text-left">
                        
                        <!-- Feld für den Geburtstag -->
                        <label class="titles1">Geburtsdatum</label>

                        <!-- Bemerkung: type="text" weil keine Lösung zum Konvertieren der Ausgabe aus $_SESSION in 'date' gefunden wurde -->
                        <input type="text" name="gebDat" class="form-control" id="exampleInputDate"
                            value="<?= $_SESSION['gebDat']; ?>"><br />
                    </text-leftv>
                    <div class="form-group text-left">

                        <!-- Feld für die Biographie -->
                        <label class="titles1">Informationen über dich</label>
                        <textarea id="textarea-full" name="bio"><?= $_SESSION['bio']; ?></textarea><br />
                    </div>
                    <div class="form-group text-left">

                        <!-- Feld für das Passwort -->
                        <label for="exampleInputPassword1" class="titles1">Password</label>
                        <input type="password" name="passwort" class="form-control" id="exampleInputPassword1"
                            placeholder="Enter your password to edit"><br />
                    </div>

                    <!-- Schliesst das Form ab -->
                    <button type="submit" class="btn btn-primary">Ändern</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>