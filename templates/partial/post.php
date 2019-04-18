<?php

    # Fügt für jeden Post den Ersteller des Posts in die Variable
    $userPost = $userRepo->readByID($post->uid_FK);

    # Ruft erneut das Profilbild ab, da bei jedem Post ein anderer Benutzer am Werk sein könnte
    $default = "https://de.gravatar.com/userimage/";
    $size = 50;
    $grav_url = "https://www.gravatar.com/avatar/" . md5(strtolower(trim($userPost->email))) . "?d=" . urlencode($default) . "&s=" . $size;

    if (!@GetImageSize($grav_url)) {
        $grav_url = "https://en.gravatar.com/userimage/155142028/3feda8a9ec892e6fd113d870ffe6184e.jpeg";
    }
?>
    <!-- Fügt alles in eine MaterialCard -->
    <div class="container shadow-bg">
        <div class="row text-left">

            <!-- Fügt Profilbild ein -->
            <div class="col-xs-1 col-sm-1 col-md-1" style="padding-right: 40px;">
                <img src="<?= $grav_url; ?>" width="50" height="50" alt="Profilbild">
            </div>

            <!-- Fügt Namen und Benutzernamen ein -->
            <div class="col-xs-8 col-sm-8 col-md-8 name-of-user-place">
                <h6 class="align-middle name-of-user-post"><?= $userPost->name; ?></h6>
                <h6 class="text-muted">@<?= $userPost->username; ?></h6>
            </div>
        </div>

        <!-- Fügt den Text des Posts eins -->
        <div class="post-container text-left">
            <p><?= $post->post; ?></p>
        </div>
        <div class="col-sm">

            <!-- Form zum Löschen des Posts -->
            <form method="post" action="/user/deletePost">
                <input type="hidden" name="postid" value="<?= $post->pid; ?>">
                
                <!-- Wurde der Post vom eingeloggten Benutzer erstellt, so wird die Möglichkeit zum Löschen gegeben -->
                <?php
                if($_SESSION['username']==$userPost->username){ 
                    echo "<input class='btn btn-secondary' value='Löschen' type='submit'/>";
                }
                ?>
            </form> 
        </div>
    </div>