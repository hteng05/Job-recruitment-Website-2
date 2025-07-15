<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="description" content="Processing EOI" />
    <meta name="keywords" content="PHP, MySql" />
    <meta name="author" content="Duong Ha Tien Le" >
    <title>Application Process</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Madimi+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel = "stylesheet" href = "styles/processEOI.css">
</head>
<body>
<?php
    // This function sanitizes data by removing leading and trailing spaces, backslashes, and HTML control characters.
    function sanitise_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    // This page cannot be accessed directly via URL.
    if (!isset($_POST["job_ref"])){
        header ("location: apply.php");
        exit;
    }
    // Define postcode ranges for each Australian state
    class State {
        public $name;
        public $postcodeRanges;
        
        function __construct($name, $postcodeRanges) {
            $this->name = $name;
            $this->postcodeRanges = $postcodeRanges;
        }
        
        public function inRange($number) {
            foreach ($this->postcodeRanges as $range) {
                $start = $range[0];
                $end = $range[1];
                if ($number >= $start && $number <= $end) {
                    return true;
                }
            }
            return false;
        }
    }
    
    $state1 = new State("NSW", array(array(1000,1999), array(2000,2599), array(2619,2899), array(2921,2999)));
    $state2 = new State("ACT", array(array(200,299), array(2600,2618), array(2900,2920)));
    $state3 = new State("VIC", array(array(3000,3999), array(8000,8999)));
    $state4 = new State("QLD", array(array(4000,4999), array(9000,9999)));
    $state5 = new State("SA", array(array(5000,5799), array(5800,5999)));
    $state6 = new State("WA", array(array(6000,6797), array(6800,6999)));
    $state7 = new State("TAS", array(array(7000,7799), array(7800,7999)));
    $state8 = new State("NT", array(array(800,899), array(900,999)));
    $states = array($state1, $state2, $state3, $state4, $state5, $state6, $state7, $state8);
    
    require_once("settings.php");
    try{
        // Attempt to connect to the database
        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
        if (!$conn){
            throw new Exception('Database connection error: ' . mysqli_connect_error());
        }
        else{
            // Create eoi table if it is not existed in the database
            $sql_table = 'eoi';
            $checkTableSQL = "SHOW TABLES LIKE '$sql_table'";
            $result = mysqli_query($conn, $checkTableSQL);
            if (!$result || mysqli_num_rows($result) == 0) {
                $createTableSQL = "
                    CREATE TABLE `eoi` (
                        `EOInumber` int(11) NOT NULL AUTO_INCREMENT,
                        `ReferenceNumber` varchar(5) NOT NULL,
                        `Firstname` varchar(20) NOT NULL,
                        `Lastname` varchar(20) NOT NULL,
                        `DOB` date NOT NULL,
                        `Gender` varchar(6) NOT NULL,
                        `Street` varchar(40) NOT NULL,
                        `Suburb` varchar(40) NOT NULL,
                        `State` varchar(3) NOT NULL,
                        `Postcode` varchar(4) NOT NULL,
                        `Email` varchar(50) NOT NULL,
                        `PhoneNumber` varchar(50) NOT NULL,
                        `Skills` varchar(50) NOT NULL,
                        `OtherSkills` text NOT NULL,
                        `Status` varchar(20) NOT NULL,
                        PRIMARY KEY (`EOInumber`)
                    )";
                if(!mysqli_query($conn, $createTableSQL)){
                    throw new Exception('Table creation error: ' . mysqli_connect_error());
                }
            }
            // Validate each data and stores error messages
            $skills = "";
            $otherskills = "";
            $errMsg = "";
            if (isset($_POST["job_ref"])){
                $reference = sanitise_input($_POST["job_ref"]);
                if ($reference == ""){
                    $errMsg .= "<p>You must enter a reference number</p>";
                }
                else if (!preg_match("/^[a-zA-Z0-9]*$/", $reference)){
                    $errMsg .= "<p>Only alphanumeric characters allowed in reference</p>";
                }
                else if (strlen($reference) != 5){
                    $errMsg .= "<p>You must enter a reference of 5 characters</p>";
                }
                else {
                    // Check if the reference number exists in the addjobs table
                    $checkRefSQL = "SELECT * FROM addjobs WHERE Reference = '$reference'";
                    $refResult = mysqli_query($conn, $checkRefSQL);
                    if (!$refResult || mysqli_num_rows($refResult) == 0) {
                        $errMsg .= "<p>The job reference number does not exist</p>";
                    }
                }
            }
            if (isset($_POST["first_name"])){
                $firstName = sanitise_input($_POST["first_name"]);
                if ($firstName == ""){
                    $errMsg .= "<p>You must enter your first name</p>";
                }
                else if (!preg_match("/^[a-zA-Z\s]*$/",$firstName)){
                    $errMsg .= "<p>Only alpha letters allowed in your first name</p>";
                }
            }
            if (isset($_POST["last_name"])){
                $lastName = sanitise_input($_POST["last_name"]);
                if ($lastName == ""){
                    $errMsg .= "<p>You must enter your last name</p>";
                }
                else if (!preg_match("/^[a-zA-Z\s]*$/",$lastName)){
                    $errMsg .= "<p>Only alpha letters allowed in your last name</p>";
                }    
            } 
            if (isset($_POST["bday"])){
                $dob = date('Y-m-d', strtotime($_POST['bday']));
                $age = date_diff(date_create($dob), date_create('now'))->y;
                if ($age < 15 || $age > 80){
                    $errMsg .= "<p>Your age must be between 15 - 80</p>";
                }
            }
            if (isset($_POST["gender"])){
                $gender = $_POST["gender"];
                }
            if (isset($_POST["street_address"])){
                $streetAddress = sanitise_input($_POST["street_address"]);
                if ($streetAddress == ""){
                    $errMsg .= "<p>You must enter your street address</p>";
                }
                else if (strlen($streetAddress) > 40){
                    $errMsg .= "<p>Your street address details is too long</p>";
                }
            }
            if (isset($_POST["suburb"])){
                $suburb = sanitise_input($_POST["suburb"]);
                if ($suburb == ""){
                    $errMsg .= "<p>You must enter your suburb</p>";
                }
                else if (strlen($suburb) > 40){
                    $errMsg .= "<p>Your suburb details is too long</p>";
                }
            }
            if (isset($_POST["state"])){
                $state_input = sanitise_input($_POST["state"]);
            }
            if (isset($_POST["postcode"])) {
                $postcode = sanitise_input($_POST["postcode"]);
                
                if ($postcode == "") {
                    $errMsg .= "<p>You must enter your postcode</p>";
                } else if (strlen($postcode) > 4) {
                    $errMsg .= "<p>Your postcode is too long</p>";
                } else {
                    settype($postcode, 'integer');
                    $validPostcode = false;
                    
                    foreach ($states as $state) {
                        if ($state->name == $state_input) {
                            if ($state->inRange($postcode)) {
                                $validPostcode = true;
                            }
                        }
                    }
                    
                    if (!$validPostcode) {
                        $errMsg .= "<p>$postcode is not within the postcode ranges of $state_input</p>";
                    }
                }
            }
            
            if (isset($_POST["email"])){
                $email = sanitise_input($_POST["email"]);
                if ($email == ""){
                    $errMsg .= "<p>You must enter a email</p>";
                }
                else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $errMsg .= "<p>Your email is not in a valid format</p>";
                }
            }
            if (isset($_POST["phone"])){
                $phone = sanitise_input($_POST["phone"]);
                if ($phone == ""){
                    $errMsg .= "<p>You must enter a phone number</p>";
                }
                else if (!preg_match("/^[0-9]+$/", $phone)){
                    $errMsg .= "<p>Your phone number cannot contain alpha letters</p>";
                }
                else if (strlen($phone) < 8 || strlen($phone) > 12){
                    $errMsg .= "<p>Your phone number has to be between 8 - 12 numbers</p>";
                }
            }
            if(isset($_POST["skills"]) && is_array($_POST["skills"])) {
                $skills_array = $_POST["skills"];
                $skills = implode(", ", $skills_array);
            } else {
                // Handle case where no skills are selected
                $skills = "No skills selected";
            }

            if (isset($_POST["other_skill"])) {
                if (empty($_POST["other_skills"])) {
                    $errMsg .= "<p>Please provide the other skills you possess</p>";
                } else {
                    $otherskills = sanitise_input($_POST["other_skills"]);
                }
            }

            if ($errMsg != ""){
                echo '
                <div class = "errormsg">
                <img src="images/error.jpg" alt="Error submission" class = "errorimg">
                    <h1>ERRORS!</h1>
                    <h2>You must complete the form by following the instructions below.</h2>
                    ' . $errMsg . '
                    <div class = "errorbtn"><a href = "apply.php">Back To Apply</a></div>
                </div>';
            }
            // Insert data to the eoi table
            else{
                $sql_table="eoi";
                $query = "insert into $sql_table (ReferenceNumber, Firstname, Lastname, DOB, Gender, Street
                ,Suburb, State, Postcode, Email, PhoneNumber, Skills, OtherSkills, Status) 
                values ('$reference', '$firstName', '$lastName', '$dob', '$gender', '$streetAddress','$suburb','$state_input'
                , '$postcode', '$email', '$phone', '$skills', '$otherskills', 'New')";
                $result = mysqli_query($conn, $query);
                // Display error page if something is wrong with the query
                if(!$result){
                    mysqli_close($conn);
                    echo '
                        <div class = "errormsg">
                        <img src="images/error.jpg" alt="Error submission" class = "errorimg">
                            <h1>ERROR!</h1>
                            <p>There was an issue with processing your application.</p>
                            <p>Please try again. Sorry for the inconvenience.</p>
                            <div class = "errorbtn"><a href = "apply.php">Back To Apply</a></div>
                        </div>
                        ';
                }
                else{
                    echo "
                    <div class = 'errormsg'>
                    <img src='images/submit.jpg' alt='Successful submission' class = 'errorimg'>
                        <h1>Success!</h1>
                        <h2>Your details have been successfully submitted.</h2>
                        <h2> Here is your EOI ID: <span style = 'color: #009B45; font-weight: bold;'> " . mysqli_insert_id($conn) . " </span></h2>
                        <div class = 'errorbtn'><a href = 'apply.php'>Back To Apply</a></div>
                    </div>
                    ";
                    
                }
            }
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
?>
</body>
</html>