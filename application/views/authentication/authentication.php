<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url()?>/public/css/authenticate.css">
    <link rel="stylesheet" href="<?= base_url()?>/public/css/toast.css">
    <script src="<?= base_url()?>/public/js/toast.js"></script>
    <title>Authenticate</title>
</head>
<body>
<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form action="<?= base_url('register') ?>" method="post" autocomplete="off">
            <h1>Create Account</h1>
            <input type="text" placeholder="First name" name='firstname'  />
            <input type="text" placeholder="Last name" name='lastname' />
            <input type="text" placeholder="Email" name='email' />
            <input type="password" placeholder="Password" name='password' />
            <input type="password" placeholder="Confirm password" name='c_password' />
            <button>Sign Up</button>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <!-- Sign In form code goes here -->
        <form action="<?= base_url('connect') ?>"  method="post" autocomplete="off">
            <h1>Sign in</h1>
            <input type="email" placeholder="Email" name='email' />
            <input type="password" placeholder="Password" name='password' />
            <a href="#">Forgot your password?</a>
            <button>Sign In</button>
        </form>
    </div>
    <div class="overlay-container">
    <div class="overlay">
        <div class="overlay-panel overlay-left">
            <h1>Welcome Back!</h1>
            <p>
                Please login with your personal info
            </p>
            <button class="ghost" id="signIn">Sign In</button>
        </div>
        <div class="overlay-panel overlay-right">
            <h1>Hello, Friend!</h1>
            <p>Enter your personal details and start journey with us</p>
            <button class="ghost" id="signUp">Sign Up</button>
        </div>
    </div>
    </div>
</div>

    <?php
    if($error == "0"){
        ?>
            <div id="snackbar" style="background-color: red;">Wrong email address</div>
            <script>myFunction()</script>
        <?php
    }else if($error == "1"){
        ?>
            <div id="snackbar" style="background-color: red;">Password required at least 8 character</div>
            <script>myFunction()</script>
        <?php
    }else if($error == "2"){
        ?>
            <div id="snackbar" style="background-color: red;">The two password are not the same</div>
            <script>myFunction()</script>
        <?php
    }else if($error == "3"){
        ?>
            <div id="snackbar" style="background-color: red;">Wrong email or password</div>
            <script>myFunction()</script>
        <?php
    }
        ?>
      
<script src="<?= base_url()?>/public/js/authenticate.js"></script>

</body>
</html>