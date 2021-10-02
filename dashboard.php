<?php require_once 'inc/header.php'?>
<?php require_once 'inc/nav.php'?>
<?php require_once 'inc/sidebar.php'?>


<div class="body">
    <div class="card-header text-center bg-cyan text-white">
        <strong>Mechanic list</strong>
    </div>
    <div class="table-responsive">
        <div class="inbox-body">
            <form method="post">
                <table class="table">
                    <thead class="bg-light">
                    <tr>
                        <th class="text-center">Name</th>
                        <th class="text-center">Handling</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr >
                        <?php
                        $user_id = $_SESSION['USER_ID'];
                        global $con;
                        $sql = mysqli_query($con,"SELECT * FROM `mechanics`");
                        while ($row = mysqli_fetch_assoc($sql))
                        {
                        ?>
                        <td class="text-center"><?php echo $row['name']; ?></td>
                        <td class="text-center"><?php echo $row['handle']; ?></td>
                        <td class="text-center">
                            <?php

                            if($row['status']=='0')
                            {
                                echo " <p class='text-warning mr-1'>Not Available</p>";
                            }
                            if($row['status']=='1')
                            {
                                echo " <p class='text-success mr-2'>Available";
                            }
                            if($row['status']=='2')
                            {
                                echo " <p class='text-danger mr-2'>Full";
                            }
                            ?>
                        </td>
                        <td class="text-center">
                            <a type="button" href="form.php?mechanics_name=<?php echo $row['name'] ?>" class="btn btn-sm btn-outline-info" >Get Appointment</a>
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
