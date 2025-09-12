<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CourierX - Navbar</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2980b9;
            --white: #FFFFFF;
            --light-grey: #F5F5F5;
            --dark-grey: #333333;
            --medium-grey: #666666;
            --shadow: rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
            --navbar-height: 70px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: var(--light-grey);
            color: var(--dark-grey);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navigation Styles */
        .navbar {
            position: sticky;
            top: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.8rem 2rem;
            z-index: 1000;
            background: var(--primary-color);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.15);
            height: var(--navbar-height);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--white);
            font-weight: bold;
            font-size: 1.3rem;
            text-decoration: none;
            transition: var(--transition);
            cursor: pointer;
            z-index: 1001;
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .logo-icon {
            width: 36px;
            height: 36px;
            background: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            font-size: 1.1rem;
        }

        /* Navigation Menu */
        .nav-menu {
            display: flex;
            list-style: none;
            align-items: center;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .nav-menu a {
            color: var(--white);
            text-decoration: none;
            font-weight: 500;
            position: relative;
            padding: 0.8rem 1.2rem;
            transition: var(--transition);
            cursor: pointer;
            font-size: 0.95rem;
            border-radius: 4px;
        }

        .nav-menu a:hover {
            background: rgba(255, 255, 255, 0.15);
        }

        .nav-menu a.active {
            font-weight: 600;
            background: rgba(255, 255, 255, 0.2);
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: var(--white);
            font-size: 1.5rem;
            cursor: pointer;
            z-index: 1001;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            transition: var(--transition);
        }

        .mobile-menu-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar {
                padding: 0.8rem 1.5rem;
            }
            
            .nav-menu {
                position: fixed;
                top: var(--navbar-height);
                left: -100%;
                flex-direction: column;
                background: var(--primary-color);
                width: 100%;
                height: calc(100vh - var(--navbar-height));
                text-align: left;
                transition: 0.4s;
                box-shadow: 0 10px 27px rgba(0, 0, 0, 0.05);
                padding: 2rem;
                z-index: 999;
                gap: 1.5rem;
                overflow-y: auto;
                margin: 0;
            }

            .nav-menu.active {
                left: 0;
            }

            .nav-menu a {
                width: 100%;
                text-align: center;
                padding: 1rem;
            }

            .mobile-menu-btn {
                display: flex;
                align-items: center;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .navbar {
                padding: 0.8rem 1rem;
            }
            
            .logo span {
                font-size: 1.1rem;
            }
            
            .logo-icon {
                width: 32px;
                height: 32px;
            }
        }

        /* Close button for mobile menu */
        .close-menu {
            display: none;
            position: absolute;
            top: 1rem;
            right: 1.5rem;
            background: none;
            border: none;
            color: var(--white);
            font-size: 1.5rem;
            cursor: pointer;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            transition: var(--transition);
        }

        .close-menu:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        @media (max-width: 768px) {
            .close-menu {
                display: flex;
                align-items: center;
                justify-content: center;
            }
        }
        
        
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar" aria-label="Main navigation">
        <a href="index.php" class="logo" id="logo" aria-label="CourierX Home">
            <div class="logo-icon" aria-hidden="true">
                <i class="fas fa-shipping-fast"></i>
            </div>
            <span>CourierX</span>
        </a>
        
        <ul class="nav-menu" id="navMenu" role="menubar">
            <button class="close-menu" id="closeMenu" aria-label="Close menu">
                <i class="fas fa-times"></i>
            </button>
            
            <li role="none"><a href="index.php" id="home-link" role="menuitem">Home</a></li>
            <li role="none"><a href="track.php" id="track-link" role="menuitem">Track</a></li>
            <li role="none"><a href="track_shipment.php" id="status-link" role="menuitem">Status</a></li>
        </ul>
        
        <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Open menu" aria-expanded="false">
            <i class="fas fa-bars"></i>
        </button>
    </nav>

   

    <script>
        // Function to set active page based on current URL
        function setActivePage() {
            // Get current page URL
            const currentPage = window.location.pathname.split('/').pop() || 'index.php';
            
            // Remove active class from all links
            document.querySelectorAll('.nav-menu a').forEach(link => {
                link.classList.remove('active');
            });
            
            // Add active class to the current page link
            if (currentPage === 'index.php') {
                document.getElementById('home-link').classList.add('active');
            } else if (currentPage === 'track.php') {
                document.getElementById('track-link').classList.add('active');
            } else if (currentPage === 'track_shipment.php') {
                document.getElementById('status-link').classList.add('active');
            }
        }

        // Mobile menu toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const closeMenu = document.getElementById('closeMenu');
            const navMenu = document.getElementById('navMenu');
            
            // Set the active page on load
            setActivePage();
            
            if (mobileMenuBtn && navMenu) {
                mobileMenuBtn.addEventListener('click', function() {
                    const expanded = this.getAttribute('aria-expanded') === 'true' || false;
                    this.setAttribute('aria-expanded', !expanded);
                    navMenu.classList.add('active');
                    document.body.style.overflow = 'hidden';
                });
            }
            
            if (closeMenu && navMenu) {
                closeMenu.addEventListener('click', function() {
                    mobileMenuBtn.setAttribute('aria-expanded', 'false');
                    navMenu.classList.remove('active');
                    document.body.style.overflow = 'auto';
                });
            }

            // Close mobile menu when clicking on a link
            const navLinks = document.querySelectorAll('.nav-menu a');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    mobileMenuBtn.setAttribute('aria-expanded', 'false');
                    navMenu.classList.remove('active');
                    document.body.style.overflow = 'auto';
                    
                    // Update active state when a link is clicked
                    setTimeout(setActivePage, 100);
                });
            });
            
            // Close menu when clicking outside
            document.addEventListener('click', function(e) {
                if (navMenu.classList.contains('active') && 
                    !navMenu.contains(e.target) && 
                    !mobileMenuBtn.contains(e.target)) {
                    mobileMenuBtn.setAttribute('aria-expanded', 'false');
                    navMenu.classList.remove('active');
                    document.body.style.overflow = 'auto';
                }
            });
            
            // Keyboard navigation improvements
            document.addEventListener('keydown', function(e) {
                // Close mobile menu on Escape key
                if (e.key === 'Escape' && navMenu.classList.contains('active')) {
                    mobileMenuBtn.setAttribute('aria-expanded', 'false');
                    navMenu.classList.remove('active');
                    document.body.style.overflow = 'auto';
                }
            });
        });
    </script>
</body>
</html>