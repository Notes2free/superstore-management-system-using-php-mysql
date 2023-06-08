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
    <title>SuperStore Management - Orders Page </title>
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
                                <h4>Order Table</h4>
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
                                            <th>Order ID</th>
                                            <th>Distributor ID</th>
                                            <th>Order Date</th>
                                            <th>Category</th>
                                            <th>Payment Status</th>
                                            <th>Shipment Mode</th>
                                            <th>Shipment Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $order59 = "SELECT s.*,m.DTYPE FROM strorders s , dstbr m where s.SID=$CustID and m.did=s.did";
                                        $food9 = mysqli_query($conn, $order59);
                                        while ($oss55 = mysqli_fetch_assoc($food9)) {
                                            echo '<tr><td>' . $oss55["ORDID"] . "</td><td>" . $oss55["DID"] . "</td><td>" . $oss55["ORDDATE"] .
                                                "</td><td>" . $oss55["DTYPE"] .
                                                "</td><td>" . $oss55["PMYSTAT"] .
                                                "</td><td>" . $oss55["SHPMODE"] .
                                                "</td><td>" . $oss55["SHPSTAT"] .
                                                "</td></tr>";
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
                                            <form action="ordersdata.php" method="POST">
                                                <h2>Distributor ID</h2>
                                                <h4>
                                                    <?php
                                                    $query1112 = "SELECT DTYPE,DID FROM dstbr";
                                                    $ses_sq2 = mysqli_query($conn, $query1112);
                                                    $select12 = '<select name="select2" class="form-control">
               <option selected hidden>Select</option>';
                                                    while ($rs12 = mysqli_fetch_assoc($ses_sq2)) {
                                                        $select12 .= '<option value="' . $rs12['DID'] . '">' . $rs12['DTYPE'] . '</option>';
                                                    }
                                                    $select12 .= '</select>';
                                                    echo $select12;
                                                    ?>
                                                </h4>
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