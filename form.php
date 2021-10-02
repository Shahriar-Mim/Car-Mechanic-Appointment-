<?php require_once 'inc/header.php'?>
<?php require_once 'inc/nav.php'?>
<?php require_once 'inc/sidebar.php'?>

<?php
global $con;
if (isset($_GET['mechanics_name']))
{
    $mechanics_name = safe_value($con,$_GET['mechanics_name']);
}
if (isset($_POST['form']))
{
    $u_id = $_SESSION['U_ID'];
    $date            = safe_value($con,$_POST['date'])              ;
    $name            = safe_value($con,$_POST['name'])              ;
    $phone           = safe_value($con,$_POST['phone'])             ;
    $address         = safe_value($con,$_POST['address'])           ;
    $license_number  = safe_value($con,$_POST['license_number'])    ;
    $engine_number   = safe_value($con,$_POST['engine_number'])     ;

    $sql = mysqli_query($con,"INSERT INTO `applications`( `u_id`, `mechanics_name`, `user_name`, `phone`, `address`, `license_number`, `engine_number`, `appointment_date`, `status`) VALUES ('$u_id','$mechanics_name','$name','$phone','$address','$license_number','$engine_number','$date',0)");
    {
        if ($sql)
        {
            header("location: dashboard.php");
        }
    }

}

?>
<div class="card">
    <div class="body">
        <div class="card-header text-center bg-cyan text-white">
            <strong>Mechanic list</strong>
        </div>
        <div class="table-responsive">
            <div class="inbox-body">
                <form method="POST">
                    <div class="modal-body" >
                        <div class="form-group  " >
                            <label >Your name</label>
                            <div class="input-group-prepend" >
                                <input type="text"  name="name" class="form-control" value="<?php echo $_SESSION['USER_NAME']; ?>"  required >
                            </div>
                        </div>
                        <div class="form-group  " >
                            <label >Your Address</label>
                            <input type="text"  name="address" class="form-control" required >
                        </div>
                        <div class="form-group  " >
                            <label >Phone</label>
                            <input type="number" id="phone" name="phone" class="form-control"   required >

                        </div>
                        <div class="form-group  " >
                            <label >Car License number</label>
                            <input type="text" name="license_number" class="form-control" required >
                        </div>
                        <div class="form-group  " >
                            <label >Car Engine Number</label>
                            <input type="text"  name="engine_number" class="form-control"  placeholder="Car Engine Number" required >
                        </div>
                        <div class="form-group">
                            <label >Appointment date</label>
                            <input type="date" name="date" class="form-control" >
                        </div>
                    </div>
                    <div class="modal-footer " >
                        <button type="submit" class="btn waves-effect waves-light btn-block btn-cyan" name="form">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once 'inc/footer.php'?>
