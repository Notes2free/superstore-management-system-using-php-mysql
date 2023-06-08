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
    <title>SuperStore Management -Distributor order Updates Page </title>
    <?php include("./includes/cssheader.php") ?>

</head>

<body class="crm_body_bg">

    <?php include("./includes/sidenavbar.php") ?>

    <section class="main_content dashboard_part">

        <?php include("./includes/topnavbar.php") ?>
        <!-- content goes here -->
        <style>
            .main_content_iner {
                background-color: #f7f7f7;
                padding: 30px;
            }

            .white_box {
                background-color: #fff;
                padding: 20px;
                margin-bottom: 30px;
            }

            .box_header {
                padding-bottom: 15px;
                border-bottom: 1px solid #ddd;
                margin-bottom: 15px;
            }

            .main-title {
                margin-bottom: 0;
            }

            .form_container {
                background-color: #85C1E9;
                padding: 30px;
            }

            h2 {
                font-size: 30px;
                color: black;
                margin-top: 0;
            }

            form {
                margin-bottom: 20px;
            }

            select,
            input[type="text"],
            input[type="submit"] {
                color: black;
                width: 100%;
                padding: 5px;
            }

            input[type="submit"] {
                background-color: #4CAF50;
                color: white;
                padding: 5px 10px;
                border: none;
                cursor: pointer;
            }

            input[type="submit"]:hover {
                background-color: #45a049;
            }
        </style>

        <div class="main_content_iner">
            <div class="container-fluid plr_30 body_white_bg pt_30">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="white_box mb_30">
                            <div class="box_header">
                                <div class="main-title">
                                    <h3 class="mb-0">
                                        <?php echo $login_session; ?> |
                                        <?php echo $CustID; ?>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="form_container">
                            <h2></h2>
                            <center>
                                <h4>Select:</h4>
                                <form method="POST">
                                    <?php
                                    $query19 = "SELECT ORDID FROM strorders WHERE DID='$CustID'";
                                    $ses_sq29 = mysqli_query($conn, $query19);
                                    echo '<select style="color:Black" name="select2"><option selected hidden value="">  Order_ID  </option>';
                                    while ($rs1 = mysqli_fetch_assoc($ses_sq29)) {
                                        echo '<option value="' . $rs1['ORDID'] . '">' . $rs1['ORDID'] . '</option>';
                                    }
                                    echo '</select>';
                                    echo ' <input style="color:Black" name="submitqp" type="submit" value="Submit"></h4>';

                                    $paraa2 = "";
                                    $paraa3 = "";
                                    $paraa4 = "";
                                    $paraa5 = "";

                                    if (isset($_POST['submitqp'])) {
                                        $oidv = ($_POST['select2']);
                                        $queryod = "SELECT ORDID, PMYSTAT, SHPMODE, SHPSTAT FROM strorders WHERE ORDID='$oidv'";
                                        $ses_sq44 = mysqli_query($conn, $queryod);
                                        $row90 = mysqli_fetch_assoc($ses_sq44);
                                        $paraa2 = $row90['ORDID'];
                                        $paraa3 = $row90['PMYSTAT'];
                                        $paraa4 = $row90['SHPMODE'];
                                        $paraa5 = $row90['SHPSTAT'];
                                        $quer5 = "INSERT INTO t(temp) VALUES('$paraa2')";
                                        mysqli_query($conn, $quer5);
                                    }

                                    $a = ",";

                                    if (isset($_POST['submitn'])) {
                                        $updtname = ($_POST['inputn']);
                                        $qqq = "SELECT temp FROM t WHERE tee=(SELECT MAX(tee) FROM t)";
                                        $ses_sq44 = mysqli_query($conn, $qqq);
                                        $row90 = mysqli_fetch_assoc($ses_sq44);
                                        $oidv8 = $row90['temp'];
                                        $updatequery1 = "UPDATE strorders SET PMYSTAT='$updtname' WHERE ORDID=$oidv8";
                                        mysqli_query($conn, $updatequery1);
                                        echo '<script>window.location.href = "orders.php";</script>';
                                    }

                                    if (isset($_POST['submitpt'])) {
                                        $updtname = ($_POST['inputpt']);
                                        $qqq = "SELECT temp FROM t WHERE tee=(SELECT MAX(tee) FROM t)";
                                        $ses_sq44 = mysqli_query($conn, $qqq);
                                        $row90 = mysqli_fetch_assoc($ses_sq44);
                                        $oidv8 = $row90['temp'];
                                        $updatequery1 = "UPDATE strorders SET SHPMODE='$updtname' WHERE ORDID=$oidv8";
                                        mysqli_query($conn, $updatequery1);
                                        echo '<script>window.location.href = "orders.php";</script>';
                                    }

                                    if (isset($_POST['submitprt'])) {
                                        $updtname = ($_POST['inputprt']);
                                        $qqq = "SELECT temp FROM t WHERE tee=(SELECT MAX(tee) FROM t)";
                                        $ses_sq44 = mysqli_query($conn, $qqq);
                                        $row90 = mysqli_fetch_assoc($ses_sq44);
                                        $oidv8 = $row90['temp'];
                                        $updatequery1 = "UPDATE strorders SET SHPSTAT='$updtname' WHERE ORDID=$oidv8";
                                        mysqli_query($conn, $updatequery1);
                                        echo '<script>window.location.href = "orders.php";</script>';
                                    }
                                    ?>

                                    <table style="width:70%">
                                        <tr>
                                            <td>Order_ ID:</td>
                                            <td>
                                                <?php echo "$paraa2" ?>
                                            </td>
                                            <td>Not Allowed</td>
                                        </tr>
                                        <tr>
                                            <td>Payment Status:</td>
                                            <td><input type="text" name="inputn" value="<?php echo "$paraa3" ?>"
                                                    placeholder="<?php echo "$paraa3" ?>">
                                            </td>
                                            <td><input type="submit" name="submitn"></td>
                                        </tr>
                                        <tr>
                                            <td>Shipment Mode:</td>
                                            <td><input type="text" name="inputpt" value="<?php echo "$paraa4" ?>"
                                                    placeholder="<?php echo "$paraa4" ?>">
                                            </td>
                                            <td><input type="submit" name="submitpt"></td>
                                        </tr>
                                        <tr>
                                            <td>Shipment Status:</td>
                                            <td><input type="text" name="inputprt" value="<?php echo "$paraa5" ?>"
                                                    placeholder="<?php echo "$paraa5" ?>"></td>
                                            <td><input type="submit" name="submitprt"></td>
                                        </tr>
                                    </table>
                                </form>
                            </center>
                        </div>

                    </div>
                </div>
            </div>
            <div class="footer_part">
                <?php include("./includes/footercopywrite.php") ?>
            </div>
        </div>


    </section>

    <?php include("./includes/footer.php") ?>

</body>


</html>