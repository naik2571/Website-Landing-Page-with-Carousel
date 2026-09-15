<?php
session_start();

// SECURITY CHECK: If they are NOT logged in, OR they are NOT a customer, kick them out
if (!isset($_SESSION['freelancer_id']) || $_SESSION['role'] !== 'customer') {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Naik Zari Art - Customer Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="dashboard-body">

    <header class="dashboard-header">
        <div class="logo-area" style="display: flex; align-items: center;">
            <a href="index.php" style="display: flex; align-items: center; text-decoration: none; color: gold; gap: 15px;">
                <img src="logos.png" alt="Naik Zari Art Logo" class="dash-logo">
                <span style="font-family: 'Bell MT', serif; font-weight: bold; font-size: 26px;">Naik Zari Art</span>
            </a>
            
            <span style="color: #666; font-size: 18px; margin-left: 15px; border-left: 2px solid #333; padding-left: 15px;">
                Customer Portal
            </span>
        </div>
        <div class="user-profile-menu">
            <span id="welcome-text">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
            <button class="logout-btn" onclick="logout()">Logout</button>
        </div>
    </header>

    <div class="dashboard-wrapper">
        <aside class="sidebar">
            <ul class="sidebar-menu">
                <li class="active-tab" onclick="switchTab('overview')">Overview</li>
                <li onclick="switchTab('my-orders')">My Custom Orders</li>
                <li onclick="switchTab('saved-designs')">Saved Designs</li>
                <li onclick="switchTab('messages')">Messages</li>
                <li onclick="switchTab('settings')">Account Settings</li>
            </ul>
        </aside>

        <main class="dashboard-content">
            
            <div id="tab-overview" class="dash-section active-section">
                <h2>Account Overview</h2>
                
                <div class="stats-grid">
                    <div class="stat-card">
                        <h3>Active Orders</h3>
                        <p class="stat-number">1</p>
                    </div>
                    <div class="stat-card">
                        <h3>Saved Designs</h3>
                        <p class="stat-number">4</p>
                    </div>
                    <div class="stat-card">
                        <h3>Pending Quotes</h3>
                        <p class="stat-number">2</p>
                    </div>
                </div>

                <h3 class="section-title">Order Updates</h3>
                <div class="activity-list">
                    <p>📦 Your "Blue Zari Wedding Suit" is currently in production.</p>
                    <p>💬 You received a new bid on your "Custom Golden Border" request.</p>
                    <p>✔️ Payment successful for Order #10042.</p>
                </div>
            </div>

            <div id="tab-my-orders" class="dash-section" style="display: none;">
                <h2>My Custom Orders</h2>
                <p>Track the progress of your bespoke Zari pieces.</p>
                
                <div class="activity-list">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <h3 style="color: gold; margin-bottom: 5px;">Blue Zari Wedding Suit</h3>
                            <p style="margin: 0; font-size: 14px;">Designer: Mohd Rafiq | Expected Delivery: April 25th</p>
                        </div>
                        <span style="background: rgba(255, 215, 0, 0.2); color: gold; padding: 5px 10px; border-radius: 5px; font-weight: bold;">In Production</span>
                    </div>
                </div>
            </div>

            <div id="tab-saved-designs" class="dash-section" style="display: none;">
                <h2>Saved Designs</h2>
                <p>Your favorite pieces from our gallery.</p>
                </div>

            <div id="tab-messages" class="dash-section" style="display: none;">
                <h2>Messages</h2>
                <p>Communicate directly with your assigned designers.</p>
            </div>

        </main>
    </div>

<script src="script.js"></script>
</body>
</html>