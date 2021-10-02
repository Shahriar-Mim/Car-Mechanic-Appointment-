
<?php require_once 'inc/header.php';
login_system();
?>



<div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
     style="background:url(assets/images/big/auth-bg.jpg) no-repeat center center;">
        <div class="col-md-3 bg-white">
            <div class="p-3">
                
                <h2 class="mt-3 text-center">Sign In</h2>
                <p class="text-center">Enter your email address and password to access admin panel.</p>
                <form class="mt-4" method="POST">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="text-dark">Username</label>
                                <input class="form-control" type="text" placeholder="enter your username" name="username" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="text-dark">Password</label>
                                <input class="form-control"  type="password" placeholder="enter your password" name="password" required>
                            </div>
                        </div>
                        <div class="col-lg-12 text-center">
                            <button class="btn btn-block btn-dark m-b-20" name="login">Login</button>
                        </div>
                        <div class="col-lg-12 text-center mt-3">
                            <?php display_message(); ?>
                        </div>

                    </div>
                </form>
            </div>
        </div>
</div>




<?php require_once 'inc/footer.php' ?>

