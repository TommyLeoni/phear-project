<?php
    $userPost = $userRepo->readByID($post->uid_FK);
    $default = "https://de.gravatar.com/userimage/";
    $size = 50;
    $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $userPost->email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
?>
<head>
    <link rel="stylesheet" href="/css/post.css">
</head>
<body>
    <div class="container shadow-bg">
        <div class="row text-left">
            <div class="col-xs-1 col-sm-1 col-md-1">
                <img src='<?= $grav_url; ?>' width="50" height="50">
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 name-of-user-place">
                <h6 class="align-middle name-of-user-post"><?= $userPost->name; ?></h6>
                <h6 class="text-muted">@<?= $userPost->username; ?></h6>
            </div>
        </div>
        <div class="post-container text-left">
            <p><?= $post->post; ?></p>
        </div>
    </div>
    <?php
        $default = "https://de.gravatar.com/userimage/";
        $size = 50;
        $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $_SESSION['email'] ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
    ?>
</body>

