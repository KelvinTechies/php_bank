<?php
session_start();

// require '../CitadelCorporation/Configuration/config.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);


$mail->isSMTP();
$mail->SMTPAuth = true;
// $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
// if (isset($_POST['contact'])) {
//     extract($_POST);
//     if (empty($name || empty($email) || empty($phone) || empty($type) || empty($city) || empty($delivery) || empty($weight) || empty($height) || empty($width) || empty($length))) {
//         echo ("<script>location.href='./quote.php?Allfieldsarerequired'</script>");
//     } elseif (!$pattern) {
//         echo "<div class='alert alert-danger'>Invalid Email</div>";
//     } else {
$br = "<br><br>";
/*  $to = "info@Edm.com";
        $subject = "Edm-Express Quote";
        $headers = array(
            "MIME-Version" => "1.0",
            "Content-type" => "text/html;charset=UTF-8",
            "From" => $email,
            "Reply-To" => $email
        ); */


//         $message = "Hello " . $fname ." ". $lname. $br." We hope this mail finds you correctly, this is your Account Number".  $br . "<strong>" .$account_num. "</strong>";
//         // $sendMessage = mail($to, $subject, $message,  $headers);

//         // $break= echo ("<br>");
//         $mail->Host = "smtp.gmail.com";
//         $mail->Username = "iamkelvincole@gmail.com";
//         $mail->Password = "Osagioduwakelvin";
//         $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
//         $mail->Port = 465;
//         $mail->setFrom($email, $name);
//         $mail->addAddress("Citadel Corporation");
//         $mail->isHTML(true);                                  //Set email format to HTML
//         $mail->Subject = $subject;
//         $mail->Body = $message;
//         $mail->send();
//         //    echo "window.location=./index.php";
//         // echo ("<script>location.href='./index.php'</script>");
//     }
// }


$host = "localhost";
$user = "root";
$pwd = "";
$db_name = "citadel_corporation";



$connection =  mysqli_connect($host, $user, $pwd, $db_name);

if (!$connection) {
    die('connection to database failed');
}
// if (isset($_POST['reg'])) {

// if (isset($reg)) {
// extract($_POST);


$card_num = substr(str_shuffle('123456789'), 0, 3) . substr(str_shuffle('0987612345'), 0, 5) . substr(str_shuffle('123456789'), 0, 4) . substr(str_shuffle('0987612345'), 0, 4);
$csv_num = substr(str_shuffle('123456789'), 0, 2) . substr(str_shuffle('0987612345'), 0, 1);
$actt_num = substr(str_shuffle('123456789'), 0, 3) . substr(str_shuffle('123456789'), 0, 4) . substr(str_shuffle('123456789'), 0, 3);
// if (empty($fname) || empty($lname) || empty($email) || empty($pwd) || empty($repwd) || empty($date) || empty($area_code) || empty($fone) || empty($gender) || empty($addr_1) || empty($addr_2) || empty($office_addr) || empty($country) || empty($state) || empty($postal_code) || empty($marital_status) || empty($acct_type) || empty($currency) || empty($occupation) || empty($_FILES['img']['name']) || empty($imgSign)) {
if (isset($_POST['fname']) ||  isset($_POST['lname']) || isset($_POST['email']) || isset($_POST['pwd']) || isset($_POST['city'])  || isset($_POST['repwd']) || isset($_POST['date']) || isset($_POST['area_code']) || isset($_POST['fone']) || isset($_POST['gender']) ||  isset($_POST['addr_1']) || isset($_POST['addr_2']) || isset($_POST['office_addr']) || isset($_POST['country']) || isset($_POST['state']) || isset($_POST['postal_code']) || isset($_POST['marital_status']) || isset($_POST['acct_type']) || isset($_POST['currency']) || isset($_POST['occupation']) || isset($_POST['img']) || isset($_POST['imgSign'])) {
    $response = array(
        'status' => 0,
        'message' => "Form submission failed"
    );
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pwd = $_POST['pwd'];
    $repwd = $_POST['repwd'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $postal_code = $_POST['postal_code'];
    $marital_status = $_POST['marital_status'];
    $area_code = $_POST['area_code'];
    $fone = $_POST['fone'];
    $gender = $_POST['gender'];
    $addr_1 = $_POST['addr_1'];
    $addr_2 = $_POST['addr_2'];
    $office_addr = $_POST['office_addr'];
    $acct_type = $_POST['acct_type'];
    $currency = $_POST['currency'];
    $occupation = $_POST['occupation'];
    $city = $_POST['city'];
    $img = $_FILES['img'];
    $imgSign = $_FILES['imgSign'];
    $Rdob = "";
    $role = 0;
    $Rssn = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 3) . substr(str_shuffle('a123b45cde098fghijk76lmnopqrstuvwxyz'), 0, 4) . substr(str_shuffle('1234567890'), 0, 3);
    if (empty($fname) || empty($lname) || empty($office_addr)  || empty($city) || empty($acct_type) || empty($email) || empty($pwd) || empty($repwd) || empty($date) || empty($fone) || empty($country) || empty($state) || empty($postal_code) || empty($marital_status) || empty($area_code) || empty($gender) || empty($addr_1) || empty($addr_2) || empty($currency) || empty($occupation) || empty($_FILES['img']['name']) || empty($_FILES['imgSign']['name'])) {

        $uploadStatus = 0;
        $response['message'] = "All Fields are required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $uploadStatus = 0;
        $response['message'] = "Please check your Email Address";
    } elseif (!preg_match("/^[0-9 ]*$/", $fone)) {
        $uploadStatus = 0;
        $response['message'] = "Invalid Phone number";
    } elseif ($pwd != $repwd) {
        $uploadStatus = 0;
        $response['message'] = "Password Mixmatched";
    } else {
        $sql = "SELECT * FROM `banking` WHERE email=?";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $uploadStatus = 0;
            $response['message'] = "sql error";
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $result = mysqli_stmt_num_rows($stmt);

            if ($result > 0) {
                $uploadStatus = 0;
                $response['message'] = "User Already Exists";
            } else {

                $uploadStatus = 1;
                $uploadedFile = "";
                $destination = '../upload/';
                $destinationSign = '../signature/';

                $to = "CitadelCorporation@mail.com";
                $subject = "Citadel Corporation";
                $headers = array(
                    "MIME-Version" => "1.0",
                    "Content-type" => "text/html;charset=UTF-8",
                    "From" => $email,
                    "Reply-To" => $email
                );
                $message = "Hello " . $fname . " " . $lname . $br . "Thank you for choosing Citadel Corporation" . $br . "We hope this mail finds you correctly, this is your Account Number" .  $br . "<strong>" . $actt_num . "</strong>";
                // $sendMessage = mail($to, $subject, $message,  $headers);
                $name = $fname . " " . $lname;
                // $break= echo ("<br>");
                /*    $mail->Host = "smtp.gmail.com";
                $mail->Username = "iamkelvincole@gmail.com";
                $mail->Password = "Osagioduwakelvin";
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port = 465;
                $mail->setFrom($email, $name);
                $mail->addAddress("codewithSas@gmail.com");
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = $subject;
                $mail->Body = $message;
                $mail->send(); */
                //    echo "window.location=./index.php";
                $uploadStatus = 1;
                $response['message'] = "";
                if (!empty($_FILES['img']['name'])) {
                    $FileName = basename($_FILES['img']['name']);
                    $NewFileName = uniqid("", true) . "." . $FileName;
                    $targetFilePath = $destination . $NewFileName;
                    $FileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                    $allowed = ['jpg'];
                    if (in_array($FileType, $allowed)) {
                        if ($_FILES['img']['size'] < 10485760) {
                            if (move_uploaded_file($_FILES['img']['tmp_name'], $targetFilePath)) {
                                $uploadStatus = 1;
                                $uploadedFile = $NewFileName;
                                $response['message'] = "";
                            } else {
                                $uploadStatus = 0;
                                $response['message'] = "There was an error uploading your file";
                            }
                        } else {
                            $uploadStatus = 0;
                            $response['message'] = "Your Image is Too Big";
                        }
                    } else {
                        $uploadStatus = 0;
                        $response['message'] = "Sorry, only " . implode('/', $allowed) . " Files are Allowed";
                    }
                }
                if (!empty($_FILES['imgSign']['name'])) {
                    $FileNameSignature = basename($_FILES['imgSign']['name']);
                    $NewFileNameSignature = uniqid("", true) . "." . $FileNameSignature;
                    $targetFilePathSignature = $destinationSign . $NewFileNameSignature;
                    $FileTypeSignature = pathinfo($targetFilePathSignature, PATHINFO_EXTENSION);
                    $allowedSignature = ['jpg'];
                    if (in_array($FileTypeSignature, $allowedSignature)) {
                        if ($_FILES['imgSign']['size'] < 10485760) {
                            if (move_uploaded_file($_FILES['imgSign']['tmp_name'], $targetFilePathSignature)) {
                                $uploadStatus = 1;
                                $uploadedFileForSignature = $NewFileNameSignature;
                                $response['message'] = "";
                            } else {
                                $uploadStatus = 0;
                                $response['message'] = "There was an error uploading your Signature Image";
                            }
                        } else {
                            $uploadStatus = 0;
                            $response['message'] = "Your File is Too Big";
                        }
                    } else {
                        $uploadStatus = 0;
                        $response['message'] = "Sorry, only " . implode('/', $allowed) . " Files are Allowed for your Signature";
                    }
                }
                if ($uploadStatus == 1) {
                    $sql2 = "INSERT INTO `banking`(`first_name`, `last_name`, `email`, `role`, `account_num`, `password`, `area_code`, `mobile`, `gender`, `add_1`, `add_2`, `office_addr`, `country`, `state`, `City`, `Ssn`, `card_number`, `csv_number`, `dob`, `postal_code`, `maritsl_status`, `account_type`, `occupation`, `currency`,  `Image`, `signature`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                    $stmt2 = mysqli_stmt_init($connection);
                    if (!mysqli_stmt_prepare($stmt2, $sql2)) {
                        $uploadStatus = 0;
                        $response['message'] = "sql errorII";
                    } else {
                        $to = "CodeWithSasTech@gmail.com";
                        $subject = "Citadel Corporation";
                        $headers = array(
                            "MIME-Version" => "1.0",
                            "Content-type" => "text/html;charset=UTF-8",
                            "From" => $email,
                            "Reply-To" => $email
                        );
                        $message = "Hello " . $fname . " " . $lname . $br . " We hope this mail finds you correctly, this is your Account Number" .  $br . "<strong>" . $actt_num . "</strong>";
                        // $sendMessage = mail($to, $subject, $message,  $headers);
                        // zzkgjqtkuphrogzk
                        // naqtciltehmvzisw
                        // $break= echo ("<br>");
                        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                        $mail->Host = "smtp.gmail.com";
                        $mail->Username = "iamkelvincole@gmail.com";
                        $mail->Password = "naqtciltehmvzisw";
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                        $mail->Port = 465;
                        $mail->setFrom($email, $name);
                        $mail->addAddress("CodeWithSasTech@gmail.com");
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = $subject;
                        $mail->Body = $message;
                        $mail->send();
                        $csv = chunk_split($csv_num, 4, " ");
                        $hswpwd = password_hash($pwd, PASSWORD_DEFAULT);
                        // mysqli_stmt_bind_param($stmt2, 'ssssssssssssssssssssssssss', $fname, $lname, $email, $role, $actt_num, $hswpwd, $area_code, $fone, $gender, $addr_1, $addr_2, $office_addr, $country, $state, $city, $Rssn, $card_num, $csv, $date, $postal_code, $marital_status, $acct_type, $occupation, $currency, $uploadedFile, $uploadedFileForSignature);
                        mysqli_stmt_bind_param($stmt2, 'ssssssssssssssssssssssssss', $fname, $lname, $email, $role, $actt_num, $hswpwd, $area_code, $fone, $gender, $addr_1, $addr_2, $office_addr, $country, $state, $city, $Rssn, $card_num, $csv, $date, $postal_code, $marital_status, $acct_type, $occupation, $currency, $uploadedFile, $uploadedFileForSignature);
                        $insert = mysqli_stmt_execute($stmt2);
                        if ($insert) {
                            $ins = "SELECT * FROM `banking` WHERE email=?";
                            $InsStmt = mysqli_stmt_init($connection);
                            if (!mysqli_stmt_prepare($InsStmt, $ins)) {
                                $uploadStatus = 0;
                                $response['message'] = "User sql Error";
                            } else {
                                mysqli_stmt_bind_param($InsStmt, 's', $email);
                                mysqli_stmt_execute($InsStmt);
                                $res = mysqli_stmt_get_result($InsStmt);
                                if ($resNoti = mysqli_fetch_assoc($res)) {
                                    // if ($resNoti = mysqli_fetch_assoc($InsStmt)) {
                                    $_SESSION['id'] = $resNoti['id'];
                                    $notId = $_SESSION['id'];
                                    $notiMsg = "You Just Received $500 from Citadel Corporation";
                                    $noti = "INSERT INTO `notifications`(`receiver_id`, `message`) VALUES ('$notId', '$notiMsg')";
                                    $notiData = mysqli_query($connection, $noti);
                                    if ($notiData) {
                                        $mail->send();

                                        $response['status'] = 1;
                                        $response['message'] = "Check Your Email For Confirmation";
                                    } else {
                                        $uploadStatus = 0;
                                        $response['message'] = "User rgrr Exists";
                                    }
                                    // echo "success";
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    echo json_encode($response);
}
// }
// }


// if (isset($login)) {
//     extract($_POST);
if (isset($_POST['account_num']) || isset($_POST['password'])) {
    $response = array(
        'status' => 0,
        'message' => "Form submission failed"
    );
    $account_num = $_POST['account_num'];
    $password = $_POST['password'];

    if (empty($account_num) && empty($password)) {
        $uploadStatus = 0;
        $response['message'] = "All Fields are required";
    } else {
        $sql3 = "SELECT * FROM `banking` WHERE account_num=?";
        $stmt3 = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt3, $sql3)) {
            $uploadStatus = 0;
            $response['message'] = "Sql Error";
        } else {
            mysqli_stmt_bind_param($stmt3, 's', $account_num);
            mysqli_stmt_execute($stmt3);
            $res = mysqli_stmt_get_result($stmt3);
            if ($row = mysqli_fetch_assoc($res)) {
                $pwdVerify = password_verify($password, $row['password']);
                if ($pwdVerify == false) {
                    $uploadStatus = 0;
                    $response['message'] = "Wrong Password or Invalid Account Number";
                } elseif ($pwdVerify == true) {
                    $_SESSION['user'] = $row['first_name'] . '- ' . $row['last_name'];
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['user_type'] = $row['role'];
                    if (isset($_SESSION['id'])) {
                        $response['status'] = 1;
                        $response['message'] = "";
                    }
                }
            } else {
                $uploadStatus = 0;
                $response['message'] = "User Does Not Exists";
            }
        }
        sleep(3);
    }
    echo json_encode($response);
}





if (isset($_POST['Pfname']) || isset($_POST['Plname']) || isset($_POST['Pemail']) || isset($_POST['Pfone']) || isset($_POST['Pcountry']) || isset($_POST['Pstate']) || isset($_POST['dob']) || isset($_POST['Paccount']) || isset($_POST['Pgender']) || isset($_POST['pos_code']) || isset($_POST['curr']) || isset($_POST['Paddr_1']) || isset($_POST['Paddr_2']) || isset($_POST['profCity']) ||  isset($_POST['ssn']) || isset($_POST['mat_stat']) || isset($_POST['prof_occ'])) {
    $response = array(
        'status' => 0,
        'message' => "Please Try Again"
    );
    $Pfname = $_POST['Pfname'];
    $Plname = $_POST['Plname'];
    $Pemail = $_POST['Pemail'];
    $Pfone = $_POST['Pfone'];
    $Pcountry = $_POST['Pcountry'];
    $Pstate = $_POST['Pstate'];
    $dob = $_POST['dob'];
    $Paccount = $_POST['Paccount'];
    $Pgender = $_POST['Pgender'];
    $pos_code = $_POST['pos_code'];
    $curr = $_POST['curr'];
    $Paddr_1 = $_POST['Paddr_1'];
    $Paddr_2 = $_POST['Paddr_2'];
    $profCity = $_POST['profCity'];
    $mat_stat = $_POST['mat_stat'];
    $prof_occ = $_POST['prof_occ'];
    $ssn = $_POST['ssn'];

    if (empty($Pfname) || empty($Plname) || empty($Pemail)  || empty($ssn) || empty($Pfone) || empty($Pcountry) || empty($Pstate) || empty($dob) || empty($Paccount) || empty($Pgender) || empty($pos_code) || empty($curr) || empty($Paddr_1) || empty($Paddr_2) || empty($profCity) || empty($mat_stat) || empty($prof_occ)) {
        $uploadStatus = 0;
        $response['message'] = "All Fields Are required";
    } elseif (!filter_var($Pemail, FILTER_VALIDATE_EMAIL)) {
        $uploadStatus = 0;
        $response['message'] = "Please check your Email Address";
    } elseif (!preg_match("/^[0-9 ]*$/", $Pfone)) {
        $uploadStatus = 0;
        $response['message'] = "Invalid Phone number";
    } else {
        if (isset($_SESSION['id'])) {

            $Pid = $_SESSION['id'];
        }
        $psql = "UPDATE `banking` SET `id`='$Pid',`first_name`='$Pfname',`last_name`='$Plname',`email`='$Pemail',`mobile`='$Pfone',`gender`='$Pgender',`add_1`='$Paddr_1',`add_2`='$Paddr_2',`country`='$Pcountry',`state`='$Pstate',`City`='$profCity',`Ssn`='$ssn',`dob`='$dob',`postal_code`='$pos_code',`maritsl_status`='$mat_stat',`account_type`='$Paccount',`occupation`='$prof_occ',`currency`='$curr' WHERE id='$Pid'";
        $query  = mysqli_query($connection, $psql);
        if ($query) {
            $response['status'] = 1;
            $response['message'] = "Updated Successfully";
        } else {
            $uploadStatus = 0;
            $response['message'] = "SomeThing Went Wrong";
        }
    }
    echo json_encode($response);
}






// <?php echo $_SESSION['id'] 
function redirect()
{
    if (!isset($_SESSION['id'])) {
        header('location:./login.php');
    }
}


function logOut()
{
    if (isset($_GET['logout_id'])) {
        /*    session_unset(); */
        $id = $_GET['logout_id'];

        if ($id) {
            session_destroy();
            header('location:./login.php');
        }
    }
}
function getUser($part)
{
    global $connection;

    if (isset($_SESSION['id'])) {

        $id = $_SESSION['id'];

        $sql6 = "SELECT * FROM `banking` WHERE id={$id}";

        $que = mysqli_query($connection, $sql6);

        if (mysqli_num_rows($que) > 0) {
            if ($row = mysqli_fetch_assoc($que)) {

                return $row[$part];
            }
        }
    }
}



if (isset($_FILES['imgFile'])) {
    $response = array(
        'status' => 0,
        'message' => "Please Try Again"
    );
    $imgFile = $_FILES['imgFile'];
    if (empty($_FILES['imgFile']['name'])) {
        $uploadStatus = 0;
        $response['message'] = 'Please select an Image';
    } else {
        $uploadStatus = 1;
        $uid = $_SESSION['id'];
        $uploadedFilePic = "";
        $destinationPic = '../upload/';
        if (!empty($_FILES['imgFile']['name'])) {
            $FileNamePic = basename($_FILES['imgFile']['name']);
            $NewFileNamePic = uniqid("", true) . "." . $FileNamePic;
            $targetFilePathPic = $destinationPic . $NewFileNamePic;
            $FileTypePic = pathinfo($targetFilePathPic, PATHINFO_EXTENSION);
            $allowedPic = ['jpg'];
            if (in_array($FileTypePic, $allowedPic)) {
                if ($_FILES['imgFile']['size'] < 10485760) {
                    if (move_uploaded_file($_FILES['imgFile']['tmp_name'], $targetFilePathPic)) {
                        $uploadStatus = 1;
                        $uploadedFilePic = $NewFileNamePic;
                        $sql4 = "UPDATE `banking` SET `id`='$uid',`Image`='$uploadedFilePic' WHERE id=$uid";
                        $query = mysqli_query($connection, $sql4);
                        if ($query) {
                            $response['status'] = 1;
                            $response['message'] = "Image Updated Successfully";
                        } else {
                            $uploadStatus = 0;
                            $response['message'] = "Not working";
                        }
                    } else {
                        $uploadStatus = 0;
                        $response['message'] = "There was an error uploading your file";
                    }
                } else {
                    $uploadStatus = 0;
                    $response['message'] = "Your Image is Too Big";
                }
            } else {
                $uploadStatus = 0;
                $response['message'] = "Sorry, only " . implode('/', $allowedPic) . " Files are Allowed";
            }
        }
        // $profileId = $_SESSION['id'];
        // $file = $_FILES['img'];
        // $filename = $file['name'];
        // $filetype = $file['type'];
        // $filetmp_name = $file['tmp_name'];
        // $fileerror = $file['error'];
        // $filesize = $file['size'];


        // $allowed = ['jpg'];


        // $FileExt = explode('.', $filename);

        // $actualFileExt = strtolower(end($FileExt));

        // if (in_array($actualFileExt, $allowed)) {
        //     if ($fileerror == 0) {
        //         if ($filesize > 50000) {

        //             $newFileName = uniqid("", true) . "." . $actualFileExt;
        //             $destination = './upload/' . '.' . $newFileName;
        //             $moveImg =  move_uploaded_file($filetmp_name,  $destination);
        //             if ($moveImg) {
        //                 $sql4 = "UPDATE `banking` SET `id`='$uid',`Image`='$newFileName', WHERE id=$uid";
        //                 $query = mysqli_query($connection, $sql4);
        //                 if ($query) {
        //                     $response['status'] = 1;
        //                     $response['message'] = "Image Updated Successfully";
        //                 } else {
        //                     $uploadStatus = 0;
        //                     $response['message'] = "Not working";
        //                 }
        //             }
        //         }
        //     } else {
        //         $uploadStatus = 0;
        //         $response['message'] = "Your Signature file size is too big";

        //         $uploadStatus = 0;
        //         $response['message'] = "There was an Error Uploading Your Signature File";
        //     }
        // } else {
        //     $uploadStatus = 0;
        //     $response['message'] = "File Format   is not supported";
        // }
    }
    echo json_encode($response);
}


function Trasaction()
{
    global $connection;
    if (isset($_SESSION['id'])) {
        $from = "Citadel Corporation";
        $Uid = $_SESSION['id'];
        $sql7 = "SELECT * FROM `deposit`  WHERE receiver_id=$Uid";
        // $sql8 = "SELECT * FROM `banking` WHERE id= $Uid";
        // $query8 = mysqli_query($connection, $sql8);
        $query7 = mysqli_query($connection, $sql7);
        // if (mysqli_num_rows($query8) > 0) {

        if (mysqli_num_rows($query7) > 0) {
            while ($res = mysqli_fetch_assoc($query7)) {
                // $rowUser = $res['first_name'] . '- ' . $res['last_name'];
                // $rowDate = $res['date'];
                $rowAmount = $res['amount'];
                $rowuser_id = $res['user_id'];
                $rowreceiver_id = $res['receiver_id'];
                // $rowDate = $res['date'];
                // $defaultAmount = 500;
                // $time = new DateTime($rowDate);
                // $dateRow = $time->format('n/j/Y');
                // $time = $time->format('H:i');
                // while ($resAll = mysqli_fetch_assoc($query8)) {
                $sql8 = "SELECT * FROM `banking` WHERE id= $Uid";
                $query8 = mysqli_query($connection, $sql8);

                if (mysqli_num_rows($query8) > 0) {
                    while ($resAll = mysqli_fetch_assoc($query8)) {

                        $rowUserAll = $resAll['first_name'] . '- ' . $resAll['last_name'];
                        $row = $resAll['role'];
                        $rowDate = $res['date'];
                        $defaultAmount = 500;
                        $time = new DateTime($rowDate);
                        $dateRow = $time->format('n/j/Y');
                        $time = $time->format('H:i');
                        if ($row == 1) {

                            echo " 
                        <thead>
                        <tr>
                            <th><span class='las la-sort'></span> TRANSACTION </th>
                            <th><span class='las la-sort'></span> Users </th>
                            <th><span class='las la-sort'></span> ISSUED DATE</th>
                            <th><span class='las la-sort'></span> TIME </th>
                            <th><span class='las la-sort'></span> BALANCE</th>
                            <th><span class='las la-sort'></span> STATUS </th>
                        </tr>
                    </thead>  
            <tbody>

           <tr>

               <td>
           <div class='client_info'>
               <h4>Credit</h4>
           </div>
       </td>
       <td>
       $rowUserAll
   </td>


         
             
         
                <td>
                    $$defaultAmount
                </td>

       <td>
           <span class='paid'>Completed</span>
       </td>

   </tr>
   </tbody>
   
   ";
                        } else {
                            echo "  
                        
                    <tr>
         
                        <td>
                    <div class='client_info'>
                        <h4 class='credit'>Credit</h4>
                    </div>
                </td>
             
                <td>
                $from
            </td>
            <td>
            $rowUserAll
        </td>

              
         
                <td>
                    $dateRow
                </td>
                <td>
                $time
            </td>   <td>
            $$rowAmount.00
        </td>
                <td>
                    <span class='paid'>Completed</span>
                </td>
         
            </tr>
            
            ";
                        }
                    }
                }
            }
        }
    }
}


if (isset($_POST['depAmount']) || isset($_POST['a_num'])) {
    $res = array(
        'stat' => 0,
        'msg' => "Please Try Again"
    );
    $Depid = $_SESSION['id'];
    $depAmount = $_POST['depAmount'];
    $a_num = $_POST['a_num'];
    if (empty($depAmount)) {
        $stat = 0;
        $res['msg'] = "Please insert an amount";
    } elseif (empty($a_num)) {
        $stat = 0;
        $res['msg'] = "Please insert an Account Number";
    } else {
        $stat = 1;
        if ($stat == 1) {
            $bankId = "SELECT * FROM `banking` WHERE account_num =$a_num";
            $conn = mysqli_query($connection, $bankId);

            if (mysqli_num_rows($conn) > 0) {
                if ($bank = mysqli_fetch_assoc($conn)) {
                    $bankRow = $bank['id'];
                    $fname = $bank['first_name'];
                    $lname = $bank['last_name'];
                    $email = $bank['email'];
                }
                $sql9 = "INSERT INTO `deposit`(`user_id`, `amount`, `receiver_id`) VALUES (?,?,?)";
                $query9 = mysqli_stmt_init($connection);
                if (!mysqli_stmt_prepare($query9, $sql9)) {
                    $stat = 0;
                    $res['msg'] = "db Error";
                } else {
                    $name = $fname . " " . $lname;

                    $to = "CodeWithSasTech@gmail.com";
                    $subject = "Citadel Corporation";
                    $headers = array(
                        "MIME-Version" => "1.0",
                        "Content-type" => "text/html;charset=UTF-8",
                        "From" => $email,
                        "Reply-To" => $email
                    );
                    $message = "Hello " . $fname . " " . $lname . $br . " You just received, <strong> $" . $depAmount . "</strong> in your Account from Citadel Corporation";

                    $mail->Host = "smtp.gmail.com";
                    $mail->Username = "iamkelvincole@gmail.com";
                    $mail->Password = "naqtciltehmvzisw";
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->Port = 465;
                    $mail->setFrom($email, $name);
                    $mail->addAddress("CodeWithSasTech@gmail.com");
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = $subject;
                    $mail->Body = $message;
                    mysqli_stmt_bind_param($query9, 'sss', $Depid, $depAmount, $bankRow);
                    $inSertDep = mysqli_stmt_execute($query9);
                    if ($inSertDep) {
                        $notiMsg = "You Just Received $" . $depAmount . " from Citadel Corporation";
                        $noti = "INSERT INTO `notifications`(`receiver_id`, `message`) VALUES ('$bankRow', '$notiMsg')";
                        $notiData = mysqli_query($connection, $noti);
                        if ($notiData) {
                            $res['stat'] = 1;
                            $res['msg'] = "Deposited";
                            $mail->send();
                        }
                    }
                }
            } else {
                $stat = 0;
                $res['msg'] = "Invalid Account Number";
            }
        }
    }
    echo json_encode($res);
}


function account_Balance()
{
    global $connection;
    if (isset($_SESSION['id'])) {
        $receiver_id = $_SESSION['id'];
        $sql11 = "SELECT * FROM `deposit` WHERE receiver_id=$receiver_id";
        $query11 = mysqli_query($connection, $sql11);

        if (!$query11) {
            echo " <p>SQl for depositning erro</p>";
        } else {
            $totalAmount = 500;

            if (mysqli_num_rows($query11) > 0) {
                // if ($bankDep = mysqli_fetch_assoc($query11)) {
                $sum = "SELECT amount from deposit where receiver_id=$receiver_id";
                $sumQuery = mysqli_query($connection, $sum);

                if (mysqli_num_rows($sumQuery) > 0) {
                    while ($bankDep = mysqli_fetch_assoc($sumQuery)) {
                        $bankRow = $bankDep['amount'];

                        $totalAmount += $bankRow;
                        echo "<p>$totalAmount</p>";
                    }
                }
            } else {
                echo " <p>$500.00</p>";
            }
        }
    }
}


function All_Notifications()
{
    global $connection;
    if (isset($_SESSION['id'])) {
        $receiver_id = $_SESSION['id'];
        $sql11 = "SELECT * FROM `notifications` WHERE receiver_id=$receiver_id";
        $query11 = mysqli_query($connection, $sql11);

        if (!$query11) {
            echo " <p>SQl for notifications error</p>";
        } else {
            if (mysqli_num_rows($query11) > 0) {
                while ($notify = mysqli_fetch_assoc($query11)) {
                    $notifyMsg = $notify['message'];
                    /* $fname = $bank['first_name'];
                    $lname = $bank['last_name'];
                    $email = $bank['email']; */
                    echo "<ul>
                    <li style='font-weight:900; color:green'>$notifyMsg</li>
                          </ul>  
                    
                    ";
                }
            }
        }
    }
}
