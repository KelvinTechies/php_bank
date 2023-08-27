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

        <li><a href="./index.php" class="active"><i class='bx bxs-dashboard icon'></i> Dashboard</a></li>

        <li><a href="analytics.html"> <i class='bx bxs-chart icon'> </i> Analytics</a></li>

        <li><a href="./transaction.php"> <i class='bx bxs-briefcase-alt-2 icon'></i> Transaction</a></li>

        <li><a href="./profile.php"> <i class='bx bxs-user-circle icon'></i> Profile</a></li>

        <li><a href="./card.php"> <i class='bx bxs-credit-card icon'></i> Card</a></li>

        <li><a href="./notification.php"> <i class='bx bxs-bell-ring icon'></i> Notifications</a></li>

        <li><a href="logout.php"> <i class='bx bxs-log-out-circle icon'></i>
                Logout</a>
        </li>

    </ul>
</section>

<section id=" content">
    <!-- NAVBAR STARTS HERE -->
    <nav>
        <i class='bx bx-menu toggle-sidebar'></i>
        <h1 class="">Welcome...</h1>

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
</section>





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
</script>