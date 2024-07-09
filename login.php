<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="stylesheet/login.css">
    <link rel="stylesheet" href="stylesheet/icons.css">
    <script src="jsfiles/loginbasic.js" defer></script>
    <script src="jsfiles/jquery.min.js"></script>
    <script src="jsfiles/basic.min.js" defer></script>
    <script src="scriptsServer/register.js" defer></script>
    <script src="scriptsServer/login.js" defer></script>
</head>
<body>
    <?php include 'errorDisplay.php' ?>
    <div class="card">
        <div class="main">
            <div class="registerPage">
                <div class="content">
                    <h3>Register</h3>
                    <form action="#" class="register" enctype='multipart/form-data'>
                        <div class="firstSection show">
                            <div class="feildBox">
                                <input type="email" name="email" required>
                                <span>Email</span>
                            </div>
                            <div class="feildBox">
                                <input type="password" name="password" required>
                                <span>Password</span>
                                <div class="eye">
                                    <div class="eyeIcon mask-style"></div>
                                </div>
                            </div>
                            <div class="feildBox">
                                <input type="password" name="repassword" required>
                                <span>Re-Password</span>
                                <div class="eye">
                                    <div class="eyeIcon mask-style"></div>
                                </div>
                            </div>
                        </div>
                        <div class="secondSection">
                            <div class="feildBox">
                                <input type="text" name="fname" required>
                                <span>First Name</span>
                            </div>
                            <div class="feildBox">
                                <input type="text" name="lname" required>
                                <span>Last Name</span>
                            </div>
                            <div class="feildBox">
                                <input type="file" name="file" required class="filebtn">
                                <div title="upload" class="filePlaceholder">
                                    <span class="iconImg mask-style"></span>
                                    <span>Upload Image</span>
                                </div>
                            </div>
                        </div>
                        <button class="btn" name="submit" type="submit">Next</button>
                    </form>
                </div>
            </div>
            <div class="loginPage">
                <div class="content">
                    <h3>Login</h3>
                    <form action="#" class="login">
                        <div class="feildBox">
                            <input type="email" name="email" required style="padding-right: 35px;" class="emailInput">
                            <span>Email</span>
                            <div class="userImg"></div>
                        </div>
                        <div class="feildBox">
                            <input type="password" name="password" required>
                            <span>Password</span>
                            <div class="eye">
                                <div class="eyeIcon mask-style"></div>
                            </div>
                        </div>
                        <button class="btn" type="submit">Login</button>
                    </form>
                </div>
            </div>
            <div class="displayContainer">
                <div class="content">
                    <div class="Regcontent con">
                        <h3>Register</h3>
                    <div class="container">
                        <p>Enter your personal details to use all of site features.</p>
                    </div>
                    </div>
                    <div class="logcontent con">
                        <h3>Login</h3>
                    <div class="container">
                        <p>Enter your personal details to use all of site features.</p>
                    </div>
                    </div>
                    <button class="switchBtn">Register</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>