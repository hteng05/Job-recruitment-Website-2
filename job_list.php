<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin manager page">
    <meta name="keywords" content="HTML, CSS, Javascript">
    <meta name="author" content="Jean Palamara">
    <title>Appify Management</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Madimi+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Angkor&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles/manage.css">
</head>
<body>
<?php
session_start(); // Start the session at the beginning of the script

include "manage_menu.inc";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["logout"])) {
    // Clear session variables
    $_SESSION = array();
    session_unset();
    session_destroy(); // Destroy the session
    header("Location: login.php"); // Redirect to the login page
    exit;
}

 // Redirect to the login page if not authenticated
 if (!isset($_SESSION["authenticated"]) || $_SESSION["authenticated"] !== true) {
    header("Location: login.php");
    exit;
}

require_once("settings.php");

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    echo "<p>Database connection failure</p>";
} else {
    // Fetch distinct ReferenceNumbers for dropdowns
    $JobIDQuery = "SELECT DISTINCT JobID FROM addjobs";
    $JobIDResult = mysqli_query($conn, $JobIDQuery);
    $JobID = [];
    if ($JobIDResult) {
        while ($row = mysqli_fetch_assoc($JobIDResult)) {
            $JobID[] = $row['JobID'];
        }
    }
}
?>

<div class="mainform">
    <h1>Jobs List</h1>
    
        <form class="form-inline" method="POST" action="job_list.php">
                <input type="hidden" name="action" value="listAllJobs">
                <button type="submit" value="listAllJobs">All Jobs</button>
        </form>
    
        <form class="form-inline" action= "jobs_add.php">
                <button type="submit" value="Add Job">Add a Job</button>
        </form>
        
        <form class="form-inline" method="POST" action="job_list.php">
                <input type="hidden" name="action" value="deleteJob">
                <select id="delete" name="JobID">
                    <option value="null">Choose</option>
                    <?php
                    foreach ($JobID as $JobID) {
                        echo "<option value='$JobID'>$JobID</option>";
                    }
                    ?>
                </select>
                <button type="submit" name="deleteJob">Delete</button>
        </form>
    </div>
</div>

<?php
if ($conn) {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

    switch ($action) {
        case 'listAllJobs':
            listAllJobs($conn);
            break;
        case 'deleteJob':
            deleteJob($conn);
        }
    }
}

function listAllJobs($conn) {
    $query = "SELECT * FROM addjobs";
    $result = mysqli_query($conn, $query);

    if ($result) {
        listJobs($conn, $result);
    } else {
        echo "Error executing query: " . mysqli_error($conn);
    }
}

function deleteJob($conn) {
    if (isset($_POST['JobID']) && $_POST['JobID'] != 'null') {
        $JobID = $_POST['JobID'];
        $query = "DELETE FROM addjobs WHERE JobID = '$JobID'";
        $deleteResult = mysqli_query($conn, $query);
        if ($deleteResult) {
            echo "<div class='message'>Job Deleted</div>";
        } else {
            echo "Error deleting Job $JobID.";
        }
    } else {
        echo "Job ID number is required.";
    }
}
function listJobs($conn, $result) {
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>JobID</th>
            <th>Title</th>
            <th>Reference</th>
            <th>Salary</th>
            <th>Reporter</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['JobID']}</td>";
            echo "<td>{$row['Title']}</td>";
            echo "<td>{$row['Reference']}</td>";
            echo "<td>{$row['Salary']}</td>";
            echo "<td>{$row['Reporter']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No EOIs found.";
    }
}

mysqli_close($conn);
?>
</body>
</html>