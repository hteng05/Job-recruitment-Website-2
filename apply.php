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
</head>
<body class="body-apply">
    <!--Header-->
    <?php include 'header.inc'; ?>
    <!--Main application-->
    <main>
        <section class="apply-box">
            <h1>Job Application Form</h1>
            <form method="post" action="processEOI.php" novalidate="novalidate">
                <div class="container-form1">
                    <!--Job ref number-->
               <p><label for="job_ref" class="form-label" >Job Reference Number</label>
                <input type="text" class="form-input" name="job_ref" id="job_ref" pattern="[A-Za-z0-9]{5}" maxlength="5" placeholder="e.g. ABC12"></p> 
                    <!--First name-->
                <p><label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-input" id="first_name" name="first_name" maxlength="20" pattern="^[a-zA-Z ]+$" placeholder="Enter first name" ></p>
                     <!--Last name-->
                <p><label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-input" name="last_name" id="last_name"  maxlength="20" pattern="^[a-zA-Z ]+$" placeholder="Enter last name" ></p>
                     <!--Birth date-->
                <p><label for="bday" class="form-label">Date of Birth</label>
                <input name="bday" class="form-input" id="bday" type="date" required></p>
                </div>
                    <!--Gender-->
                <fieldset class="fieldset-gender">
                    <legend class="form-label">Gender</legend>
                    <label class="radio-label"><input type="radio" name="gender" value="male" class="radio-input" checked > Male</label>
                    <label class="radio-label"><input type="radio" name="gender" value="female" class="radio-input" > Female</label>
                    <label class="radio-label"><input type="radio" name="gender" value="other" class="radio-input" > Other</label>
                </fieldset>

                <div class="container-form2">
                    <!--Street Address-->
                <p><label for="street_address" class="form-label">Street Address</label>
                <input type="text" class="form-input" id="street_address" name="street_address" maxlength="40" placeholder="Enter street address"></p>
                    <!--Suburb-->
                <p><label for="suburb" class="form-label">Suburb</label>
                <input type="text" class="form-input" id="suburb" name="suburb" maxlength="40" placeholder="Enter suburb"></p>
                    <!--State-->
                <p><label for="state" class="form-label">State</label>
                <select id="state" name="state" class="form-input">
                    <option class= "state_choice" value="" disabled hidden selected>Select</option>
                    <option value="VIC">VIC</option>
                    <option value="NSW">NSW</option>
                    <option value="QLD">QLD</option>
                    <option value="NT">NT</option>
                    <option value="WA">WA</option>
                    <option value="SA">SA</option>
                    <option value="TAS">TAS</option>
                    <option value="ACT">ACT</option>
                </select>
                    <!--Postcode-->
                <p><label for="postcode" class="form-label">Postcode</label>
                <input type="text" class="form-input" id="postcode" name="postcode" pattern="[0-9]{4}" maxlength="4" placeholder="Enter postcode" ></p>
                    <!--Email-->
                <p><label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-input" id="email" name="email" placeholder="Enter email address" ></p>
                    <!--Phone number-->
                <p><label for="phone" class="form-label">Phone Number</label>
                <input type="text" class="form-input" id="phone" name="phone" pattern="^[0-9 ]{8,12}$" placeholder="Enter phone number" ></p>
                </div>
                    <!--Skills-->
                <fieldset class="fieldset-skills">
                <legend>Skills</legend>
                <div class="checkbox-container">
                    <label for="HTML"><input class="checkbox-input" type="checkbox" name="skills[]" value="HTML" id="HTML"> HTML</label>
   
                    <label for="CSS"><input class="checkbox-input" type="checkbox" name="skills[]" value="CSS" id="CSS"> CSS</label>
    
                    <label for="JavaScript"><input class="checkbox-input" type="checkbox" name="skills[]" value="JavaScript" id="JavaScript"> JavaScript</label>
    
                    <label for="PHP"><input class="checkbox-input" type="checkbox" name="skills[]" value="PHP" id="PHP"> PHP</label>
    
                    <label for="MySQL"><input class="checkbox-input" type="checkbox" name="skills[]" value="MySQL" id="MySQL"> MySQL</label>
                </div>
                <p><label for="other_skills"><input type="checkbox" name="other_skill" value="other_skills" id="other_skills"> Other Skills:
                <textarea class="form-text-input" name="other_skills" rows="4" cols="50" id="other-skills" placeholder="Please enter other skils that is not on the list above"></textarea></label>
               </fieldset> 
                    <!--Apply button-->
               <div class="apply-button">  
                    <input type= "submit" value="Apply" class="button1">
                    <input type= "reset" value="Reset" class="button2">
               </div> 
            </form>
        </section>
    </main>
    <!--Footer-->
    <?php include 'footer.inc'; ?>
    </body>
</html>