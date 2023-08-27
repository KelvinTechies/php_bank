<?php $page = 'transaction';
include './header.php' ?>

<!-- ANALYTICS STARTS HERE -->
<div class="data">

    <div class="content-data">
        <div class="head">
            <h3>Recent Transaction</h3>
        </div>

        <table width="100%">
            <thead>
                <tr>
                    <th><span class="las la-sort"></span> TRANSACTION </th>
                    <th><span class="las la-sort"></span> FROM </th>
                    <th><span class="las la-sort"></span> To </th>

                    <th><span class="las la-sort"></span> ISSUED DATE</th>

                    <th><span class="las la-sort"></span> TIME </th>

                    <th><span class="las la-sort"></span> BALANCE</th>

                    <th><span class="las la-sort"></span> STATUS </th>
                </tr>
            </thead>

            <tbody>
                <tr>

                    <td>
                        <div class='client_info'>
                            <h4 class='credit'>Credit</h4>
                        </div>
                    </td>

                    <td>
                        Citadel Corporation
                    </td>
                    <td>
                        <?php echo $_SESSION['user'] ?>
                    </td>



                    <td>
                        <?php


                        $time = new DateTime(getUser('date'));
                        echo $dateRow = $time->format('n/j/Y');
                        ?>
                    </td>
                    <td>
                        <?php


                        $time = new DateTime(getUser('date'));
                        $dateRow = $time->format('n/j/Y');
                        echo $time = $time->format('H:i');

                        ?>
                    </td>
                    <td>
                        $500.00
                    </td>
                    <td>
                        <span class='paid'>Completed</span>
                    </td>

                </tr>
                <?php Trasaction() ?>

                <!-- 
                <tr>

                    <td>
                        <div class="client_info">
                            <h4>Youtube Premium</h4>
                            <small>Youtube Plan</small>
                        </div>
                    </td>

                    <td>
                        19 April, 2022
                    </td>

                    <td>
                        12:00 am
                    </td>

                    <td>
                        $3171
                    </td>

                    <td>
                        <span class="unsuccessful">Not Completed</span>
                    </td>

                </tr>

                <tr>

                    <td>
                        <div class="client_info">
                            <h4>Youtube Premium</h4>
                            <small>Youtube Plan</small>
                        </div>
                    </td>

                    <td>
                        19 April, 2022
                    </td>

                    <td>
                        12:00 am
                    </td>

                    <td>
                        $3171
                    </td>

                    <td>
                        <span class="pending">Pending</span>
                    </td>

                </tr>

                <tr>

                    <td>
                        <div class="client_info">
                            <h4>Youtube Premium</h4>
                            <small>Youtube Plan</small>
                        </div>
                    </td>

                    <td>
                        19 April, 2022
                    </td>

                    <td>
                        12:00 am
                    </td>

                    <td>
                        $3171
                    </td>

                    <td>
                        <span class="paid">Completed</span>
                    </td>

                </tr>

                <tr>

                    <td>
                        <div class="client_info">
                            <h4>Youtube Premium</h4>
                            <small>Youtube Plan</small>
                        </div>
                    </td>

                    <td>
                        19 April, 2022
                    </td>

                    <td>
                        12:00 am
                    </td>

                    <td>
                        $3171
                    </td>

                    <td>
                        <span class="unsuccessful">Not Completed</span>
                    </td>

                </tr>

                <tr>

                    <td>
                        <div class="client_info">
                            <h4>Youtube Premium</h4>
                            <small>Youtube Plan</small>
                        </div>
                    </td>

                    <td>
                        19 April, 2022
                    </td>

                    <td>
                        12:00 am
                    </td>

                    <td>
                        $3171
                    </td>

                    <td>
                        <span class="pending">Pending</span>
                    </td>

                </tr>

                <tr>

                    <td>
                        <div class="client_info">
                            <h4>Youtube Premium</h4>
                            <small>Youtube Plan</small>
                        </div>
                    </td>

                    <td>
                        19 April, 2022
                    </td>

                    <td>
                        12:00 am
                    </td>

                    <td>
                        $3171
                    </td>

                    <td>
                        <span class="paid">Paid</span>
                    </td>

                </tr> -->

            </tbody>

        </table>
    </div>
</div>


<? include './footer.php' ?>