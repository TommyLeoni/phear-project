<?php
    # Dient derm Darstellen und Kreieren von Posts
    use App\Repository\UserRepository;
    use App\Repository\PostRepository;
    $userRepo = new UserRepository();
    $postRepo = new PostRepository();

    # Ruft den Validator auf & holt das Profilbil des Benutzers von www.gravatar.com
    require './../templates/partial/validator.php'; require './../templates/partial/profile-pic-getter.php';
?>
<div class="col-xs-5 col-sm-2 col-md-3 be-l">

    <!-- MaterialCard für das Profil -->
    <div class="profile-bg">

        <!-- Verbindet Werte aus der Session mit dem Profil -->
        <img id="profile-pic" src="<?= $grav_url; ?>" class="img-fluid" alt="Your profile picture" />
        <h3 class="text-left name-of-user"><?= htmlentities($_SESSION['name']); ?></h3>
        <h6 class="text-left username text-muted">@<?= htmlentities($_SESSION['username']); ?></h6>
        <h6 class="text-left bday text-muted"><?= htmlentities($_SESSION['gebDat']); ?></h6>
        <p class="text-left bio"><?= htmlentities($_SESSION['bio']); ?></p>
        <div class="row text-left">

            <!-- Knopf zum Bearbeiten des Profils -->
            <div class="col-sm-3">
                <form action="/user/edit">
                    <button class="btn btn-secondary">Edit</button>
                </form>
            </div>

            <!-- Knopf zum Abmelden -->
            <div class="col-sm-4">
                <form id="logout-btn" action="/user/logout">
                    <button class="btn btn-secondary" type="submit">Logout</button>
                </form>
            </div>

            <!-- Knopf zum Löschen des Accounts -->
            <div class="col-sm-5">
                <form method="post" action="/user/delete">
                    <button class="btn btn-secondary " type="submit">Account löschen</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-xs-10 col-sm-4 col-md-6 be-m">

    <!-- Erstellt eine neue PostCard für jeden Post -->
    <?php
        foreach ($posts as $post) {
            require '../templates/partial/post.php';
        }
    ?>
</div>
<div class="col-xs-5 col-sm-2 col-md-3 be-r">
    <div class="create-post-bg text-left">

        <!-- Form zum Erstellen eines neuen Posts -->
        <form action="/user/newPost" method="post">
            <div>
                <div>
                    <div class="Create-of-Post">
                        <h3>Create Post</h3>
                    </div>
                </div>
                <div class="form-group">
                    <textarea class="form-control textarea1" id="comment" Placeholder="Tippe hier den Post ein"
                        name="post"></textarea>
                </div>
                <div id="container">
                    <button class="btn btn-secondary" type="submit">Phearen</button>
                </div>
            </div>
        </form>
    </div>
</div>