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
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
    <script type="text/javascript">
        (function() {
            // Initialize EmailJS with your Public Key
            emailjs.init("HyIYJwbIFL40wQdxy"); // Replace with your actual EmailJS Public Key
        })();
    </script>

    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2980b9;
            --accent-color: #333333;
            --text-color: #555555;
            --background-light: #f5f7fa;
            --background-dark: #FFFFFF;
            --card-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            --transition-speed: 0.4s;
            --border-color: #ddd;
            --input-bg: #f5f5f5;
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
            border-radius: 8px;
            box-shadow: var(--card-shadow);
            padding: 2rem;
            transition: var(--transition-speed);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
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
            height: 4px;
            background: var(--primary-color);
            border-radius: 5px;
        }

        /* --- Hero Section --- */
         .hero {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: var(--background-dark);
            padding: 4rem 0; /* Changed from 8rem 0 to 4rem 0 */
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
            border-radius: 8px;
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
            border-radius: 8px;
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
            border-radius: 8px;
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
            box-shadow: var(--card-shadow);
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
            background: rgba(52, 152, 219, 0.1);
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
            font-size: 1rem;
        }
        
        .contact-form input,
        .contact-form textarea,
        .contact-form select {
            width: 100%;
            padding: 12px;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            background-color: var(--input-bg);
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
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        }

        .contact-form textarea {
            min-height: 150px;
            resize: vertical;
        }

        .contact-form button {
            grid-column: 1 / -1;
            background-color: var(--primary-color);
            color: var(--background-dark);
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition-speed);
            font-size: 1rem;
        }
        
        .contact-form button:hover {
            background-color: var(--secondary-color);
        }
        
                /* --- Contact Info Section Styling Improvements --- */
        .contact-info {
            margin-top: 3rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); /* Adjusted minmax for better flexibility */
            gap: 1.8rem; /* Slightly increased gap for better separation */
            text-align: center;
            justify-content: center; /* Centers the grid tracks within the container */
            align-items: stretch; /* Makes all cards the same height */
            max-width: 1000px; /* Limit the max-width of the grid itself */
            margin-left: auto; /* Center the grid on larger screens */
            margin-right: auto; /* Center the grid on larger screens */
            padding: 0 1.5rem; /* Add some padding to the grid container */
        }

        .contact-info-card {
            padding: 2.2rem 1.5rem; /* Increased vertical padding even more for more space */
            border-radius: 12px; /* More rounded corners for a softer look */
            background-color: var(--background-dark);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.07); /* Refined subtle shadow */
            transition: transform 0.35s cubic-bezier(0.25, 0.46, 0.45, 0.94), box-shadow 0.35s cubic-bezier(0.25, 0.46, 0.45, 0.94); /* Smoother transition */
            display: flex; /* Use flexbox for internal alignment */
            flex-direction: column; /* Stack content vertically */
            justify-content: flex-start; /* Align content to the top within the card */
            align-items: center; /* Horizontally center content */
            border: 1px solid rgba(220, 220, 220, 0.5); /* Subtle border */
        }

        .contact-info-card:hover {
            transform: translateY(-8px) scale(1.01); /* Smooth lift and slight scale on hover */
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12); /* Stronger, more diffused shadow on hover */
        }

        .contact-info-card .icon {
            font-size: 2.5rem; /* Larger icons */
            color: var(--primary-color);
            margin-bottom: 1.2rem; /* More space below icon */
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 75px; /* Larger circular background */
            height: 75px;
            background-color: rgba(52, 152, 219, 0.1); /* Slightly darker light background */
            border-radius: 50%;
            transition: background-color 0.3s ease, color 0.3s ease, transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94); /* Smooth icon transitions */
        }

        .contact-info-card:hover .icon {
            background-color: var(--primary-color);
            color: var(--background-dark);
            transform: rotateY(15deg) scale(1.05); /* Subtle 3D tilt and slight scale on hover, not a full spin */
        }

        .contact-info-card h4 {
            font-size: 1.25rem; /* Larger heading */
            color: var(--accent-color);
            margin-bottom: 0.6rem;
            font-weight: 600;
        }

        .contact-info-card p {
            font-size: 0.95rem; /* Standard paragraph text size */
            color: var(--text-color);
            line-height: 1.5;
            margin-bottom: 0.3rem;
            max-width: 280px; /* Limit paragraph width for readability */
        }
        
        /* Responsive adjustments specific to contact-info */
        @media (min-width: 993px) {
            .contact-info {
                grid-template-columns: repeat(3, 1fr);
                max-width: 950px; 
            }
        }

        @media (max-width: 992px) {
            .contact-info {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); /* Allow 2 or 1 column, slightly smaller min-width */
                gap: 1.5rem;
                padding: 0 1.5rem;
            }
            .contact-info-card {
                padding: 2rem 1.2rem;
            }
            .contact-info-card .icon {
                font-size: 2.3rem;
                width: 70px;
                height: 70px;
                margin-bottom: 1.2rem;
            }
            .contact-info-card h4 {
                font-size: 1.2rem;
            }
            .contact-info-card p {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 768px) {
            .contact-info {
                grid-template-columns: 1fr; /* Stack cards vertically on smaller tablets and mobiles */
                gap: 1.5rem;
                padding: 0 1rem;
            }
            .contact-info-card {
                padding: 1.8rem 1rem;
            }
            .contact-info-card .icon {
                font-size: 2rem;
                width: 65px;
                height: 65px;
                margin-bottom: 1rem;
            }
            .contact-info-card h4 {
                font-size: 1.1rem;
            }
            .contact-info-card p {
                font-size: 0.85rem;
            }
        }

        @media (max-width: 480px) {
            .contact-info-card {
                padding: 1.5rem 0.8rem;
            }
            .contact-info-card .icon {
                font-size: 1.8rem;
                width: 55px;
                height: 55px;
            }
            .contact-info-card h4 {
                font-size: 1rem;
            }
            .contact-info-card p {
                font-size: 0.8rem;
                max-width: unset; 
            }
        }
        /* --- Live Tracking Map --- */
        .live-map-section {
            background-color: #eef1f6;
        }

        .map-container {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
            position: relative;
            min-height: 500px;
        }
        
        #map {
            width: 100%;
            height: 500px;
            border-radius: 8px;
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
            background: var(--secondary-color);
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
            font-size: 1rem;
        }
        
        .calculator-form input,
        .calculator-form select {
            width: 100%;
            padding: 12px;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            background-color: var(--input-bg);
            transition: all var(--transition-speed);
            font-size: 1rem;
        }
        
        .calculator-form input:focus,
        .calculator-form select:focus {
            outline: none;
            border-color: var(--primary-color);
            background-color: white;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        }

        .calculator-form button {
            grid-column: 1 / -1;
            background-color: var(--primary-color);
            color: var(--background-dark);
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition-speed);
            font-size: 1rem;
        }
        
        .calculator-form button:hover {
            background-color: var(--secondary-color);
        }
        
        .price-display {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-top: 2rem;
            text-align: center;
            padding: 1.5rem;
            background: white;
            border-radius: 8px;
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
            padding: 12px 2.5rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition-speed);
            box-shadow: var(--card-shadow);
        }
        
        .cta-button:hover {
            background-color: var(--accent-color);
            color: var(--background-dark);
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
                border-radius: 8px;
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
                /* --- Responsive Design Adjustments for Hero Section --- */
        @media (max-width: 992px) {
            .hero .container {
                flex-direction: column;
                text-align: center;
                /* Add padding to prevent content from sticking to edges on tablets */
                padding: 0 1rem; 
            }
            
            .hero-content {
                width: 100%; /* Ensure content takes full width */
                max-width: 600px; /* Limit width for better readability */
                margin: 0 auto; /* Center the content block */
            }

            .hero-content h1 {
                font-size: clamp(2rem, 5vw, 3.5rem); /* Adjust font size for tablets */
            }

            .hero-content p {
                font-size: clamp(0.95rem, 1.8vw, 1.1rem); /* Adjust font size for tablets */
            }

            .hero-image {
                margin-top: 3rem;
                width: 80%; /* Reduce image width to leave more space */
                max-width: 400px; /* Set a max-width for consistency */
                margin-left: auto; /* Center the image */
                margin-right: auto; /* Center the image */
            }
            
            .tracking-widget {
                max-width: 450px; /* Adjust max-width for the tracking widget */
                margin-left: auto; /* Center the tracking widget */
                margin-right: auto; /* Center the tracking widget */
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
            .hero {
                padding: 6rem 0; /* Adjust hero padding for smaller tablets */
            }
            .hero-content h1 {
                font-size: clamp(1.8rem, 6vw, 3rem); /* Further adjust font size */
            }
            .hero-content p {
                font-size: clamp(0.9rem, 2vw, 1rem); /* Further adjust font size */
            }
            .hero-image {
                margin-top: 2.5rem; /* Reduce top margin for image */
                width: 90%; /* Make image a bit wider on smaller tablets */
                max-width: 350px;
            }
            .map-controls {
                bottom: 10px;
                left: 10px;
                flex-direction: column;
            }
        }
        
        @media (max-width: 576px) {
            .hero {
                padding: 4rem 0; /* Even less padding for mobile */
            }
            .hero-content h1 {
                font-size: clamp(1.6rem, 7vw, 2.5rem); /* Mobile font size for heading */
            }
            .hero-content p {
                font-size: clamp(0.85rem, 2.5vw, 0.95rem); /* Mobile font size for paragraph */
            }
            .tracking-widget {
                flex-direction: column;
                padding: 1rem;
                border-radius: 8px;
                max-width: 100%; /* Allow tracking widget to take full width */
            }
            
            .tracking-widget input {
                text-align: center;
                margin-bottom: 1rem;
                padding: 1rem;
            }
            
            .tracking-widget button {
                width: 100%;
            }
            
            .hero-image {
                margin-top: 2rem; /* Reduce margin more for mobile */
                width: 100%; /* Allow image to take full width on smallest screens */
                max-width: 300px; /* Keep a reasonable max-width */
            }
            
            section {
                padding: 3rem 0; /* Less section padding for mobile */
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
                <img src="https://img.freepik.com/free-vector/courier-carrying-order-delivering-parcel-express-cargo-delivery-service-air-freight-logistics-distribution-global-postal-mail-concept-pinkish-coral-bluevector-isolated-illustration_335657-1730.jpg">
            </div>
        </div>
    </section>

    <section id="services">
        <div class="container">
            <h2 class="section-title fade-in-on-scroll">Our Core Services</h2>
            <div class="services-grid" id="servicesContainer">
    <!-- Services will be loaded here by JavaScript -->
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

            // --- START: Corrected loadServices function and its call ---
            // Function to fetch and display services
            async function loadServices() {
                const servicesContainer = document.getElementById('servicesContainer');
                servicesContainer.innerHTML = '<p>Loading services...</p>'; // Show loading message

                try {
                    const response = await fetch('get_services.php');
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    const services = await response.json();

                    if (services.error) {
                        throw new Error(services.error);
                    }

                    if (services.length > 0) {
                        servicesContainer.innerHTML = ''; // Clear loading message

                        services.forEach((service, index) => {
                            // Determine icon based on service title or ID (you might need more specific logic here)
                            // IMPORTANT: If you added an IconClass column, update this to:
                            // let iconClass = service.IconClass || 'fas fa-info-circle';
                            let iconClass = 'fas fa-info-circle'; // Default icon
                            if (service.Title.toLowerCase().includes('tracking')) {
                                iconClass = 'fas fa-route';
                            } else if (service.Title.toLowerCase().includes('express') || service.Title.toLowerCase().includes('delivery')) {
                                iconClass = 'fas fa-shipping-fast';
                            } else if (service.Title.toLowerCase().includes('secure') || service.Title.toLowerCase().includes('handling')) {
                                iconClass = 'fas fa-lock';
                            }
                            // Add more icon mappings as needed

                            const serviceCard = `
                                <div class="service-card card fade-in-on-scroll" style="--scroll-animate-delay: ${index * 0.1}s;">
                                    <div class="icon"><i class="${iconClass}"></i></div>
                                    <h3>${service.Title}</h3>
                                    <p>${service.Description}</p>
                                </div>
                            `;
                            servicesContainer.innerHTML += serviceCard;
                        });
                        // Re-observe newly added elements for fade-in effect
                        // This part might need to be adjusted if `observer` is not globally accessible,
                        // but given its declaration at the top, it should be fine.
                        document.querySelectorAll('.fade-in-on-scroll').forEach(element => {
                            observer.observe(element);
                        });
                    } else {
                        servicesContainer.innerHTML = '<p>No services available at the moment.</p>';
                    }
                } catch (error) {
                    console.error('Error loading services:', error);
                    servicesContainer.innerHTML = `<p style="color: red;">Failed to load services: ${error.message}</p>`;
                    showNotification(`Failed to load services: ${error.message}`, 'error');
                }
            }

            // Call loadServices when the page loads
            loadServices();
            // --- END: Corrected loadServices function and its call ---


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
            const mapOverlay = document.getElementById('mapOverlay'); // Keep this if you still want map interactions
            
            trackBtn.addEventListener('click', (e) => {
                e.preventDefault(); // Prevent default form submission

                const consignmentNumber = trackingInput.value.trim();

                if (!consignmentNumber) {
                    showNotification('Please enter a tracking number', 'error');
                    return;
                }

                // Redirect to the track_shipment.php page with the consignment number
                window.location.href = `track_shipment.php?consignment=${encodeURIComponent(consignmentNumber)}`;
            });
            // Form validation functions (rest of your existing validation functions)
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
                const phoneRegex = /^[\+]?[1-9][\d]{0,15}$|^[\+]?[(]?[\d]{1,4}[)]?[-\s\.]?[\d]{1,15}$/;
                return phoneRegex.test(value);
            }
            
            function validateWeight(value) {
                if (value === '') return false;
                const numValue = parseFloat(value);
                return !isNaN(numValue) && numValue > 0 && numValue <= 100;
            }

            // Shipping calculator functionality (rest of your existing calculator code)
            const calculatorForm = document.getElementById('shippingCalculator');
            const priceDisplay = document.getElementById('priceDisplay');
            const calculatedPrice = document.getElementById('calculatedPrice');
            const calculateBtn = document.getElementById('calculateBtn');
            const calcBtnText = document.getElementById('calcBtnText');
            const calcLoader = document.getElementById('calcLoader');
            
            const pricingConfig = {
                baseFee: {
                    standard: 150,
                    express: 300,
                    freight: 500
                },
                weightTiers: {
                    standard: { firstKgPrice: 60, additionalKgPrice: 40, breakpoint: 5 },
                    express: { firstKgPrice: 100, additionalKgPrice: 70, breakpoint: 3 },
                    freight: { firstKgPrice: 30, additionalKgPrice: 20, breakpoint: 10 }
                },
                volumetricFactor: 5000,
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
                    "default": { zone: "X", factor: 1.5 } 
                },
                insuranceRate: 0.015,
                minimumCharge: 300
            };
            
            function cleanCityName(city) {
                return city.toLowerCase().replace(/[^a-z]/g, '');
            }

            calculatorForm.addEventListener('submit', (e) => {
                e.preventDefault();
                
                const isOriginValid = validateField('origin', 'originError', validateNotEmpty, 'Origin city is required');
                const isDestinationValid = validateField('destination', 'destinationError', validateNotEmpty, 'Destination city is required');
                const isWeightValid = validateField('weight', 'weightError', validateWeight, 'Please enter a valid weight between 0.1 and 100 kg');
                const isServiceValid = validateField('service', 'serviceError', validateNotEmpty, 'Please select a service type');
                
                const length = parseFloat(document.getElementById('length').value);
                const width = parseFloat(document.getElementById('width').value);
                const height = parseFloat(document.getElementById('height').value);
                
                let areDimensionsValid = true;
                if (length || width || height) {
                    areDimensionsValid = validateField('length', 'lengthError', (val) => val && parseFloat(val) > 0, 'Required if other dimensions are entered') &&
                                         validateField('width', 'widthError', (val) => val && parseFloat(val) > 0, 'Required if other dimensions are entered') &&
                                         validateField('height', 'heightError', (val) => val && parseFloat(val) > 0, 'Required if other dimensions are entered');
                } else {
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

                calcBtnText.style.display = 'none';
                calcLoader.style.display = 'inline-block';
                calculateBtn.disabled = true;
                
                setTimeout(() => {
                    let totalCost = 0;

                    let volumetricWeight = 0;
                    if (length && width && height) {
                        volumetricWeight = (length * width * height) / pricingConfig.volumetricFactor;
                    }
                    
                    const chargeableWeight = Math.max(actualWeight, volumetricWeight);

                    totalCost += pricingConfig.baseFee[serviceType];

                    const weightTierConfig = pricingConfig.weightTiers[serviceType];
                    if (chargeableWeight <= weightTierConfig.breakpoint) {
                        totalCost += chargeableWeight * weightTierConfig.firstKgPrice;
                    } else {
                        totalCost += weightTierConfig.breakpoint * weightTierConfig.firstKgPrice;
                        totalCost += (chargeableWeight - weightTierConfig.breakpoint) * weightTierConfig.additionalKgPrice;
                    }
                    
                    const cleanedOrigin = cleanCityName(originRaw);
                    const cleanedDestination = cleanCityName(destinationRaw);

                    const originZone = pricingConfig.cityZones[cleanedOrigin] || pricingConfig.cityZones.default;
                    const destinationZone = pricingConfig.cityZones[cleanedDestination] || pricingConfig.cityZones.default;

                    const distanceFactor = (originZone.factor + destinationZone.factor) / 2;
                    totalCost *= distanceFactor;
                    
                    if (addInsurance) {
                        totalCost += totalCost * pricingConfig.insuranceRate;
                    }

                    totalCost = Math.max(totalCost, pricingConfig.minimumCharge);

                    totalCost = totalCost.toFixed(2);
                    
                    calculatedPrice.textContent = `PKR ${totalCost}`;
                    priceDisplay.classList.add('show');
                    
                    calcBtnText.style.display = 'inline';
                    calcLoader.style.display = 'none';
                    calculateBtn.disabled = false;
                    
                    showNotification('Shipping cost calculated successfully!', 'success');
                }, 1500);
            });

            // --- START: MODIFIED Contact form functionality ---
    const contactForm = document.getElementById('contactForm');
    const contactBtn = document.getElementById('contactBtn');
    const contactBtnText = document.getElementById('contactBtnText');
    const contactLoader = document.getElementById('contactLoader');

    contactForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        // Client-side Validation
        const isNameValid = validateField('name', 'nameError', validateName, 'Please enter a valid name (letters and spaces only, min 2 chars)');
        const isEmailValid = validateField('email', 'emailError', validateEmail, 'Please enter a valid email address');
        const isPhoneValid = validateField('phone', 'phoneError', validatePhone, 'Please enter a valid phone number (digits only, with optional +, -, or parentheses)');
        const isSubjectValid = validateField('subject', 'subjectError', validateNotEmpty, 'Please select a subject');
        const isMessageValid = validateField('message', 'messageError', validateNotEmpty, 'Message is required');

        if (!isNameValid || !isEmailValid || !isPhoneValid || !isSubjectValid || !isMessageValid) {
            showNotification('Please fix the errors in the form', 'error');
            return;
        }

        contactBtnText.style.display = 'none';
        contactLoader.style.display = 'inline-block';
        contactBtn.disabled = true;

        const formData = new FormData(contactForm); // For PHP submission
        const templateParams = { // For EmailJS submission
            from_name: formData.get('name'),
            from_email: formData.get('email'),
            phone: formData.get('phone'),
            subject: formData.get('subject'),
            message: formData.get('message'),
            to_name: 'CourierX Admin' // Or the recipient's name
        };

        let phpSuccess = false;
        let emailjsSuccess = false;
        let phpMessage = '';
        let emailjsMessage = '';

        try {
            // 1. Send data to PHP script for database insertion
            const phpResponse = await fetch('submit_contact.php', {
                method: 'POST',
                body: formData
            });
            const phpResult = await phpResponse.json();
            if (phpResult.success) {
                phpSuccess = true;
                phpMessage = phpResult.message;
            } else {
                phpMessage = phpResult.message;
            }

            // 2. Send email using EmailJS
            const emailJsResponse = await emailjs.send("service_1gfzv4v", "template_t5bs24f", templateParams); // Replace with your actual EmailJS Service ID and Template ID
            if (emailJsResponse.status === 200) {
                emailjsSuccess = true;
                emailjsMessage = 'Email sent successfully!';
            } else {
                emailjsMessage = `Email sending failed: ${emailJsResponse.text || 'Unknown error'}`;
            }

        } catch (error) {
            console.error('Submission error:', error);
            phpMessage = phpMessage || 'Network error submitting to database.';
            emailjsMessage = emailjsMessage || `Network error sending email: ${error.message}`;
        } finally {
            contactBtnText.style.display = 'inline';
            contactLoader.style.display = 'none';
            contactBtn.disabled = false;

            // Determine overall success and show appropriate SweetAlert
            if (phpSuccess && emailjsSuccess) {
                contactForm.reset();
                document.querySelectorAll('.form-group').forEach(group => {
                    group.classList.remove('error', 'success');
                });
                document.querySelectorAll('.error-message').forEach(error => {
                    error.style.display = 'none';
                });

                Swal.fire({
                    title: 'Success!',
                    html: 'Your message has been sent and saved!',
                    icon: 'success',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#3498db',
                    customClass: {
                        popup: 'swal-custom-popup',
                        title: 'swal-custom-title',
                        content: 'swal-custom-content',
                        confirmButton: 'swal-custom-button'
                    }
                });
            } else {
                let errorMessage = 'There was an issue:';
                if (!phpSuccess) {
                    errorMessage += `<br>- Database Save: ${phpMessage}`;
                }
                if (!emailjsSuccess) {
                    errorMessage += `<br>- Email Send: ${emailjsMessage}`;
                }
                if (phpSuccess && !emailjsSuccess) {
                    errorMessage = 'Message saved to database, but email failed to send.';
                } else if (!phpSuccess && emailjsSuccess) {
                    errorMessage = 'Email sent successfully, but message failed to save to database.';
                }

                Swal.fire({
                    title: 'Error!',
                    html: errorMessage,
                    icon: 'error',
                    confirmButtonText: 'Try Again',
                    confirmButtonColor: '#3498db',
                    customClass: {
                        popup: 'swal-custom-popup',
                        title: 'swal-custom-title',
                        content: 'swal-custom-content',
                        confirmButton: 'swal-custom-button'
                    }
                });
            }
        }
    });

            // Add real-time validation and input restrictions (rest of your existing validation setup)
            function setupInputValidation() {
                const nameInput = document.getElementById('name');
                nameInput.addEventListener('input', (e) => {
                    e.target.value = e.target.value.replace(/[^A-Za-z\s.'-]/g, '');
                });
                nameInput.addEventListener('blur', () => {
                    validateField('name', 'nameError', validateName, 'Please enter a valid name (letters and spaces only, min 2 chars)');
                });

                const phoneInput = document.getElementById('phone');
                phoneInput.addEventListener('input', (e) => {
                    e.target.value = e.target.value.replace(/[^0-9+\-()\s]/g, '');
                });
                phoneInput.addEventListener('blur', () => {
                    validateField('phone', 'phoneError', validatePhone, 'Please enter a valid phone number (digits only, with optional +, -, or parentheses)');
                });

                const emailInput = document.getElementById('email');
                emailInput.addEventListener('invalid', (e) => {
                    e.preventDefault();
                    validateField('email', 'emailError', validateEmail, 'Please enter a valid email address');
                });
                emailInput.addEventListener('blur', () => {
                    validateField('email', 'emailError', validateEmail, 'Please enter a valid email address');
                });

                document.getElementById('length').addEventListener('blur', () => {
                    const length = parseFloat(document.getElementById('length').value);
                    const width = parseFloat(document.getElementById('width').value);
                    const height = parseFloat(document.getElementById('height').value);
                    if (length || width || height) {
                        validateField('length', 'lengthError', (val) => val && parseFloat(val) > 0, 'Required if other dimensions are entered');
                    } else {
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
            
            setupInputValidation();

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