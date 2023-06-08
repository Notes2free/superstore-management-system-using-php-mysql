<?php
include('session.php');
if (!isset($_SESSION['login_sales_user'])) {
    header("location: index.php"); // Redirecting To Home Page
    exit;
}

$query = "SELECT * FROM store WHERE SID=?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $user_check);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);

$storeData = [
    'Store ID' => $row['SID'],
    'Branch Name' => $row['SBRANCHNAME'],
    'City' => $row['SCITY'],
    'Region' => $row['SREGION'],
    'State' => $row['SSTATE'],
    'Pincode' => $row['SPCODE'],
    'Password' => $row['SPASS']
];

if (isset($_POST['submit'])) {
    $inputn = $_POST['inputn'];
    $inputc = $_POST['inputc'];
    $inputr = $_POST['inputr'];
    $inputs = $_POST['inputs'];
    $inputp = $_POST['inputp'];
    $inputpa = $_POST['inputpa'];

    $updateQuery = "UPDATE store SET SBRANCHNAME=?, SCITY=?, SREGION=?, SSTATE=?, SPCODE=?, SPASS=? WHERE SID=?";
    $stmt = mysqli_prepare($conn, $updateQuery);
    mysqli_stmt_bind_param($stmt, "sssssss", $inputn, $inputc, $inputr, $inputs, $inputp, $inputpa, $user_check);
    mysqli_stmt_execute($stmt);
    header("Refresh:0");
}

mysqli_close($conn);
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
                            <td>Store ID:</td>
                            <td>
                                <?php echo $storeData['Store ID']; ?>
                            </td>
                            <td>Not Allowed</td>
                        </tr>
                        <tr>
                            <td>Branch Name:</td>
                            <td><input type="text" name="inputn" value="<?php echo $storeData['Branch Name']; ?>"></td>
                            <td><input type="submit" name="submit"></td>
                        </tr>
                        <tr>
                            <td>Branch City:</td>
                            <td><input type="text" name="inputc" value="<?php echo $storeData['City']; ?>"></td>
                            <td><input type="submit" name="submit"></td>
                        </tr>
                        <tr>
                            <td>Branch Region:</td>
                            <td><input type="text" name="inputr" value="<?php echo $storeData['Region']; ?>"></td>
                            <td><input type="submit" name="submit"></td>
                        </tr>
                        <tr>
                            <td>Branch State:</td>
                            <td><input type="text" name="inputs" value="<?php echo $storeData['State']; ?>"></td>
                            <td><input type="submit" name="submit"></td>
                        </tr>
                        <tr>
                            <td>PINCODE:</td>
                            <td><input type="text" name="inputp" value="<?php echo $storeData['Pincode']; ?>"></td>
                            <td><input type="submit" name="submit"></td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td><input type="text" name="inputpa" placeholder="*******"></td>
                            <td><input type="submit" name="submit"></td>
                        </tr>
                    </table>
                </form>

            </div>

        </div>
    </section>

    <?php include("./includes/footer.php") ?>

</body>


</html>