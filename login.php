<?php
// Start a session so the user stays logged in across different pages
session_start(); 

// Database connection variables
$host = "localhost";
$dbname = "thread_lancer_db";
$username = "root"; 
$password = "";     

// Establish database connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Retrieve inputs
    $email = trim($_POST['email']);
    $raw_password = $_POST['password'];
    $role = trim($_POST['role']); // Fetches 'customer' or 'designer' from the hidden input

    // Basic validation
    if (empty($email) || empty($raw_password)) {
        die("Please enter both email and password.");
    }

    // Prepare the SQL statement to find the user by email AND role
    // This ensures a designer can't accidentally log in through the customer tab, and vice versa
    $stmt = $conn->prepare("SELECT id, fullname, username,password FROM users WHERE email = ? AND role = ?");
    
    if ($stmt) {
        $stmt->bind_param("ss", $email, $role);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if exactly one user was found
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            
            // Verify the entered password against the stored hash
            if (password_verify($raw_password, $user['password'])) {
                
                // Success! Set session variables to remember the user
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['fullname'] = $user['fullname'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $role;

                // Redirect to the homepage (or a specific dashboard)
                echo "<script>
                        alert('Login successful! Welcome back, " . htmlspecialchars($user['fullname']) . "');
                        window.location.href = 'index.html'; 
                      </script>";
            } else {
                // Incorrect password
                echo "<script>
                        alert('Incorrect password. Please try again.'); 
                        window.history.back();
                      </script>";
            }
        } else {
            // No user found with that email/role combination
            echo "<script>
                    alert('No account found with that email for the selected role.'); 
                    window.history.back();
                  </script>";
        }
        $stmt->close();
    } else {
        echo "Database error: " . $conn->error;
    }
}

$conn->close();
?>