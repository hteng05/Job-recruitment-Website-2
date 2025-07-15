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
        // Fetch distinct ReferenceNumbers from eoi table
        $refNumQueryEOI = "SELECT DISTINCT ReferenceNumber FROM eoi";
        $refNumResultEOI = mysqli_query($conn, $refNumQueryEOI);
        $referenceNumbers = [];
    
        // Fetch distinct ReferenceNumbers from addjobs table
        $refNumQueryAddJobs = "SELECT DISTINCT Reference FROM addjobs";
        $refNumResultAddJobs = mysqli_query($conn, $refNumQueryAddJobs);
    
        if ($refNumResultEOI && $refNumResultAddJobs) {
            while ($row = mysqli_fetch_assoc($refNumResultEOI)) {
                $referenceNumbers[] = $row['ReferenceNumber'];
            }
    
            // Merge reference numbers from addjobs table
            while ($row = mysqli_fetch_assoc($refNumResultAddJobs)) {
                if (!in_array($row['Reference'], $referenceNumbers)) {
                    $referenceNumbers[] = $row['Reference'];
                }
            }
        }
    }
?>

<div class="mainform">
    <h1>Manager Interface</h1>
    <form method="POST" action="manage.php">
        <div id="listAllEOIs">
            <input type="hidden" name="action" value="listAllEOIs">
            <button class="all" type="submit" value="listAllEOIs">All EOIs</button>
        </div>
    </form>

    <form method="POST" action="manage.php">
        <div id="listEOIsByJob">
            <input type="hidden" name="action" value="listEOIsByJob">
            <select id="ReferenceNumber" name="ReferenceNumber">
                <option value="null">Choose</option>
                <?php
                foreach ($referenceNumbers as $refNum) {
                    echo "<option value='$refNum'>$refNum</option>";
                }
                ?>
            </select>
            <button type="submit">List EOIs</button>
        </div>
    </form>

    <form method="POST" action="manage.php">
        <div id="listEOIsByName">
            <input type="hidden" name="action" value="listEOIsByName">
            <input placeholder="First Name:" type="text" id="Firstname" name="Firstname">
            <input placeholder="Last Name:" type="text" id="Lastname" name="Lastname">
            <button type="submit">Search</button>
        </div>
    </form>

    <form method="POST" action="manage.php">
        <div id="deleteEOIsByJob">
            <input type="hidden" name="action" value="deleteEOIsByJob">
            <select id="delete" name="ReferenceNumber">
                <option value="null">Choose</option>
                <?php

                foreach ($referenceNumbers as $refNum) {
                    echo "<option value='$refNum'>$refNum</option>";
                }
                ?>
            </select>
            <button type="submit" name="deleteEOIsByJob">Delete</button>
        </div>
    </form>

    <form method="POST" action="manage.php">
        <div id="changeEOIStatus">
            <input type="hidden" name="action" value="changeEOIStatus">
            <input class="EOI" placeholder="EOI #" type="text" id="EOInumber" name="EOInumber">
            <select name="new_status" id="new_status">
                <option value="New" selected="selected">New</option>
                <option value="Ongoing">Ongoing</option>
                <option value="Complete">Complete</option>
            </select>
            <button type="submit">Update Status</button>
        </div>
    </form>
</div>

<?php
if ($conn) {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        switch ($action) {
            case 'listAllEOIs':
                listAllEOIs($conn);
                break;
            case 'listEOIsByJob':
                listEOIsByJob($conn);
                break;
            case 'listEOIsByName':
                listEOIsByName($conn);
                break;
            case 'deleteEOIsByJob':
                deleteEOIsByJob($conn);
                break;
            case 'changeEOIStatus':
                changeEOIStatus($conn);
                break;
            default:
                echo "Invalid action.";
                break;
        }
    }
}

function listAllEOIs($conn) {
    $query = "SELECT * FROM eoi";
    $result = mysqli_query($conn, $query);

    if ($result) {
        listEOIs($conn, $result);
    } else {
        echo "Error executing query: " . mysqli_error($conn);
    }
}

function listEOIsByName($conn) {
    if (isset($_POST['Firstname']) && isset($_POST['Lastname'])) {
        $Firstname = $_POST['Firstname'];
        $Lastname = $_POST['Lastname'];
        $query = "SELECT * FROM eoi WHERE Firstname LIKE '%$Firstname%' AND Lastname LIKE '%$Lastname%'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            listEOIs($conn, $result);
        } else {
            echo "Error executing query: " . mysqli_error($conn);
        }
    } else {
        echo "Both first name and last name are required.";
    }
}

function listEOIsByJob($conn) {
    if (isset($_POST['ReferenceNumber']) && $_POST['ReferenceNumber'] != 'null') {
        $ReferenceNumber = $_POST['ReferenceNumber'];
        $query = "SELECT * FROM eoi WHERE ReferenceNumber = '$ReferenceNumber'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            listEOIs($conn, $result);
        } else {
            echo "Error executing query: " . mysqli_error($conn);
        }
    } else {
        echo "Reference number required.";
    }
}

function deleteEOIsByJob($conn) {
    if (isset($_POST['ReferenceNumber']) && $_POST['ReferenceNumber'] != 'null') {
        $ReferenceNumber = $_POST['ReferenceNumber'];
        $query = "DELETE FROM eoi WHERE ReferenceNumber = '$ReferenceNumber'";
        $deleteResult = mysqli_query($conn, $query);
        if ($deleteResult) {
            echo "<div class='message'>EOI Deleted</div>";
        } else {
            echo "Error deleting EOIs with job reference number $ReferenceNumber.";
        }
    } else {
        echo "Job reference number is required.";
    }
}

function changeEOIStatus($conn) {
    if (isset($_POST['EOInumber']) && isset($_POST['new_status'])) {
        $EOInumber = $_POST['EOInumber'];
        $newStatus = $_POST['new_status'];
        $updateQuery = "UPDATE eoi SET Status = '$newStatus' WHERE EOInumber = '$EOInumber'";
        $updateResult = mysqli_query($conn, $updateQuery);
        if ($updateResult) {
            echo "<div class='message'>Successfully Updated Status</div>";
        } else {
            echo "Error updating EOI status.";
        }
    }
}

function listEOIs($conn, $result) {
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>EOI#</th>
            <th>Job Ref</th>
            <th>Applicant Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Contact Details</th>
            <th>Skills</th>
            <th>Other skills</th>
            <th>Status</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            $Gender = $row['Gender']; //code to make gender display as an icon
            if ($Gender == "male") 
                $Gendericon = "<i class ='fa fa-mars'></i>";
            elseif ($Gender == "female") 
                $Gendericon = "<i class = 'fa fa-venus'></i>";
            else 
                $Gendericon = "<i class='fa-solid fa-transgender'></i>";
                
            $dob = $row['DOB'];
            $age = date_diff(date_create($dob), date_create('now'))->y; 
            //code to show age from stack overflow https://stackoverflow.com/questions/3776682/php-calculate-age

            echo "<tr>";
            echo "<td>{$row['EOInumber']}</td>";
            echo "<td>{$row['ReferenceNumber']}</td>";
            echo "<td>{$row['Firstname']} {$row['Lastname']}</td>";
            echo "<td>{$age}</td>";
            echo "<td>{$Gendericon}</td>";
            echo "<td>{$row['Street']}, {$row['Suburb']}, {$row['State']} {$row['Postcode']}</td>";
            echo "<td>{$row['Email']}, {$row['PhoneNumber']}</td>";
            echo "<td>{$row['Skills']}</td>";
            echo "<td>{$row['OtherSkills']}</td>";
            echo "<td>{$row['Status']}</td>";
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