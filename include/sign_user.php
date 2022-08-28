<?php
    session_start();
    include 'connection.php';
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass = mysqli_real_escape_string($con, $_POST['pass']);

    if(!empty($email) && !empty($pass)){
        $select = "select * from users where email = '$email' AND pass = '$pass'";
        $run_insert = mysqli_query($con, $select);
        if(mysqli_num_rows($run_insert) == 1){
            $get_user = "select * from users where email = '$email'";
            $run_get = mysqli_query($con, $get_user);

            if(mysqli_num_rows($run_get) > 0){
                $row = mysqli_fetch_assoc($run_get);

                $_SESSION['email'] = $row['email'];
                echo 'success';
            }
        }else{
            echo "Invalid email or password!";
        }
    }else{
        echo "Please your email and password is required!";
    }
?>