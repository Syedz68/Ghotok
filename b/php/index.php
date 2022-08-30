<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ghotok</title>
    <!-- linking css file -->
    <link rel="stylesheet" href="cstyle.css">

    <!-- bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/2c988112ad.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&family=Dancing+Script&family=Merriweather:wght@300&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="../icon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../icon/favicon.ico" type="image/x-icon">
</head>

<body>
    <?php
    include 'connection.php';
    session_start();
    $email = $password = "";
    $e = $pw = true;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    }
    if (isset($_POST['email'])) {
        if ($e && $pw) {
            $sql = "SELECT * FROM userdata WHERE email = '$email' AND pass = '$password'";
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res) > 0) {
                $row = mysqli_fetch_assoc($res);
                $_SESSION['id'] = $row['id'];
                $_SESSION['gender'] = $row['gender'];
                header("Location:main.php");
                die;
            } else {
                echo "<script>alert('Wrong Email or Password Given')</script>";
            }
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
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark navbarScroll bg-dark nv" style="height: 60px;">
        <!--<div class="container">-->
        <a class="navbar-brand" href="#"><i class='fas fa-user-circle' style='font-size:20px; margin-left: 18px;'></i>
            Welcome to Ghotok.com </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto" style="font-weight: bold;">
                <button class="login" onclick="document.getElementById('id01').style.display='block'" style="margin-top:5px; margin-right:10%"> Login
                </button>
                <div id="id01" class="modal">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close modal"> &times;</span>
                    <div>
                        <div class=" container card-body modal-content animate" style="width: 40%; border-radius: 35px;">
                            <form method="POST" style="margin-top: 5%;">
                                <div class="form-outline mb-4">
                                    <label class="form-label"> Email </label>
                                    <input type="email" name="email" class="form-control form-control-lg" placeholder="Enter your email" required />
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Enter your password" required />
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" name="submit" class="btn1"> Login!
                                    </button>
                                    <button class="btn2" type="button" onclick="document.getElementById('id01').style.display='none'"> Close!
                                    </button>
                                </div>
                                <p class="text-center text-muted mt-5 mb-0">Don't have an account?
                                    <a href="reg.php" class="fw-bold text-body"><u> Signup
                                            here</u></a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </ul>
        </div>
        <!--</div>-->
    </nav>
    <script>
        var modal = document.getElementById('id01');
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <section class="sec" id="home" style="margin-top: 5%;">
        <div class="slider">
            <div class="slides">
                <input type="radio" name="radio-btn" id="radio1">
                <input type="radio" name="radio-btn" id="radio2">
                <input type="radio" name="radio-btn" id="radio3">
                <input type="radio" name="radio-btn" id="radio4">

                <div class="slide first">
                    <img src="../images/hindu.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="../images/muslim.jpeg" alt="">
                </div>
                <div class="slide">
                    <img src="../images/buddhist.jpeg" alt="">
                </div>
                <div class="slide">
                    <img src="../images/christian.jpg" alt="">
                </div>
                <div class="navigation-auto">
                    <div class="auto-btn1"></div>
                    <div class="auto-btn2"></div>
                    <div class="auto-btn3"></div>
                    <div class="auto-btn4"></div>
                </div>
            </div>
            <div class="navigation-manual">
                <label for="radio1" class="manual-btn"></label>
                <label for="radio2" class="manual-btn"></label>
                <label for="radio3" class="manual-btn"></label>
                <label for="radio4" class="manual-btn"></label>
            </div>
        </div>
        <script type="text/javascript">
            var counter = 1;
            setInterval(function() {
                document.getElementById('radio' + counter).checked = true;
                counter++;
                if (counter > 4) {
                    counter = 1;
                }

            }, 5000);
        </script>
    </section>

    <!-- services section-->
    <section id="ss">
        <div class="container" style=" margin-right:4%;">
            <div class="row">
                <div class="col-md-5 mt-4" style="text-align: center; padding-top: 1%;background-color: #222;">
                    <div style=" height: 250px; color: white;">
                        <h3>
                            <i class="fa fa-male" aria-hidden="true"></i> <i class="fa fa-female" aria-hidden="true"></i>
                            Sumit Saha & Rita Dey
                        </h3><br>
                        <p>
                            Thanks to Ghotok.com I have found the love of my life and we are to be married.
                            After going on a few dates and having a few fun nights I came across Devi. After talking for
                            about a week we went out on our first date and I knew there was something special about
                            her!<br><br>
                            -Sumit
                        </p>
                    </div>
                </div>
                <div class="col-md-5 mt-4" style="text-align: center; padding-top: 1%;background-color: #222; margin-left:10%;">
                    <div style=" height: 250px; color: white;">
                        <h3>
                            <i class="fa fa-male" aria-hidden="true"></i> <i class="fa fa-female" aria-hidden="true"></i>
                            Habib Hasan & Smita Akter
                        </h3><br>
                        <p>
                            THANK YOU for making it possible for me to meet my soulmate. Five minutes into our first conversation, my now-wife mentioned how we would have an amazing wedding.<br><br>
                            -Habib
                        </p>
                    </div>
                </div>

                <div class="col-md-5 mt-4" style="text-align: center; padding-top: 1%;background-color: #222;">
                    <div style=" height: 250px; color: white;">
                        <h3>
                            <i class="fa fa-male" aria-hidden="true"></i> <i class="fa fa-female" aria-hidden="true"></i>
                            Shunil Chakma & Tisa Dewan
                        </h3><br>
                        <p>
                            I met my fiancé on ghotok during the quarantine for COVID. We are both Buddhists who fell madly in love.<br><br>
                            -Tisa
                        </p>
                    </div>
                </div>
                <div class="col-md-5 mt-4" style="text-align: center; padding-top: 1%;background-color: #222; margin-left:10%;">
                    <div style=" height: 250px; color: white;">
                        <h3>
                            <i class="fa fa-male" aria-hidden="true"></i> <i class="fa fa-female" aria-hidden="true"></i>
                            Robin Rosario & Marlin Clara
                        </h3><br>
                        <p>
                            We are married for almost 5 years. We are greateful to ghotok.com for helping us to get connected.<br><br>
                            -Marlin
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- portfolio section-->
    <section class="portfolio" id="legal" style="margin-top:7%;">
        <div class="container">
            <div class="row">
                <div class="col md-4" style="text-align:center">
                    <h3 style="font-weight:bold; "> Legal </h3><br>
                    <p>
                        Privacy <br><br> Terms <br><br> Cookie Policy
                    </p>
                </div>
                <div class="col md-2" style="text-align:center">
                    <h3 style="font-weight:bold; "> FAQ </h3><br>
                    <p>
                        Contact <br><br> Tell us more
                    </p>
                </div>
                <div class="col md-6" style="margin-right:3%">
                    <p style="font-size:25px ;">
                        Single people, listen up: If you're looking for love, want to start dating, or just keep it casual, you need to be on Ghotok.com. With over 100 matches made, it's the place to be to meet your next best match. Whether you're straight or in the LGBTQIA community, we are here to bring you all the sparks.
                    </p>
                </div>
            </div>
        </div>

    </section>

    <!-- footer section-->
    <footer id="footer">
        <div class="container-fluid">
            <!-- social media icons -->
            <div class="social-icons mt-4">
                <p style="font-size: 20px; color:white; padding: 2%;">&copy; Created by Syed Shah Asheq Ullah
                    (190204068) & Tonmoy
                    Banik (190204059) | all rights reserved. </p>
            </div>
        </div>
    </footer>

</body>

</html>