<?php
$fullname = "";
$username = "";
$pass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function sanitise_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Validate each data and store error messages
    $errorfullname = "";
    $erroruser = "";
    $errorpass = "";
    $successmsg = "";

    if (isset($_POST["fullname"])){
        $fullname = sanitise_input($_POST["fullname"]);
        if ($fullname == ""){
            $errorfullname = "<p class='error'>You must enter your full name</p>";
        }
        else if (!preg_match("/^[a-zA-Z\s]*$/", $fullname)){
            $errorfullname = "<p class='error'>Only alphabetic characters and spaces are allowed in your full name</p>";
        }
    }

    if(isset($_POST["user"])){
        $username = sanitise_input($_POST["user"]);
        if($username == ""){
            $erroruser = "<p class='error'>You must enter your username</p>";
        }
    }

    if (isset($_POST["pass"])){
        $pass = sanitise_input($_POST["pass"]);
        if ($pass == ""){
            $errorpass = "<p class='error'>You must enter your password</p>";
        }
        // Password must be at least 8 characters long and contain an uppercase letter, a digit, and a special character (@, #, etc.). 
        else if (!preg_match("/^(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&+=!])(?=.*[a-zA-Z0-9]).{8,}$/", $pass)){
            $errorpass = "<p class='error'>Your password doesn't meet the requirements</p>";
        }
    }

    // Only proceed with database insertion if no errors are present
    if (empty($errorfullname) && empty($erroruser) && empty($errorpass)) {
        require_once("settings.php");
        try{
            $conn = mysqli_connect($host, $user, $pwd, $sql_db);
            if (!$conn){
                throw new Exception('Database connection error: ' . mysqli_connect_error());
            }
            
            // Create users table if it does not exist in the database
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

            // Check if the username already exists in the database
            $checkUsernameSQL = "SELECT Username FROM $sql_table WHERE Username = '$username'";
            $result = mysqli_query($conn, $checkUsernameSQL);

            if (!$result) {
                throw new Exception('Table query error: ' . mysqli_connect_error());
            } 

            if (mysqli_num_rows($result) > 0) {
                // Username already exists
                mysqli_close($conn);
                $erroruser = "<p class='error'>This username has already been taken. Please try again.</p>";
            } else {
                // Hash the password before storing it in the database
                $hashedPassword = md5($pass);
                
                // Insert user data into the database
                $query = "INSERT INTO $sql_table (Fullname, Username, Password) VALUES ('$fullname', '$username', '$hashedPassword')";
                $result = mysqli_query($conn, $query);
                if(!$result){
                    mysqli_close($conn);
                    throw new Exception('Table query error: ' . mysqli_connect_error());
                } else {
                    mysqli_close($conn);
                    $successmsg = "<p class='success'>Your account has been created!</p>";
                    // Clear input fields after successful submission
                    $fullname = "";
                    $username = "";
                    $pass = "";
                }
            }
        } catch (Exception $e) {
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
    <meta name = "keywords" content = "Register page" >
    <meta name = "author" content = "Duong Ha Tien Le" >
    <title>Manager Register</title>
    <link rel = "stylesheet" href = "styles/register_login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Madimi+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="login-box">
    <form method = "post" action = "register.php" novalidate = "novalidate">
        <h1>Sign Up</h1>
        <?php
            if (!empty($successmsg)) {
                echo $successmsg;
            } elseif (!empty($errorfullname)) {
                echo $errorfullname;
            } elseif (!empty($erroruser)) {
                echo $erroruser;
            } elseif (!empty($errorpass)) {
                echo $errorpass;
            }
        ?>
        <!-- Register form -->
        <div class = "user-box">
            <input type = "text" class = "form-input" id = "fullname" name = "fullname"  maxlength = "50" pattern = "^[a-zA-Z\-\s]*$" required value="<?php echo htmlspecialchars($fullname); ?>">
            <label for = "fullname">Full Name</label>
        </div>
        <div class = "user-box">
            <input type = "text" class = "form-input" id = "user" name = "user"  maxlength = "50" required value="<?php echo htmlspecialchars($username); ?>">
            <label for = "user">Username</label>
        </div>
        <div class = "user-box">
            <!-- Password must be at least 8 characters long and contain an uppercase letter, a digit, and a special character (@, #, etc.). -->
            <input type = "Password" class = "form-input" id = "pass" name = "pass" pattern = "^(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&+=!])(?=.*[a-zA-Z0-9]).{8,}$"  maxlength = "50" required>
            <label for = "pass">Password</label>
        </div>
        <ol class = "errors">
            <li>Password must be at least 8 characters long</li>
            <li>Password must contain at least an uppercase</li>
            <li>Password must contain at least a number</li>
            <li>Password must contain a special character (@, #, ...)</li>
        </ol>
        <button class="btn" type = "submit">Register</button>
        <p>Already have an account? <a href = "login.php" class="a2">Login!</a></p>
    </form></div>
    <a href = "index.php" class="btn1" id = "Home"><i class = "fa fa-home"></i> Back to Home</a>
</body>
</html>
