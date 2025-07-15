<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webpage">
    <meta name="keywords" content="HTML, CSS, Javascript">
    <meta name="author" content="Duong Ha Tien Le">
    <title>Position Descriptions</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Madimi+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Angkor&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" href="images/web-icon.png" />
    <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body class="body-jobs">
    <!--header-->
    <?php include 'header.inc'; ?>
    <!--main-->
    <main>
        <section class="title-jobs">
            <section class="title-jobs-content">
            <h1>Unlock your career potential: <br> Find your perfect fit today!</h1>
            <a href="#job-con" class="ctn">Jobs list</a>
            </section>
        </section>
        <!--job1-->
       <div class="job-con" id="job-con">
        <h1 class="jobtext">Available Jobs</h1>
       <?php 
        function sanitise_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        require_once("settings.php");
        $conn = mysqli_connect($host, $user, $pwd, $sql_db) or die("<p>Unable to connect to the server</p>");
        $sql_table = "addjobs";
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM addjobs";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            die("Error executing query: " . mysqli_error($conn));
        }
        $rowcount = mysqli_num_rows($result);
        if ($rowcount < 1){
            echo "<h2 class='nojob'>No jobs available!!! </h2>
            <img src='images/nojob.jpg' alt='No job available' class = 'nojobimg'>";
        }
        else{
            $jobCounter = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                $ID = $row['JobID'];
                $title = $row['Title'];
                $reference = $row['Reference'];
                $salary = $row['Salary'];
                $reportTo = $row['Reporter'];
                $responsibilities = $row['Responsibility'];
                $qualification = $row['Qualification'];
                $skill = $row['Skill'];
                $lines1 = explode("\n", $responsibilities);
                $lines2 = explode("\n", $qualification);
                $lines3 = explode("\n", $skill);
                echo "
                <section class='job' id='collabsible'>
                    <section class='whole'>
                        <section class='collapsible1'>
                            <input type='checkbox' id='collapsible1-head-$jobCounter'>
                            <label for='collapsible1-head-$jobCounter' id='job-$jobCounter'>$title</label>
                            <section class='collapsible1-text'>
                                <h1>$title</h1>
                                <p><strong>Reference Number:</strong> $reference</p>
                                <p><strong>Salary Range:</strong> $salary</p>
                                <p><strong>Reporting To:</strong> $reportTo</p>
                                <h2>Key Responsibilities:</h2>
                                <ul>";
                                foreach($lines1 as $line){
                                    echo '<li>' . $line . '</li>';
                                }
                                echo "
                                </ul>
                                <h2>Qualifications and Skills:</h2>
                                <p><strong>Essential:</strong></p>
                                <ol>";
                                foreach($lines2 as $line){
                                    echo '<li>' . $line . '</li>';
                                }
                                echo "
                                </ol>
                                <p><strong>Preferable:</strong></p>
                                <ol>";
                                foreach($lines3 as $line){
                                    echo '<li>' . $line . '</li>';
                                }
                                echo "
                                </ol>
                                <a href='apply.php' class='apn'>Apply Now</a>
                            </section>
                        </section>
                    </section>
                </section>";
                $jobCounter++;
            }
        }
    ?></div>
    </main>
    <!--footer-->
    <?php include 'footer.inc'; ?>
</body>
</html>
