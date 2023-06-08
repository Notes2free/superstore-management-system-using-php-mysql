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
    <title>SuperStore Management -Admin Sales Report Page </title>
    <?php include("./includes/cssheader.php") ?>

</head>

<body class="crm_body_bg">

    <?php include("./includes/sidenavbar.php") ?>

    <section class="main_content dashboard_part">

        <?php include("./includes/topnavbar.php") ?>
        <!-- content goes here -->
        <style>
            .form_container {
                margin: 20px;
            }

            div[style="background-color:#85C1E9"] {
                padding: 20px;
            }

            h2 {
                font-size: 30px;
                color: black;
                margin: 0;
            }

            table {
                margin-top: 20px;
                border-collapse: collapse;
                width: 100%;
            }

            th,
            td {
                padding: 8px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }

            select {
                padding: 5px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }

            input[type="submit"] {
                padding: 5px 10px;
                background-color: #4CAF50;
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            .QA_table {
                margin-top: 20px;
            }

            .table {
                width: 100%;
                border-collapse: collapse;
            }

            .table th,
            .table td {
                padding: 8px;
                text-align: left;
                border-bottom: 1px solid #ddd;
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
                            <div style="background-color:#85C1E9">
                                <center>
                                    <h2 style="font-size:30px;color:Black">Sales Report</h2>
                                </center>

                                <!--Dropdwn sectn for sales by type-->
                                <form method="POST">
                                    <table>
                                        <h4>Sales by:
                                            <select name="ssalescat">
                                                <option selected="" hidden="" value="None">Category</option>
                                                <option value="SBRANCHNAME">Branch</option>
                                                <option value="SCITY">City</option>
                                                <option value="SREGION">Region</option>
                                                <option value="SSTATE">State</option>
                                            </select>
                                            <input type="submit" name="submitsales" value="Next">
                                        </h4>
                                    </table>
                                </form>

                                <?php
                                if (isset($_POST['submitsales'])) {
                                    $catsv = ($_POST['ssalescat']);
                                    $pl = "Selected Category:";
                                    echo '<h5>', $pl, $catsv, '</h5></form>';

                                    $query1122 = "INSERT into t(temp) values ('$catsv')";
                                    mysqli_query($conn, $query1122);

                                    echo '<form method="POST"><h4>Choose:';
                                    $query1112 = "SELECT DISTINCT $catsv FROM store";
                                    $ses_sq2 = mysqli_query($conn, $query1112);

                                    $select12 = '<select name="select2112">
                            <option selected hidden>Select</option>';
                                    while ($rs12 = mysqli_fetch_assoc($ses_sq2)) {
                                        $select12 .= '<option value="' . $rs12[$catsv] . '">' . $rs12[$catsv] . '</option>';
                                    }
                                    $select12 .= '</select><br><input name="submitcs2" type="submit" value="Next"></h4></form></table>';

                                    echo $select12;
                                }

                                if (isset($_POST['submitcs2'])) {
                                    $query1112 = "SELECT temp FROM t WHERE tee=(SELECT MAX(tee) FROM t)";
                                    $ses_sq2112 = mysqli_query($conn, $query1112);
                                    $rs12 = mysqli_fetch_assoc($ses_sq2112);
                                    $catsv = $rs12['temp'];

                                    $catsv1 = ($_POST['select2112']);
                                    echo $catsv1;

                                    echo '<div class="QA_table ">
                    <table class="table lms_table_active">
                        <thead>
                            <tr>
                                <th>Sales ID</th>
                                <th>Sales Date</th>
                                <th>Sales Cost</th>
                                <th>Store_ID</th>
                                <th>Store Name</th>
                                <th>Store City</th>
                            </tr>
                        </thead>
                        <tbody>';

                                    echo $catsv, ":", $catsv1;
                                    $order59 = "SELECT sa.*, st.SBRANCHNAME, st.SCITY FROM sales sa, store st WHERE sa.sid=st.sid";
                                    $food9 = mysqli_query($conn, $order59);

                                    while ($oss55 = mysqli_fetch_assoc($food9)) {
                                        echo '<tr>
                        <td>' . $oss55["SALESID"] . '</td>
                        <td>' . $oss55["SDATE"] . '</td>
                        <td>' . $oss55["SCOST"] . '</td>
                        <td>' . $oss55["SID"] . '</td>
                        <td>' . $oss55["SBRANCHNAME"] . '</td>
                        <td>' . $oss55["SCITY"] . '</td>
                    </tr>';
                                    }
                                    echo '</tbody></table></div>';
                                }
                                ?>
                            </div>
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