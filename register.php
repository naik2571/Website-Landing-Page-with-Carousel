<?php
// Database connection variables
$host = "localhost";
$dbname = "thread_lancer_db";
$username = "root"; // Change if your local setup uses a different username
$password = "";     // Change if your local setup uses a password

// Establish database connection using MySQLi
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Retrieve and sanitize input data
    $fullname = trim($_POST['fullname']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $role = trim($_POST['role']);
    $portfolio = isset($_POST['portfolio']) ? trim($_POST['portfolio']) : null;
    $raw_password = $_POST['password'];

    // Basic validation
    if (empty($fullname) || empty($username) || empty($email) || empty($raw_password)) {
        die("Please fill in all required fields.");
    }

    // ==========================================
    // NEW: CHECK IF USERNAME OR EMAIL ALREADY EXISTS
    // ==========================================
    $check_stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $check_stmt->bind_param("ss", $username_input, $email);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        // A match was found! Stop everything and alert the user.
        die("<script>
                alert('Error: That username or email is already taken. Please choose another.'); 
                window.history.back();
             </script>");
    }
    $check_stmt->close();
    // ==========================================

    // Securely hash the password
    $hashed_password = password_hash($raw_password, PASSWORD_DEFAULT);

    // If the role is customer, we don't need to save a portfolio link
    if ($role === 'customer') {
        $portfolio = null; 
    }

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO users (fullname,username, email, role, portfolio_link, password) VALUES (?, ?, ?, ?, ?, ?)");
    
    if ($stmt) {
        // Bind the parameters (s = string)
        $stmt->bind_param("ssssss", $fullname, $username, $email, $role, $portfolio, $hashed_password);

        // Execute the query
        if ($stmt->execute()) {
            // Success! You can redirect the user to the login page here
            echo "<script>
                    alert('Account created successfully!');
                    window.location.href = 'login.html';
                  </script>";
        } else {
            // Handle errors (e.g., duplicate email)
            if ($conn->errno == 1062) {
                echo "Error: An account with that email already exists.";
            } else {
                echo "Error: " . $stmt->error;
            }
        }
        // Close the statement
        $stmt->close();
    } else {
        echo "Database preparation error: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>