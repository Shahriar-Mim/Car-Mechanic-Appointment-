
<?php require_once 'inc/header.php';
user_login();
?>

<link rel='stylesheet' href='front/css/style.min.css' />


<div class="auth">
    <div class="container">
        <div class="auth__inner">
            <div class="auth__media">
                <img src="front/images/undraw_selfie.svg">
            </div>
            <div class="auth__auth">
                <h1 class="auth__title">Access your account</h1>
                <p>Fill in your email and password to proceed</p>
                <form method='post'   role="presentation" class="form">
                    <input name="email" class="fakefield">
                    <label>Email</label>
                    <input type="email"  id='email' placeholder="you@example.com" name="user_email" required>
                    <label>Password</label>
                    <input type="password"  id='password' name="user_password" required placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" >
                    <div class="col-lg-12 text-center mt-">
                        <button type='submit' class="mt-2 button button__accent" name="btn_login" >Log in</button>
                    </div>
                    <div class="col-lg-12 text-center mt-">
                        Don't have an account? <a href="register.php" class="text-info">Create Account</a>
                    </div>
                    <div class="col-lg-12 mt-3">
                        <?php display_message();?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?php require_once 'inc/footer.php'?>