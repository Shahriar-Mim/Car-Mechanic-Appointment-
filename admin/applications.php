<?php require_once 'inc/header.php' ?>
<?php require_once 'inc/nav.php' ?>
<?php require_once 'inc/sidebar.php' ?>


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
                        <th class="text-center">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr >
                        <?php
                        global $con;
                        $sql = mysqli_query($con,"SELECT * FROM `applications` WHERE status!=0");
                        while ($row = mysqli_fetch_assoc($sql))
                        {
                        ?>
                        <td class="text-center"><?php echo $row['user_name']; ?></td>
                        <td class="text-center"><?php echo $row['phone']; ?></td>
                        <td class="text-center"><?php echo $row['license_number']; ?></td>
                        <td class="text-center"><?php echo $row['appointment_date']; ?></td>
                        <td class="text-center"><?php echo $row['mechanics_name']; ?></td>
                        <td class="text-center">
                            <?php
                            if($row['status']=='1')
                            {
                                echo " <p class='text-success mr-1'>Approve</p>";
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


<?php require_once 'inc/footer.php' ?>