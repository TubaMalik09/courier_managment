<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CourierX - Enhanced Navbar</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Custom SVG icons to replace Font Awesome */
        html {
            scroll-behavior: smooth;
        }
        .icon {
            display: inline-block;
            width: 1em;
            height: 1em;
            background-size: cover;
        }
        .icon-user {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='white'%3E%3Cpath d='M12 12a5 5 0 1 0 0-10 5 5 0 0 0 0 10zm0 2c-6.627 0-12 5.373-12 12h24c0-6.627-5.373-12-12-12z'/%3E%3C/svg%3E");
        }
        .icon-search {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='white'%3E%3Cpath d='M23.809 21.646l-6.205-6.205c1.167-1.605 1.857-3.579 1.857-5.711 0-5.365-4.365-9.73-9.731-9.73-5.365 0-9.73 4.365-9.73 9.73 0 5.366 4.365 9.73 9.73 9.73 2.034 0 3.923-.627 5.487-1.698l6.238 6.238 2.354-2.354zm-20.955-11.916c0-3.792 3.085-6.877 6.877-6.877s6.877 3.085 6.877 6.877-3.085 6.877-6.877 6.877c-3.793 0-6.877-3.085-6.877-6.877z'/%3E%3C/svg%3E");
        }
        .icon-close {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='white'%3E%3Cpath d='M23.954 21.03l-9.184-9.095 9.092-9.174-2.832-2.807-9.090 9.179-9.176-9.088-2.81 2.81 9.186 9.105-9.095 9.184 2.81 2.81 9.112-9.192 9.18 9.1z'/%3E%3C/svg%3E");
        }
        .icon-bars {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='white'%3E%3Cpath d='M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z'/%3E%3C/svg%3E");
        }
        .icon-caret {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='white'%3E%3Cpath d='M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z'/%3E%3C/svg%3E");
        }
        
        :root {
            --orange: #FF6B00;
            --light-orange: #FFA94D;
            --white: #FFFFFF;
            --light-grey: #F5F5F5;
            --dark-grey: #333333;
            --medium-grey: #666666;
            --shadow: rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
            --navbar-height: 70px;
            --focus-outline: 2px solid var(--white);
            --focus-outline-offset: 2px;
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

        /* Animation for logo */
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes slideIn {
            from { transform: translateX(-100%); }
            to { transform: translateX(0); }
        }

        /* Skip to content link for accessibility */
        .skip-to-content {
            position: absolute;
            top: -40px;
            left: 0;
            background: var(--orange);
            color: white;
            padding: 8px;
            z-index: 10000;
            transition: top 0.3s;
        }

        .skip-to-content:focus {
            top: 0;
        }

        /* Focus styles for accessibility */
        a:focus,
        button:focus,
        input:focus {
            outline: var(--focus-outline);
            outline-offset: var(--focus-outline-offset);
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
            background: rgba(255, 107, 0, 0.98);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
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
            color: var(--orange);
            font-size: 1.1rem;
        }

        .footer-logo-icon {
            width: 40px;
            height: 40px;
            background: var(--orange);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 1.2rem;
            animation: pulse 2s infinite;
        }

        .pulse-animation {
            animation: pulse 2s infinite;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 1.8rem;
            align-items: center;
        }

        .nav-menu a {
            color: var(--white);
            text-decoration: none;
            font-weight: 500;
            position: relative;
            padding: 0.5rem 0;
            transition: var(--transition);
            cursor: pointer;
            font-size: 0.95rem;
        }

        .nav-menu a:hover {
            text-shadow: 0 0 8px rgba(255, 255, 255, 0.8);
        }

        .nav-menu a.active {
            font-weight: 600;
        }

        .nav-menu a.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: var(--white);
            border-radius: 10px;
            box-shadow: 0 0 10px var(--white);
        }

        .nav-buttons {
            display: flex;
            align-items: center;
            gap: 1rem;
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
                background: rgba(255, 107, 0, 0.98);
                width: 100%;
                height: calc(100vh - var(--navbar-height));
                text-align: left;
                transition: 0.4s;
                box-shadow: 0 10px 27px rgba(0, 0, 0, 0.05);
                padding: 2rem;
                z-index: 999;
                gap: 1.5rem;
                overflow-y: auto;
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
            }

            .nav-menu.active {
                left: 0;
                animation: slideIn 0.3s ease forwards;
            }

            .nav-buttons {
                display: none;
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
        
        /* Search Bar */
        .search-form {
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 2rem;
            padding: 0 0.5rem;
            transition: var(--transition);
        }

        .search-form:hover, .search-form:focus-within {
            background: rgba(255, 255, 255, 0.3);
        }

        .search-input {
            background: transparent;
            border: none;
            outline: none;
            color: var(--white);
            padding: 0.5rem;
            width: 150px;
            transition: width 0.3s ease;
        }

        .search-input::placeholder {
            color: rgba(255, 255, 255, 0.8);
        }

        .search-btn {
            background: none;
            border: none;
            color: var(--white);
            cursor: pointer;
            font-size: 0.9rem;
            padding: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Mobile adjustments for new features */
        @media (max-width: 768px) {
            .search-form {
                margin: 1rem 0;
                width: 100%;
            }
            
            .search-input {
                width: 100%;
            }
        }
        
        /* Loading animation for search */
        .search-loading {
            position: relative;
        }
        
        .search-loading::after {
            content: "";
            position: absolute;
            right: 35px;
            top: 50%;
            width: 16px;
            height: 16px;
            margin-top: -8px;
            border: 2px solid rgba(255,255,255,0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 0.8s linear infinite;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <!-- Skip to content link for accessibility -->
    <a href="#main-content" class="skip-to-content">Skip to main content</a>
    
    <!-- Navigation -->
    <nav class="navbar" aria-label="Main navigation">
        <div class="logo" id="logo" role="button" aria-label="CourierX Home">
            <div class="footer-logo-icon pulse-animation" aria-hidden="true">
                <i class="fas fa-shipping-fast"></i>
            </div>
            <span>CourierX</span>
        </div>
        
        <ul class="nav-menu" id="navMenu" role="menubar">
            <button class="close-menu" id="closeMenu" aria-label="Close menu">
                <span class="icon icon-close" aria-hidden="true"></span>
            </button>
            
            <li role="none"><a href="index.php" class="active" role="menuitem">Home</a></li>
            <li role="none"><a href="track.php" role="menuitem">Track</a></li>
            <li role="none"><a href="track_shipment.php" role="menuitem">Status</a></li>
          
        </ul>
        
        <!-- Desktop buttons -->
        <div class="nav-buttons">
            <!-- Search Bar -->
            <form class="search-form" action="/search" method="get" role="search">
               
                    
                </button>
            </form>
        </div>
        
        <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Open menu" aria-expanded="false">
            <span class="icon icon-bars" aria-hidden="true"></span>
        </button>
    </nav>



    <script>
        // Mobile menu toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            // DOM Elements
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const closeMenu = document.getElementById('closeMenu');
            const navMenu = document.getElementById('navMenu');
            const logo = document.getElementById('logo');
            const searchForm = document.querySelector('.search-form');
            const searchInput = document.querySelector('.search-input');
            
            // Event Listeners
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
            
            // Navigation handlers
            logo.addEventListener('click', function() { navigateTo('index.html'); });
            
            // Search functionality
            if (searchForm) {
                searchForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    if (searchInput.value.trim()) {
                        // Add loading animation
                        searchForm.classList.add('search-loading');
                        
                        // Simulate search
                        setTimeout(function() {
                            searchForm.classList.remove('search-loading');
                            alert('Searching for: ' + searchInput.value);
                            searchInput.value = '';
                        }, 1000);
                    }
                });
            }
            
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
        
        // Navigation function
        function navigateTo(url) {
            window.location.href = url;
        }
    </script>
</body>
</html>