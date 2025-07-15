<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webpage">
    <meta name="keywords" content="HTML, CSS, Javascript">
    <meta name="author" content="Duong Ha Tien Le">
    <title>Job Application</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Madimi+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Angkor&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/processEOI.css">
</head>
<body class="body-job-add">
    <!--Main application-->
    <main> 
        <?php
        // This page cannot be accessed directly via URL.
        session_start();
        if (!isset($_SESSION["authenticated"]) || !isset($_SERVER['HTTP_REFERER']) || strpos($_SERVER['HTTP_REFERER'], 'manage.php') === false && strpos($_SERVER['HTTP_REFERER'], 'job_list.php') === false) {
            header("Location: login.php");
            exit;
        }
        ?>
        
        <section class="apply-box">
            <h1>Add Job Form</h1>
            <form method="post" action="jobs_process.php" novalidate="novalidate">
                <div class="container-form1">
                    <p>
                        <label for="title" class="form-label">Job Title</label>
                        <input type="text" class="form-input" id="title" name="title" required="required" maxlength="30" pattern="[A-Za-z\s]{1,30}" placeholder="Enter job title">
                    </p>
                    <p>
                        <label for="job_ref" class="form-label">Job Reference Number</label>
                        <input type="text" class="form-input" name="job_ref" id="job_ref" pattern="[A-Za-z0-9]{5}" maxlength="5" placeholder="e.g. ABC12">
                    </p> 
                    <p>
                        <label for="salary" class="form-label">Salary</label>
                        <input type="text" class="form-input" id="salary" name="salary" required="required" maxlength="30" placeholder="Enter job salary">
                    </p>
                    <p>
                        <label for="reporter" class="form-label">Reported to</label>
                        <input type="text" class="form-input" name="reporter" id="reporter" required="required" maxlength="80" pattern="[A-Za-z\s]{1,30}" placeholder="Enter person to report to">
                    </p>
                </div>
                <div class="form-container">
        <div class="form-group">
            <label class="label" for="respon">Responsibilities</label>
            <textarea class="form-text" id="respon" name="respon" rows="10" cols="80" placeholder="Write job responsibilities here..."></textarea>
        </div>
        <div class="form-group">
            <label class="label" for="quali">Qualifications</label>
            <textarea class="form-text" id="quali" name="quali" rows="10" cols="80" placeholder="Write job qualifications here..."></textarea>
        </div>
        <div class="form-group">
            <label class="label" for="skill">Skills</label>
            <textarea class="form-text" id="skill" name="skill" rows="10" cols="80" placeholder="Write job skills here..."></textarea>
        </div>
    </div>
                    
                    <div class="apply-button">  
                        <input type="submit" value="Add" class="button1">
                        <input type="reset" value="Reset" class="button2">
                    </div>
            </form>
        </section>
       <a href = "job_list.php" id = "Joblist" class="btn1"><i class = "fa fa-home"></i> Back</a>
    </main>
</body>
</html>
