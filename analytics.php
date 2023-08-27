<?php $page = 'analytics';
include './header.php' ?>

<!-- ANALYTICS STARTS HERE -->
<div class="content-data">
    <div class="head">
        <h3>Report</h3>

    </div>
    <div class="chart">
        <div id="chart"></div>
    </div>
</div>

<div class="analytics-data">
    <div class="analytics-card card1">
        <div class="icon">
            <i class='bx bx-up-arrow-alt'></i>
        </div>

        <div>
            <p>2023</p>
        </div>

        <div class="icon">
            <i class='bx bx-up-arrow-alt'></i>
        </div>
    </div>

    <div class="analytics-card card2">
        <div>
            <p>Income for 2023:</p>
        </div>

        <div>
            <h4><?php account_Balance() ?></h4>


        </div>
    </div>

    <div class="analytics-card card3">
        <div>
            <p>Withdrawal for 2023:</p>
        </div>

        <div>
            <h4>$0.00</h4>
        </div>
    </div>

</div>



<?php include './footer.php' ?>