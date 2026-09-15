<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Thread-Lancer</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body background="morning paint.png">

    <?php include 'header.php'?>

<nav>
    <ul>
        <li><a href="index.html">Home</a></li> <!-- Active class added here -->
        <li class="active"><a href="about.html">About Us</a></li>
        <li>
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
    <div class="about-container">
        <h2>About Thread-Lancer</h2>
        <p>
            At <strong>Thread-Lancer</strong>, we take pride in preserving the rich tradition of hand embroidery Zari. 
            Zari, known for its intricate and shimmering threads, has been an integral part of cultural attire for centuries. 
            Our artisans, skilled in the age-old techniques, create stunning designs using fine metallic threads and delicate fabrics. 
            Each piece we craft blends traditional craftsmanship with a creative touch, resulting in breathtaking patterns that embody elegance and heritage.
        </p>
        <p>
            With a passion for innovation, Thread-Lancer pushes the boundaries of traditional hand embroidery, 
            while maintaining the integrity of the craft. Our collection showcases the finest Zari work, 
            from bridal wear to modern fashion, bringing the beauty of this intricate art to life. 
            Whether it’s a custom design or one of our curated pieces, each creation reflects the exquisite detail and creative spirit 
            of our artisans, who have mastered the timeless beauty of Zari embroidery.
        </p>
    </div>
</main>

<footer>
    &copy; 2024 Thread-Lancer. All rights reserved.
</footer>

</body>
</html>
