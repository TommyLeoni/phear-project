<!DOCTYPE html>
<html>

<head>
    <title> <?=$title;?> </title>
    <link rel="stylesheet" href="/css/edit.css" />
</head>

<body>
    <div class="container-fluid text-center">
        <div class="row justify-content-md-center">
            <div class="col-md-6 profile-bg">
                <div class="form-group full">
                    <div>
                        <img id="profile-pic" src="/images/profile-pic.jpeg" alt="#">
                    </div>
                   <a href="https://de.gravatar.com/site/login/"><button class="btn bluecolor">Profilbild ändern</button></a>
                </div>
                <form method="post" action="user/edit">
                <div class="form-group full">
                    <label for="exampleInputUsername1" class="titles1">Username</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="<?= $_SESSION['username'];?>">
                </div>
                <div class="form-group full">
                    <label for="exampleInputName1" class="titles1">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="<?= $_SESSION['name']; ?>">
                </div>
                <div class="form-group full">
                    <label for="exampleInputEmail1" class="titles1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="<?= $_SESSION['email']; ?>">
                </div>
                <div class="form-group full">
                    <label class="titles1">Geburtsdatum</label>
                    <input type="text" class="form-control" id="exampleInputDate" placeholder="<?= $_SESSION['gebDat']; ?>">
                </div>
                <div class="form-group full">
                    <label class="titles1">Informationen über dich</label>
                    <textarea id="textarea1" placeholder="<?= $_SESSION['bio']; ?>"></textarea>
                </div>
                <div class="form-group full">
                    <label for="exampleInputPassword1" class="titles1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Ändern</button>
            </div>
        </form>
</div>
    </div>
</body>

</html>