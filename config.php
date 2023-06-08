<?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message

if (isset($_POST['submitq'])) {
    if (empty($_POST['lspass']) || empty($_POST['lsid'])) {
        $error = "Username or Password is invalid";
    } else {
        // Define $username and $password
        $username = $_POST['lsid'];
        $password = $_POST['lspass'];

        // mysqli_connect() function opens a new connection to the MySQL server.
        $conn = new mysqli("localhost", "root", "", "superstore");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to fetch information of registered users and find user match.
        $query = "SELECT SID, SPASS FROM store WHERE SID=? AND SPASS=? LIMIT 1";

        // Prepare and bind the statement
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            // Bind the result variables
            $stmt->bind_result($storeID, $storePass);
            $stmt->fetch();

            $_SESSION['login_sales_user'] = $storeID; // Initializing Session
            $stmt->close();
            $conn->close();

            header("location: Admin/index.php"); // Redirecting To Profile Page
            exit();
        } else {
            $error = "Username or Password is invalid";
        }

        $conn->close(); // Closing Connection
    }
}

if (isset($_POST['submitd'])) {
    if (empty($_POST['dspass']) || empty($_POST['dsid'])) {
        $error = "Username or Password is invalid";
    } else {
        // Define $username and $password
        $username = $_POST['dsid'];
        $password = $_POST['dspass'];

        // mysqli_connect() function opens a new connection to the MySQL server.
        $conn = new mysqli("localhost", "root", "", "superstore");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to fetch information of registered users and find user match.
        $query = "SELECT DID, DPASS FROM dstbr WHERE DID=? AND DPASS=? LIMIT 1";

        // Prepare and bind the statement
        $stmt = $conn->prepare($query);
        $stmt->bind_param("dd", $username, $password);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            // Bind the result variables
            $stmt->bind_result($distributorID, $distributorPass);
            $stmt->fetch();

            $_SESSION['login_dist_user'] = $distributorID; // Initializing Session
            $stmt->close();
            $conn->close();

            header("location: DistributorAdmin/index.php"); // Redirecting To Profile Page
            exit();
        } else {
            $error = "Username or Password is invalid";
        }

        $conn->close(); // Closing Connection
    }
}
if (isset($_POST['submitadmin'])) {
    if (empty($_POST['lspass']) || empty($_POST['lsid'])) {
        $error = "Username or Password is invalid";
    } else {
        // Define $username and $password
        $username = $_POST['lsid'];
        $password = $_POST['lspass'];

        // mysqli_connect() function opens a new connection to the MySQL server.
        $conn = mysqli_connect("localhost", "root", "", "superstore");

        // SQL query to fetch information of registerd users and finds user match.
        $query = "SELECT ANAME,APASS From admin Where ANAME=? and APASS=? Limit 1";

        // To protect MySQL injection for Security purpose
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $stmt->bind_result($username, $password);
        $stmt->store_result();

        if ($stmt->fetch()) //fetching the contents of the row
        {
            $_SESSION['admin_login_user'] = $username; // Initializing Session
            header("location: MainAdmin/index.php"); // Redirecting To Profile Page
        } else {
            $error = "Username or Password is invalid";
        }
        mysqli_close($conn); // Closing Connection
    }
}
?>