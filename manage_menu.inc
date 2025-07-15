<?php
    echo '<nav>
        <h1 class=logo>Appify</h1>
        <ul>';
            $request_uri = $_SERVER['REQUEST_URI'];
            if($request_uri == '/assign2/manage.php'){
                echo '<li><a href = "manage.php" id = "active"><span class = "manageicon"><i class="fa-solid fa-people-roof"></i></span>Manager</a></li>';
            } else {
                echo '<li><a href = "manage.php"><span class = "manageicon"><i class="fa-solid fa-people-roof"></i></span>Manager</a></li>';
            }
            if($request_uri == '/assign2/jobslist.php'){
                echo '<li><a href = "job_list.php" id = "active"><span class = "jobslisticon"><i class="fa-solid fa-list-check"></i></span>Job List</a></li>';
            } else {
                echo '<li><a href = "job_list.php"><span class = "jobslisticon"><i class="fa-solid fa-list-check"></i></span>Job List</a></li>';
            }
        echo '</ul>
    </nav>
    <header>
        <form method = "POST" action = "" id = "logoutForm">
            <button type = "submit" name = "logout"><span class = "menuicon"><i class = "fa fa-sign-out"></i></span>Logout</button>
        </form>
    </header>';
?>
