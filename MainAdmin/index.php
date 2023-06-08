<?php
include('session.php');
if (!isset($_SESSION['admin_login_user'])) {
    header("location: ../index.php"); // Redirecting To Home Page
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>SuperStore Management - Admin Home Page </title>
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
                                                <h4>Total Distributors</h4>
                                                <h3><span class="counter">
                                                        <?php
                                                        $order59 = "SELECT COUNT(*) AS total_distributors FROM dstbr";
                                                        $result = mysqli_query($conn, $order59);
                                                        $row = mysqli_fetch_assoc($result);
                                                        $totalDistributors = $row['total_distributors'];
                                                        echo number_format($totalDistributors);
                                                        ?>
                                                    </span></h3>
                                                <?php
                                                $savingsPercent = 25; // Define the savings percentage here
                                                $savingsAmount = $totalDistributors * ($savingsPercent / 100);
                                                ?>
                                                <p>Saved
                                                    <?php echo $savingsPercent; ?>% (
                                                    <?php echo number_format($savingsAmount); ?> distributors)
                                                </p>
                                            </div>

                                            <div class="single_quick_activity">
                                                <h4>Total Stores</h4>
                                                <h3><span class="counter">
                                                        <?php
                                                        $order59 = "SELECT COUNT(*) AS total_stores FROM store";
                                                        $result = mysqli_query($conn, $order59);
                                                        $row = mysqli_fetch_assoc($result);
                                                        $totalStores = $row['total_stores'];
                                                        echo number_format($totalStores);
                                                        ?>
                                                    </span></h3>
                                                <p>Saved 25%</p>
                                            </div>

                                            <div class="single_quick_activity">
                                                <h4>Total Sales</h4>
                                                <h3>$<span class="counter">
                                                        <?php
                                                        $order59 = "SELECT SUM(SCOST) AS total_sales FROM sales";
                                                        $result = mysqli_query($conn, $order59);
                                                        $row = mysqli_fetch_assoc($result);
                                                        $totalSales = $row['total_sales'];
                                                        echo number_format($totalSales);
                                                        ?>
                                                    </span></h3>
                                                <?php
                                                $savingsPercent = 25; // Define the savings percentage here
                                                $savingsAmount = $totalSales * ($savingsPercent / 100);
                                                ?>
                                                <p>Saved
                                                    <?php echo $savingsPercent; ?>% ($
                                                    <?php echo number_format($savingsAmount); ?>)
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