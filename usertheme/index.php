<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CourierX - Fast, Reliable, and Futuristic Courier Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.1/dist/sweetalert2.min.css">
    <style>
        :root {
            --primary-color: #FF6B00;
            --secondary-color: #FFA94D;
            --accent-color: #333333;
            --text-color: #555555;
            --background-light: #F9F9FB;
            --background-dark: #FFFFFF;
            --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            --transition-speed: 0.4s;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: var(--background-light);
            color: var(--text-color);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* --- Animations --- */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
           100% { transform: translateY(0px); }
        }
        
        .fade-in-on-scroll {
            opacity: 0;
            transition: all 0.6s cubic-bezier(0.19, 1, 0.22, 1);
            transform: translateY(20px);
        }

        .fade-in-on-scroll.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .fade-in-on-scroll.visible[style*="delay"] {
            animation-delay: var(--scroll-animate-delay, 0s);
        }

        .card {
            background-color: var(--background-dark);
            border-radius: 1rem;
            box-shadow: var(--card-shadow);
            padding: 2rem;
            transition: var(--transition-speed);
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
        }
        
        /* --- General Layout --- */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        section {
            padding: 6rem 0;
        }
        
        .section-title {
            text-align: center;
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 700;
            color: var(--accent-color);
            margin-bottom: 4rem;
            position: relative;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 5px;
            background: var(--primary-color);
            border-radius: 5px;
        }

        /* --- Hero Section --- */
        .hero {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: var(--background-dark);
            padding: 8rem 0;
            position: relative;
            overflow: hidden;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320'%3E%3Cpath fill='%23ffffff' fill-opacity='0.1' d='M0,128L48,117.3C96,107,192,85,288,112C384,139,480,213,576,218.7C672,224,768,160,864,138.7C960,117,1056,139,1152,149.3C1248,160,1344,160,1392,160L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z'%3E%3C/path%3E%3C/svg%3E");
            background-size: cover;
            background-position: bottom;
        }
        
        .hero .container {
            display: flex;
            align-items: center;
            gap: 4rem;
            position: relative;
            z-index: 1;
        }

        .hero-content {
            flex: 1;
        }

        .hero-content h1 {
            font-size: clamp(2.5rem, 6vw, 4.5rem);
            font-weight: 700;
            line-height: 1.1;
            margin-bottom: 1rem;
        }

        .hero-content p {
            font-size: clamp(1rem, 2vw, 1.25rem);
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .tracking-widget {
            display: flex;
            background: rgba(255, 255, 255, 0.2);
            padding: 0.75rem;
            border-radius: 50px;
            width: 100%;
            max-width: 500px;
            backdrop-filter: blur(10px);
        }
        
        .tracking-widget input {
            flex-grow: 1;
            background: transparent;
            border: none;
            outline: none;
            color: var(--background-dark);
            padding: 0 1.5rem;
            font-size: 1rem;
        }
        
        .tracking-widget input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }
        
        .tracking-widget button {
            background-color: var(--background-dark);
            color: var(--primary-color);
            border: none;
            padding: 0.75rem 2.5rem;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition-speed);
            white-space: nowrap;
        }
        
        .tracking-widget button:hover {
            background-color: var(--accent-color);
            color: var(--background-dark);
        }

        .hero-image {
            flex: 1;
            text-align: center;
            animation: float 6s ease-in-out infinite;
        }

        .hero-image img {
            width: 100%;
            max-width: 450px;
            border-radius: 1rem;
            filter: drop-shadow(0 10px 30px rgba(0, 0, 0, 0.2));
        }
        
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 1rem 1.5rem;
            background: var(--background-dark);
            color: var(--accent-color);
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transform: translateX(150%);
            transition: transform 0.4s ease;
            z-index: 1002;
            display: flex;
            align-items: center;
        }
        
        .notification.show {
            transform: translateX(0);
        }
        
        .notification i {
            margin-right: 0.5rem;
            color: var(--primary-color);
        }
        
        .notification.error {
            border-left: 4px solid #ff4757;
        }
        
        .notification.success {
            border-left: 4px solid #2ed573;
        }

        /* --- Services Grid --- */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            text-align: center;
        }
        
        .service-card .icon {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 80px;
            height: 80px;
            background: rgba(255, 107, 0, 0.1);
            border-radius: 50%;
            transition: var(--transition-speed);
        }
        
        .service-card:hover .icon {
            background: var(--primary-color);
            color: var(--background-dark);
            transform: rotateY(180deg);
        }

        .service-card h3 {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--accent-color);
            margin-bottom: 0.5rem;
        }

        /* --- How It Works --- */
        .steps-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 2rem;
            position: relative;
        }
        
        .steps-container::before {
            content: '';
            position: absolute;
            top: 30px;
            left: 0;
            right: 0;
            height: 2px;
            background: var(--primary-color);
            opacity: 0.2;
            z-index: 0;
        }

        .step-card {
            text-align: center;
            max-width: 300px;
            position: relative;
            z-index: 1;
        }
        
        .step-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
            background: var(--background-light);
            display: inline-block;
            width: 60px;
            height: 60px;
            line-height: 60px;
            border-radius: 50%;
            border: 2px solid var(--primary-color);
            margin-bottom: 1.5rem;
            transition: var(--transition-speed);
            position: relative;
        }

        .step-card:hover .step-number {
            background-color: var(--primary-color);
            color: var(--background-dark);
            animation: pulse 1s infinite;
        }
        
        .step-card h3 {
            font-size: 1.2rem;
            color: var(--accent-color);
            margin-bottom: 0.5rem;
        }

        /* --- Contact Form Section --- */
        .contact-section {
            background-color: var(--background-light);
        }

        .contact-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .contact-form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        .contact-form .form-group {
            text-align: left;
        }

        .contact-form .form-group.full-width {
            grid-column: 1 / -1;
        }

        .contact-form label {
            font-weight: 600;
            color: var(--accent-color);
            display: block;
            margin-bottom: 0.5rem;
        }
        
        .contact-form input,
        .contact-form textarea,
        .contact-form select {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f5f5f5;
            transition: all var(--transition-speed);
            font-size: 1rem;
            font-family: 'Poppins', sans-serif;
        }
        
        .contact-form input:focus,
        .contact-form textarea:focus,
        .contact-form select:focus {
            outline: none;
            border-color: var(--primary-color);
            background-color: white;
            box-shadow: 0 0 0 3px rgba(255, 107, 0, 0.1);
        }

        .contact-form textarea {
            min-height: 150px;
            resize: vertical;
        }

        .contact-form button {
            grid-column: 1 / -1;
            background-color: var(--primary-color);
            color: var(--background-dark);
            padding: 1rem;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition-speed);
            font-size: 1.1rem;
        }
        
        .contact-form button:hover {
            background-color: var(--accent-color);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .contact-form button:active {
            transform: translateY(0);
        }

        .contact-info {
            margin-top: 3rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            text-align: center;
        }

        .contact-info-card {
            padding: 1.5rem;
            border-radius: 1rem;
            background-color: var(--background-dark);
            box-shadow: var(--card-shadow);
            transition: var(--transition-speed);
        }

        .contact-info-card:hover {
            transform: translateY(-5px);
        }

        .contact-info-card .icon {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .contact-info-card h4 {
            font-size: 1.1rem;
            color: var(--accent-color);
            margin-bottom: 0.5rem;
        }

        /* --- Live Tracking Map --- */
        .live-map-section {
            background-color: #eef1f6;
        }

        .map-container {
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            position: relative;
            min-height: 500px;
        }
        
        #map {
            width: 100%;
            height: 500px;
            border-radius: 1rem;
        }
        
        .map-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.9);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 10;
            transition: opacity 0.4s ease;
        }
        
        .map-overlay.hidden {
            opacity: 0;
            pointer-events: none;
        }
        
        .map-overlay h4 {
            font-size: 1.5rem;
            color: var(--accent-color);
            margin-bottom: 1rem;
        }
        
        .map-controls {
            position: absolute;
            bottom: 20px;
            left: 20px;
            z-index: 11;
            display: flex;
            gap: 10px;
        }
        
        .map-btn {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
            transition: var(--transition-speed);
        }
        
        .map-btn:hover {
            background: var(--accent-color);
        }

        /* --- Shipping Calculator --- */
        .calculator-section {
            background-color: var(--background-light);
        }
        
        .calculator-container {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }

        .calculator-form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .calculator-form .form-group {
            text-align: left;
        }

        .calculator-form label {
            font-weight: 600;
            color: var(--accent-color);
            display: block;
            margin-bottom: 0.5rem;
        }
        
        .calculator-form input,
        .calculator-form select {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f5f5f5;
            transition: all var(--transition-speed);
            font-size: 1rem;
        }
        
        .calculator-form input:focus,
        .calculator-form select:focus {
            outline: none;
            border-color: var(--primary-color);
            background-color: white;
            box-shadow: 0 0 0 3px rgba(255, 107, 0, 0.1);
        }

        .calculator-form button {
            grid-column: 1 / -1;
            background-color: var(--primary-color);
            color: var(--background-dark);
            padding: 1rem;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition-speed);
            font-size: 1.1rem;
        }
        
        .calculator-form button:hover {
            background-color: var(--accent-color);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .calculator-form button:active {
            transform: translateY(0);
        }

        .price-display {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-top: 2rem;
            text-align: center;
            padding: 1.5rem;
            background: white;
            border-radius: 1rem;
            box-shadow: var(--card-shadow);
            display: none;
        }
        
        .price-display.show {
            display: block;
            animation: fadeIn 0.6s ease;
        }
        
        .loader {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
            margin-right: 10px;
            vertical-align: middle;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* --- Form Validation Styles --- */
        .form-group {
            position: relative;
        }
        
        .error-message {
            color: #ff4757;
            font-size: 0.8rem;
            margin-top: 0.5rem;
            display: none;
        }
        
        .form-group.error input,
        .form-group.error select,
        .form-group.error textarea {
            border-color: #ff4757;
        }
        
        .form-group.success input,
        .form-group.success select,
        .form-group.success textarea {
            border-color: #2ed573;
        }

        /* --- CTA --- */
        .cta-section {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: var(--background-dark);
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .cta-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320'%3E%3Cpath fill='%23ffffff' fill-opacity='0.1' d='M0,128L48,117.3C96,107,192,85,288,112C384,139,480,213,576,218.7C672,224,768,160,864,138.7C960,117,1056,139,1152,149.3C1248,160,1344,160,1392,160L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z'%3E%3C/path%3E%3C/svg%3E");
            background-size: cover;
            background-position: bottom;
        }
        
        .cta-section .cta-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 1;
        }
        
        .cta-section h2 {
            font-size: clamp(1.5rem, 3vw, 2.5rem);
            margin-bottom: 1rem;
        }
        
        .cta-section p {
            margin-bottom: 2rem;
            max-width: 600px;
            opacity: 0.9;
        }

        .cta-button {
            background-color: var(--background-dark);
            color: var(--primary-color);
            padding: 1rem 2.5rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition-speed);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .cta-button:hover {
            background-color: var(--accent-color);
            color: var(--background-dark);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
        
        /* --- Responsive Design --- */
        @media (max-width: 992px) {
            .hero .container {
                flex-direction: column;
                text-align: center;
            }
            
            .hero-image {
                margin-top: 3rem;
            }
            
            .calculator-form,
            .contact-form {
                grid-template-columns: 1fr;
            }
            
            .steps-container::before {
                display: none;
            }
        }
        
        @media (max-width: 768px) {
            .map-controls {
                bottom: 10px;
                left: 10px;
                flex-direction: column;
            }
        }
        
        @media (max-width: 576px) {
            .tracking-widget {
                flex-direction: column;
                padding: 1rem;
                border-radius: 1rem;
            }
            
            .tracking-widget input {
                text-align: center;
                margin-bottom: 1rem;
                padding: 1rem;
            }
            
            .tracking-widget button {
                width: 100%;
            }
            
            section {
                padding: 4rem 0;
            }
            
            .card {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <?php include_once("navbar.php");?>
    <div id="notification" class="notification">
        <i class="fas fa-info-circle"></i>
        <span class="notification-text"></span>
    </div>

    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1 class="fade-in-on-scroll">Your Deliveries. Smarter. Faster. Better.</h1>
                <p class="fade-in-on-scroll" style="--scroll-animate-delay: 0.2s;">Managing and tracking your parcels across Karachi and beyond has never been easier with CourierX.</p>
                <div class="tracking-widget fade-in-on-scroll" style="--scroll-animate-delay: 0.4s;">
                    <input type="text" placeholder="Enter your consignment number" aria-label="Consignment number" id="trackingInput">
                    <button id="trackBtn">Track Now</button>
                </div>
            </div>
            <div class="hero-image fade-in-on-scroll" style="--scroll-animate-delay: 0.6s;">
                <img src="https://www.lalamove.com/hs-fs/hubfs/Easy-Booking-Process-for-Delivery.png?width=915&height=551&name=Easy-Booking-Process-for-Delivery.png">
            </div>
        </div>
    </section>

    <section id="services">
        <div class="container">
            <h2 class="section-title fade-in-on-scroll">Our Core Services</h2>
            <div class="services-grid">
                <div class="service-card card fade-in-on-scroll">
                    <div class="icon"><i class="fas fa-route"></i></div>
                    <h3>Real-time Tracking</h3>
                    <p>Stay informed with live updates on your package's location from pickup to final delivery in Karachi.</p>
                </div>
                <div class="service-card card fade-in-on-scroll" style="--scroll-animate-delay: 0.1s;">
                    <div class="icon"><i class="fas fa-shipping-fast"></i></div>
                    <h3>Express Delivery</h3>
                    <p>Choose our express option for same-day or next-day delivery on urgent shipments across Sindh.</p>
                </div>
                <div class="service-card card fade-in-on-scroll" style="--scroll-animate-delay: 0.2s;">
                    <div class="icon"><i class="fas fa-lock"></i></div>
                    <h3>Secure Handling</h3>
                    <p>We guarantee the safety of your items with our secure and insured handling process.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="how-it-works" class="how-it-works">
        <div class="container">
            <h2 class="section-title fade-in-on-scroll">How It Works</h2>
            <div class="steps-container">
                <div class="step-card card fade-in-on-scroll">
                    <div class="step-number">1</div>
                    <h3>Book Online</h3>
                    <p>Simply create a new shipment by entering the details of your package and destination.</p>
                </div>
                <div class="step-card card fade-in-on-scroll" style="--scroll-animate-delay: 0.1s;">
                    <div class="step-number">2</div>
                    <h3>We Pick Up</h3>
                    <p>Our courier will be dispatched to pick up your package from the specified location in Karachi.</p>
                </div>
                <div class="step-card card fade-in-on-scroll" style="--scroll-animate-delay: 0.2s;">
                    <div class="step-number">3</div>
                    <h3>Track & Deliver</h3>
                    <p>Monitor your package's journey and receive real-time notifications until it's delivered.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="live-tracking" class="live-map-section">
        <div class="container">
            <h2 class="section-title fade-in-on-scroll">Track Your Package Live</h2>
            <div class="map-container fade-in-on-scroll">
                <div id="map"></div>
                <div class="map-overlay" id="mapOverlay">
                    <h4>Live Tracking Map</h4>
                    <p>Enter a tracking number to see your package's location in real-time.</p>
                </div>
                <div class="map-controls">
                    <button class="map-btn" id="zoomIn">+</button>
                    <button class="map-btn" id="zoomOut">-</button>
                </div>
            </div>
        </div>
    </section>

   <section id="calculator" class="calculator-section">
    <div class="container calculator-container fade-in-on-scroll">
        <h2 class="section-title">Calculate Your Shipping Cost</h2>
        <form class="calculator-form" id="shippingCalculator">
            <div class="form-group">
                <label for="origin">Origin City</label>
                <input type="text" id="origin" name="origin" value="Karachi" list="citySuggestions">
                <div class="error-message" id="originError"></div>
            </div>
            <div class="form-group">
                <label for="destination">Destination City</label>
                <input type="text" id="destination" name="destination" placeholder="e.g., Lahore" list="citySuggestions">
                <div class="error-message" id="destinationError"></div>
            </div>
            <div class="form-group">
                <label for="weight">Package Weight (kg)</label>
                <input type="number" id="weight" name="weight" placeholder="e.g., 5" min="0.1" step="0.1">
                <div class="error-message" id="weightError"></div>
            </div>
            <div class="form-group">
                <label for="length">Length (cm)</label>
                <input type="number" id="length" name="length" placeholder="e.g., 30" min="1" step="1">
                <div class="error-message" id="lengthError"></div>
            </div>
            <div class="form-group">
                <label for="width">Width (cm)</label>
                <input type="number" id="width" name="width" placeholder="e.g., 20" min="1" step="1">
                <div class="error-message" id="widthError"></div>
            </div>
            <div class="form-group">
                <label for="height">Height (cm)</label>
                <input type="number" id="height" name="height" placeholder="e.g., 10" min="1" step="1">
                <div class="error-message" id="heightError"></div>
            </div>
            <div class="form-group">
                <label for="service">Service Type</label>
                <select id="service" name="service">
                    <option value="">Select a service</option>
                    <option value="standard">Standard</option>
                    <option value="express">Express</option>
                    <option value="freight">Freight</option>
                </select>
                <div class="error-message" id="serviceError"></div>
            </div>
            <div class="form-group">
                <label for="insurance">Add Insurance?</label>
                <div style="display: flex; align-items: center; height: 100%;">
                    <input type="checkbox" id="insurance" name="insurance" style="width: auto; margin-right: 0.5rem;">
                    <span>(1.5% of total value)</span>
                </div>
            </div>
            <button type="submit" id="calculateBtn">
                <span id="calcBtnText">Calculate Cost</span>
                <span id="calcLoader" class="loader" style="display: none;"></span>
            </button>
        </form>
        <!-- NEW: Datalist (can be anywhere, but good practice to put it near its inputs or at the end of the form/section) -->
        <datalist id="citySuggestions">
            <option value="Karachi"></option>
            <option value="Lahore"></option>
            <option value="Islamabad"></option>
            <option value="Peshawar"></option>
            <option value="Quetta"></option>
            <option value="Multan"></option>
            <option value="Faisalabad"></option>
            <option value="Rawalpindi"></option>
            <option value="Hyderabad"></option>
            <option value="Sialkot"></option>
            <option value="Gujranwala"></option>
            <option value="Sukkur"></option>
            <option value="Bahawalpur"></option>
            <option value="Sargodha"></option>
            <option value="Shekhupura"></option>
            <option value="Mardan"></option>
            <option value="Larkana"></option>
            <option value="Kasur"></option>
            <!-- Add more Pakistani cities here -->
        </datalist>
        <div id="priceDisplay" class="price-display">
            Estimated Cost: <span id="calculatedPrice">PKR 0.00</span>
        </div>
    </div>
</section>

    <!-- Contact Form Section -->
    <section id="contact" class="contact-section">
        <div class="container contact-container fade-in-on-scroll">
            <h2 class="section-title">Get In Touch With Us</h2>
            <form class="contact-form card" id="contactForm">
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your full name">
                    <div class="error-message" id="nameError"></div>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email address">
                    <div class="error-message" id="emailError"></div>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" placeholder="Enter your phone number">
                    <div class="error-message" id="phoneError"></div>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <select id="subject" name="subject">
                        <option value="">Select a subject</option>
                        <option value="general">General Inquiry</option>
                        <option value="support">Customer Support</option>
                        <option value="complaint">Complaint</option>
                        <option value="business">Business Partnership</option>
                        <option value="other">Other</option>
                    </select>
                    <div class="error-message" id="subjectError"></div>
                </div>
                <div class="form-group full-width">
                    <label for="message">Your Message</label>
                    <textarea id="message" name="message" placeholder="Type your message here..."></textarea>
                    <div class="error-message" id="messageError"></div>
                </div>
                <button type="submit" id="contactBtn">
                    <span id="contactBtnText">Send Message</span>
                    <span id="contactLoader" class="loader" style="display: none;"></span>
                </button>
            </form>

            <div class="contact-info">
                <div class="contact-info-card">
                    <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                    <h4>Our Location</h4>
                    <p>123 Main Boulevard, Gulshan-e-Iqbal, Karachi, Pakistan</p>
                </div>
                <div class="contact-info-card">
                    <div class="icon"><i class="fas fa-phone"></i></div>
                    <h4>Call Us</h4>
                    <p>+92 321 1234567</p>
                    <p>+92 21 34567890</p>
                </div>
                <div class="contact-info-card">
                    <div class="icon"><i class="fas fa-envelope"></i></div>
                    <h4>Email Us</h4>
                    <p>info@courierx.com</p>
                    <p>support@courierx.com</p>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-section">
        <div class="container cta-content fade-in-on-scroll">
            <h2>Ready to Experience Seamless Logistics in Karachi?</h2>
            <p style="--scroll-animate-delay: 0.1s;">Sign up today and take control of your courier management.</p>
            <a href="#" class="cta-button" style="--scroll-animate-delay: 0.2s;">Sign Up for Free</a>
        </div>
    </section>
    <?php include_once("footer.php");?>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
        <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.1/dist/sweetalert2.all.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Initialize variables
            let map, marker;
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, {
                threshold: 0.1
            });

            // Observe all elements with the fade-in class
            document.querySelectorAll('.fade-in-on-scroll').forEach(element => {
                observer.observe(element);
            });

            // Initialize map
            function initMap() {
                map = L.map('map').setView([24.8607, 67.0011], 13); // Karachi coordinates
                
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);
                
                // Add a sample marker
                marker = L.marker([24.8607, 67.0011]).addTo(map)
                    .bindPopup('CourierX Karachi Office')
                    .openPopup();
            }
            
            // Initialize map when the tracking section is in view
            const mapSection = document.getElementById('live-tracking');
            const mapObserver = new IntersectionObserver((entries) => {
                if (entries[0].isIntersecting && !map) {
                    initMap();
                    
                    // Add zoom controls functionality
                    document.getElementById('zoomIn').addEventListener('click', () => {
                        map.zoomIn();
                    });
                    
                    document.getElementById('zoomOut').addEventListener('click', () => {
                        map.zoomOut();
                    });
                }
            }, { threshold: 0.1 });
            
            mapObserver.observe(mapSection);

            // Tracking functionality
            const trackBtn = document.getElementById('trackBtn');
            const trackingInput = document.getElementById('trackingInput');
            const mapOverlay = document.getElementById('mapOverlay');
            
            trackBtn.addEventListener('click', (e) => {
                e.preventDefault();
                
                if (!trackingInput.value.trim()) {
                    showNotification('Please enter a tracking number', 'error');
                    return;
                }
                
                // Simulate tracking
                showNotification('Tracking your package...', 'success');
                
                // Hide overlay after a delay to simulate loading
                setTimeout(() => {
                    mapOverlay.classList.add('hidden');
                    
                    // Simulate moving marker for demo purposes
                    if (marker) {
                        // Animate marker to a new position
                        const newLat = 24.8607 + (Math.random() - 0.5) * 0.05;
                        const newLng = 67.0011 + (Math.random() - 0.5) * 0.05;
                        
                        marker.setLatLng([newLat, newLng])
                            .bindPopup('Your package is here!')
                            .openPopup();
                        
                        map.panTo([newLat, newLng]);
                    }
                }, 1500);
            });

            // Form validation functions
            function validateField(fieldId, errorId, validationFn, errorMessage) {
                const field = document.getElementById(fieldId);
                const errorElement = document.getElementById(errorId);
                const formGroup = field.closest('.form-group');
                
                const value = field.value.trim();
                const isValid = validationFn(value);
                
                if (!isValid) {
                    formGroup.classList.remove('success');
                    formGroup.classList.add('error');
                    errorElement.textContent = errorMessage;
                    errorElement.style.display = 'block';
                    return false;
                } else {
                    formGroup.classList.remove('error');
                    formGroup.classList.add('success');
                    errorElement.style.display = 'none';
                    return true;
                }
            }
            
            function validateNotEmpty(value) {
                return value !== '';
            }
            
            function validateName(value) {
                if (value === '') return false;
                const nameRegex = /^[A-Za-z\s.'-]+$/;
                return nameRegex.test(value) && value.length >= 2;
            }
            
            function validateEmail(value) {
                if (value === '') return false;
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(value);
            }
            
            function validatePhone(value) {
                if (value === '') return true; // Phone is optional
                // Updated phone validation - only numbers and allowed special characters
                const phoneRegex = /^[\+]?[1-9][\d]{0,15}$|^[\+]?[(]?[\d]{1,4}[)]?[-\s\.]?[\d]{1,15}$/;
                return phoneRegex.test(value);
            }
            
            function validateWeight(value) {
                if (value === '') return false;
                const numValue = parseFloat(value);
                return !isNaN(numValue) && numValue > 0 && numValue <= 100;
            }

                 // Shipping calculator functionality
            const calculatorForm = document.getElementById('shippingCalculator');
            const priceDisplay = document.getElementById('priceDisplay');
            const calculatedPrice = document.getElementById('calculatedPrice');
            const calculateBtn = document.getElementById('calculateBtn');
            const calcBtnText = document.getElementById('calcBtnText');
            const calcLoader = document.getElementById('calcLoader');
            
            // --- Enhanced Pricing Data ---
            const pricingConfig = {
                // Base cost per shipment, regardless of weight/distance
                baseFee: {
                    standard: 150,
                    express: 300,
                    freight: 500
                },
                // Tiered weight pricing per KG (first X kg, then subsequent kg)
                weightTiers: {
                    standard: { firstKgPrice: 60, additionalKgPrice: 40, breakpoint: 5 }, // First 5kg at 60, then 40
                    express: { firstKgPrice: 100, additionalKgPrice: 70, breakpoint: 3 }, // First 3kg at 100, then 70
                    freight: { firstKgPrice: 30, additionalKgPrice: 20, breakpoint: 10 } // First 10kg at 30, then 20
                },
                // Volumetric weight factor (CM to KG) - standard is 5000 or 6000 for international. We'll use 5000 for domestic.
                volumetricFactor: 5000, // (L * W * H) / 5000 = Volumetric Weight in KG
                // City Zones & Distance Factors (simplified zones for illustration)
                cityZones: {
                    "karachi": { zone: "A", factor: 1.0 },
                    "hyderabad": { zone: "A", factor: 1.1 },
                    "lahore": { zone: "B", factor: 1.8 },
                    "faisalabad": { zone: "B", factor: 1.7 },
                    "multan": { zone: "B", factor: 1.6 },
                    "islamabad": { zone: "C", factor: 2.0 },
                    "rawalpindi": { zone: "C", factor: 1.9 },
                    "peshawar": { zone: "D", factor: 2.2 },
                    "quetta": { zone: "E", factor: 2.5 },
                    // Add more cities and assign them to zones.
                    // For cities not listed, we'll use a default factor.
                    "default": { zone: "X", factor: 1.5 } 
                },
                insuranceRate: 0.015, // 1.5% of calculated cost
                minimumCharge: 300 // Absolute minimum charge for any shipment
            };
            
            // Utility to clean city names for lookup
            function cleanCityName(city) {
                return city.toLowerCase().replace(/[^a-z]/g, '');
            }

            calculatorForm.addEventListener('submit', (e) => {
                e.preventDefault();
                
                // --- Validation ---
                const isOriginValid = validateField('origin', 'originError', validateNotEmpty, 'Origin city is required');
                const isDestinationValid = validateField('destination', 'destinationError', validateNotEmpty, 'Destination city is required');
                const isWeightValid = validateField('weight', 'weightError', validateWeight, 'Please enter a valid weight between 0.1 and 100 kg');
                const isServiceValid = validateField('service', 'serviceError', validateNotEmpty, 'Please select a service type');
                
                // Validate dimensions if any of them are filled
                const length = parseFloat(document.getElementById('length').value);
                const width = parseFloat(document.getElementById('width').value);
                const height = parseFloat(document.getElementById('height').value);
                
                let areDimensionsValid = true;
                if (length || width || height) { // If any dimension is entered, validate all
                    areDimensionsValid = validateField('length', 'lengthError', (val) => val && parseFloat(val) > 0, 'Required if other dimensions are entered') &&
                                         validateField('width', 'widthError', (val) => val && parseFloat(val) > 0, 'Required if other dimensions are entered') &&
                                         validateField('height', 'heightError', (val) => val && parseFloat(val) > 0, 'Required if other dimensions are entered');
                } else {
                    // Clear dimension errors if no dimensions are entered
                    document.getElementById('length').closest('.form-group').classList.remove('error', 'success');
                    document.getElementById('lengthError').style.display = 'none';
                    document.getElementById('width').closest('.form-group').classList.remove('error', 'success');
                    document.getElementById('widthError').style.display = 'none';
                    document.getElementById('height').closest('.form-group').classList.remove('error', 'success');
                    document.getElementById('heightError').style.display = 'none';
                }

                if (!isOriginValid || !isDestinationValid || !isWeightValid || !isServiceValid || !areDimensionsValid) {
                    showNotification('Please fix the errors in the form', 'error');
                    return;
                }
                
                const originRaw = document.getElementById('origin').value;
                const destinationRaw = document.getElementById('destination').value;
                const actualWeight = parseFloat(document.getElementById('weight').value);
                const serviceType = document.getElementById('service').value;
                const addInsurance = document.getElementById('insurance').checked;

                // Show loading state
                calcBtnText.style.display = 'none';
                calcLoader.style.display = 'inline-block';
                calculateBtn.disabled = true;
                
                // Simulate calculation delay
                setTimeout(() => {
                    let totalCost = 0;

                    // 1. Calculate Volumetric Weight
                    let volumetricWeight = 0;
                    if (length && width && height) {
                        volumetricWeight = (length * width * height) / pricingConfig.volumetricFactor;
                    }
                    
                    // Use the higher of actual and volumetric weight
                    const chargeableWeight = Math.max(actualWeight, volumetricWeight);

                    // 2. Add Base Fee
                    totalCost += pricingConfig.baseFee[serviceType];

                    // 3. Add Weight-Based Cost (Tiered Pricing)
                    const weightTierConfig = pricingConfig.weightTiers[serviceType];
                    if (chargeableWeight <= weightTierConfig.breakpoint) {
                        totalCost += chargeableWeight * weightTierConfig.firstKgPrice;
                    } else {
                        totalCost += weightTierConfig.breakpoint * weightTierConfig.firstKgPrice;
                        totalCost += (chargeableWeight - weightTierConfig.breakpoint) * weightTierConfig.additionalKgPrice;
                    }
                    
                    // 4. Apply Distance/Zone Factor
                    const cleanedOrigin = cleanCityName(originRaw);
                    const cleanedDestination = cleanCityName(destinationRaw);

                    const originZone = pricingConfig.cityZones[cleanedOrigin] || pricingConfig.cityZones.default;
                    const destinationZone = pricingConfig.cityZones[cleanedDestination] || pricingConfig.cityZones.default;

                    // A simple logic for distance factor: average of zone factors.
                    // Could be more complex, e.g., lookup table for Zone A to Zone B.
                    const distanceFactor = (originZone.factor + destinationZone.factor) / 2;
                    totalCost *= distanceFactor;
                    
                    // 5. Add Insurance (if selected)
                    if (addInsurance) {
                        totalCost += totalCost * pricingConfig.insuranceRate;
                    }

                    // 6. Apply Minimum Charge
                    totalCost = Math.max(totalCost, pricingConfig.minimumCharge);

                    // Round to two decimal places
                    totalCost = totalCost.toFixed(2);
                    
                    // Display price
                    calculatedPrice.textContent = `PKR ${totalCost}`;
                    priceDisplay.classList.add('show');
                    
                    // Hide loading state
                    calcBtnText.style.display = 'inline';
                    calcLoader.style.display = 'none';
                    calculateBtn.disabled = false;
                    
                    showNotification('Shipping cost calculated successfully!', 'success');
                }, 1500); // Simulate network delay
            });
            // Contact form functionality
            const contactForm = document.getElementById('contactForm');
            const contactBtn = document.getElementById('contactBtn');
            const contactBtnText = document.getElementById('contactBtnText');
            const contactLoader = document.getElementById('contactLoader');
            
            contactForm.addEventListener('submit', async (e) => { // Added 'async' keyword
                e.preventDefault();
                
                // Validate all fields
                const isNameValid = validateField('name', 'nameError', validateName, 'Please enter a valid name (letters and spaces only, min 2 chars)');
                const isEmailValid = validateField('email', 'emailError', validateEmail, 'Please enter a valid email address');
                const isPhoneValid = validateField('phone', 'phoneError', validatePhone, 'Please enter a valid phone number (digits only, with optional +, -, or parentheses)');
                const isSubjectValid = validateField('subject', 'subjectError', validateNotEmpty, 'Please select a subject');
                const isMessageValid = validateField('message', 'messageError', validateNotEmpty, 'Message is required');
                
                if (!isNameValid || !isEmailValid || !isPhoneValid || !isSubjectValid || !isMessageValid) {
                    showNotification('Please fix the errors in the form', 'error');
                    return;
                }
                
                // Show loading state
                contactBtnText.style.display = 'none';
                contactLoader.style.display = 'inline-block';
                contactBtn.disabled = true;
                
                // Collect form data
                const formData = new FormData(contactForm);

                try {
                    const response = await fetch('submit_contact.php', { // Make sure this path is correct
                        method: 'POST',
                        body: formData
                    });

                    const result = await response.json();

                    if (result.success) {
                        // Reset form
                        contactForm.reset();
                        
                        // Remove validation states
                        document.querySelectorAll('.form-group').forEach(group => {
                            group.classList.remove('error', 'success');
                        });
                        document.querySelectorAll('.error-message').forEach(error => {
                            error.style.display = 'none';
                        });
                        
                        Swal.fire({
                            title: 'Success!',
                            html: result.message,
                            icon: 'success',
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#FF6B00',
                            customClass: {
                                popup: 'swal-custom-popup',
                                title: 'swal-custom-title',
                                content: 'swal-custom-content',
                                confirmButton: 'swal-custom-button'
                            }
                        });
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            html: result.message,
                            icon: 'error',
                            confirmButtonText: 'Try Again',
                            confirmButtonColor: '#FF6B00',
                            customClass: {
                                popup: 'swal-custom-popup',
                                title: 'swal-custom-title',
                                content: 'swal-custom-content',
                                confirmButton: 'swal-custom-button'
                            }
                        });
                    }
                } catch (error) {
                    console.error('Fetch error:', error);
                    Swal.fire({
                        title: 'Network Error!',
                        html: 'Could not connect to the server. Please try again later.',
                        icon: 'error',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#FF6B00',
                        customClass: {
                            popup: 'swal-custom-popup',
                            title: 'swal-custom-title',
                            content: 'swal-custom-content',
                            confirmButton: 'swal-custom-button'
                        }
                    });
                } finally {
                    // Hide loading state regardless of success or failure
                    contactBtnText.style.display = 'inline';
                    contactLoader.style.display = 'none';
                    contactBtn.disabled = false;
                }
            });

            // Add real-time validation and input restrictions
          function setupInputValidation() {
    // Name field - only allow letters, spaces, and common name characters
    const nameInput = document.getElementById('name');
    nameInput.addEventListener('input', (e) => {
        e.target.value = e.target.value.replace(/[^A-Za-z\s.'-]/g, '');
    });
    nameInput.addEventListener('blur', () => {
        validateField('name', 'nameError', validateName, 'Please enter a valid name (letters and spaces only, min 2 chars)');
    });

    // Phone field - only allow numbers and phone-related characters
    const phoneInput = document.getElementById('phone');
    phoneInput.addEventListener('input', (e) => {
        e.target.value = e.target.value.replace(/[^0-9+\-()\s]/g, '');
    });
    phoneInput.addEventListener('blur', () => {
        validateField('phone', 'phoneError', validatePhone, 'Please enter a valid phone number (digits only, with optional +, -, or parentheses)');
    });

    // Email field validation
    const emailInput = document.getElementById('email');
    emailInput.addEventListener('invalid', (e) => {
        e.preventDefault();
        validateField('email', 'emailError', validateEmail, 'Please enter a valid email address');
    });
    emailInput.addEventListener('blur', () => {
        validateField('email', 'emailError', validateEmail, 'Please enter a valid email address');
    });

    // Add blur event listeners for NEW dimension fields in the calculator
    document.getElementById('length').addEventListener('blur', () => {
        const length = parseFloat(document.getElementById('length').value);
        const width = parseFloat(document.getElementById('width').value);
        const height = parseFloat(document.getElementById('height').value);
        if (length || width || height) { // Only validate if at least one dimension is entered
            validateField('length', 'lengthError', (val) => val && parseFloat(val) > 0, 'Required if other dimensions are entered');
        } else { // If all are empty, clear any errors
            document.getElementById('length').closest('.form-group').classList.remove('error', 'success');
            document.getElementById('lengthError').style.display = 'none';
        }
    });
    document.getElementById('width').addEventListener('blur', () => {
        const length = parseFloat(document.getElementById('length').value);
        const width = parseFloat(document.getElementById('width').value);
        const height = parseFloat(document.getElementById('height').value);
        if (length || width || height) {
            validateField('width', 'widthError', (val) => val && parseFloat(val) > 0, 'Required if other dimensions are entered');
        } else {
            document.getElementById('width').closest('.form-group').classList.remove('error', 'success');
            document.getElementById('widthError').style.display = 'none';
        }
    });
    document.getElementById('height').addEventListener('blur', () => {
        const length = parseFloat(document.getElementById('length').value);
        const width = parseFloat(document.getElementById('width').value);
        const height = parseFloat(document.getElementById('height').value);
        if (length || width || height) {
            validateField('height', 'heightError', (val) => val && parseFloat(val) > 0, 'Required if other dimensions are entered');
        } else {
            document.getElementById('height').closest('.form-group').classList.remove('error', 'success');
            document.getElementById('heightError').style.display = 'none';
        }
    });

    // Add blur event listeners for existing calculator fields (excluding dimensions and insurance checkbox)
    document.querySelectorAll('#shippingCalculator input:not(#length):not(#width):not(#height):not(#insurance), #shippingCalculator select').forEach(field => {
        field.addEventListener('blur', () => {
            const fieldId = field.id;
            switch(fieldId) {
                case 'origin':
                    validateField('origin', 'originError', validateNotEmpty, 'Origin city is required');
                    break;
                case 'destination':
                    validateField('destination', 'destinationError', validateNotEmpty, 'Destination city is required');
                    break;
                case 'weight':
                    validateField('weight', 'weightError', validateWeight, 'Please enter a valid weight between 0.1 and 100 kg');
                    break;
                case 'service':
                    validateField('service', 'serviceError', validateNotEmpty, 'Please select a service type');
                    break;
            }
        });
    });

    // Contact form fields validation (keep as is)
    document.querySelectorAll('#contactForm select, #contactForm textarea').forEach(field => {
        field.addEventListener('blur', () => {
            const fieldId = field.id;
            switch(fieldId) {
                case 'subject':
                    validateField('subject', 'subjectError', validateNotEmpty, 'Please select a subject');
                    break;
                case 'message':
                    validateField('message', 'messageError', validateNotEmpty, 'Message is required');
                    break;
            }
        });
    });
}
            
            // Initialize input validation
            setupInputValidation();

            // Notification system
            function showNotification(message, type = 'info') {
                const notification = document.getElementById('notification');
                const notificationText = document.querySelector('.notification-text');
                
                notificationText.textContent = message;
                notification.className = 'notification';
                notification.classList.add(type, 'show');
                
                setTimeout(() => {
                    notification.classList.remove('show');
                }, 3000);
            }
        });
    </script>
</body>
</html>