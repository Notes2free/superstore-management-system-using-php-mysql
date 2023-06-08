<?php
include('session.php');
if (!isset($_SESSION['admin_login_user'])) {
    header("location: ../index.php"); // Redirecting To Home Page
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>SuperStore Management -Distrubutor Management Page </title>
    <?php include("./includes/cssheader.php") ?>
</head>

<body class="crm_body_bg">



    <?php include("./includes/sidenavbar.php") ?>

    <section class="main_content dashboard_part">

        <?php include("./includes/topnavbar.php") ?>
        <!-- content goes here -->
        <div class="main_content_iner ">
            <div class="container-fluid plr_30 body_white_bg pt_30">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="QA_section">
                            <div class="white_box_tittle list_header">
                                <h4>Distrubutor Table</h4>
                            </div>
                            <div class="QA_table ">
                                <table class="table lms_table_active">
                                    <thead>
                                        <tr>
                                            <th>Distributor ID</th>
                                            <th>Distributor Name</th>
                                            <th>Type</th>
                                            <th>Warehouse Location</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $order59 = "SELECT * FROM dstbr order by DID";
                                        $food9 = mysqli_query($conn, $order59);
                                        while ($oss55 = mysqli_fetch_assoc($food9)) {
                                            echo '<tr><td>' . $oss55["DID"] . "</td><td>" . $oss55["DNAME"] . "</td><td>" . $oss55["DTYPE"] . "</td><td>" . $oss55["DLOC"] . "</td></tr>";
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12" id="modal-data">
                        <div class="white_box mb_30">
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="modal-content cs_modal">
                                        <div class="modal-header">
                                            <h5 class="modal-title">
                                                New Distributor Entry</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form action="distributorAdd.php" method="POST">
                                                <div class="">
                                                    <label for="username">Distributor Name</label>
                                                    <input type="text" name="username" required>
                                                </div>
                                                <div class="">
                                                    <label for="age">Distributor Type</label>
                                                    <input type="text" name="age" required>
                                                </div>
                                                <div class="">
                                                    <label for="gender">Distributor Location</label>
                                                    <input type="text" name="gender" required>
                                                </div>
                                                <button class="btn_1 full_width
                                                    text-center" type="submit">Register New Distributor</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="footer_part">
            <?php include("./includes/footercopywrite.php") ?>
        </div>
    </section>

    <?php include("./includes/footer.php") ?>

</body>


</html>