<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy - StepaKash</title>
    <style>
        :root {
    --primary-color: #0f753a;       /* Updated green */
    --secondary-color: #2c8a53;     /* Slightly lighter green */
    --accent-color: #efd050;        /* Updated yellow/gold */
    --accent-hover: #f4dc74;        /* Lighter shade for hover */
    --text-color: #333333;
    --light-text: #666666;
    --background: #e8e8e8;          /* Keep or adjust as needed */
    --card-bg: #ffffff;
    --success: #0f753a;             /* Match updated primary green */
    --danger: #e74c3c;
    --warning: #f39c12;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    line-height: 1.6;
    color: var(--text-color);
    background-image: linear-gradient(to bottom right, rgba(15, 117, 58, 0.08), rgba(239, 208, 80, 0.08));
    min-height: 100vh;
    padding: 20px;
}

.container {
    max-width: 900px;
    margin: 0 auto;
    background: var(--card-bg);
    border-radius: 20px;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
    overflow: hidden;
    border: 3px solid var(--accent-color);
}

.header {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    text-align: center;
    padding: 40px 20px;
    position: relative;
}

.header::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 5px;
    background: linear-gradient(90deg, var(--accent-color), var(--accent-hover), var(--accent-color));
}

.header h1 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 10px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

.header .subtitle {
    font-size: 1.1rem;
    opacity: 0.9;
    color: var(--accent-color);
}

.content {
    padding: 40px;
}

h2 {
    color: var(--primary-color);
    font-size: 1.4rem;
    font-weight: 600;
    margin: 30px 0 20px 0;
    padding: 15px 0;
    border-bottom: 3px solid var(--accent-color);
    position: relative;
    text-transform: uppercase;
    letter-spacing: 1px;
}

h2::after {
    content: "";
    position: absolute;
    bottom: -3px;
    left: 0;
    width: 80px;
    height: 3px;
    background: var(--secondary-color);
}

.acknowledgment {
    background: linear-gradient(135deg, rgba(15, 117, 58, 0.05), rgba(15, 117, 58, 0.02));
    border: 2px solid var(--accent-color);
    border-radius: 15px;
    padding: 30px;
    margin: 30px 0;
    box-shadow: 0 8px 20px rgba(239, 208, 80, 0.1);
    position: relative;
}

.acknowledgment::before {
    content: "!";
    position: absolute;
    top: -15px;
    left: 30px;
    background: var(--accent-color);
    color: white;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    font-weight: bold;
}

.acknowledgment h2 {
    color: var(--primary-color);
    font-size: 1.2rem;
    margin-bottom: 20px;
    border-bottom: 2px solid var(--accent-color);
    text-transform: none;
    letter-spacing: normal;
}

.acknowledgment p {
    margin: 15px 0;
    padding-left: 25px;
    position: relative;
    color: var(--text-color);
    font-weight: 500;
}

.acknowledgment p::before {
    content: "✓";
    position: absolute;
    left: 0;
    color: var(--accent-color);
    font-weight: bold;
    font-size: 1.1rem;
}

ol {
    counter-reset: item;
    padding-left: 0;
    margin: 20px 0;
}

ol li {
    display: block;
    margin: 25px 0;
    padding: 25px;
    background: linear-gradient(135deg, rgba(15, 117, 58, 0.03), var(--card-bg));
    border-radius: 12px;
    border-left: 5px solid var(--accent-color);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    position: relative;
    color: var(--text-color);
    line-height: 1.7;
}

ol li::before {
    content: counter(item);
    counter-increment: item;
    position: absolute;
    left: -15px;
    top: 15px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    width: 35px;
    height: 35px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 1.1rem;
    border: 3px solid var(--accent-color);
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
}

.disclaimer {
    background: linear-gradient(135deg, rgba(239, 208, 80, 0.15), rgba(244, 220, 116, 0.1));
    border: 2px solid var(--accent-color);
    border-radius: 15px;
    padding: 30px;
    margin: 30px 0;
    text-align: center;
    box-shadow: 0 8px 20px rgba(239, 208, 80, 0.15);
    position: relative;
}

.disclaimer::before {
    content: "⚠";
    position: absolute;
    top: -15px;
    left: 50%;
    transform: translateX(-50%);
    background: var(--accent-color);
    color: white;
    width: 35px;
    height: 35px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.3rem;
    font-weight: bold;
    border: 3px solid white;
}

.disclaimer h2 {
    color: var(--warning);
    margin-bottom: 15px;
    text-align: center;
}

.disclaimer p {
    color: var(--light-text);
    font-weight: 600;
    font-size: 1.1rem;
    text-align: center;
}

.footer {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    text-align: center;
    padding: 20px;
    margin-top: 40px;
    border-top: 3px solid var(--accent-color);
}

.footer p {
    margin: 0;
    opacity: 0.9;
    color: var(--accent-color);
}

.last-updated {
    background: rgba(239, 208, 80, 0.1);
    border: 1px solid var(--accent-color);
    border-radius: 10px;
    padding: 15px;
    margin: 20px 0;
    text-align: center;
    font-size: 0.9rem;
    color: var(--text-color);
}

.last-updated strong {
    color: var(--primary-color);
}

@media (max-width: 768px) {
    body {
        padding: 10px;
    }
    
    .content {
        padding: 20px;
    }
    
    .header h1 {
        font-size: 2rem;
    }
    
    ol li {
        padding: 20px 20px 20px 35px;
    }
}
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>STEPAKASH</h1>
            <p class="subtitle">Privacy Policy</p>
        </div>
        
        <div class="content">
            <div class="last-updated">
                <strong>Last Updated:</strong> <?php echo date('F j, Y \a\t g:i A'); ?>
            </div>

            <div class="intro-section">
                <p><strong>Effective Date:</strong> <?php echo date('F j, Y'); ?></p>
                <p>At STEPAKASH, we are committed to protecting your privacy and ensuring the security of your personal information. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you use our electronic money services.</p>
            </div>

            <h2>Information We Collect</h2>
            <div class="privacy-section">
                <h3>Personal Information</h3>
                <p>We collect the following types of personal information:</p>
                <ul>
                    <li>Full name</li>
                    <li>Contact information (phone number)</li>
                    <li>Financial information (Deriv Account Information)</li>
                    <li>Device information and IP addresses</li>
                </ul>
            </div>

            <h2>How We Use Your Information</h2>
            <div class="privacy-section">
                <h3>Primary Uses</h3>
                <p>Your information is used to:</p>
                <ul>
                    <li>Provide and maintain our electronic money services</li>
                    <li>Process transactions and payments</li>
                    <li>Verify your identity and prevent fraud</li>
                    <li>Comply with legal and regulatory requirements</li>
                    <li>Communicate with you about your account and services</li>
                    <li>Improve our services and user experience</li>
                </ul>
            </div>

            <h2>Information Sharing</h2>
            <div class="privacy-section">
                <h3>When We Share Information</h3>
                <p>We may share your information in the following circumstances:</p>
                <ul>
                    <li>With regulatory authorities and law enforcement when required by law</li>
                    <li>With our trusted service providers who assist in operating our services</li>
                    <li>With financial institutions to process transactions</li>
                    <li>In case of business transfers or mergers</li>
                    <li>With your explicit consent</li>
                </ul>
            </div>

            <div class="highlight-box">
                <h3>Important Note</h3>
                <p>We do not sell, rent, or trade your personal information to third parties for marketing purposes. Your financial data is encrypted and stored securely in compliance with industry standards.</p>
            </div>

            <h2>Data Security</h2>
            <div class="privacy-section">
                <h3>Security Measures</h3>
                <p>We implement robust security measures including:</p>
                <ul>
                    <li>End-to-end encryption for all transactions</li>
                    <li>Multi-factor authentication</li>
                    <li>Regular security audits and monitoring</li>
                    <li>Secure data centers with 24/7 monitoring</li>
                    <li>Employee training on data protection</li>
                </ul>
            </div>

            <h2>Your Rights</h2>
            <div class="privacy-section">
                <h3>Data Protection Rights</h3>
                <p>You have the right to:</p>
                <ul>
                    <li>Access your personal information</li>
                    <li>Request correction of inaccurate data</li>
                    <li>Request deletion of your data (subject to legal requirements)</li>
                    <li>Object to processing of your information</li>
                    <li>Request data portability</li>
                    <li>Withdraw consent where applicable</li>
                </ul>
            </div>

            <h2>Data Retention</h2>
            <div class="privacy-section">
                <h3>Retention Policy</h3>
                <p>We retain your personal information for as long as necessary to:</p>
                <ul>
                    <li>Provide our services to you</li>
                    <li>Comply with legal and regulatory obligations</li>
                    <li>Resolve disputes and enforce agreements</li>
                    <li>Prevent fraud and ensure security</li>
                </ul>
                <p>Typically, we retain account information for 7 years after account closure, as required by financial regulations.</p>
            </div>

            <h2>Updates to This Policy</h2>
            <div class="privacy-section">
                <p>We may update this Privacy Policy from time to time. We will notify you of any material changes by posting the new Privacy Policy on our website and updating the effective date. Your continued use of our services after such changes constitutes acceptance of the updated policy.</p>
            </div>

            <div class="contact-section">
                <h3>Contact Us</h3>
                <p>If you have any questions about this Privacy Policy or wish to exercise your rights, please contact us at:</p>
                <p><strong>Email:</strong> info@stepakash.com</p>
                <p><strong>Phone:</strong> +254 741 554 994</p>
                <p><strong>Address:</strong> Nairobi, Kenya</p>
            </div>
        </div>
        
        <div class="footer">
            <p>&copy; <?php echo date('Y'); ?> StepaKash. All rights reserved. | Last updated: <?php echo date('F j, Y'); ?></p>
        </div>
    </div>
</body>
</html>