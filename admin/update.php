<?php require_once 'inc/header.php' ?>
<?php require_once 'inc/nav.php' ?>
<?php require_once 'inc/sidebar.php' ?>
<?php
global $con;
if (isset($_GET['application_id']))
{
    $id = safe_value($con,$_GET['application_id']);
    $query = mysqli_query($con, "SELECT * FROM `applications` WHERE id='$id' ");
    if ($row = mysqli_fetch_assoc($query))
    {
        $date = $row['appointment_date'];
        $name = $row['mechanics_name'];

    }
}
if(isset($_POST['assigned']))
{
    $new_date   = safe_value($con,$_POST['date'])   ;
    $new_name   = safe_value($con,$_POST['name'])   ;

    $sql = mysqli_query($con, "UPDATE `applications` SET mechanics_name='$new_name',appointment_date='$new_date', status=1 WHERE id='$id'");
    if ($sql)
    {
        header("location: dashboard.php");
    }
    else
    {
        set_message(display_error('error'));
    }
}
?>
<div class="body">
    <?php display_message(); ?>
</div>

<div class="card">
    <div class="body">
        <div class="table-responsive">
            <div class="inbox-body">
                <form method="POST">
                    <div class="modal-body" >
                        <div class="form-group">
                            <label>Select Mechanics</label>
                            <select name="name"  class="form-control" required>
                                <option selected>Select Someone</option>
                                <?php
                                global $con;
                                $sql = mysqli_query($con,"SELECT * FROM `mechanics` WHERE status =1");
                                while ($row = mysqli_fetch_assoc($sql))
                                {
                                    ?>
                                    <option value="<?php echo $row['name'] ?>" ><?php echo $row['name'] ?></option>
                                    <?php
                                }
                                ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <label >Appointment date</label>
                            <input type="date" name="date" class="form-control" value="<?php echo $date?>" >
                        </div>
                    </div>
                    <div class="modal-footer " >
                        <button type="submit" class="btn waves-effect waves-light btn-block btn-cyan" name="assigned">assigned</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php require_once 'inc/footer.php' ?>


