<?php
include('session.php');
if (!isset($_SESSION['login_sales_user'])) {
    header("location: ../index.php"); // Redirecting To Home Page
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>SuperStore Management - Sales Page </title>
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
                                <h4>Sales Data</h4>
                                <div class="box_right d-flex lms_block">
                                    <div class="serach_field_2">
                                        <div class="search_inner">
                                            <form active="#">
                                                <div class="search_field">
                                                    <input type="text" placeholder="Search content here...">
                                                </div>
                                                <button type="submit"> <i class="ti-search"></i> </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="add_button ms-2">
                                        <a href="#modal-data" class="btn_1">Add New</a>
                                    </div>
                                </div>
                            </div>
                            <div class="QA_table ">
                                <table class="table lms_table_active">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Cost</th>
                                            <th scope="col">Date</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $order59 = "SELECT * FROM sales where SID=$CustID";
                                        $food9 = mysqli_query($conn, $order59);
                                        while ($oss55 = mysqli_fetch_assoc($food9)) {
                                            echo '<tr><td>' . $oss55["SALESID"] . "</td><td>" . $oss55["SCOST"] . "</td><td>" . $oss55["SDATE"] . "</td></tr>";
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
                                                New Sales Entry</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form action="sales-entry.php" method="POST">
                                                <div class="">
                                                    <input type="text" name="username" class="form-control"
                                                        placeholder="Sales Date(DD/MM/YYYY)">
                                                </div>
                                                <div class="">
                                                    <input type="text" name="email" class="form-control"
                                                        placeholder="Sales Cost">
                                                </div>
                                                <button type="submit" class="btn_1 full_width
                                                    text-center">Submit</button>

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