<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webpage">
    <meta name="keywords" content="HTML, CSS, Javascript">
    <meta name="author" content="Duong Ha Tien Le">
    <title>Enhancements</title>
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
            <h2>Enhancement 1: Interactivity</h2>
            <a href="jobs.php#collabsible"><h3>Interactivity 1</h3></a>
            <p>We create a fake <strong class="strong-red">accordion effect</strong> on job titles in Job Description Page using only HTML and CSS.  It utilizes hidden <strong class="strong-red">checkboxes and labels</strong> for toggling the accordion items. When a label is clicked, it triggers the associated checkbox, which changes the appearance of the content below it. 
            The input elements are <strong class="strong-red">hidden</strong>, and their :checked state is used to control the visibility of the corresponding content. The labels are styled to resemble accordion headings, and the job description text collapse based on the checkbox state. Overall, this accordion design enhances users' experience by providing a <strong class="strong-red">clear and intuitive</strong> way for users to navigate and find the job title they want.</p>
            <a href="index.php#card"><h3>Interactivity 2</h3></a>
            <p>We create a hover effect on each graphic in Index Page. When users hover over a card, the content <strong class="strong-red">smoothly slides</strong> into view from the left, drawing attention to the card's details. This contributes to a more <strong class="strong-red">engaging and dynamic</strong> browsing experience, improving <strong class="strong-red">usability</strong> and encouraging user interaction with the content.</p>
        </section>
        <section class="container2-en">
            <h2>Enhancement 2: Responsive design</h2>
            <a href="index.php"><h3>Responsive design</h3></a>
            <p>We apply the responsive design techniques of the header and footer to adapt to different screen sizes on every pages, especially on <strong class="strong-red">mobile phone/tablet sized display</strong> :</p>
                <ol>
                    <strong><li>Header - Navigation Bar:</li></strong>
                    <p>On screens smaller than 1300px, the header container is hidden, and a <strong class="strong-red">toggle button</strong> is displayed instead. When the toggle button is clicked, it reveals the dropdown menu for navigation. We use <strong class="strong-red">media queries</strong> to adjust the position and visibility of elements to ensure a seamless user experience on devices with <strong class="strong-red">varying</strong> screen sizes.</p>
                    <strong><li>Footer</li></strong>
                    <p>On screens smaller than 700px, we use media queries to adjust the layout and the footer layout changes to a <strong class="strong-red">single column</strong> to accommodate the limited space. Additionally, adjustments are made to the positioning of elements, such as the <strong class="strong-red">copyright text</strong>, to maintain readability and visual appeal across different devices.</p>
                </ol>
        </section>
    </main>
    <?php include 'footer.inc'; ?>
    </body>
</html>