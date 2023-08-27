<?php

// include './Configuration/connection.php';

// redirect();
// logOut();
// if (!isset($_SESSION['id'])) {
// 	header('location:./login.php');
// }
// if (!isset($_SESSION['user'])) {
// 	header('location:./login.php');
// }
?>




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

                <p>$54,329.9</p>
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

    <div class="withdraw">
        <div class="withdraw-amount">
            <p>Enter the amount</p>
            <h3>$3,230|</h3>
        </div>

        <div class="withdraw-button">
            <button> <a href="/asset/index2.html">Withdraw Money</a></button>
        </div>

    </div>

</div>