<?php
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


function user_login()
{
    if( isset($_POST['btn_login']))
    {
        global $con;
        $user_email = safe_value($con, $_POST['user_email']);
        $user_password= safe_value($con, $_POST['user_password']);

        if (empty($user_email) || empty($user_password))
        {
            set_message(display_war("Please Fill Username And Password"));
        }
        else
        {

            $email_ck = "SELECT * FROM `users` WHERE user_email='$user_email'";
            $query = mysqli_query($con, $email_ck);

            $count=(mysqli_num_rows($query));
            if($count>0)
            {
                while ($row= mysqli_fetch_assoc($query))
                {
                    if (password_verify($user_password,$row['user_password']))
                    {
                        $_SESSION['USER_NAME']= $row['user_name'];
                        $_SESSION['USER_ID']= $row['user_id'];
                        $_SESSION['U_ID']= $row['u_id'];
                        header("location: ./dashboard.php");
                        die();
                    }
                    else
                    {
                        set_message(display_error("Password Incorrect"));
                    }
                }
            }
            else
            {
                set_message(display_error("Invalid Email"));
            }
        }

    }
}

function user_dtls()
{
    $user_id =   $_SESSION['USER_ID'] ;
    global $con;
    $sql = "SELECT * FROM `users` WHERE user_id='$user_id'";
    return  mysqli_query($con,$sql);

}

?>



