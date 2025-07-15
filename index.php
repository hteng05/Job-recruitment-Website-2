<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset=UTF-8>
        <meta name="description" content="Webpage">
        <meta name="keywords" content="HTML, CSS, Javascript">
        <meta name="author" content="Jean Palamara">
        <title>Appify</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Madimi+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Angkor&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" type="text/css" href="styles/style.css">
    </head>

    <body class="body-index">
        <!--Header-->
        <?php include 'header.inc'; ?>
    <main>
    <div class="hero">
        <video autoplay loop muted playsinline class="background-clip">
            <source src="images/backgroundvid.mp4" type="video/mp4" >
        </video>
        <section class="content-index">
            <h1>Appify</h1>
            <a href="#about">Learn more</a>
        </section>
    </div>

<section class="about" id="about">
    <div class="about-content">
        <h2>Innovate Careers</h2>
        <p>Looking to kickstart your career in the dynamic world of IT? At Appify, we're all about fostering talent and innovation. From coding wizards to cybersecurity enthusiasts, we're on the lookout for passionate individuals ready to make an impact. Explore exciting opportunities in web development, app creation, cybersecurity, and more. Join us in shaping the future of technology!</p>
        <a href="#hiring" class="ctn">Jobs available!</a>
    </div>
</section>

<section class="hiring" id="hiring">
    <div class="hiring-content">
         <h2>Want to join our Team?</h2>
         <div class="card-container" id="card">
         <div class="card-container1">
            <div class="card">
            <div class="card-content">
              <h2>Mobile Application Developer</h2>
              <p>Responsible for designing and building software applications specifically for use on mobile devices such as smartphones and tablets.</p>
              <a href="jobs.php#job1">Job Details</a>
            </div>
          </div>
          </div>
          <div class="card-container2">
            <div class="card">
            <div class="card-content">
              <h2>Software Engineer</h2>
              <p>Responsible for  designing, developing, and maintaining software applications, systems, and platforms to meet specific user needs and business objectives.</p>
              <a href="jobs.php#job2">Job Details</a>
            </div>
          </div>
          </div>
          <div class="card-container3">
            <div class="card">
            <div class="card-content">
              <h2>Data Engineer</h2>
              <p>Responsible for designing, constructing, and maintaining scalable data pipelines to collect and analyze large volumes of data for insights and decision-making purposes.</p>
              <a href="jobs.php#job3">Job Details</a>
            </div>
          </div>
          </div>
        </div>
    </div>
</section>
    </main>
    <?php include 'footer.inc'; ?>
</body>
</html>