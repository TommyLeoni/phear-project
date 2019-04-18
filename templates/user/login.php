<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/css/login.css" />
    <title>Log in</title>
</head>

<body>
    <!-- DatePicker für das Geburtsdatum -->
    <div class="container text-center">
        <div class="login-bg">
            <!-- Phear Logo oberhald des Forms -->
            <img id="login-pic" src="/images/pear.png" class="img-fluid rounded-circle" alt="login image">
            <h3 id="welcoming-text">Welcome back to Phear!</h3>
            <!-- Meldet falls das Passwort / die Benutzerdaten falsch ist -->
            <?php
                if (isset($_SESSION['wrongLogin']) && $_SESSION['wrongLogin'] == true) {
                    echo "<h6 style='color: red;'>Credentials Incorrect!</h6>";
                    $_SESSION['wrongLogin'] = false;
                } elseif (isset($_SESSION['wrongPassword']) && $_SESSION['wrongPassword'] == true) {
                    echo "<h6 style='color: red;'>Password Incorrect!</h6>";
                    $_SESSION['wrongPassword'] = false;
                } else {
                    echo "<br />";
                }
            ?>
            <!-- Form zum Anmelden -->
            <form method="POST" action="/user/doLogin">
                <div class="form-group row justify-content-md-center">
                    <div class="col-md-8 col-xl-8 col-xs-8">
                        <!-- Textfeld für die Email oder Benutzernamen -->
                        <div class="text-left">
                            <label for="exampleInputEmail1">Email address or username</label>
                            <div>
                                <input name="identifier" type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter email or username"><br />
                            </div>
                        </div>
                        <!-- Passwortfeld für das Passwort -->
                        <div class="form-group row justify-content-md-left">
                            <div class="col-md-12 col-xl-12 col-xs-12">
                                <div class="text-left">
                                    <label for="exampleInputPassword1">Password</label>
                                </div>
                                <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                                    placeholder="Password">
                            </div>
                        </div>
                        <br />
                        <!-- Verlinkung zur Registrierungs-Seite -->
                        <input type="submit" class="btn btn-success login-btn" value="Log in">
                        <a href="/user/register"><p class="text-primary register-link"><u>Don't have an account? Register here</u></p></a>
            </form>
        </div>
    </div>
</body>

</html>