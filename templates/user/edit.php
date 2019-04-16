<!DOCTYPE html>
<html>

<head>
    <title> <?=$title;?> </title>
    <link rel="stylesheet" href="/css/edit.css" />
</head>

<body>
    <div class="container" >
        <form method="POST">
            <div>
                <button type="button" size="auto" src="#Profilbild"></button>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-4">
                    <h1>Benutzername</h1>
                </div>
                <div class="col-xs-12 col-sm-8 middle">
                    <input type="text" >
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-4 ">
                    <h1>Email</h1>
                </div>
                <div class="col-xs-12 col-sm-8 middle">
                    <input type="email">
                </div>
            </div>
            <div class="row ">
                <div class="col-xs-6 col-sm-4 ">
                    <h1>Geburtsdatum</h1>
                </div>
                <div class="col-xs-12 col-sm-8 middle">
                    <input type="date">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-4 ">
                    <h1>Bio</h1>
                </div>
                <div class="col-xs-12 col-sm-8 middle">
                    <textarea></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-4 ">
                    <h1>Passwort</h1>
                </div>
                <div class="col-xs-12 col-sm-8 middle">
                    <input type="password">
                </div>
            </div>
            <div>
                <input type="submit" value="Ändern" class="btn btn-light middle">
            </div>
        </form>
    </div>
</body>

</html>