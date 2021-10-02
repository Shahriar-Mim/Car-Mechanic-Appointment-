<?php

function pr($arr)
{
echo '<pre>';
print_r($arr);
}
function prx($arr)
{
    echo '<pre>';
    print_r($arr);
}


// set session message
function set_message($msg)
{
    if(!empty($msg))
    {
        $_SESSION['MESSAGE']=$msg;
    }
    else
    {
        $msg ="";
    }
}
// Display message
function display_message()
{
    if(isset($_SESSION['MESSAGE']))
    {
        echo $_SESSION['MESSAGE'];
        unset($_SESSION['MESSAGE']);
    }
}
// Error Message
function display_error($error)
{
    return "<div class='alert alert-danger text-center'>$error</div>";
}
// warning Message
function display_war($warning)
{
    return "<div class='alert alert-warning text-center'>$warning</div>";
}
// success Message
function display_success($success)
{
    return "<div class='alert alert-success text-center'>$success</div>";
}
// get safe value
function safe_value($con,$value)
{
    if ($value!='')
    {
        return mysqli_real_escape_string($con,$value);
    }
}


// Login Checking
function login_system()
{
   if(isset($_POST['login']))
    {
        global $con;
        $user_email = safe_value($con, $_POST['username']);
        $user_password= safe_value($con, $_POST['password']);

        if (empty($user_email) || empty($user_password))
        {
            set_message(display_war("Please Fill Username And Password"));
        }
        else
        {

            $email_ck = "SELECT * FROM `admin` WHERE username='$user_email'";
            $query = mysqli_query($con, $email_ck);

            $count=(mysqli_num_rows($query));
            if($count)
            {
                $password_ck = "SELECT * FROM `admin` WHERE password='$user_password'";
                $query1 = mysqli_query($con, $password_ck);

                $password=(mysqli_num_rows($query1));
                if($password)
                {
                    $user_name = mysqli_fetch_assoc($query);

                    $_SESSION['ADMIN_USERNAME']= $user_name['username'] ;
                    header("location: ./dashboard.php");
                    die();
                }
                else
                {
                    set_message(display_error("Password Incorrect"));
                }

            }
            else
            {
                set_message(display_error("Invalid Username"));
            }
        }

    }
}
?>

