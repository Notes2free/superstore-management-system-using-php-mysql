<?php
include('session.php');

if (!isset($_SESSION['login_dist_user'])) {
    header("location: ../index.php");
    exit();
} // Redirecting To Home Page

$query = "SELECT * FROM dstbr WHERE DID = ?";
$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "s", $_SESSION['login_dist_user']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        $para1 = $row['DID'];
        $para2 = $row['DNAME'];
        $para3 = $row['DTYPE'];
        $para4 = $row['DPASS'];
    } else {
        // Handle query execution error
        echo "Error executing query: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
} else {
    // Handle prepared statement error
    echo "Error preparing statement: " . mysqli_error($conn);
}

if (isset($_POST['submitpa'])) {
    $updatedPassword = $_POST['inputpa'];
    $updateQuery = "UPDATE dstbr SET DPASS = ? WHERE DID = ?";
    $stmt = mysqli_prepare($conn, $updateQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $updatedPassword, $para1);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("Refresh:0");
    } else {
        // Handle prepared statement error
        echo "Error preparing statement: " . mysqli_error($conn);
    }
}

if (isset($_POST['submitn'])) {
    $updatedName = $_POST['inputn'];
    $updateQuery = "UPDATE dstbr SET DNAME = ? WHERE DID = ?";
    $stmt = mysqli_prepare($conn, $updateQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $updatedName, $para1);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("Refresh:0");
    } else {
        // Handle prepared statement error
        echo "Error preparing statement: " . mysqli_error($conn);
    }
}

if (isset($_POST['submitpt'])) {
    $updatedType = $_POST['inputpt'];
    $updateQuery = "UPDATE dstbr SET DTYPE = ? WHERE DID = ?";
    $stmt = mysqli_prepare($conn, $updateQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $updatedType, $para1);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("Refresh:0");
    } else {
        // Handle prepared statement error
        echo "Error preparing statement: " . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>SuperStore Management - Profile Page </title>
    <?php include("./includes/cssheader.php") ?>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        form {
            background-color: #f1f1f1;
            padding: 20px;
            border-radius: 5px;
        }

        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body class="crm_body_bg">



    <?php include("./includes/sidenavbar.php") ?>

    <section class="main_content dashboard_part">

        <?php include("./includes/topnavbar.php") ?>
        <!-- content goes here -->
        <div class="col-xl-9 mx-auto">
            <h1 class="mb-5" style="font-size:40px">Sales User Profile</h1>
            <div style="background-color:#AED6F1">
                <form method="POST" action="">
                    <table style="width:70%;color:Black">
                        <tr>
                            <td>Distributor ID:</td>
                            <td>
                                <?php echo $para1; ?>
                            </td>
                            <td>Not Allowed</td>
                        </tr>
                        <tr>
                            <td>Distributor Name:</td>
                            <td><input type="text" name="inputn" value="<?php echo $para2; ?>"></td>
                            <td><input type="submit" name="submitn"></td>
                        </tr>
                        <tr>
                            <td>Distributor Product type:</td>
                            <td><input type="text" name="inputpt" value="<?php echo $para3; ?>"></td>
                            <td><input type="submit" name="submitpt"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="text" name="inputpa" placeholder="*******"></td>
                            <td><input type="submit" name="submitpa"></td>
                        </tr>
                    </table>
                </form>


            </div>

        </div>
    </section>

    <?php include("./includes/footer.php") ?>

</body>


</html>