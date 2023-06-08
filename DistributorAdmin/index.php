<?php
include('session.php');
if (!isset($_SESSION['login_dist_user'])) {
    header("location: ../index.php"); // Redirecting To Home Page
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>SuperStore Management - Distributor Home Page </title>
    <?php include("./includes/cssheader.php") ?>
</head>

<body class="crm_body_bg">



    <?php include("./includes/sidenavbar.php") ?>

    <section class="main_content dashboard_part">

        <?php include("./includes/topnavbar.php") ?>
        <div class="main_content_iner ">
            <div class="container-fluid plr_30 body_white_bg pt_30">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="single_element">
                            <div class="quick_activity">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="quick_activity_wrap">
                                            <div class="single_quick_activity">
                                                <h4>Total Orders</h4>
                                                <h3>$<span class="counter">
                                                        <?php
                                                        $order59 = "SELECT COUNT(*) AS order_count FROM strorders WHERE DID = $CustID";
                                                        $result = mysqli_query($conn, $order59);
                                                        $row = mysqli_fetch_assoc($result);
                                                        $orderCount = $row['order_count'];
                                                        echo number_format($orderCount);
                                                        ?>
                                                    </span></h3>
                                                <?php
                                                $savingsPercent = 25; // Define the savings percentage here
                                                $savingsAmount = $orderCount * ($savingsPercent / 100);
                                                ?>
                                                <p>Saved
                                                    <?php echo $savingsPercent; ?>% (
                                                    <?php echo number_format($savingsAmount); ?> orders)
                                                </p>
                                            </div>


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