<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/css/login.css" />
    <title>Register</title>
</head>

<body>
    <div class="container text-center">
        <div class="login-bg">
            <img id="login-pic" src="/images/pear.png" class="img-fluid rounded-circle" alt="login image">
            <h3 id="welcoming-text">Welcome to Phear! Fancy having a go?</h3>
            <form method="POST" action="/user/doRegistration">
                <div class="form-group row justify-content-md-center">
                    <div class="col-md-8 col-xl-8 col-xs-8">
                        <div class="form-group row justify-content-md-left">
                            <div class="col-md-12 col-xl-12 col-xs-12">
                                <div class="text-left">
                                    <?php
                                        if(isset($_SESSION['falseEmail']) && $_SESSION['falseEmail'] == true)
                                        { 
                                            echo '<label class="text-danger">Email Address not valid!</label>';
                                            unset($_SESSION['falseEmail']);
                                        } else {
                                            echo '<label>Email Address</label>';
                                        }
                                    ?>
                                <input name="email" type="email" class="form-control"
                                    placeholder="Enter your email">
                                <small class="text-muted"><strong>Note: </strong>If you do not want to share your email, you can instead use your username for identification purposes.</small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-left">
                            <div class="col-md-12 col-xl-12 col-xs-12">
                                <div class="text-left">
                                    <label>Name</label>
                                <input name="name" type="text" class="form-control"
                                    placeholder="Enter your name">
                                <small class="text-muted"><strong>Note: </strong>If you do not want to share your actual name, your username will serve as your name for this site.</small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-left">
                            <div class="col-md-12 col-xl-12 col-xs-12">
                                <div class="text-left">
                                    <?php
                                        if(isset($_SESSION['usernameTaken']))
                                        { 
                                            echo '<label class="text-danger">Username taken!</label>';
                                            unset($_SESSION['usernameTaken']);
                                        } else {
                                            echo '<label>Username</label>';
                                        }
                                    ?>
                                </div>
                                <input name="username" type="text" class="form-control"
                                    placeholder="Enter a username of choice">
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-left">
                            <div class="col-md-12 col-xl-12 col-xs-12">
                                <div class="text-left">
                                    <label>Date of birth (optional)</label>
                                </div>
                                <input name="bday" type="date" class="form-control"
                                    placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-left">
                            <div class="col-md-12 col-xl-12 col-xs-12">
                                <div class="text-left">
                                    <label>Password</label>
                                </div>
                                <input name="password" type="password" class="form-control"
                                    placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-left">
                            <div class="col-md-12 col-xl-12 col-xs-12">
                                <div class="text-left">
                                    <label>Repeat password</label>
                                </div>
                                <input name="password2" type="password" class="form-control"
                                    placeholder="Password">
                            </div>
                        </div>
                        <br />
                        <input type="submit" class="btn btn-success" value="Register">
                        <a href="/user/login"><p class="text-primary register-link"><u>Have an account? Log in here</u></p></a>
            </form>
        </div>
    </div>
</body>

</html>