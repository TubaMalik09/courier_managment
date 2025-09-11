<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Package - CourierX</title>
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
            --success: #4CAF50;
            --warning: #FF9800;
            --error: #F44336;
            --shadow: rgba(0, 0, 0, 0.1);
            --glass-bg: rgba(255, 255, 255, 0.1);
            --glass-border: rgba(255, 255, 255, 0.2);
            --transition: all 0.3s ease;
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
            overflow-x: hidden;
        }

        /* Animations */
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideInFromLeft {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }

        @keyframes pulseGlow {
            0% { box-shadow: 0 0 0 0 rgba(52, 152, 219, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(52, 152, 219, 0); }
            100% { box-shadow: 0 0 0 0 rgba(52, 152, 219, 0); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes bounceIn {
            0%, 20%, 40%, 60%, 80%, 100% { animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000); }
            0% { opacity: 0; transform: scale3d(0.3, 0.3, 0.3); }
            20% { transform: scale3d(1.1, 1.1, 1.1); }
            40% { transform: scale3d(0.9, 0.9, 0.9); }
            60% { opacity: 1; transform: scale3d(1.03, 1.03, 1.03); }
            80% { transform: scale3d(0.97, 0.97, 0.97); }
            100% { opacity: 1; transform: scale3d(1, 1, 1); }
        }

        .pulse-animation {
            animation: pulse 2s infinite;
        }

        .fade-in {
            animation: fadeIn 0.5s ease;
        }

        .slide-in-left {
            animation: slideInFromLeft 0.3s ease;
        }

        .bounce-in {
            animation: bounceIn 0.6s;
        }

        /* Track Page Styles */
        .track-hero {
            min-height: 50vh;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: var(--white);
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }

        .track-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320'%3E%3Cpath fill='%23ffffff' fill-opacity='0.1' d='M0,128L48,117.3C96,107,192,85,288,112C384,139,480,213,576,224C672,235,768,181,864,160C960,139,1056,149,1152,138.7C1248,128,1344,96,1392,80L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z'%3E%3C/path%3E%3C/svg%3E");
            background-size: cover;
            background-position: center;
        }

        .track-title {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
        }

        .search-container {
            width: 100%;
            max-width: 600px;
            margin: 2rem auto;
            position: relative;
            z-index: 1;
        }

        .search-box {
            display: flex;
            background: var(--white);
            border-radius: 3rem;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: var(--transition);
        }

        .search-box:focus-within {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .search-input {
            flex: 1;
            padding: 1rem 1.5rem;
            border: none;
            font-size: 1rem;
            outline: none;
        }

        .search-button {
            padding: 1rem 1.5rem;
            background: var(--primary-color);
            color: var(--white);
            border: none;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .search-button:hover {
            background: var(--secondary-color);
        }

        .recent-searches {
            margin-top: 1rem;
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            justify-content: center;
        }

        .recent-search-tag {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 1rem;
            font-size: 0.8rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .recent-search-tag:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        /* Section Styles */
        .section-title {
            text-align: center;
            margin-bottom: 3rem;
            color: var(--dark-grey);
            font-size: 2.5rem;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: var(--primary-color);
            border-radius: 2px;
        }

        /* Tracking Content Sections */
        .tracking-section {
            padding: 4rem 2rem;
            background: var(--white);
        }

        .tracking-section.alt {
            background: var(--light-grey);
        }

        .tracking-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .tracking-card {
            padding: 1.5rem;
            border-radius: 1rem;
            background: var(--white);
            box-shadow: 0 5px 15px var(--shadow);
            transition: var(--transition);
            border-left: 4px solid var(--primary-color);
            position: relative;
        }

        .tracking-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(52, 152, 219, 0.2);
        }

        .status-badge {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            padding: 0.3rem 0.8rem;
            border-radius: 1rem;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-badge.booked {
            background-color: rgba(33, 150, 243, 0.1);
            color: #2196F3;
        }

        .status-badge.transit {
            background-color: rgba(255, 152, 0, 0.1);
            color: var(--warning);
        }

        .status-badge.out {
            background-color: rgba(76, 175, 80, 0.1);
            color: var(--success);
        }

        .status-badge.delivered {
            background-color: rgba(76, 175, 80, 0.1);
            color: var(--success);
        }

        .progress-bar-container {
            margin-bottom: 0.75rem;
            position: relative;
        }

        .progress-bar-header {
            display: flex;
            justify-content: space-between;
            font-size: 0.875rem;
            margin-bottom: 0.25rem;
        }

        .progress-bar-track {
            width: 100%;
            background: #e5e5e5;
            border-radius: 1rem;
            height: 8px;
            position: relative;
            overflow: visible;
        }

        .progress-bar-fill {
            height: 100%;
            background: var(--primary-color);
            border-radius: 1rem;
            transition: width 0.5s ease;
            width: 0;
        }

        .truck-icon {
            position: absolute;
            top: -15px;
            left: 0;
            font-size: 1.5rem;
            transform: translateX(-50%);
            transition: left 1.5s ease-in-out;
            animation: bounce 0.8s infinite alternate, pulseGlow 2s infinite;
            z-index: 2;
        }

        .tracking-details {
            font-size: 0.9rem;
            color: var(--medium-grey);
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .tracking-status {
            color: var(--primary-color);
            font-weight: 500;
        }

        .view-details-btn {
            width: 100%;
            background: rgba(52, 152, 219, 0.1);
            color: var(--primary-color);
            border: none;
            padding: 0.75rem;
            border-radius: 0.5rem;
            cursor: pointer;
            margin-top: 1rem;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .view-details-btn:hover {
            background: rgba(52, 152, 219, 0.2);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.2);
        }

        /* Vertical Timeline for Mobile */
        .vertical-timeline {
            display: none;
            margin: 1.5rem 0;
            padding-left: 1.5rem;
            position: relative;
        }

        .vertical-timeline::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 2px;
            background: var(--primary-color);
        }

        .timeline-step {
            position: relative;
            margin-bottom: 1.5rem;
            padding-left: 1.5rem;
        }

        .timeline-step::before {
            content: '';
            position: absolute;
            left: -1.65rem;
            top: 0.3rem;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: var(--primary-color);
            z-index: 1;
        }

        .timeline-step.active::before {
            background: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(52, 152, 219, 0.3);
        }

        .timeline-step.completed::before {
            background: var(--success);
        }

        .timeline-step-title {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .timeline-step-desc {
            font-size: 0.85rem;
            color: var(--medium-grey);
        }

        /* Toast Notification */
        .toast {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 1rem 1.5rem;
            border-radius: 8px;
            color: white;
            z-index: 10000;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            transform: translateX(150%);
            transition: transform 0.3s ease;
        }

        .toast.show {
            transform: translateX(0);
        }

        .toast.success {
            background: var(--success);
        }

        .toast.error {
            background: var(--error);
        }

        .toast.warning {
            background: var(--warning);
        }

        .toast i {
            animation: spin 0.5s ease, bounceIn 0.6s;
        }

        /* Back to top button */
        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
            opacity: 0;
            visibility: hidden;
            z-index: 999;
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.4);
            border: none;
        }

        .back-to-top.show {
            opacity: 1;
            visibility: visible;
        }

        .back-to-top:hover {
            transform: translateY(-5px);
            background: var(--secondary-color);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .alt-tracking-grid {
                display: none;
            }
            
            .progress-bar-container {
                display: none;
            }
            
            .vertical-timeline {
                display: block;
            }
        }

        @media (max-width: 480px) {
            .track-title {
                font-size: 2rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .tracking-grid {
                grid-template-columns: 1fr;
            }
            
            .search-box {
                flex-direction: column;
                border-radius: 1rem;
            }
            
            .search-input {
                border-radius: 1rem 1rem 0 0;
            }
            
            .search-button {
                border-radius: 0 0 1rem 1rem;
            }
        }

        /* Guide Cards */
        .alt-track-card {
            padding: 2rem;
            border-radius: 1rem;
            background: var(--white);
            box-shadow: 0 5px 15px var(--shadow);
            transition: var(--transition);
        }

        .alt-track-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(52, 152, 219, 0.2);
        }
    </style>
</head>
<body>
    <?php include_once("navbar.php"); ?>
    
    <!-- Notification Toast -->
    <div class="toast" id="notificationToast">
        <i class="fas fa-check-circle"></i>
        <span id="toastMessage">Operation completed successfully!</span>
    </div>

    <!-- Back to top button -->
    <button class="back-to-top" id="backToTop">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Track Hero Section -->
    <section class="track-hero">
        <h2 class="track-title">Track Your Consignment</h2>
        <p style="font-size: 1.125rem; margin-bottom: 2rem; position: relative; z-index: 1;">Enter your consignment number to check current status</p>
        <div class="search-container">
            <div class="search-box">
                <input type="text" class="search-input" id="trackingInput" placeholder="Enter Consignment Number (e.g., CX123456789)">
                <button class="search-button" onclick="trackPackage()">
                    <i class="fas fa-truck"></i> Track Now
                </button>
            </div>
            <div class="recent-searches" id="recentSearches">
                <!-- Recent searches will be populated here -->
            </div>
        </div>
    </section>

    <!-- Tracking Guide Section -->
    <section class="tracking-section">
        <h2 class="section-title">Tracking Guide</h2>
        <div class="tracking-grid">
            <div class="alt-track-card fade-in">
                <div style="text-align: center;">
                    <div style="font-size: 2.5rem; margin-bottom: 1rem; color: var(--primary-color);">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3 style="font-size: 1.25rem; margin-bottom: 0.75rem; color: var(--dark-grey);">Multiple Tracking Options</h3>
                    <p style="color: var(--medium-grey);">Track by consignment number, mobile number, or reference number for your convenience.</p>
                </div>
            </div>
            <div class="alt-track-card fade-in">
                <div style="text-align: center;">
                    <div style="font-size: 2.5rem; margin-bottom: 1rem; color: var(--primary-color);">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3 style="font-size: 1.25rem; margin-bottom: 0.75rem; color: var(--dark-grey);">Email Notifications</h3>
                    <p style="color: var(--medium-grey);">Get instant email alerts for every status update from booking to delivery.</p>
                </div>
            </div>
            <div class="alt-track-card fade-in">
                <div style="text-align: center;">
                    <div style="font-size: 2.5rem; margin-bottom: 1rem; color: var(--primary-color);">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3 style="font-size: 1.25rem; margin-bottom: 0.75rem; color: var(--dark-grey);">SMS Updates</h3>
                    <p style="color: var(--medium-grey);">Receive real-time SMS notifications for pickup, transit, and delivery updates.</p>
                </div>
            </div>
        </div>
    </section>
    <?php include_once("footer.php"); ?>
    

    <script>
        // Show notification toast
        function showNotification(message, type = 'success') {
            const toast = document.getElementById('notificationToast');
            const toastMessage = document.getElementById('toastMessage');
            const toastIcon = toast.querySelector('i');
           
            toastMessage.textContent = message;
            toast.className = `toast ${type} show`;
           
            // Update icon based on type
            if (type === 'success') {
                toastIcon.className = 'fas fa-check-circle';
            } else if (type === 'error') {
                toastIcon.className = 'fas fa-exclamation-circle';
            } else if (type === 'warning') {
                toastIcon.className = 'fas fa-info-circle';
            }
           
            // Hide toast after 3 seconds
            setTimeout(() => {
                toast.classList.remove('show');
            }, 3000);
        }

        // Track package function
        function trackPackage(trackingNumber = null) {
            const trackingInput = document.getElementById('trackingInput');
            if (!trackingInput && !trackingNumber) return;
            
            const numberToTrack = trackingNumber || trackingInput.value.trim();
           
            if (!numberToTrack) {
                showNotification('Please enter a consignment number', 'error');
                return;
            }
           
            if (!numberToTrack.startsWith('CX') || numberToTrack.length !== 11) {
                showNotification('Please enter a valid consignment number (e.g., CX123456789)', 'error');
                return;
            }
            
            // Save to recent searches
            saveToRecentSearches(numberToTrack);
           
            // Show loading state
            showNotification('Tracking your package...', 'warning');
           
            // Simulate API call
            setTimeout(() => {
                // Show status page
               window.location.href = 'track_shipment.php?consignment=' + numberToTrack;
               
                // Show success message
                showNotification('Package status loaded successfully', 'success');
            }, 1500);
        }

        // Save to recent searches
        function saveToRecentSearches(trackingNumber) {
            let recentSearches = JSON.parse(localStorage.getItem('recentSearches')) || [];
            
            // Remove if already exists
            recentSearches = recentSearches.filter(item => item !== trackingNumber);
            
            // Add to beginning of array
            recentSearches.unshift(trackingNumber);
            
            // Keep only the last 5 searches
            if (recentSearches.length > 5) {
                recentSearches = recentSearches.slice(0, 5);
            }
            
            // Save to localStorage
            localStorage.setItem('recentSearches', JSON.stringify(recentSearches));
            
            // Update UI
            updateRecentSearchesUI();
        }

        // Update recent searches UI
        function updateRecentSearchesUI() {
            const recentSearchesContainer = document.getElementById('recentSearches');
            if (!recentSearchesContainer) return;
            
            const recentSearches = JSON.parse(localStorage.getItem('recentSearches')) || [];
            
            if (recentSearches.length === 0) {
                recentSearchesContainer.innerHTML = '';
                return;
            }
            
            recentSearchesContainer.innerHTML = '<span style="margin-right: 0.5rem; font-size: 0.9rem;">Recent:</span>';
            
            recentSearches.forEach(trackingNumber => {
                const tag = document.createElement('span');
                tag.className = 'recent-search-tag';
                tag.textContent = trackingNumber;
                tag.onclick = () => {
                    document.getElementById('trackingInput').value = trackingNumber;
                    trackPackage(trackingNumber);
                };
                
                recentSearchesContainer.appendChild(tag);
            });
        }

        // Animate progress bars and truck icons
        function animateProgressBars() {
            const progressBars = document.querySelectorAll('.progress-bar-fill');
            const truckIcons = document.querySelectorAll('.truck-icon');
            
            progressBars.forEach(bar => {
                const progress = bar.getAttribute('data-progress');
                setTimeout(() => {
                    bar.style.width = progress + '%';
                }, 300);
            });
            
            truckIcons.forEach(truck => {
                const progress = truck.getAttribute('data-progress');
                setTimeout(() => {
                    truck.style.left = progress + '%';
                }, 300);
            });
        }

        // Initialize the page when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Back to top button functionality
            const backToTopButton = document.getElementById('backToTop');
            if (backToTopButton) {
                window.addEventListener('scroll', function() {
                    if (window.pageYOffset > 300) {
                        backToTopButton.classList.add('show');
                    } else {
                        backToTopButton.classList.remove('show');
                    }
                });
               
                backToTopButton.addEventListener('click', function() {
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                });
            }

            // Add animation classes to elements as they come into view
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('fade-in');
                        if (entry.target.classList.contains('tracking-card')) {
                            // Animate progress bars when cards come into view
                            animateProgressBars();
                        }
                    }
                });
            }, observerOptions);

            // Observe elements for animation
            document.querySelectorAll('.tracking-card, .alt-track-card').forEach(el => {
                observer.observe(el);
            });

            // Add Enter key support for tracking input
            const trackingInput = document.getElementById('trackingInput');
            if (trackingInput) {
                trackingInput.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') {
                        trackPackage();
                    }
                });
            }

            // Animate progress bars on page load
            animateProgressBars();
            
            // Load recent searches
            updateRecentSearchesUI();
        });
    </script>
</body>
</html>