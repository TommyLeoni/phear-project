<!DOCTYPE html>
<html>

<head>
    <title><?=$title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/index.css" />
    <link rel="stylesheet" href="/css/post.css" />
    <link rel="stylesheet" href="/css/header.css" />
    <link rel="stylesheet" href="/css/footer.css" />

</head>

<body>
    <nav class="main-header navbar navbar-expand-lg navbar-light be-o" style="background-color: #4cf76e;">
        <a class='navbar-brand' href="<?php if (isset($_SESSION['isLoggedIn'])) {
    echo '/user/index';
}?>"><img src="/images/pear.png" width='30' height='30' alt='pear-logo' /></a>
        <a class='navbar-brand' href="<?php if (isset($_SESSION['isLoggedIn'])) {
    echo '/user/index';
}?>">Phear</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php if (isset($_SESSION['isLoggedIn'])) {
    echo '/user/index';
}?>">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php if (isset($_SESSION['isLoggedIn'])) {
    echo '/user/edit';
}?>">Edit</a>
                </li>
            </ul>
            <a class="text-right login-link" href="<?php if (isset($_SESSION['isLoggedIn'])) {
    echo '/user/logout';
}?>"><?php if (isset($_SESSION['isLoggedIn'])) {
    echo "Log out";
}?></a>
        </div>
    </nav>