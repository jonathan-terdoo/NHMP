<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NAHMP Log in</title>
    <link rel="stylesheet" href="css/form.css">
    <script src="jquery-3.6.0.js"></script>
</head>
<body>
    <main>
        <header>
            <a href="register.php">&#10094;Back</a>
            <marquee direction="left">Sign in to be a user today...</marquee>
        </header>
        <form action="#" id="myForm">
            <div class="wrap-logo">
                <div class="logo">
                    <img src="images/NAHMP_Logo.png" alt="Logo" width="200px" height="200px"><br>
                    <h2>Sign in to be a <br>member now</h2>
                </div>
            </div>
            <div class="field">
                <label>Email</label>
                <input type="email" name="email" placeholder="Your email address" required>
            </div>
            <div class="wrap-pass">
                <div class="field">
                    <label>Password</label>
                    <input type="password" id="pass" name="pass" placeholder="Your password here" required>
                </div>
                <input type="checkbox" id="Show_hide"> <label id="showText">Show Password</label>
            </div>            
            <button type="submit" id="logIn">Log in</button>
            <p>Not a user? <a href="register.php">Sign up</a></p>
        </form>
    </main>
    <script>
        let pass = document.querySelector('#pass'),
        showText = document.querySelector('#showText'),
        show = document.querySelector('#Show_hide');

        show.onclick = function(){
            if(pass.type == 'password'){
                pass.type = 'text';
                showText.innerHTML = 'Hide Password';
            }else{
                pass.type = 'password';
                showText.innerHTML = 'Show Password';
            }
        }
    </script>
    <script>
        $('document').ready(function(){
            $('#myForm').submit(function(e){
                e.preventDefault();
            });
            $('#logIn').click( function(){
                $.ajax({
                    method: 'POST',
                    url: 'include/sign_user.php',
                    data: $('#myForm').serialize(),
                    success: function(data){
                        // console.log(data);
                        alert(data);
                        if(data == 'success'){
                            location.href = 'index.php';
                        }else{
                            alert("We could not log you in!");
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>