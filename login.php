<?php
        session_start();
        if (isset($_SESSION["authenticated"]) && $_SESSION["authenticated"] == true) {
            header("Location: manage.php"); // Redirect to the manage page if already authenticated.
            exit;
        }
        $maxLoginAttempts = 5;
        $lockoutDuration = 60;
        $errMsg = "";
        $block = false;
        if(isset($_SESSION['lockoutTime']) && $_SESSION['lockoutTime'] <= time()){
            session_unset();
        }

        if(isset($_SESSION['lockoutTime']) && $_SESSION['lockoutTime'] > time()){
            $errMsg = "<p class = 'error'>Too many login attempts. Please wait 1 minute.</p>";
            $block = true;
        }
        $username ="";
        $pass="";
        // Get the submitted username and password
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !$block) {
            function sanitise_input($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            $erroruser = "";
            $errorpass = "";
            if(isset($_POST["user"])){
                $username = sanitise_input($_POST["user"]);
                if($username == ""){
                    $erroruser = "<p class='error'>You must enter your username</p>";
                }
            }
        
            if (isset($_POST["pass"])){
                $password = sanitise_input($_POST["pass"]);
                if ($password == ""){
                    $errorpass = "<p class='error'>You must enter your password</p>";
                }
        
            require_once("settings.php");
            try{
                $conn = mysqli_connect($host, $user, $pwd, $sql_db);
                if (!$conn) {
                    throw new Exception('Database connection error: ' . mysqli_connect_error());
                }

                // Create users table if it is not existed in the database
                $sql_table = 'register';
                $checkTableSQL = "SHOW TABLES LIKE '$sql_table'";
                $result = mysqli_query($conn, $checkTableSQL);
                if (!$result || mysqli_num_rows($result) == 0) {
                    $createTableSQL = "
                    CREATE TABLE register (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        Fullname VARCHAR(50) NOT NULL,
                        Username VARCHAR(50) NOT NULL,
                        Password VARCHAR(255) NOT NULL
                    )";
                    if(!mysqli_query($conn, $createTableSQL)){
                        mysqli_close($conn);
                        throw new Exception('Table creation error: ' . mysqli_connect_error());
                    }
                }

                // Execute a SELECT query to retrive the user's data
                $sql_table = "register";
                $checkUserSQL = "SELECT * FROM $sql_table WHERE username = '$username'";
                $result = mysqli_query($conn, $checkUserSQL);

                if (!$result) {
                    throw new Exception('Table query error: ' . mysqli_connect_error());
                }

                if(mysqli_num_rows($result) == 1){
                    // User found, retrieve data
                    $checkingPassword = md5($password);
                    $userRow = mysqli_fetch_assoc($result);
                    // Verify submitted password with hashed password
                    if ($checkingPassword === $userRow["Password"]) {
                        // Authentication successful, set session variables on and redirect to manager page
                        mysqli_close($conn);
                        $_SESSION["authenticated"] = true;
                        $_SESSION["fullname"] = $userRow["Fullname"];
                        header("location: manage.php");
                        exit;
                    } else {
                        $errMsg = "<p class = 'error'>Wrong username or password. Please try again.</p>";

                        // Invalid login
                        if (!isset($_SESSION['attempts'])) {
                            $_SESSION['attempts'] = 1;
                        } else {
                            $_SESSION['attempts'] += 1;
                        }
                        
                        // Check if the maximum login attempts have been reached
                        if ($_SESSION['attempts'] >= $maxLoginAttempts) {
                            $_SESSION['lockoutTime'] = time() + $lockoutDuration;
                        }

                        mysqli_close($conn);
                    }
                } else {
                    $errMsg = "<p class = 'error'>Wrong username or password. Please try again.</p>";

                    // Invalid login
                    if (!isset($_SESSION['attempts'])) {
                        $_SESSION['attempts'] = 1;
                    } else {
                        $_SESSION['attempts'] += 1;
                    }

                    // Check if the maximum login attempts have been reached
                    if ($_SESSION['attempts'] >= $maxLoginAttempts) {
                        $_SESSION['lockoutTime'] = time() + $lockoutDuration;
                    }

                    mysqli_close($conn);
                }
            }catch (Exception $e) {
                echo '
                <div class = "errormsg">
                <img src="images/error.jpg" alt="Error submission" class = "errorimg">
                    <h1>Connection ERROR!</h1>
                    <p>Please try again. Sorry for the inconvenience.</p>
                    <div class = "errorbtn"><a href = "apply.php">Back To Apply</a></div>
                </div>';
            } 
        
    }
    }
    ?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "utf-8" >
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <meta name = "keywords" content = "Login page" >
    <meta name = "author" content = "Duong Ha Tien Le" >
    <title>Manager Login</title>
    <link rel = "stylesheet" href = "styles/register_login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Madimi+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="login-box">
    <form method = "post" action = "login.php">
        <h1>Login</h1>
        <?php
            if(!empty($erroruser)){
                echo $erroruser;
            }  elseif (!empty($errorpass)) {
                echo $errorpass;
            } elseif($errMsg != ""){
                echo $errMsg;
            }
        ?>
        <!-- Login form -->
        <div class = "user-box">
            <input type = "text" id = "user" name = "user" required value="<?php echo htmlspecialchars($username); ?>">
            <label for = "user">Username</label>
        </div>
        <div class = "user-box">
            <input type = "password" id = "pass" name = "pass" required>
            <label for = "pass">Password</label>  
        </div>
        <button class="btn" type = "submit">Login</button>
        <p>Don't have any accounts?<a href = "register.php" class="a2"> Sign up!</a></p>
    </form></div>
    <a href = "index.php" id = "Home" class="btn1"><i class = "fa fa-home"></i> Back to Home</a>
</body>
</html>