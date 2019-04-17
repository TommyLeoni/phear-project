<head>
    <link rel="stylesheet" href="/css/post.css">
</head>
<body>
    <div class="container shadow-bg">
        <div class="row text-left">
            <div class="col-xs-1 col-sm-1 col-md-1">
                <img src="/images/thinking.png" width="50" height="50">
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 name-of-user-place">
                <h6 class="align-middle name-of-user-post">The user's name</h6>
                <h6 class="text-muted">@Username</h6>
            </div>
        </div>
        <div class="post-container text-left">
            <p><?= $post->post; ?></p>
        </div>
    </div>
</body>

