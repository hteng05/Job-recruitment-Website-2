<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="description" content="Webpage">
        <meta name="keywords" content="HTML, CSS, Javascript">
        <meta name="author" content="Jean Palamara">
        <title>About Us</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Madimi+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="styles/style.css">
    </head>
    <body class="body-about">
    <?php include 'header.inc'; ?>
    <div class="about-section">
        <h1>Meet The Team!</h1>
        <h2>Click on a picture to jump to their profile!</h2>
    </div>

      <section class="group">
        <div class="group-content">
            <div class="box">
                <figure><a href="#le"><img src="images/team_1.jpg" height="500" width="auto" alt="Tien picture"></a></figure>
                <h3>Duong Ha Tien Le</h3>
            </div>

            <div class="box">
                <figure><a href="#jean"><img src="images/team_2.jpg"height="500" width="auto" alt="Jean picture"></a></figure>
                <h3>Jean Palamara</h3>
            </div>
    
            <div class="box">
                <figure><a href="#mohamed"><img src="images/team_3.jpg"height="500" width="auto" alt="Mohamed picture"></a></figure>
                <h3>Mohamed Hersi</h3>
            </div>
        </div>
    </section>

    <label id="togL" for="togC">Group Information!</label>
    <input id="togC" type="checkbox">
    <div id="content">
        <dl class="tutor">
            <dt>Group name:</dt>
            <dd>Appify</dd>
            <dt>Group ID:</dt>
            <dd>104800948 - 103980613</dd>
            <dt>Tutor's name:</dt>
            <dd>Kaibin Wang</dd>
        </dl>
    </div>  

    <div class="team_1">
        <h2 id="le">Duong Ha Tien Le</h2>
        <figure class="picture">
            <img src="images/team_1.jpg" height= 400px alt="Tien Picture">
        </figure>
                <dl class="info">
                    <dt>Course:</dt>
                    <dd>Computer Science</dd>
                    <dt>Major:</dt>
                    <dd>Software Development</dd>
                    <dt>Hometown:</dt>
                    <dd>Vietnam</dd>
                    <dt>Hobbies:</dt>
                    <dd>Watching movies</dd>
                </dl>

        <table class="tt">
            <thead>
                <tr>
                    <th>Time</th>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                </tr>
            </thead>
                <tr>
                    <td>08.30</td>
                    <td></td>
                    <td></td>
                    <td>COS10009 Lecture</td>
                </tr>
                <tr>
                    <td>09.30</td>
                    <td>                       </td>
                    <td></td>
                    <td></td>
                    <td>COS10026 Class</td>
                </tr>
                <tr>
                    <td>10.30</td>
                    <td>COS10026 Lecture</td>
                    <td></td>
                    <td></td>
                    <td>COS10026 Workshop</td>
                </tr>
                <tr>
                    <td>11.30</td>
                </tr>
                <tr>
                    <td>12.30</td>
                    <td></td>
                    <td></td>
                    <td>COS100025 Lecture</td>
                </tr>
                <tr>
                    <td>13.30</td>
                </tr>
                <tr>
                    <td>14.30</td>
                </tr>
                <tr>
                    <td>15.30</td>
                </tr>
                <tr>
                    <td>16.30</td>
                    <td>COS10009 Class</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>COS10004 Class</td>
                </tr>
                <tr>
                    <td>17.30</td>
                    <td>COS100025 Class</td>
                </tr>
        </table>

        <button class="button-about"><a href="mailto:104700948@student.swin.edu.au">Contact here</a></button>
    </div>

    <div class="team_1">
        <h2 id="jean">Jean Palamara</h2>
        <figure class="picture">
            <img src="images/team_2.jpg"height=400px alt="Jean picture">
        </figure>
                <dl class="info">
                    <dt>Course:</dt>
                    <dd>Computer Science</dd>
                    <dt>Major:</dt>
                    <dd>Games Development</dd>
                    <dt>Hometown:</dt>
                    <dd>Melbourne</dd>
                    <dt>Hobbies:</dt>
                    <dd>Music</dd>
                </dl>

        <table class="tt">
            <thead>
                <tr>
                    <th>Time</th>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                </tr>
            </thead>
                <tr>
                    <td>08.30</td>
                </tr>
                <tr>
                    <td>09.30</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>COS10026 Class</td>
                    <td></td>
                </tr>
                <tr>
                    <td>10.30</td>
                    <td></td>
                    <td>COS10009 Lecture</td>
                    <td></td>
                    <td>COS10026 Workshop</td>
                    <td>TNE10006 Lecture</td>
                </tr>
                <tr>
                    <td>11.30</td>
                </tr>
                <tr>
                    <td>12.30</td>
                </tr>
                <tr>
                    <td>13.30</td>
                </tr>
                <tr>
                    <td>14.30</td>
                    <td></td>
                    <td></td>
                    <td>ART10004 Class</td>
                    <td></td>
                    <td>COS10009 Class</td>
                </tr>
                <tr>
                    <td>15.30</td>
                </tr>
                <tr>
                    <td>16.30</td>
                </tr>
                <tr>
                    <td>17.30</td>
                    <td></td>
                    <td></td>
                    <td>TNE10006 Lab</td>
                </tr>
                <tr>
                    <td>18.30</td>
                    <td>ART10004 Lecture</td>
                </tr>
        </table>

        <button class="button-about"><a href="mailto:103980613@student.swin.edu.au">Contact here</a></button>
    </div>

    <div class="team_1">
        <h2 id="mohamed">Mohamed Hersi</h2>
                <figure class="picture">
                    <img src="images/team_3.jpg"height=400px alt="Mohamed picture">
                </figure>
        <dl class="info">
                    <dt>Course:</dt>
                    <dd>Data Science</dd>
                    <dt>Hometown:</dt>
                    <dd>Somalia</dd>
                    <dt>Hobbies:</dt>
                    <dd>Playing Soccer</dd>
                </dl>

        <table class="tt">
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Monday</th>
                            <th>Tuesday</th>
                            <th>Wednesday</th>
                            <th>Thursday</th>
                            <th>Friday</th>
                        </tr>
                    </thead>
                        <tr>
                            <td>08.30</td>
                            <td></td>
                            <td></td>
                            <td>COS10009 Lecture</td>
                        </tr>
                        <tr>
                            <td>09.30</td>
                            <td>                       </td>
                            <td></td>
                            <td></td>
                            <td>COS10026 Class</td>
                        </tr>
                        <tr>
                            <td>10.30</td>
                            <td>COS10026 Lecture</td>
                            <td></td>
                            <td></td>
                            <td>COS10026 Workshop</td>
                        </tr>
                        <tr>
                            <td>11.30</td>
                        </tr>
                        <tr>
                            <td>12.30</td>
                            <td></td>
                            <td></td>
                            <td>COS100025 Lecture</td>
                        </tr>
                        <tr>
                            <td>13.30</td>
                        </tr>
                        <tr>
                            <td>14.30</td>
                        </tr>
                        <tr>
                            <td>15.30</td>
                        </tr>
                        <tr>
                            <td>16.30</td>
                            <td>COS10009 Class</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>COS10004 Class</td>
                        </tr>
                        <tr>
                            <td>17.30</td>
                            <td>COS100025 Class</td>
                        </tr>
        </table>

        <button class="button-about"><a href="mailto:105340099@student.swin.edu.au">Contact here</a></button>
        </div>
        <?php include 'footer.inc'; ?>
    </body>
</html>