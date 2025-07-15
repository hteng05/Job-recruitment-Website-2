<?php
    echo '
    <section class="container-header">
    <nav>
        <ul>
         <!--class:active indicate the website the user currently visits -->';
                $request_uri = $_SERVER['REQUEST_URI'];
                if($request_uri == '/assign2/index.php'){
        echo        '<li><a href = "index.php" id = "active">Home</a></li>';
                } else {
        echo        '<li><a href = "index.php">Home</a></li>';
                }
                if($request_uri == '/assign2/jobs.php'){
        echo        '<li><a href = "jobs.php" id = "active">Jobs</a></li>';
                } else {
        echo        '<li><a href = "jobs.php">Jobs</a></li>';                
                }
                if($request_uri == '/assign2/apply.php'){
        echo        '<li><a href = "apply.php" id = "active">Apply</a></li>';
                } else {
        echo        '<li><a href = "apply.php">Apply</a></li>';
                }
                if($request_uri == '/assign2/about.php'){
        echo        '<li><a href = "about.php" id = "active">About</a></li>';
                } else {
        echo        '<li><a href = "about.php">About</a></li>';            
                }
                if($request_uri == '/assign2/enhancements.php'){
        echo        '<li><a href = "enhancements.php" id = "active">Enhancements</a></li>';
                } else { 
        echo        '<li><a href = "enhancements.php">Enhancements</a></li>';
                }
        echo    '<li><a href="#">Contact Us</a>
                    <ul class="dropdown">
                      <li><a href="mailto:104700948@student.swin.edu.au"><em>Tien</em></a></li>
                      <li><a href="mailto:103980613@student.swin.edu.au "><em>Jean</em></a></li>
                      <li><a href="mailto:105340099@student.swin.edu.au "><em>Mohamed</em></a></li>
                    </ul>
                </li>
                <li id = "loginandregister"><a href = "login.php">Login</a></li>
        </ul>
    </nav>
    </section>
    <div class="toggle">
        <input type="checkbox" id="toggle-btn">
        <label for="toggle-btn"><span class="visually-hidden">A</span><i class="fa-solid fa-bars"></i></label>
        <section class="dropdown-menu">
            <ul>
         <!--class:active indicate the website the user currently visits -->';
                $request_uri = $_SERVER['REQUEST_URI'];
                if($request_uri == '/assign2/index.php'){
        echo        '<li><a href = "index.php" id = "active">Home</a></li>';
                } else {
        echo        '<li><a href = "index.php">Home</a></li>';
                }
                if($request_uri == '/assign2/jobs.php'){
        echo        '<li><a href = "jobs.php" id = "active">Jobs</a></li>';
                } else {
        echo        '<li><a href = "jobs.php">Jobs</a></li>';                
                }
                if($request_uri == '/assign2/apply.php'){
        echo        '<li><a href = "apply.php" id = "active">Apply</a></li>';
                } else {
        echo        '<li><a href = "apply.php">Apply</a></li>';
                }
                if($request_uri == '/assign2/about.php'){
        echo        '<li><a href = "about.php" id = "active">About</a></li>';
                } else {
        echo        '<li><a href = "about.php">About</a></li>';            
                }
                if($request_uri == '/assign2/enhancements.php'){
        echo        '<li><a href = "enhancements.php" id = "active">Enhancements</a></li>';
                } else { 
        echo        '<li><a href = "enhancements.php">Enhancements</a></li>';
                }
        echo    '<li><a href="#">Contact Us</a>
                    <ul class="dropdown">
                      <li><a href="mailto:104700948@student.swin.edu.au"><em>Tien</em></a></li>
                      <li><a href="mailto:103980613@student.swin.edu.au "><em>Jean</em></a></li>
                      <li><a href="mailto:105340099@student.swin.edu.au "><em>Mohamed</em></a></li>
                    </ul>
                </li>
                <li id = "loginandregister"><a href = "login.php">Login</a></li>
        </ul>
    </section>
    </div>';
?>



