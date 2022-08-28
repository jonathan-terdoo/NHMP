<?php
    session_start();
    include 'connection.php';
    $sur_name = mysqli_real_escape_string($con, $_POST['sur_name']);
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $other_name = mysqli_real_escape_string($con, $_POST['other_name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass = mysqli_real_escape_string($con, $_POST['pass']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $state = mysqli_real_escape_string($con, $_POST['state']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $religion = mysqli_real_escape_string($con, $_POST['religion']);
    $qualification = mysqli_real_escape_string($con, $_POST['qualification']);

    if(!empty($sur_name) && !empty($fname) && !empty($other_name) && !empty($gender) && !empty($email) && !empty($pass)){
        $check_email = "select * from users where email = '$email'";
        $run = mysqli_query($con, $check_email);
        $row = mysqli_num_rows($run);
        if($row == 1){
            echo "$email - This email is already taken please use another";
        }else{
            if(strlen($pass) < 5){
                echo "Please password should be or pass 5 characters long!";
            }else{
                $new_image = "../images/profile.jpg";
                $status = "Online";
                $insert = "insert into users (sur_name, fname, other_name, email, pass, gender, state, phone, religion, qualification, profile_photo, status) 
                            values ('{$sur_name}', '{$fname}', '{$other_name}', '{$email}', '{$pass}', '{$gender}', '{$state}', '{$phone}', '{$religion}', '{$qualification}', '{$new_image}', '{$status}')";
                $run_insert = mysqli_query($con, $insert);
                if($run_insert){
                    $get_user = "select * from users where email = '$email'";
                    $run_get = mysqli_query($con, $get_user);

                    if(mysqli_num_rows($run_get) > 0){
                        $row = mysqli_fetch_assoc($run_get);

                        $_SESSION['email'] = $row['email'];
                        echo 'success';
                    }
                }
            }
        }
    }else{
        echo "Please your names and email and password are required! you can skip other name";
    }
?>