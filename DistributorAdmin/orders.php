<?php
include('session.php');
if (!isset($_SESSION['login_dist_user'])) {
    header("location: ../index.php"); // Redirecting To Home Page
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>SuperStore Management -Distrubutor Orders Page </title>
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
                                <h4>Sales Order Table</h4>
                            </div>
                            <div class="QA_table ">
                                <table class="table lms_table_active">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Store ID</th>
                                            <th>Order Date</th>
                                            <th>Category</th>
                                            <th>Payment Status</th>
                                            <th>Shipment Mode</th>
                                            <th>Shipment Status</th>
                                            <th>Order Details Update</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $order59 = "SELECT s.*,m.DTYPE FROM strorders s , dstbr m where m.DID=$CustID and m.did=s.did";
                                        $food9 = mysqli_query($conn, $order59);
                                        while ($oss55 = mysqli_fetch_assoc($food9)) {
                                            echo '<tr><td>' . $oss55["ORDID"] . "</td><td>" . $oss55["SID"] . "</td><td>" . $oss55["ORDDATE"] .
                                                "</td><td>" . $oss55["DTYPE"] .
                                                "</td><td>" . $oss55["PMYSTAT"] .
                                                "</td><td>" . $oss55["SHPMODE"] .
                                                "</td><td>" . $oss55["SHPSTAT"] .
                                                "</td><td><a href=\"updateorder.php\">update</a></td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
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