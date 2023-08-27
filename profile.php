<?php $page = 'profile';
include './header.php' ?>
<!-- ANALYTICS STARTS HERE -->
<div class="data">

    <div class="content-data">
        <div class="head">
            <h3>Profile Settings</h3>
        </div>



        <form action="" id="formProfile" method="post" enctype="multipart/form-data">
            <div class="rows">

                <div class="form-group">
                    <div class="img-circle">
                        <img src="./upload/<?php echo getUser('Image') ?>" alt="img" name="profile" class="shadow">

                    </div>
                </div>

                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" id="Pfname" name="Pfname" value="<?php echo getUser('first_name') ?>">
                </div>

                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" id="Plname" name="Plname" value="<?php echo getUser('last_name') ?>">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="Pemail" name="Pemail" value="<?php echo getUser('email') ?>">
                </div>

                <div class="form-group">
                    <label>Phone number</label>
                    <span>(+<?php echo getUser('area_code') ?>)</span>
                    <input type="tel" class="form-control" id="Pfone" name="Pfone" value="<?php echo getUser('mobile') ?>">
                </div>

                <div class="form-group">
                    <label>Country</label>
                    <input type="text" class="form-control" id="Pcountry" name="Pcountry" value="<?php echo getUser('country') ?>">
                </div>

                <div class="form-group">
                    <label>State</label>
                    <input type="text" class="form-control" id="Pstate" name="Pstate" value="<?php echo getUser('state') ?>">
                </div>

                <div class="form-group">
                    <label>Date of Birth</label>
                    <input type="text" class="form-control" id="dob" name="dob" placeholder="mm/dd/yyyy" value="<?php echo getUser('dob') ?>">

                </div>

                <div class="form-group">
                    <label>Account type</label>
                    <select name="Paccount" id="account">

                        <option selected value="<?php echo getUser('account_type') ?>">
                            <?php echo getUser('account_type') ?>
                        </option>
                        <option value="savings">Savings</option>
                        <option value="current">Current</option>
                    </select>

                </div>

                <div class="form-group">
                    <label>Gender</label>
                    <select name="Pgender" id="gender">
                        <option selected value=<?php echo getUser('gender') ?>>
                            <?php echo getUser('gender') ?>
                        </option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>

                </div>

                <div class="form-group">
                    <label>Postal Code</label>
                    <input type="text" name="pos_code" id="pos_code" class="form-control" value=<?php echo getUser('postal_code') ?>>
                </div>

                <div class="form-group">
                    <label>Currency</label>
                    <input type="text" name="curr" id="curr" class="form-control" value="<?php echo getUser('currency') ?>">
                </div>

                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" id="addr_1" name="Paddr_1" value="<?php echo getUser('add_1') ?>">
                </div>
                <div class="form-group">
                    <label>Address II</label>
                    <input type="text" class="form-control" id="addr_2" name="Paddr_2" value="<?php echo getUser('add_2') ?>">
                </div>

                <div class="form-group">
                    <label>SSN</label>
                    <input type="text" name="ssn" readonly class="form-control" value="<?php echo getUser('Ssn') ?>">
                </div>

                <div class="form-group">
                    <label>City</label>
                    <input type="text" name="profCity" id="city" class="form-control" value="<?php echo getUser('City') ?>">
                </div>

                <div class="form-group">
                    <label>Marital Status</label>
                    <input type="text" name="mat_stat" id="marital_stat" class="form-control" value=<?php echo getUser('maritsl_status') ?>>
                </div>

                <div class="form-group">
                    <label>Occupation</label>
                    <input type="text" name="prof_occ" id="occ" class="form-control" value=<?php echo getUser('occupation') ?>>
                </div>

            </div>

            <div class="button">
                <button type="submit" name="update" class="btn">Update</button>
                <button class="btn btn-secondary" type="reset">Cancel</button>
            </div>
            <div class="loader-div" style="display: none;">
                <span class="loader"></span>
            </div>
            <div class="msg"></div>

        </form>

    </div>


</div>

<script>
    $(document).ready(function(e) {
        $('#formProfile').on('submit', function(e) {
            e.preventDefault()
            $('.loader-div').show()


            var lname = $("#Plname").val()
            var fname = $("#Pfname").val()
            var email = $("#Pemail").val()
            var date = $("#dob").val()
            var fone = $("#Pfone").val()
            var gender = $("#gender").val()
            var addr_1 = $("#addr_1").val()
            var addr_2 = $("#addr_2").val()
            var state = $("#Pstate").val()
            var country = $("#Pcountry").val()
            var postal_code = $("#pos_code").val()
            var marital_status = $("#marital_status").val()
            var acct_type = $("#account").val()
            var occupation = $("#occ").val()
            var currency = $("#curr").val()
            var city = $("#city").val()


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
                        $("#formProfile")[0].reset()
                        $(".msg").html("<p class='msgTxtSucc'>" + response.message +
                            "</p>");
                        $('.loader-div').hide()
                    } else {
                        // $(".msg").html("<p class='msgTxt'>" + response.message + "</p>");
                        alert(response.message)
                        $('.loader-div').hide()
                    }
                    $("#form").css("opacity", "");
                    $(".reg").removeAttr("disabled")
                }
            })
        })


    })
</script>
<?php include './footer.php' ?>