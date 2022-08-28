<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NAHMP Register</title>
    <link rel="stylesheet" href="css/form.css">
    <script src="jquery-3.6.0.js"></script>
</head>
<body>
    <main>
        <header>
            <a href="index.html">&#10094;Back&nbsp;to&nbsp;Home</a>
            <marquee direction="left">Register to be a user today...</marquee>
        </header>
        <form action="#" id="myForm">
            <div class="wrap-logo">
                <div class="logo">
                    <img src="images/NAHMP_Logo.png" alt="Logo" width="200px" height="200px"><br>
                    <h2>Register to be a <br>member now</h2>
                </div>
            </div>            
            <div class="field">                
                <div class="name-area">
                    <div class="field">
                        <label>Surname</label>
                        <input type="text" name="sur_name" placeholder="Surname" required>
                    </div>
                    <div class="field shift">
                        <label>First Name</label>
                        <input type="text" name="fname" placeholder="First name" required>
                    </div>
                </div>
            </div>
            <div class="field">
                <label>Other name</label>
                <input type="text" name="other_name" placeholder="Other name">
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
            <div class="field">
                <label>Gender</label>
                <select name="gender">
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>
            <div class="field">
                <label>State</label>
                <select name="state" aria-placeholder="Select your Country" required>
                    <option>Abia</option>
                    <option>Adamawa</option>
                    <option>Akwa ibom</option>
                    <option>Anambra</option>
                    <option>Bauchi</option>
                    <option>Beyelsa</option>
                    <option>Benue</option>
                    <option>Borno</option>
                    <option>Cross River</option>
                    <option>Delta</option>
                    <option>Ebonyi</option>
                    <option>Edo</option>
                    <option>Ekiti</option>
                    <option>Enugu</option>
                    <option>Gombe</option>
                    <option>Imo</option>
                    <option>Jigawa</option>
                    <option>Kaduna</option>
                    <option>Katsina</option>
                    <option>Kebbi</option>
                    <option>Kogi</option>
                    <option>Kwara</option>
                    <option>Lagos</option>
                    <option>Nasarawa</option>
                    <option>Niger</option>
                    <option>Ogun</option>
                    <option>Ondo</option>
                    <option>Osun</option>
                    <option>Oyo</option>
                    <option>Plateau</option>
                    <option>Rivers</option>
                    <option>Sokoto</option>
                    <option>Taraba</option>
                    <option>Yobe</option>
                    <option>Zamfara</option>
                    <option>FCT</option>
                </select>
            </div>
            <div class="field">
                <label>Phone number</label>
                <input type="text" name="phone" placeholder="Phone Number" maxlength="11" required>
            </div>
            <div class="field">
                <label>Qualification</label>
                <input type="text" name="qualification" placeholder="Qualification">
            </div>
            <div class="field">
                <label>Religion</label>
                <select name="religion">
                    <option>Christian</option>
                    <option>Islam</option>
                </select>
            </div>
            <button type="submit" id="SignUp">Submit</button>
            <p>Already a user? <a href="signin.php">Sign in</a></p>
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
            $('#SignUp').click( function(){
                $.ajax({
                    method: 'POST',
                    url: 'include/reg_user.php',
                    data: $('#myForm').serialize(),
                    success: function(data){
                        // console.log(data);
                        alert(data);
                        if(data == 'success'){
                            location.href = 'index.php';
                        }else{
                            alert("We could not submit form data");
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>