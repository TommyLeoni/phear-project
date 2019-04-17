<!DOCTYPE html>
<html>
<?php
    use App\Repository\UserRepository;
    use App\Repository\PostRepository;

    $userRepo = new UserRepository();
    $postRepo = new PostRepository();
    
    $default = "https://de.gravatar.com/userimage/";
    $size = 50;
    $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $_SESSION['email'] ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
?>
<head>
    <title><?=$title;?></title>
    <link rel="stylesheet" href="/css/index.css" />
</head>

<body>
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-xs-5 col-sm-2 col-md-3 be-l">
                <div class="profile-bg">
                    <img id="profile-pic" src="<?= $grav_url; ?>" class="img-fluid" alt="Your profile picture" />
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
                        <div class="col-sm">
                            <form method="post" action="/user/delete">
                                <button class="btn btn-secondary " type="submit">Account löschen</button>
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
                <div class="create-post-bg text-left">
                    <form action="/user/newPost" method="post">
                        <div>
                            <div>
                                <div class="Create-of-Post">
                                    <h3>Create Post</h3>
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