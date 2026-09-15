<?php
// THIS MUST BE AT THE VERY TOP OF YOUR FILE (Before any HTML)
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thread-Lancer</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php include 'header.php'?>

<nav>
    <ul>
        <li class="active"><a href="index.html">Home</a></li> <!-- Active class added here -->
        <li><a href="about.html">About Us</a></li>
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
    <h1>Welcome to Thread-Lancer</h1>
    <p>Explore the beauty of intricate Thread-Lancer, where tradition meets modernity.</p>

    <!-- Carousel -->
<div class="carousel-container">
    <div class="carousel-slide">
        <img src="morning paint.png" alt="Zari Art 1">
        <img src="dream.jpg" alt="Zari Art 2">
        <img src="morning paint.png" alt="Zari Art 3">
        <img src="dream.jpg" alt="Zari Art 4">
        <!-- Add more images as needed -->
    </div>

    <!-- Navigation buttons -->
    <button class="prev-btn">Prev</button>
    <button class="next-btn">Next</button>
</div>

<!-- Pagination Dots -->
<div class="dots">
    <span class="active"></span>
    <span></span>
    <span></span>
    <span></span>
    <!-- Add more dots for more images -->
</div>

    <!-- Image Gallery (10 images in pairs of 2) -->
    <div class="gallery">
        <div class="gallery-category">
            <a href="">
                <img src="morning paint.png" alt="Zari Art 1">
                <h3>Image1</h3>
            </a>
        </div>
        <div class="gallery-category">
            <a href="">
                <img src="morning paint.png" alt="Zari Art 2">
                <h3>Image2</h3>
            </a>
        </div>
        <div class="gallery-category">
            <a href="">
                <img src="morning paint.png" alt="Zari Art 3">
                <h3>Image3</h3>
            </a>
        </div>
        <div class="gallery-category">    
            <a href="">
                <img src="morning paint.png" alt="Zari Art 4">
                <h3>Image4</h3>
            </a>
        </div>
        <div class="gallery-category">
            <a href="">
                <img src="morning paint.png" alt="Zari Art 1">
                <h3>Image5</h3>
            </a>
        </div>
        <div class="gallery-category">
            <a href="">
                <img src="morning paint.png" alt="Zari Art 2">
                <h3>Image6</h3>
            </a>
        </div>
        <div class="gallery-category">
            <a href="">
                <img src="morning paint.png" alt="Zari Art 3">
                <h3>Image7</h3>
            </a>
        </div>
        <div class="gallery-category">    
            <a href="">
                <img src="morning paint.png" alt="Zari Art 4">
                <h3>Image8</h3>
            </a>
        </div>
        <div class="gallery-category">
            <a href="">
                <img src="morning paint.png" alt="Zari Art 1">
                <h3>Image9</h3>
            </a>
        </div>
        <div class="gallery-category">
            <a href="">
                <img src="morning paint.png" alt="Zari Art 2">
                <h3>Image10</h3>
            </a>
        </div>
        <div class="gallery-category">
            <a href="">
                <img src="morning paint.png" alt="Zari Art 3">
                <h3>Image11</h3>
            </a>
        </div>
        <div class="gallery-category">    
            <a href="">
                <img src="morning paint.png" alt="Zari Art 4">
                <h3>Image12</h3>
            </a>
        </div>
    </div>

    <!-- "See More" link -->
   
    <div class="see-more">
        <a href="art.html">See More</a>
    </div>
</main>

<footer>
    &copy; 2024 Thread-Lancer. All rights reserved=
</footer>

<script src="script.js"></script></body>
</html>
