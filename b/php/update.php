<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$ID = $_SESSION['id'];
if ($ID == true) {
} else {
    header("Location: index.php");
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ghotok</title>
    <link rel="stylesheet" type="text/css" href="../css/styletwo.css">
    <link rel="shortcut icon" href="../icon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../icon/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <style>
        body {
            background-color: whitesmoke;
        }

        input {
            width: 40%;
            height: 15%;
            border: 1px;
            border-radius: 5px;
            padding: 8px 15px 8px 15px;
            margin: 10px 0px 15px 0px;
            box-shadow: 1px 1px 2px 1px grey;
        }
    </style>
</head>

<body>
    <?php
    require 'connection.php';
    $id = $name = $email = $password = $phone = "";
    $i = $n = $e = $pw = $phn = true;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["id"])) {
            $i = false;
        } else {
            $id = test_input($_POST["id"]);
        }
        if (empty($_POST["name"])) {
            $n = false;
        } else {
            $name = test_input($_POST["name"]);
        }
        if (empty($_POST["email"])) {
            $e = false;
        } else {
            $email = test_input($_POST["email"]);
        }
        if (empty($_POST["password"])) {
            $pw = false;
        } else {
            $password = test_input($_POST["password"]);
        }
        if (empty($_POST["phone"])) {
            $phn = false;
        } else {
            $phone = test_input($_POST["phone"]);
        }
    }
    if (isset($_POST['update'])) {
        $query = "UPDATE userdata SET phone = '$_POST[phone]', name = '$_POST[name]' WHERE id = '$ID'";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            echo '<script type = "text/javascript"> alert("Data Updated") </script>';
            header("Location:profile.php");
        } else {
            echo '<script type = "text/javascript"> alert("Data Update Failed") </script>';
        }
    }
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <center>
        <div class="container-fluid">
            <div class="row" style="margin-top: 7%;">
                <form action="" method="POST">
                    <input type="text" name="name" placeholder="name" /><br>
                    <input type="text" name="phone" placeholder="phone" /><br>
                    <input type="text" name="pass" placeholder="pass" /><br>
                    <input type="text" name="email" placeholder="email" /><br>

                    <input type="submit" name="update" value="Update!">
                </form>
            </div>
        </div>
    </center>

</body>

</html>