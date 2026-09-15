<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thread-Lancer - Art Categories & Galleries</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php include 'header.php'?>

<nav>
    <ul>
        <li><a href="index.html">Home</a></li> <!-- Active class added here -->
        <li><a href="about.html">About Us</a></li>
        <li class="active">
            <a href="art.html">Art Categories</a>
            <ul>
                <li><a href="traditional.html">Traditional Zari</a></li>
                <li><a href="modern.html">Modern Zari</a></li>
                <li><a href="custom.html">Custom Designs</a></li>
                <li><a href="gallery.html">Galleries</a></li>
            </ul>
        </li>
        <li>
            <a href="collection.html">Collections</a>
            <ul>
                <li><a href="indian.html">Indian</a></li>
                <li><a href="asian.html">Asian</a></li>
                <li><a href="pakistani.html">Pakistani</a></li>
                <li><a href="other.html">Others</a></li>
            </ul>
        </li>
        <li><a href="contact.html">Contact Us</a></li>
    </ul>
</nav>

<main>
    <h1 style="text-align: center;">Explore Our Art Categories</h1>
    <div class="art-container">
        <div class="art-category">
            <a href="traditional.html">
                <img src="morning paint.png" alt="Traditional Zari">
                <h3>Traditional Zari</h3>
            </a>
        </div>
        <div class="art-category">
            <a href="modern.html">
                <img src="morning paint.png" alt="Modern Zari">
                <h3>Modern Zari</h3>
            </a>
        </div>
        <div class="art-category">
            <a href="custom.html">
                <img src="morning paint.png" alt="Custom Designs">
                <h3>Custom Designs</h3>
            </a>
        </div>
        <div class="art-category">
            <a href="gallery.html">
                <img src="morning paint.png" alt="Galleries">
                <h3>Galleries</h3>
            </a>
        </div>
    </div>
</main>

<footer>
    &copy; 2024 Thread-Lancer. All rights reserved.
</footer>

</body>
</html>
