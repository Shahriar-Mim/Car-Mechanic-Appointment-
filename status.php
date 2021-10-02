<?php require_once 'inc/header.php'?>
<?php require_once 'inc/nav.php'?>
<?php require_once 'inc/sidebar.php'?>



<div class="body">
    <div class="card-header text-center bg-cyan text-white">
        <strong>Appointment Status</strong>
    </div>
    <div class="table-responsive">
        <div class="inbox-body">
            <form method="post">
                <table class="table">
                    <thead class="bg-light">
                    <tr>
                        <th class="text-center">Mechanic</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr >
                        <?php
                        $u_id = $_SESSION['U_ID'];
                        global $con;
                        $sql = mysqli_query($con,"SELECT * FROM `applications` WHERE u_id='$u_id '");
                        while ($row = mysqli_fetch_assoc($sql))
                        {
                        ?>
                        <td class="text-center"><?php echo $row['mechanics_name']; ?></td>
                        <td class="text-center"><?php echo $row['appointment_date']; ?></td>
                        <td class="text-center">
                            <?php

                            if($row['status']=='0')
                            {
                                echo " <p class='text-warning mr-1'>Pending...</p>";
                            }
                            if($row['status']=='1')
                            {
                                echo " <p class='text-success mr-2'>Approved";
                            }
                            if($row['status']=='2')
                            {
                                echo " <p class='text-danger mr-2'>Canceled";
                            }
                            ?>
                        </td>
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
