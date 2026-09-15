<?php
// 1. Start the session FIRST
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<header>
    <div style="display: flex; align-items: center; gap: 15px; margin-right: 20%; margin-left: 30%; text-align: center;">
        <a href="index.php"><img src="logos.png" alt="Thread-Lancer Logo"></a>
        Thread-Lancer
    </div>

    <div style="display: flex; gap: 10px; margin-left: 1%; align-items: center;">
        
        <?php if(isset($_SESSION['user_id'])): ?>
            
            <?php 
                // Determine the correct dashboard link based on their role
                if (isset($_SESSION['role']) && $_SESSION['role'] === 'designer') {
                    $dashboard_link = "designer-dashboard.php";
                } else {
                    // Default to customer dashboard
                    $dashboard_link = "customer-dashboard.php"; 
                }
            ?>

            <a href="<?php echo $dashboard_link; ?>" style="color: gold; font-weight: bold; font-size: 18px; text-decoration: none;">
                Hi, <?php echo htmlspecialchars($_SESSION['username']); ?>
            </a>
            
            <a href="logout.php" style="margin-left: 10px; border: 2px black solid;
            padding: 10px;
            border-radius: 10px;
            background: gold;
            color:black;
            text-decoration: none;
            float: left;">Logout</a>
            
        <?php else: ?>
            <a href="login.html" style="border: 2px gold solid;
            padding: 10px;
            border-radius: 10px;
            text-decoration: none;
            float: left;">Login</a>

            <a href="register.html" style=" border: 2px black solid;
            padding: 10px;
            border-radius: 10px;
            background: gold;
            color:black;
            text-decoration: none;
            float: left;">Sign up</a>
            
        <?php endif; ?>
        
    </div>
</header>