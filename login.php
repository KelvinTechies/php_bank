<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="./me.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <title>Citadel Corporations</title>
    <script src="./jquery-3.7.0.min.js"></script>

</head>

<body>

    <div class="container">

        <div class="link">
            <div class="svg">
                <img src="signup.svg">
            </div>

            <p class="side-big-heading">Create your Account</p>
            <p class="primary-bg-text">Citadel Corporations offers a wide range of banking accounts & products to help
                you save. Apply online & easily access the bank account.</p>

            <a href="registration.php" class="loginbtn">Register Now</a>


        </div>

        <div class="login-content">
            <form action="" id="form" method="post">
                <img src="3.jpeg">

                <h2 class="title">Welcome</h2>
                <div class="msg"></div>

                <div class="loader-div" style="display: none;">
                    <span class="loader"></span>

                </div>
                <div class="input-div one">
                    <div class="icon">
                        <i class='bx bxs-user-circle'></i>
                    </div>

                    <div class="form-input">
                        <input type="text" name="account_num" id="account_num" required
                            placeholder="Your Account Number" class="input">
                    </div>
                </div>

                <div class="input-div pass">
                    <div class="icon">
                        <i class='bx bxs-lock'></i>
                    </div>
                    <div class="form-input">
                        <input type="password" id="password" name="password" required placeholder="Your Password"
                            class="input">
                    </div>
                </div>

                <a href="#" class="forgotpss">Forgot Password?</a>

                <input type="submit" class="btn" id="login" name="login" value="Login">

                <p class="./register.php">Don't have an account yet? <a href="./registration.php"
                        class="reg-btn">Register Now </a></p>
            </form>
        </div>
    </div>

    <script>
    const inputs = document.querySelectorAll(".input");


    function addcl() {
        let parent = this.parentNode.parentNode;
        parent.classList.add("focus");
    }

    function remcl() {
        let parent = this.parentNode.parentNode;
        if (this.value == "") {
            parent.classList.remove("focus");
        }
    }


    inputs.forEach(input => {
        input.addEventListener("focus", addcl);
        input.addEventListener("blur", remcl);
    });







    $(document).ready(function(e) {
        $('#form').on('submit', function(e) {
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
                        $("#form")[0].reset()
                        $(".msg").html("<p class='msgTxtSucc'>" + response.message +
                            "</p>");
                        $('.loader-div').hide()
                        window.location.href = "./index.php"
                    } else {
                        $(".msg").html("<p class='msgTxt'>" + response.message + "</p>");
                        $('.loader-div').hide()
                    }
                    $("#form").css("opacity", "");
                    $(".reg").removeAttr("disabled")
                }
            })
        })


    })
    </script>
    <!-- <script src="./js/logn.js"></script> -->

</body>

</html>