<?php
include('session.php');

if (!isset($_SESSION['login_dist_user'])) {
    header("location: ../index.php");
    exit();
} // Redirecting To Home Page

$query = "SELECT * FROM dstbr WHERE DID=?";
$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "s", $_SESSION['login_dist_user']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        $storeData = [
            'DID' => $row['DID'],
            'DNAME' => $row['DNAME'],
            'DTYPE' => $row['DTYPE'],
            'DPASS' => $row['DPASS'],
        ];
    } else {
        // Handle query execution error
        echo "Error executing query: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
} else {
    // Handle prepared statement error
    echo "Error preparing statement: " . mysqli_error($conn);
}

?>

<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>SuperStore Management -Distributor Profile Page </title>
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
                    <div class="col-md-6">
                        <div class="white_box mb_30">
                            <div class="box_header ">
                                <div class="main-title">
                                    <h3 class="mb-0">
                                        <?php echo $login_session; ?> |
                                        <?php echo $CustID; ?>
                                    </h3>
                                </div>
                            </div>
                            <div class="pCard_card" style="height: 250px">
                                <div class="pCard_down" style="height: 270px">
                                    <?php foreach ($storeData as $key => $value): ?>
                                        <div>
                                            <p>
                                                <?php echo $key; ?>
                                            </p>
                                            <p>
                                                <?php echo $value; ?>
                                            </p>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <div style="display:flex;justify-content:center">
                                <a href="editprofile.php" class="msg-btn" style="background: #03bfbc;
                                    border: 1px solid #03bfbc;
                                    color:#fff;
                                    padding: 10px 25px;
                                    border-radius: 3px;
                                    font-family: Montserrat,sans-serif;
                                    cursor: pointer;">Edit Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" footer_part">
                <?php include("./includes/footercopywrite.php") ?>
            </div>
        </div>

    </section>

    <?php include("./includes/footer.php") ?>

</body>


</html>