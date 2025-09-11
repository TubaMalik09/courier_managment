<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CourierX Footer</title>
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
            background: linear-gradient(135deg, #f9f9f9 0%, #e9e9e9 100%);
            color: var(--dark-grey);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        /* Main content area */
        .main-content {
            flex: 1;
            padding: 40px 20px;
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
        }

        /* Footer Styles - Updated to cover full width */
        .footer {
            background: linear-gradient(to bottom, var(--white) 0%, #fafafa 100%);
            padding: 5rem 2rem 1.5rem;
            position: relative;
            width: 100%;
            color: var(--dark-grey);
            box-shadow: 0 -5px 25px rgba(0, 0, 0, 0.06);
            margin-top: auto; /* Push footer to bottom */
        }

        .footer-wave {
            position: absolute;
            top: -50px;
            left: 0;
            width: 100%;
            height: 50px;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1200 120' preserveAspectRatio='none'%3E%3Cpath d='M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z' fill='%23ffffff'%3E%3C/path%3E%3C/svg%3E");
            background-size: cover;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1.2fr 1.3fr;
            gap: 2.5rem;
            margin-bottom: 2rem;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--primary-color);
            font-weight: bold;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-logo:hover {
            transform: scale(1.05);
        }

        .footer-logo-icon {
            width: 40px;
            height: 40px;
            background: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 1.2rem;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(52, 152, 219, 0.4);
            }
            70% {
                transform: scale(1.05);
                box-shadow: 0 0 0 8px rgba(52, 152, 219, 0);
            }
            100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(52, 152, 219, 0);
            }
        }

        .footer-about p {
            color: var(--medium-grey);
            margin-bottom: 1.5rem;
            line-height: 1.7;
            font-size: 0.95rem;
            text-align: left;
        }

        .footer-links h4, .footer-contact h4, .footer-newsletter h4 {
            color: var(--dark-grey);
            margin-bottom: 1.5rem;
            font-size: 1.3rem;
            position: relative;
            padding-bottom: 0.8rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .footer-links h4::after, .footer-contact h4::after, .footer-newsletter h4::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: var(--primary-color);
            border-radius: 3px;
            transition: width 0.3s ease;
        }

        .footer-links h4:hover::after, 
        .footer-contact h4:hover::after, 
        .footer-newsletter h4:hover::after {
            width: 60px;
        }

        .footer-links ul {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.9rem;
            display: flex;
            align-items: center;
            transition: var(--transition);
        }

        .footer-links li:hover {
            transform: translateX(5px);
        }

        .footer-links li::before {
            content: "➤";
            color: var(--primary-color);
            margin-right: 10px;
            font-size: 0.8rem;
            transition: var(--transition);
        }

        .footer-links li:hover::before {
            transform: translateX(3px);
        }

        .footer-links a {
            color: var(--medium-grey);
            text-decoration: none;
            transition: var(--transition);
            cursor: pointer;
            font-size: 0.95rem;
        }

        .footer-links a:hover {
            color: var(--primary-color);
        }

        .footer-contact p {
            margin-bottom: 1rem;
            color: var(--medium-grey);
            display: flex;
            align-items: center;
            font-size: 0.95rem;
            text-align: left;
        }

        .footer-contact i {
            margin-right: 12px;
            color: var(--primary-color);
            width: 20px;
            background: rgba(52, 152, 219, 0.1);
            height: 32px;
            width: 32px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }

        .footer-contact p:hover i {
            background: var(--primary-color);
            color: white;
            transform: rotate(10deg);
        }

        .social-icons {
            display: flex;
            gap: 0.8rem;
            margin-top: 1.8rem;
        }

        .social-icon {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: var(--light-grey);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            transition: var(--transition);
            text-decoration: none;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .social-icon:after {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            background: var(--primary-color);
            border-radius: 50%;
            transform: scale(0);
            transition: var(--transition);
            z-index: 0;
        }

        .social-icon i {
            position: relative;
            z-index: 1;
            font-size: 1.1rem;
        }

        .social-icon:hover:after {
            transform: scale(1);
        }

        .social-icon:hover {
            color: var(--white);
            transform: translateY(-5px) rotate(5deg);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.3);
        }

        .footer-newsletter p {
            color: var(--medium-grey);
            margin-bottom: 1.8rem;
            line-height: 1.7;
            font-size: 0.95rem;
            text-align: left;
        }

        .newsletter-form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            position: relative;
        }

        .newsletter-input {
            padding: 14px 18px;
            border-radius: 8px;
            border: 1px solid #e0e0e0;
            background: var(--white);
            color: var(--dark-grey);
            transition: var(--transition);
            font-size: 0.95rem;
            box-shadow: 0 2px 5px rgba(0,0,0,0.03);
        }

        .newsletter-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.15);
            transform: translateY(-2px);
        }

        .newsletter-input::placeholder {
            color: var(--medium-grey);
        }

        .newsletter-btn {
            padding: 14px 18px;
            border-radius: 8px;
            border: none;
            background: var(--primary-color);
            color: var(--white);
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-size: 0.95rem;
            box-shadow: 0 4px 10px rgba(52, 152, 219, 0.25);
        }

        .newsletter-btn:hover {
            background: var(--secondary-color);
            transform: translateY(-3px);
            box-shadow: 0 7px 15px rgba(52, 152, 219, 0.35);
        }

        .newsletter-btn:active {
            transform: translateY(0);
        }

        .validation-message {
            position: absolute;
            bottom: -25px;
            left: 0;
            font-size: 0.8rem;
            color: var(--error);
            opacity: 0;
            transition: var(--transition);
        }

        .validation-message.show {
            opacity: 1;
        }

        .success-message {
            margin-top: 15px;
            padding: 10px;
            background-color: rgba(76, 175, 80, 0.1);
            border-left: 4px solid var(--success);
            color: var(--success);
            border-radius: 4px;
            display: none;
        }

        .success-message.show {
            display: block;
        }

        .copyright {
            text-align: center;
            padding-top: 2.5rem;
            border-top: 1px solid rgba(0,0,0,0.08);
            color: var(--medium-grey);
            max-width: 1200px;
            margin: 0 auto;
            font-size: 0.9rem;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .copyright-links {
            margin-top: 0.8rem;
            display: flex;
            gap: 1rem;
        }

        .copyright-links a {
            color: var(--primary-color);
            text-decoration: none;
            transition: var(--transition);
            position: relative;
        }

        .copyright-links a:after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1px;
            background: var(--primary-color);
            transition: width 0.3s ease;
        }

        .copyright-links a:hover:after {
            width: 100%;
        }

        .payment-methods {
            display: flex;
            gap: 10px;
            margin-top: 1.5rem;
            flex-wrap: wrap;
            justify-content: center;
        }

        .payment-icon {
            width: 50px;
            height: 30px;
            background: var(--light-grey);
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            color: var(--medium-grey);
            transition: var(--transition);
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .payment-icon:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 10px rgba(0,0,0,0.08);
        }

        .back-to-top {
            position: absolute;
            top: -25px;
            right: 30px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--primary-color);
            color: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.12);
            z-index: 10;
        }

        .back-to-top:hover {
            background: var(--secondary-color);
            transform: translateY(-5px) rotate(5deg);
            box-shadow: 0 7px 20px rgba(0, 0, 0, 0.18);
        }

        /* Section Toggle for Mobile */
        .footer-section-toggle {
            display: none;
            background: none;
            border: none;
            color: var(--dark-grey);
            font-size: 1.3rem;
            position: absolute;
            right: 0;
            top: 0;
            cursor: pointer;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .footer-content {
                grid-template-columns: 1.2fr 1fr 1fr;
                gap: 2rem;
            }
            
            .footer-newsletter {
                grid-column: span 3;
                margin-top: 1rem;
            }
        }

        @media (max-width: 768px) {
            .footer {
                padding: 4rem 1.5rem 1.5rem;
            }
            
            .footer-content {
                grid-template-columns: 1fr;
                gap: 2rem;
                text-align: left;
            }
            
            .footer-newsletter {
                grid-column: span 1;
            }
            
            .footer-links h4::after, 
            .footer-contact h4::after,
            .footer-newsletter h4::after {
                left: 0;
                transform: none;
            }
            
            .footer-section-toggle {
                display: block;
            }
            
            .footer-links ul,
            .footer-contact > div {
                transition: max-height 0.3s ease;
                overflow: hidden;
            }
            
            .footer-links.collapsed ul,
            .footer-contact.collapsed > div {
                max-height: 0;
            }
            
            .footer-links ul,
            .footer-contact > div {
                max-height: 500px;
            }
            
            .social-icons {
                justify-content: flex-start;
            }

            .footer-contact p {
                justify-content: flex-start;
            }

            .back-to-top {
                right: 50%;
                transform: translateX(50%);
            }
            
            .copyright-links {
                flex-direction: column;
                gap: 0.5rem;
            }
        }

        @media (max-width: 480px) {
            .footer {
                padding: 3.5rem 1rem 1rem;
            }
            
            .payment-methods {
                justify-content: center;
            }
            
            .copyright {
                flex-direction: column;
                text-align: center;
            }
            
            .copyright-links {
                margin-top: 1rem;
                display: flex;
                flex-direction: column;
                gap: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Main content area -->
    <div class="main-content">
        <!-- Content removed as requested -->
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-wave"></div>
    
            
        </div>
        <div class="footer-content">
            <div class="footer-about">
                <a href="index.php" class="footer-logo">
                    <div class="footer-logo-icon"><i class="fas fa-shipping-fast"></i></div>
                    <span>CourierX</span>
                </a>
                <p>Delivering with speed and trust. CourierX provides reliable and fast delivery services worldwide with real-time tracking and premium customer support.</p>
                <div class="payment-methods">
                    <div class="payment-icon">Visa</div>
                    <div class="payment-icon">MC</div>
                    <div class="payment-icon">PayPal</div>
                    <div class="payment-icon">AMEX</div>
                </div>
            </div>
            <div class="footer-links">
                <h4>
                    Quick Links
                    <button class="footer-section-toggle">+</button>
                </h4>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="track.php">Track Package</a></li>
                    <li><a href="get_shipment_status.php">Delivery Status</a></li>
                </ul>
            </div>
            <div class="footer-contact">
                <h4>
                    Contact Info
                    <button class="footer-section-toggle">+</button>
                </h4>
                <div>
                    <p><i class="fas fa-envelope"></i> support@courierx.com</p>
                    <p><i class="fas fa-phone"></i> +92 34567-8900</p>
                    <p><i class="fas fa-map-marker-alt"></i> 123 Delivery Street, Karachi City</p>
                    <p><i class="fas fa-clock"></i> Mon-Frid: 8AM-8PM, Sat: 9AM-6PM</p>
                </div>
            </div>
            <div class="footer-newsletter">
                <h4>Newsletter</h4>
                <p>Subscribe to our newsletter for updates on new services and special offers.</p>
                <form class="newsletter-form" id="newsletterForm">
                    <input type="email" class="newsletter-input" id="emailInput" placeholder="Your email address">
                    <div class="validation-message" id="validationMessage">Please enter a valid email address</div>
                    <button type="submit" class="newsletter-btn">
                        <i class="fas fa-paper-plane"></i> Subscribe
                    </button>
                </form>
                <div class="success-message" id="successMessage">
                    <i class="fas fa-check-circle"></i> Thank you for subscribing to our newsletter!
                </div>
            </div>
        </div>
        <div class="copyright">
            <p>© 2025 CourierX. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Enhanced newsletter validation
        document.getElementById('newsletterForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const email = document.getElementById('emailInput').value;
            const validationMessage = document.getElementById('validationMessage');
            const successMessage = document.getElementById('successMessage');
            
            // Reset previous states
            validationMessage.classList.remove('show');
            successMessage.classList.remove('show');
            
            if (!validateEmail(email)) {
                // Show validation error
                validationMessage.classList.add('show');
                document.getElementById('emailInput').style.borderColor = 'var(--error)';
                return;
            }
            
            // Success - show success message
            successMessage.classList.add('show');
            document.getElementById('emailInput').style.borderColor = 'var(--success)';
            
            // In a real application, you would send this to a server
            console.log('Subscription successful for email:', email);
            
            // Reset form after a delay
            setTimeout(() => {
                this.reset();
                document.getElementById('emailInput').style.borderColor = '#e0e0e0';
                successMessage.classList.remove('show');
            }, 3000);
        });
        
        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        // Mobile section toggle
        document.querySelectorAll('.footer-section-toggle').forEach(toggle => {
            toggle.addEventListener('click', function() {
                const section = this.parentElement.parentElement;
                section.classList.toggle('collapsed');
                
                // Change icon
                this.textContent = section.classList.contains('collapsed') ? '+' : '-';
            });
        });

        // Real-time validation on input
        document.getElementById('emailInput').addEventListener('input', function() {
            const validationMessage = document.getElementById('validationMessage');
            validationMessage.classList.remove('show');
            
            if (this.value) {
                if (validateEmail(this.value)) {
                    this.style.borderColor = 'var(--success)';
                } else {
                    this.style.borderColor = 'var(--error)';
                }
            } else {
                this.style.borderColor = '#e0e0e0';
            }
        });
    </script>
</body>
</html>