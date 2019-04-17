<!DOCTYPE html>
<html>

<head>
    <title><?=$title;?></title>
    <link rel="stylesheet" href="/css/index.css" />
</head>

<body>
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-xs-5 col-sm-2 col-md-3 be-l">
                <div class="profile-bg">
                    <img id="profile-pic" src="/images/profile-pic.jpeg" class="img-fluid" alt="Your profile picture" />
                    <h3 class="text-left name-of-user"><?= $_SESSION['name']; ?></h3>
                    <h6 class="text-left username text-muted">@<?= $_SESSION['username']; ?></h6>
                    <h6 class="text-left bday text-muted"><?= $_SESSION['gebDat']; ?></h6>
                    <p class="text-left bio"><?= $_SESSION['bio']; ?></p>
                    <div class="row text-left">
                        <div class="col-sm-3">
                            <a href="/user/edit"><button  class="btn btn-secondary">Edit</button></a>
                        </div>
                        <div class="col-sm">
                            <form id="logout-btn" action="/user/logout">
                                <button class="btn btn-secondary" type="submit">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-10 col-sm-4 col-md-6 be-m">
                <?php
                    foreach ($posts as $post) {
                        require '../templates/partial/post.php';
                    }
                ?>
            </div>
            <div class="col-xs-5 col-sm-2 col-md-3 be-r">
                <div class="profile-bg">
                    <form action="" method="post">
                        <div class="createpost">
                            <div>
                                <div class="Create-of-Post">
                                    Create Post
                                </div>
                                <div>
                                    <img style="border-radius: 50%;" src="/images/profile-pic.jpeg"
                                        class="shadow img-fluid" alt="Your profile picture" />
                                    <label class="username">@<?=$username;?></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control textarea1" id="comment"
                                    Placeholder="Tippe hier den Post ein" name="post"></textarea>
                            </div>
                            <div id="container">
                                <button class="btn btn-secondary" type="submit">Phearen</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>