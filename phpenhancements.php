<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webpage">
    <meta name="keywords" content="HTML, CSS, Javascript">
    <meta name="author" content="Duong Ha Tien Le">
    <title>PHP Enhancements</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Madimi+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Angkor&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles/style.css">
</head>
<body class="body-en">
    <?php include 'header.inc'; ?>
    <main>
        <section class="container1-en">
            <h2>Enhancement 1: Log in/Log out page</h2>
            <a href="login.php"><h3>Login page</h3></a>
            <p>We've created a user-friendly login page tailored specifically for employers. When employers attempt to log in, the system checks the provided credentials. If there's an error, like entering the wrong username or password, a clear error message pops up, letting the user know what went wrong.</p>
            <a href="register.php"><h3>Signup page</h3></a>
            <p>We've created a registration page tailored for employers, simplifying the sign-up process. Employers are asked to fill in essential details, including a password. To enhance security, we've enforced password rules, such as minimum length and special character requirements. If the password doesn't meet the criteria, users receive a prompt to create a stronger, more secure password, ensuring their account's safety.</p>
        </section>
        <section class="container2-en">
            <h2>Enhancement 2: Store job description in database table and display it on job description page</h2>
            <p>The website simplifies job management by storing descriptions in a database table. This allows for easy updates and ensures that the latest job details are displayed on the job description page, streamlining the process for both employers and candidates.</p>
                
        </section>
    </main>
    <?php include 'footer.inc'; ?>
    </body>
</html>