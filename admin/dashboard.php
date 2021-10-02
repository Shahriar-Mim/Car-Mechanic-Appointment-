<?php require_once 'inc/header.php'?>
<?php require_once 'inc/nav.php'?>
<?php require_once 'inc/sidebar.php'?>


<?php
if(isset($_POST['approve']))
{
    global $con;
    $id = safe_value($con, $_POST['approve']);
    $query = mysqli_query($con, "SELECT * FROM `applications` WHERE id='$id' ");
    if ($row = mysqli_fetch_assoc($query))
    {
        $name = $row['mechanics_name'];
        $query = mysqli_query($con, "SELECT * FROM `mechanics` WHERE `name`='$name' ");
        if ($row = mysqli_fetch_assoc($query))
        {
            $handle = $row['handle'];
            if ($handle <4)
            {
                $update_handle= $handle +1;
                echo $name;
                mysqli_query($con, "UPDATE `applications` SET status=1 WHERE id='$id'");
                $query =mysqli_query($con, "UPDATE `mechanics` SET handle='$update_handle' WHERE `name`='$name'");
                print_r($query);
                if ($query)
                {
                    header("location: dashboard.php");
                }
            }
            else
            {
                mysqli_query($con, "UPDATE `mechanics` SET status=0 WHERE `name`='$name'");
                set_message(display_error("Can't handle right now"));
            }
      }
    //     else
    //     {
    //         set_message(display_error("Handling"));
    //     }
 }
    // else
    // {
    //     set_message(display_error(" fool"));
    // }
}

if(isset($_POST['cancel']))
{
    global $con;
    $id = safe_value($con, $_POST['cancel']);
    $query = mysqli_query($con, "UPDATE `applications` SET status=2 WHERE id='$id'");
    if ($query) {
        header("location: dashboard.php");
    }
}
?>
<div class="body">
    <?php display_message(); ?>
</div>


<div class="body">
    <div class="card-header text-center bg-cyan text-white">
        <strong>Appointment list</strong>
    </div>
    <div class="table-responsive">
        <div class="inbox-body">
            <form method="post">
                <table class="table">
                    <thead class="bg-light">
                    <tr>
                        <th class="text-center">Client Name</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">Car License Number</th>
                        <th class="text-center">Appointment Date</th>
                        <th class="text-center">Mechanic name</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr >
                        <?php
                        global $con;
                        $sql = mysqli_query($con,"SELECT * FROM `applications` WHERE status=0");
                        while ($row = mysqli_fetch_assoc($sql))
                        {
                        ?>
                        <td class="text-center"><?php echo $row['user_name']; ?></td>
                        <td class="text-center"><?php echo $row['phone']; ?></td>
                        <td class="text-center"><?php echo $row['license_number']; ?></td>
                        <td class="text-center"><?php echo $row['appointment_date']; ?></td>
                        <td class="text-center"><?php echo $row['mechanics_name']; ?></td>
                        <th class="text-center btn-list text-center ">
                            <button value="<?php echo $row['id']; ?>" class='btn btn-success' type="submit" name='approve'>Approve</button>
                            <button value="<?php echo $row['id']; ?>" class='btn btn-danger' type="submit" name='cancel'>Decline</button>
                            <a href="update.php?application_id=<?php echo $row['id']; ?>" class='btn btn-primary'>Update</a>
                        </th>
                    </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>

<?php require_once 'inc/footer.php'?>
