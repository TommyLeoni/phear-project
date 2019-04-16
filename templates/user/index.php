<!DOCTYPE html>
<html>

<head>
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="/css/index.css" />
</head>

<body>
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-xs-5 col-sm-2 col-md-3">
                <div class="profile-bg">
                    <img id="profile-pic" src="/images/profile-pic.jpeg" class="img-fluid" alt="Your profile picture" />
                    <h3 class="text-left name-of-user"><?= $name; ?></h3>
                    <h6 class="text-left username text-muted">@<?= $username; ?></h6>
                    <h6 class="text-left bday text-muted"><?= $bday; ?></h6>
                    <p class="text-left bio">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has
                        been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                        galley of type and scrambled it to make a type specimen book.</p>
                    <div class="row text-left">
                        <div class="col-sm-3">
                            <button class="btn btn-secondary">Edit</button>
                        </div>
                        <div class="col-sm">
                            <form id="logout-btn" action="/user/login">
                                <button class="btn btn-secondary" type="submit">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-10 col-sm-4 col-md-6">
                TWO
            </div>
            <div class="col-xs-5 col-sm-2 col-md-3">
                THREE
            </div>
        </div>
    </div>
</body>

</html>