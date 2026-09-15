//index page script
    // JavaScript to add touch event scaling for mobile devices
    const images = document.querySelectorAll('.gallery img');

    images.forEach(image => {
        image.addEventListener('touchstart', function () {
            image.style.transform = 'scale(1.05)';
            image.style.boxShadow = '0 4px 15px rgba(0,0,0,0.2)';
        });

        image.addEventListener('touchend', function () {
            image.style.transform = 'scale(1)';
            image.style.boxShadow = 'none';
        });
    });
    // Carousel Variables
const carouselSlide = document.querySelector('.carousel-slide');
const carouselImages = document.querySelectorAll('.carousel-slide img');
const prevBtn = document.querySelector('.prev-btn');
const nextBtn = document.querySelector('.next-btn');
const dots = document.querySelectorAll('.dots span');

let currentIndex = 0;

// Update Dots
function updateDots() {
    dots.forEach(dot => dot.classList.remove('active'));
    // Only add active class if the dot exists (prevents errors if you have more images than dots)
    if(dots[currentIndex]) {
        dots[currentIndex].classList.add('active');
    }
}

// Function to move the slide using percentages instead of pixels
function moveSlide() {
    carouselSlide.style.transform = `translateX(-${currentIndex * 100}%)`;
    updateDots();
}

// Next Button
nextBtn.addEventListener('click', () => {
    if (currentIndex < carouselImages.length - 1) {
        currentIndex++;
    } else {
        currentIndex = 0; // Loop back to start
    }
    moveSlide();
});

// Previous Button
prevBtn.addEventListener('click', () => {
    if (currentIndex > 0) {
        currentIndex--;
    } else {
        currentIndex = carouselImages.length - 1; // Loop to end
    }
    moveSlide();
});

// Pagination Dots Click
dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
        currentIndex = index;
        moveSlide();
    });
});

// Touch Events for mobile
let startX, endX;
carouselSlide.addEventListener('touchstart', (e) => {
    startX = e.touches[0].clientX;
});

carouselSlide.addEventListener('touchend', (e) => {
    endX = e.changedTouches[0].clientX;
    if (startX > endX + 50) { // Swipe left
        nextBtn.click();
    } else if (startX < endX - 50) { // Swipe right
        prevBtn.click();
    }
});

// Auto-slide every 5 seconds
setInterval(() => {
    nextBtn.click();
}, 5000);
// =========================================
// Login Page Role Toggle
// =========================================
function setRole(role) {
    const btnCustomer = document.getElementById('btn-customer');
    const btnDesigner = document.getElementById('btn-designer');
    const subtitle = document.getElementById('login-subtitle');
    const roleInput = document.getElementById('user-role');

    // Make sure we are actually on the login page before running this
    if (!btnCustomer) return; 

    if (role === 'designer') {
        // Switch to Designer UI
        btnCustomer.classList.remove('active-role');
        btnDesigner.classList.add('active-role');
        subtitle.innerText = "Please log in to your Designer portal.";
        roleInput.value = "designer";
    } else {
        // Switch to Customer UI
        btnDesigner.classList.remove('active-role');
        btnCustomer.classList.add('active-role');
        subtitle.innerText = "Please log in to your Customer account.";
        roleInput.value = "customer";
    }
}

// =========================================
// Register Page Role Toggle
// =========================================
function setRegRole(role) {
    const btnCustomer = document.getElementById('btn-reg-customer');
    const btnDesigner = document.getElementById('btn-reg-designer');
    const subtitle = document.getElementById('reg-subtitle');
    const roleInput = document.getElementById('reg-user-role');
    const designerFields = document.getElementById('designer-fields');

    // Make sure we are on the register page before running this
    if (!btnCustomer) return; 

    if (role === 'designer') {
        // Switch to Designer UI
        btnCustomer.classList.remove('active-role');
        btnDesigner.classList.add('active-role');
        subtitle.innerText = "Apply to become a Naik Zari Designer.";
        roleInput.value = "designer";
        
        // Show the extra Portfolio field
        designerFields.style.display = "block"; 
    } else {
        // Switch to Customer UI
        btnDesigner.classList.remove('active-role');
        btnCustomer.classList.add('active-role');
        subtitle.innerText = "Join us to shop custom Zari art.";
        roleInput.value = "customer";
        
        // Hide the extra Portfolio field
        designerFields.style.display = "none"; 
    }
}

// =========================================
// Submit Registration to PHP Backend
// =========================================
const registerForm = document.getElementById('registerForm');

if (registerForm) {
    registerForm.addEventListener('submit', async function(event) {
        event.preventDefault(); // Stop the page from reloading

        // Gather data from the registration form
        const formData = {
            role: document.getElementById('reg-user-role').value,
            fullname: document.getElementById('fullname').value,
            email: document.getElementById('reg-email').value,
            password: document.getElementById('reg-password').value,
            portfolio: document.getElementById('portfolio') ? document.getElementById('portfolio').value : ''
        };

        try {
            const response = await fetch('register.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(formData)
            });

            const result = await response.json();

            if (response.ok) {
                alert("Success! " + result.message);
                window.location.href = "login.html"; // Send them to log in
            } else {
                alert("Error: " + result.message);
            }
        } catch (error) {
            console.error("Fetch error:", error);
            alert("Could not connect to the server.");
        }
    });
}

// =========================================
// Submit Login to PHP Backend
// =========================================
const loginForm = document.getElementById('loginForm');

if (loginForm) {
    loginForm.addEventListener('submit', async function(event) {
        event.preventDefault(); // Stop the page from reloading

        // Gather data from the login form
        const formData = {
            role: document.getElementById('user-role').value,
            email: document.getElementById('email').value,
            password: document.getElementById('password').value
        };

        try {
            const response = await fetch('login.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(formData)
            });

            const result = await response.json();

            if (response.ok) {
                // Login worked! 
                alert("Welcome back, " + result.user.fullname + "!");
                
                // Redirect based on their role
                if (formData.role === 'designer') {
                    window.location.href = "designer-dashboard.html";
                } else {
                    window.location.href = "index.html"; 
                }
            } else {
                alert("Login Failed: " + result.message);
            }
        } catch (error) {
            console.error("Fetch error:", error);
            alert("Could not connect to the server.");
        }
    });
}

// =========================================
// Dashboard Tab Switching
// =========================================
function switchTab(tabId) {
    // 1. Hide all sections
    const sections = document.querySelectorAll('.dash-section');
    sections.forEach(sec => sec.style.display = 'none');

    // 2. Remove active styling from all sidebar items
    const menuItems = document.querySelectorAll('.sidebar-menu li');
    menuItems.forEach(item => item.classList.remove('active-tab'));

    // 3. Show the selected section
    document.getElementById('tab-' + tabId).style.display = 'block';

    // 4. Add active styling to the clicked sidebar item
    // (Finds the list item that has an onclick attribute matching the tabId)
    const activeMenuItem = Array.from(menuItems).find(item => item.getAttribute('onclick').includes(tabId));
    if (activeMenuItem) {
        activeMenuItem.classList.add('active-tab');
    }
}

// Simple logout function placeholder
function logout() {
    alert("Logging out...");
    window.location.href = "login.html";
}