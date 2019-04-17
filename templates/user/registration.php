<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/css/registration.css" />
</head>

<body>
    <div class="container text-center">
        <div class="login-bg">
            <img id="login-pic" src="/images/pear.png" class="img-fluid rounded-circle" alt="login image">
            <h3 id="welcoming-text">Welcome to Phear! Fancy having a go?</h3>
            <form>
                <div class="form-group row justify-content-md-center">
                    <div class="col-md-8 col-xl-8 col-xs-8">
                        <div class="text-left">
                            <label for="exampleInputEmail1">Email address</label>
                            <div>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter email" name="email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                    anyone
                                    else.</small><br />
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-center">
                            <div class="col-md-12 col-xl-12 col-xs-12">
                                <div class="text-left">
                                    <label for="exampleInputUsername1">Username</label>
                                </div>
                                <input type="text" name="username" class="form-control" id="exampleInputUsername1"
                                    placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-center">
                            <div class="col-md-12 col-xl-12 col-xs-12">
                                <div class="text-left">
                                    <label for="exampleInputname1">name</label>
                                </div>
                                <input type="name" class="form-control" id="exampleInputname1"
                                    placeholder="name">
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-center">
                            <div class="col-md-12 col-xl-12 col-xs-12">
                                <div class="text-left">
                                    <label for="exampleInputGeburtsdatum1">Geburtsdatum</label>
                                </div>
                                <input type="text" name="geburtsdatum" class="form-control"
                                    id="exampleInputGeburtsdatum1" placeholder="Geburtsdatum">
                            </div>
                        </div>
                        <div class="form-group row justify-content-md-center">
                            <div class="col-md-12 col-xl-12 col-xs-12">
                                <div class="text-left">
                                    <label for="exampleInputPassword1">Password</label>
                                </div>
                                <input type="password" name="passwort" class="form-control" id="exampleInputPassword1"
                                    placeholder="Password">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Register</button>
            </form>
        </div>
    </div>
</body>

</html>