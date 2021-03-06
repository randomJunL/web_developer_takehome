<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://assets.uits.iu.edu/css/rivet/1.8.2/rivet.min.css">
    <title>Final Question</title>
</head>
<body>
<header class="rvt-header" role="banner">
    <a class="rvt-skip-link" href="#main-content">Skip to content</a>
    <div class="rvt-header__trident">
        <svg class="rvt-header__trident-logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 41 48" aria-hidden="true">
            <title id="iu-logo">Indiana University Logo</title>
            <rect width="41" height="48" fill="#900"/>
            <polygon points="24.59 12.64 24.59 14.98 26.34 14.98 26.34 27.78 22.84 27.78 22.84 10.9 24.59 10.9 24.59 8.57 16.41 8.57 16.41 10.9 18.16 10.9 18.16 27.78 14.66 27.78 14.66 14.98 16.41 14.98 16.41 12.64 8.22 12.64 8.22 14.98 9.97 14.98 9.97 30.03 12.77 33.02 18.16 33.02 18.16 36.52 16.41 36.52 16.41 39.43 24.59 39.43 24.59 36.52 22.84 36.52 22.84 33.02 28 33.02 31.01 30.03 31.01 14.98 32.78 14.98 32.78 12.64 24.59 12.64" fill="#fff"/>
        </svg>
    </div>
    <span class="rvt-header__title">
            <a href="#">School of Public Health: Contact Submission Form</a>
        </span>
</header>
<main role="main" id="main-content">


                <?php
        
                require("src/Controller.php");
                new Controller('sqlite','./src/db/sph_database.db');
        
                ?>


</main>
<footer class="rvt-footer m-top-xxl" role="contentinfo">
    <div class="rvt-footer__trident">
        <svg role="img" alt="" xmlns="http://www.w3.org/2000/svg" width="20" height="25" viewBox="0 0 20 25">
            <polygon points="13.33 3.32 13.33 5.21 14.76 5.21 14.76 15.64 11.9 15.64 11.9 1.9 13.33 1.9 13.33 0 6.67 0 6.67 1.9 8.09 1.9 8.09 15.64 5.24 15.64 5.24 5.21 6.67 5.21 6.67 3.32 0 3.32 0 5.21 1.43 5.21 1.43 17.47 3.7 19.91 8.09 19.91 8.09 22.76 6.67 22.76 6.67 25.13 13.33 25.13 13.33 22.76 11.9 22.76 11.9 19.91 16.1 19.91 18.56 17.47 18.56 5.21 20 5.21 20 3.32 13.33 3.32" fill="#900"/>
        </svg>
    </div>
    <ul class="rvt-footer__aux-links">
        <li class="rvt-footer__aux-item">
            <a href="https://accessibility.iu.edu/assistance/">Accessibility</a>
        </li>
        <li class="rvt-footer__aux-item">
            <!-- You can learn more about privacy policies and generate one
                for your site here:
                https://protect.iu.edu/online-safety/tools/privacy-notice/index.html -->
            <a href="#0">Privacy Notice</a>
        </li>
        <li class="rvt-footer__aux-item">
            <a href="https://www.iu.edu/copyright/index.html">Copyright</a> &copy; 2019 The Trustees of <a href="https://www.iu.edu/">Indiana University</a>
        </li>
    </ul>
</footer>
<script src="https://assets.uits.iu.edu/javascript/rivet/1.8.2/rivet.min.js"></script>
</body>
</html>