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

h3 {
    color: var(--primary-color);
    font-size: 1.1rem;
    font-weight: 600;
    margin: 20px 0 15px 0;
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

.privacy-section {
    margin: 20px 0;
}

.privacy-section ul {
    margin: 15px 0;
    padding-left: 30px;
}

.privacy-section li {
    margin: 10px 0;
    line-height: 1.6;
}

.highlight-box {
    background: linear-gradient(135deg, rgba(15, 117, 58, 0.05), rgba(15, 117, 58, 0.02));
    border: 2px solid var(--accent-color);
    border-radius: 15px;
    padding: 25px;
    margin: 25px 0;
    box-shadow: 0 8px 20px rgba(239, 208, 80, 0.1);
}

.highlight-box h3 {
    color: var(--primary-color);
    margin-bottom: 15px;
}

.intro-section {
    margin: 20px 0;
}

.intro-section p {
    margin: 15px 0;
    line-height: 1.7;
}

.contact-section {
    background: linear-gradient(135deg, rgba(239, 208, 80, 0.1), rgba(244, 220, 116, 0.05));
    border: 2px solid var(--accent-color);
    border-radius: 15px;
    padding: 30px;
    margin: 30px 0;
}

.contact-section h2 {
    margin-top: 0;
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
            <img src="<?php echo base_url() ?>assets/img/home-header-stepakash.png" alt="Stepakash" style="max-width: 220px; margin-bottom: 10px; filter: brightness(0) invert(1);">
            <p class="subtitle">Privacy Policy</p>
        </div>
        
        <div class="content">
            <div class="last-updated">
                <strong>Last Updated:</strong> August 8, 2025
            </div>

            <div class="intro-section">
                <!-- <p><strong>Effective Date:</strong> August 8, 2025</p> -->
                <p>At <strong>StepaKash</strong>, your privacy is our priority. This Privacy Policy outlines how we collect, use, share, and safeguard your personal data when you engage with our digital financial services.</p>
            </div>

            <h2>Information We Collect</h2>
            <div class="privacy-section">
                <p>We collect certain personal data to provide secure, reliable, and seamless service. This includes:</p>
                <h3>Personal Information</h3>
                <ul>
                    <li>Full Name</li>
                    <li>Phone Number</li>
                    <li>Financial Details (e.g., Deriv Account Information)</li>
                    <li>Device Information and IP Address</li>
                </ul>
            </div>

            <h2>How We Use Your Information</h2>
            <div class="privacy-section">
                <p>Your information enables us to:</p>
                <ul>
                    <li>Operate and maintain StepaKash services</li>
                    <li>Process transactions and facilitate payments</li>
                    <li>Verify your identity and prevent fraud</li>
                    <li>Meet legal and regulatory obligations</li>
                    <li>Communicate essential account updates</li>
                    <li>Improve platform features and user experience</li>
                </ul>
            </div>

            <h2>When We Share Your Information</h2>
            <div class="privacy-section">
                <p>We may disclose your information only in the following cases:</p>
                <ul>
                    <li><strong>Legal Requirements:</strong> With regulatory authorities or law enforcement as mandated by law</li>
                    <li><strong>Service Providers:</strong> With partners who support service delivery (e.g., infrastructure, customer support)</li>
                    <li><strong>Financial Institutions:</strong> To execute transactions securely</li>
                    <li><strong>Business Restructuring:</strong> During mergers, acquisitions, or business transfers</li>
                    <li><strong>With Your Consent:</strong> In cases where you explicitly authorize it</li>
                </ul>
            </div>

            <div class="highlight-box">
                <h3>Important Note</h3>
                <p><strong>Note:</strong> We do not sell, rent, or trade your personal data to third parties for marketing. Your financial data is encrypted and stored in compliance with industry-standard protocols.</p>
            </div>

            <h2>Data Security</h2>
            <div class="privacy-section">
                <p>We employ strict measures to protect your personal information, including:</p>
                <ul>
                    <li>End-to-end encryption of all data and transactions</li>
                    <li>Multi-factor authentication (MFA) for user access</li>
                    <li>Regular security audits and threat monitoring</li>
                    <li>Secure, monitored data centers</li>
                    <li>Employee training on data privacy and handling</li>
                </ul>
            </div>

            <h2>Your Rights</h2>
            <div class="privacy-section">
                <p>You have the right to:</p>
                <ul>
                    <li><strong>Access</strong> the personal data we hold about you</li>
                    <li><strong>Request corrections</strong> to inaccurate or outdated information</li>
                    <li><strong>Request deletion</strong> of your data (subject to compliance requirements)</li>
                    <li><strong>Object to or restrict processing</strong> of your data</li>
                    <li><strong>Request portability</strong> of your personal data</li>
                    <li><strong>Withdraw consent</strong> where previously granted</li>
                </ul>
                <p>To exercise any of these rights, please contact us via the details provided below.</p>
            </div>

            <h2>Data Retention</h2>
            <div class="privacy-section">
                <p>We retain your personal data only as long as necessary to:</p>
                <ul>
                    <li>Deliver our services</li>
                    <li>Fulfill legal and regulatory requirements</li>
                    <li>Resolve disputes and enforce agreements</li>
                    <li>Prevent fraud and ensure platform security</li>
                </ul>
                <p><strong>Standard retention period:</strong> 7 years from account closure, in line with financial regulatory standards.</p>
            </div>

            <h2>Updates to This Policy</h2>
            <div class="privacy-section">
                <p>We may revise this Privacy Policy periodically. In the event of material changes, we will:</p>
                <ul>
                    <li>Post the updated version on our official website</li>
                    <li>Update the "Effective Date"</li>
                    <li>Notify you where appropriate</li>
                </ul>
                <p>Continued use of StepaKash after changes are made implies acceptance of the revised policy.</p>
            </div>

            <div class="contact-section">
                <h2>Contact Us</h2>
                <p>For any questions, concerns, or data access requests, reach out to us via:</p>
                <p><strong>Email:</strong> info@stepakash.com</p>
                <p><strong>Phone:</strong> +254 741 554 994</p>
                <p><strong>Address:</strong> Nairobi, Kenya</p>
            </div>
        </div>
        
        <div class="footer">
            <p>&copy; <?php echo date('Y'); ?> StepaKash. All rights reserved.</p>
        </div>
    </div>
</body>
</html>