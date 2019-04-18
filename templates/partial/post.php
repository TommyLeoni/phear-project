<?php
    $userPost = $userRepo->readByID($post->uid_FK);
    $default = "https://de.gravatar.com/userimage/";
    $size = 50;
    $grav_url = "https://www.gravatar.com/avatar/" . md5(strtolower(trim($userPost->email))) . "?d=" . urlencode($default) . "&s=" . $size;

    if (!@GetImageSize($grav_url)) {
        $grav_url = "https://en.gravatar.com/userimage/155142028/3feda8a9ec892e6fd113d870ffe6184e.jpeg";
    }
?>


    

    <div class="container shadow-bg">
        <div class="row text-left">
            <div class="col-xs-1 col-sm-1 col-md-1" style="padding-right: 40px;">
                <img src="<?= $grav_url; ?>" width="50" height="50" alt="Profilbild">
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 name-of-user-place">
                <h6 class="align-middle name-of-user-post"><?= $userPost->name; ?></h6>
                <h6 class="text-muted">@<?= $userPost->username; ?></h6>
            </div>
        </div>
        <div class="post-container text-left">
            <p><?= $post->post; ?></p>
        </div>
        <div class="col-sm">
            <form method="post" action="/user/deletePost">
                <input type="hidden" name="postid" value="<?= $post->pid; ?>">
                <?php
                if($_SESSION['username']==$userPost->username){ 
                    echo "<input class='btn btn-secondary' value='Löschen' type='submit'/>";
                }
                ?>
            </form> 
        </div>
    </div>
    <?php
        $default = "https://de.gravatar.com/userimage/";
        $size = 50;
        $grav_url = "https://www.gravatar.com/avatar/" . md5(strtolower(trim($_SESSION['email']))) . "?d=" . urlencode($default) . "&s=" . $size;
    ?>