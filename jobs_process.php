<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webpage">
    <meta name="keywords" content="HTML, CSS, Javascript">
    <meta name="author" content="Duong Ha Tien Le">
    <title>Job Application</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/processEOI.css">
</head>
<body>
    <?php 
    // This page cannot be accessed directly via URL.
    if (!isset($_POST["title"])){
        header ("location: jobs_add.php");
        exit;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        function sanitise_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }   
        
        require_once("settings.php");
        $errMsg = "";
        $title = isset($_POST["title"]) ? sanitise_input($_POST["title"]) : "";
        $reference = isset($_POST["job_ref"]) ? sanitise_input($_POST["job_ref"]) : "";
        $salary = isset($_POST["salary"]) ? sanitise_input($_POST["salary"]) : "";
        $reportTo = isset($_POST["reporter"]) ? sanitise_input($_POST["reporter"]) : "";
        $responsibilities = isset($_POST["respon"]) ? sanitise_input($_POST["respon"]) : "";
        $qualification = isset($_POST["quali"]) ? sanitise_input($_POST["quali"]) : "";
        $skill = isset($_POST["skill"]) ? sanitise_input($_POST["skill"]) : "";

        // Validation
        if (empty($reference)) 
            $errMsg .= "<p>You must enter a reference number.</p>";
        if (empty($title)) 
            $errMsg .= "<p>You must enter a job title.</p>";
        if (empty($salary)) 
            $errMsg .= "<p>You must enter the job's salary.</p>";
        if (empty($reportTo)) 
            $errMsg .= "<p>You must enter a person to report to for this job.</p>";
        if (empty($responsibilities)) 
            $errMsg .= "<p>You must enter job responsibilities.</p>";
        if (empty($qualification)) 
            $errMsg .= "<p>You must enter job qualifications.</p>";
        if (empty($skill)) 
            $errMsg .= "<p>You must enter job skills.</p>";

        if ($errMsg != "") {
            echo '
                <div class="errormsg">
                <img src="images/error.jpg" alt="Error submission" class="errorimg">
                    <h1>ERRORS!</h1>
                    <h2>You must complete the form by following the instructions below.</h2>
                    ' . $errMsg . '
                    <div class="errorbtn"><a href="jobs_add.php">Back</a></div>
                </div>';
        } else {
            try {
                $conn = new mysqli($host, $user, $pwd, $sql_db);

                if ($conn->connect_error) {
                    throw new Exception('Database connection error: ' . $conn->connect_error);
                }

                $sql_table = 'addjobs';
                $checkTableSQL = "SHOW TABLES LIKE '$sql_table'";
                $result = $conn->query($checkTableSQL);

                if (!$result || $result->num_rows == 0) {
                    $createTableSQL = "
                    CREATE TABLE `addjobs` (
                        `JobID` int(11) NOT NULL AUTO_INCREMENT,
                        `Title` varchar(30) NOT NULL,
                        `Reference` varchar(5) NOT NULL,
                        `Salary` varchar(30) NOT NULL,
                        `Reporter` varchar(80) NOT NULL,
                        `Responsibility` varchar(1000) NOT NULL,
                        `Qualification` varchar(1000) NOT NULL,
                        `Skill` varchar(1000) NOT NULL, 
                        PRIMARY KEY (`JobID`)
                    )";
                    if (!$conn->query($createTableSQL)) {
                        throw new Exception('Table creation error: ' . $conn->error);
                    }
                }

                $query = $conn->prepare("INSERT INTO $sql_table (Title, Reference, Salary, Reporter, Responsibility, Qualification, Skill) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $query->bind_param("sssssss", $title, $reference, $salary, $reportTo, $responsibilities, $qualification, $skill);

                if ($query->execute()) {
                    echo "
                    <div class='errormsg'>
                        <img src='images/submit.jpg' alt='Successful submission' class='errorimg'>
                        <h1>Success!</h1>
                        <h2>The Job $title details have been successfully added.</h2>
                        <div class='errorbtn'><a href='jobs_add.php'>Back</a></div>
                    </div>";
                } else {
                    throw new Exception('Query execution error: ' . $query->error);
                }

                $query->close();
                $conn->close();
            } catch (Exception $e) {
                echo '
                <div class="errormsg">
                    <img src="images/error.jpg" alt="Error submission" class="errorimg">
                    <h1>Connection ERROR!</h1>
                    <p>Please try again. Sorry for the inconvenience.</p>
                    <div class="errorbtn"><a href="jobs_add.php">Back</a></div>
                </div>';
            }
        }
    }
    ?>
</body>
</html>
