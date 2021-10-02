<?php
require_once 'inc/header.php';
?>
<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register']))
{
    global $con;
    $user_name = safe_value($con, $_POST['user_name']);
    $user_email = safe_value($con, $_POST['user_email']);
    $time = date('y-m-d');
    $user_password= safe_value($con, $_POST['user_password']);
    $hash = password_hash($user_password, PASSWORD_BCRYPT);
    $u_id = rand(111111,999999);

    if (empty($user_name) || empty($user_email) || empty($user_password))
    {
        set_message(display_war("Please Fill Username And Password"));
    }
    else
    {
        $sql = "SELECT * FROM `users` WHERE user_email='$user_email'";
        $check = mysqli_query($con,$sql);

        if (mysqli_fetch_assoc($check))
        {
            set_message(display_error("Email Already Exist. Enter A New Email"));
        }
        else
        {
            $query = "INSERT INTO `users`(`u_id`,`user_name`, `user_email`, `user_password`) VALUES ('$u_id','$user_name', '$user_email', '$hash')";
            $result = mysqli_query($con,$query);
            if($result)
            {
                set_message(display_success("Account create successful "));
            }
            else
            {
                set_message(display_error("Enter A New Email"));

            }
        }
    }
}





?>


<link rel='stylesheet' href='front/css/style.min.css' />


<div class="auth">
    <div class="container">
        <div class="auth__inner">
            <div class="auth__media">
                <img src="front/images/undraw_selfie.svg">
            </div>
            <div class="auth__auth">
                <h1 class="auth__title">Creat your account</h1>

                <form method='post'   role="presentation" class="form">
                    <label>User Name</label>
                    <input class="form-control" type="text" placeholder="your name" name="user_name" required>

                    <input name="email" class="fakefield">
                    <label>Email</label>
                    <input class="form-control" type="email" placeholder="you@example.com" name="user_email" required>

                    <label>Password</label>
                    <input class="form-control" type="password"  minlength="8" data-msg="Please enter at least 6 chars"  name="user_password" required placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" >

                    <div class="col-lg-12 text-center mt-">
                        <button type='submit' class="mt-2 button button__accent"  name="register" >Register</button>
                    </div>
                    <div class="col-lg-12 text-center mt-">
                        Already have an account? <a href="login.php" class="text-info">Log in</a>
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



