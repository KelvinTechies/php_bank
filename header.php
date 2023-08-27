<?php

include './Configuration/connection.php';

redirect();
// logOut();
// if (!isset($_SESSION['id'])) {
// 	header('location:./login.php');
// }
// if (!isset($_SESSION['user'])) {
// 	header('location:./login.php');
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="transaction.css">
    <link rel="stylesheet" href="analytics.css">
    <link rel="stylesheet" href="card.css">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="./me.css">
    <title>Citadel Corporations</title>
    <script src="./jquery-3.7.0.min.js"></script>

</head>

<body>
    <section id="sidebar">
        <a href="#" class="brand"><i class='bx bxs-smile icon'></i> Citadel <br> Corporations</a>
        <ul class="side-menu">
            <div class="account">

                <label for="imgFile">
                    <div class="account-img bg-img">
                        <!-- bg-img -->
                        <img src="./upload/<?php echo getUser('Image') ?>" alt="hjkl">
                    </div>
                </label>
                <form action="" id="Ourform" method="post" enctype="multipart/form-data">
                    <input style="display: none;" id="imgFile" type="file" name="imgFile">
                    <button name="upload" class="upl">Upload</button>
                </form>
                <h3><?php echo $_SESSION['user'] ?></h3>
                <p><?php echo getUser('email') ?></p>
                <p><?php echo getUser('occupation') ?></p>
                <p><?php echo getUser('state') ?>, <?php echo getUser('country') ?></p>
                <p><?php echo getUser('gender') ?></p>
            </div>

            <li><a href="./index.php" class="<?php if ($page == 'index') {
                                                    echo 'active';
                                                } ?>"><i class='bx bxs-dashboard icon'></i> Dashboard</a></li>

            <li><a href="./analytics.php" class="<?php if ($page == 'analytics') {
                                                        echo 'active';
                                                    } ?>"> <i class='bx bxs-chart icon'> </i> Analytics</a></li>

            <li><a href="./transaction.php" class="<?php if ($page == 'transaction') {
                                                        echo 'active';
                                                    } ?>"> <i class='bx bxs-briefcase-alt-2 icon'></i> Transaction</a>
            </li>

            <li><a href="./profile.php" class="<?php if ($page == 'profile') {
                                                    echo 'active';
                                                } ?>"> <i class='bx bxs-user-circle icon'></i> Profile</a></li>

            <li><a href="./card.php" class="<?php if ($page == 'card') {
                                                echo 'active';
                                            } ?>"> <i class='bx bxs-credit-card icon'></i> Card</a></li>

            <li><a href="./notification.php" class="<?php if ($page == 'notification') {
                                                        echo 'active';
                                                    } ?>"> <i class='bx bxs-bell-ring icon'></i> Notifications</a></li>

            <li><a href="logout.php" class="<?php if ($page == 'logout') {
                                                echo 'active';
                                            } ?>"> <i class='bx bxs-log-out-circle icon'></i>
                    Logout</a>
            </li>

        </ul>
    </section>

    <section id="content">
        <!-- NAVBAR STARTS HERE -->
        <nav>
            <i class='bx bx-menu toggle-sidebar'></i>
            <h1 class="">Welcome, <span class="brand"><?php echo $_SESSION['user'] ?></span></h1>

            <form action="#">
                <div class="form-group">
                    <input type="text" placeholder="Search or type command...">
                    <i class='bx bx-search icon'></i>
                </div>
            </form>

            <span class="divider"></span>
            <div class="profile">
                <img src="3.jpeg" alt="">
                <ul class="profile-link">
                    <li><a href="#"><i class='bx bxs-user-circle icon'></i> Profile</a></li>
                    <li><a href="#"><i class='bx bxs-cog'></i> Settings</a></li>
                    <li><a href="#"><i class='bx bxs-log-out-circle'></i> Logout</a></li>
                </ul>
            </div>
        </nav>

        <!-- DASHBOARD STARTS HERE -->
        <main>
            <div class="info-data">
                <div class="card">
                    <div class="head">
                        <div>
                            <h2>ACCOUNT: <?php echo getUser('account_num') ?></h2>
                        </div>

                        <div class="head-balance">
                            <div class="icon">
                                <i class='bx bx-trending-up'></i>
                            </div>

                            <?php account_Balance() ?>
                        </div>

                        <p><?php echo $_SESSION['user'] ?></p>
                    </div>
                </div>

                <div class="card">
                    <div class="head">
                        <div>
                            <h2>INTEREST RATE</h2>
                        </div>

                        <div class="head-balance rate">
                            <div class="icon">
                                <i class='bx bx-up-arrow-alt'></i>
                            </div>

                            <p>20%</p>
                        </div>

                        <p><?php echo $_SESSION['user'] ?></p>
                    </div>
                </div>

                <?php
                if (isset($_SESSION['id'])) {
                    $id = $_SESSION['id'];
                    $bankId = "SELECT * FROM `banking` WHERE id =$id";
                    $conn = mysqli_query($connection, $bankId);

                    if (mysqli_num_rows($conn) > 0) {
                        if ($bank = mysqli_fetch_assoc($conn)) {
                            $bankRow = $bank['role'];
                            $fname = $bank['first_name'];
                            $lname = $bank['last_name'];
                            $email = $bank['email'];
                            if ($bankRow == 1) {
                                echo ' <div class="withdraw">
                                <form action="#" id="formDepo" method="post">
                             
                                    <div class="deposit-amount">
                                        <input type="number" name="depAmount" placeholder="Enter Amount">
                                    </div>
                                    <div class="popUp" id="popUpDiv">
                                    <input type="text" name="a_num" placeholder="Enter Account Number">
                                    
                                        <button class="cl"  type="submit" name="deposit">Deposit</button>
                                    </div>
                                    <div class="deposit-button">
                                        <button type="submit" onclick="openpop()">Deposit</button>
                                    </div>
                             
                                </form>
                             </div>
                             ';
                            }
                        }
                    }
                }
                ?>

                <div class="withdraw">
                    <form action="#">

                        <div class="withdraw-amount">
                            <input type="number" placeholder="Enter Amount">
                        </div>
                        <div class="popUp" id="popUpDiv">
                            <img src="./404-error-3060993_1280-removebg-preview.png" alt="">
                            <h2>Sorry </h2>
                            <p>you can't Withdraw Now, Please Kindly Contact Our Email for Further or Try again</p>
                            <button class="cl" onclick="closePop()" type="button">Ok</button>
                        </div>
                        <div class="withdraw-button">
                            <button type="submit" onclick="openpop()"> Withdraw Money</button>
                        </div>

                    </form>
                </div>

            </div>


            <script>
                $(document).ready(function(e) {
                    $('#Ourform').on('submit', function(e) {
                        e.preventDefault()
                        $('.loader-div').show()

                        $.ajax({
                            type: 'POST',
                            url: './Configuration/connection.php',
                            data: new FormData(this),
                            dataType: 'json',
                            contentType: false,
                            cache: false,
                            processData: false,
                            /*   beforeSend: function() {
                                  $('.reg').attr('disabled', "disabled")
                                  $('#msg').css("dispaly", "none")
                              }, */
                            success: function(response) {
                                $(".msg").css("display", "block")
                                if (response.status == 1) {
                                    $("#Ourform")[0].reset()
                                    $(".msg").html("<p class='msgTxtSucc'>" + response.message +
                                        "</p>");
                                    $('.loader-div').hide()
                                } else {
                                    // $(".msg").html("<p class='msgTxt'>" + response.message + "</p>");
                                    alert(response.message)
                                    $('.loader-div').hide()
                                }
                                $("#Ourform").css("opacity", "");
                                $(".reg").removeAttr("disabled")
                            }
                        })
                    })


                })



                const popUpDiv = document.querySelector("#popUpDiv");

                function openpop() {
                    popUpDiv.classList.add("openPopUp");
                }

                function closePop() {
                    popUpDiv.classList.remove("openPopUp");
                }


                $(document).ready(function(e) {
                    $('#formDepo').on('submit', function(e) {
                        e.preventDefault()
                        $('.loader-div').show()
                        $.ajax({
                            type: 'POST',
                            url: './Configuration/connection.php',
                            data: new FormData(this),
                            dataType: 'json',
                            contentType: false,
                            cache: false,
                            processData: false,
                            /*   beforeSend: function() {
                                  $('.reg').attr('disabled', "disabled")
                                  $('#msg').css("dispaly", "none")
                              }, */
                            success: function(rep) {
                                $(".msg").css("display", "block")
                                if (rep.stat == 1) {

                                    $("#formDepo")[0].reset()
                                    /* $(".msg").html("<p class='msgTxtSucc'>" + rep.message +
                                        "</p>"); */
                                    alert(rep.msg)
                                    $('.loader-div').hide()
                                    // window.location.href = "./login.php"

                                } else {
                                    // $(".msg").html("<p class='msgTxt'>" + response.message + "</p>");
                                    alert(rep.msg)

                                    $('.loader-div').hide()


                                }
                                $("#formDepo").css("opacity", "");
                            }
                        })
                    })

                    $("#img").change(function() {
                        var file = this.files[0]
                        var fileType = file.type
                        var match = ['image/jpg'];

                        if (!fileType == match[0]) {
                            alert("Sorry, Only jpg images are accepted");
                            $("#img").val('')
                            return false
                        }
                    })
                })
            </script>