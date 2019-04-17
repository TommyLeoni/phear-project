<!DOCTYPE html>
<html>

<head>
    <title> <?=$title;?> </title>
    <link rel="stylesheet" href="/css/edit.css" />
</head>

<body>
    <div class="container-fluid text-center">
        <form class="row justify-content-md-center">
            <div class="col-md-6 profile-bg">
                <div class="form-group full">
                    <div>
                        <img id="profile-pic" src="/images/profile-pic.jpeg" alt="#">
                    </div>
                    <button name="Profilbildupdate" class="btn bluecolor">Profilbild ändern</button>
                </div>
                <div class="form-group full">
                    <label for="exampleInputUsername1" class="titles1">Username</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Username">
                </div>
                <div class="form-group full">
                    <label for="exampleInputName1" class="titles1">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Name">
                </div>
                <div class="form-group full">
                    <label for="exampleInputEmail1" class="titles1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Email">
                </div>
                <div class="form-group full">
                    <label class="titles1">Geburtsdatum</label>
                    <input type="date" class="form-control" id="exampleInputDate">
                </div>
                <div class="form-group full">
                    <label class="titles1">Informationen über dich</label>
                    <textarea id="textarea1" placeholder="Bio"></textarea>
                </div>
                <div class="form-group full">
                    <label for="exampleInputPassword1" class="titles1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Ändern</button>
            </div>
        </form>
    </div>
</body>

</html>