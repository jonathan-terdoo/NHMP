<!DOCTYPE html>
<?php 
    session_start();
    include 'include/connection.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NHAMP</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="jquery-3.6.0.js"></script>
</head>
<body>
    <!-- sidebar here -->
        <div class="sidebar">
            <div class="logo-header">
                <img src="images/NAHMP_Logo.png" style="width: 200px; height: 200px;">
                <h1>DASHBOARD</h1>
            </div>
            <div class="sidebar-cont">
                <a href="#" class="click">About us</a>
                    <span class="context">
                        <a href="#">Vision</a>
                        <a href="#">Mission</a>
                        <a href="#">Organogram</a>
                    </span>
                <a href="#" class="click">Licensing</a>
                    <span class="context">
                        <a href="#">Vision</a>
                        <a href="#">Mission</a>
                        <a href="#">Organogram</a>
                    </span>
                <a href="#" class="click">Publication</a>
                <a href="message.php" class="click">Messages</a>
                <a href="#" class="click">News</a>
                <a href="#" class="click">Inpection and Monitoring</a>
                <a href="#" class="click">Partnership support</a>
            </div>
        </div>
    <!-- sidebar ends here -->

    <!-- main panel start here -->
        <main>
            <header>
                <span class="bar">
                    &#9776;
                </span>
                <h1>Welcome to NAHMP</h1>
                <input type="search" name="search" id="search" placeholder="Search the site here...">
                <?php
                    if(isset($_SESSION['email'])){
                        $user = $_SESSION['email'];
                        $select = "select * from users where email ='$user'";
                        $run_select = mysqli_query($con, $select);

                        $row = mysqli_fetch_assoc($run_select);
                        
                        echo '
                            <span class="user">
                            <div class="circle">
                                <img src="$row["profile_photo"]" style="width: 50px; height: 50px;">
                            </div>
                                $row["status"]
                            </span>
                        ';
                    }else{
                        echo '
                            <div class="log">
                                <a href="register.php">Register</a>
                                <a href="#">|</a>
                                <a href="signin.php">Log in</a>                    
                            </div>
                        ';
                    }
                ?>                
            </header>

            <div class="pane">
                <p>
                    What is Lorem Ipsum?
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the
                    1500s, when an unknown printer took a galley of type and scrambled it to 
                    make a type specimen book. It has survived not only five centuries, but 
                    also the leap into electronic typesetting, remaining essentially unchanged. 
                    It was popularised in the 1960s with the release of Letraset sheets 
                    containing Lorem Ipsum passages, and more recently with desktop publishing 
                    software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>                                
            </div>
            <div class="pane2">
                <div class="slide"></div>
                <div class="slide"></div>
                <div class="slide"></div>
            </div>
            <hr>
            <footer>
                <p>
                    &copy; 2021 production limited | Designed by Jonathan Demawa
                </p>
            </footer>
        </main>
    <!-- main panel ends here -->
    <script>
        $('document').ready(function(){
            $('.sidebar .sidebar-cont .click').click(function(){
                if(false == $(this).next().is(':visible')){
                    // $('.context').slideUp();
                    $(this).next().slideToggle(300);
                }else{
                    $('.context').slideUp();
                }
            });
            $('.context').eq(0).show();            
        });
    </script>
</body>
</html>