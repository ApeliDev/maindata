<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms of Use - StepaKash</title>
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
            color: var(--secondary-color);
            font-size: 1.2rem;
            font-weight: 600;
            margin: 25px 0 15px 0;
            padding: 10px 0;
            border-bottom: 2px solid var(--accent-color);
        }

        .intro-text {
            background: linear-gradient(135deg, rgba(15, 117, 58, 0.05), rgba(15, 117, 58, 0.02));
            border: 2px solid var(--accent-color);
            border-radius: 15px;
            padding: 25px;
            margin: 20px 0;
            font-size: 1.05rem;
            line-height: 1.7;
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

        .section {
            margin: 30px 0;
            padding: 25px;
            background: linear-gradient(135deg, rgba(15, 117, 58, 0.03), var(--card-bg));
            border-radius: 12px;
            border-left: 5px solid var(--accent-color);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .section-number {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.2rem;
            border: 3px solid var(--accent-color);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
            margin-right: 15px;
            vertical-align: top;
        }

        .subsection {
            margin: 20px 0;
            padding: 20px;
            background: rgba(239, 208, 80, 0.05);
            border-radius: 10px;
            border-left: 3px solid var(--secondary-color);
        }

        .subsection-title {
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        ul {
            margin: 15px 0;
            padding-left: 25px;
        }

        ul li {
            margin: 10px 0;
            line-height: 1.6;
        }

        .bullet-point {
            color: var(--secondary-color);
            font-weight: bold;
        }

        .checkbox-container {
            background: linear-gradient(135deg, rgba(239, 208, 80, 0.1), rgba(244, 220, 116, 0.05));
            border: 2px solid var(--accent-color);
            border-radius: 15px;
            padding: 25px;
            margin: 30px 0;
            text-align: center;
            position: relative;
        }

        .checkbox-container::before {
            content: "☑";
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
            
            .section {
                padding: 20px;
            }
            
            .section-number {
                width: 35px;
                height: 35px;
                font-size: 1rem;
                margin-right: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="<?php echo base_url() ?>assets/img/home-header-stepakash.png" alt="Stepakash" style="max-width: 220px; margin-bottom: 10px; filter: brightness(0) invert(1);">
            <p class="subtitle">Terms of Use & Conditions</p>
        </div>
        
        <div class="content">
            <div class="last-updated">
                <strong>Last Updated:</strong> August 1, 2025
            </div>

            <div class="intro-text">
                These Terms and Conditions ("Terms") govern your use of the services provided by StepaKash, a digital financial technology (fintech) platform ("StepaKash", "we", "us", or "our"). By creating an account or using any services on our platform, you agree to be bound by these Terms.
            </div>

            <div class="acknowledgment">
                <h2>By accepting these Terms of Use and using the StepaKash Service you acknowledge that:</h2>
                <p>(i) we are not a bank and your Account is not a bank account;</p>
                <p>(ii) Accounts are not insured by any government agency or Deriv Broker;</p>
                <p>(iii) we do not act as a trustee, fiduciary or escrow holder in respect of balances in your Account; and</p>
                <p>(iv) we do not pay you interest on any balances in your Account.</p>
            </div>

            <div class="section">
                <span class="section-number">1</span>
                <h3>Legal Relationship & Disclaimer</h3>
                <p>By accepting these Terms and using the StepaKash service, you expressly acknowledge and agree that:</p>
                
                <div class="subsection">
                    <div class="subsection-title">1.1 Non-Banking Status</div>
                    <p>StepaKash is a financial technology service provider and not a bank. Your StepaKash Wallet ("Account") is not a bank account, and you are not entitled to any bank-related privileges under your use of our service.</p>
                </div>

                <div class="subsection">
                    <div class="subsection-title">1.2 No Government or Broker Insurance</div>
                    <p>Your Account is not insured by any government agency or Deriv Broker, and you accept all risks associated with holding balances within our platform.</p>
                </div>

                <div class="subsection">
                    <div class="subsection-title">1.3 No Trustee Relationship</div>
                    <p>StepaKash does not act as a trustee, fiduciary, or escrow holder for the balances held in your Account. We are merely facilitating digital financial transactions at your direction.</p>
                </div>

                <div class="subsection">
                    <div class="subsection-title">1.4 No Interest Earnings</div>
                    <p>We do not pay interest on any balances maintained in your Account.</p>
                </div>
            </div>

            <div class="section">
                <span class="section-number">2</span>
                <h3>Eligibility for Use</h3>
                
                <div class="subsection">
                    <div class="subsection-title">2.1 Minimum Age</div>
                    <p>To use our services, you must be 18 years or older and possess full legal capacity to enter into a binding agreement.</p>
                </div>

                <div class="subsection">
                    <div class="subsection-title">2.2 Residency</div>
                    <p>You must be a legal resident of a country where StepaKash services are officially offered.</p>
                </div>
            </div>

            <div class="section">
                <span class="section-number">3</span>
                <h3>Account Use and Limitations</h3>
                
                <div class="subsection">
                    <div class="subsection-title">3.1 Personal Use Only</div>
                    <p>You may not permit any other person to access or use your StepaKash Account. Each account is personal, and you are solely responsible for maintaining its confidentiality and security.</p>
                </div>

                <div class="subsection">
                    <div class="subsection-title">3.2 One Account Policy</div>
                    <p>You may only open one Account with us. If you create or are suspected to have created multiple accounts (including multiple CR accounts), we reserve the right—without prior notice—to close or suspend any or all related accounts.</p>
                </div>
            </div>

            <div class="section">
                <span class="section-number">4</span>
                <h3>Transactions & Restrictions</h3>
                
                <div class="subsection">
                    <div class="subsection-title">4.1 Transaction Approval Rights</div>
                    <p>We reserve the sole right to decline or block any transaction that:</p>
                    <ul>
                        <li>Appears fraudulent,</li>
                        <li>Violates these Terms or applicable laws,</li>
                        <li>Involves insufficient funds, or</li>
                        <li>Raises any compliance or risk concerns.</li>
                    </ul>
                </div>

                <div class="subsection">
                    <div class="subsection-title">4.2 Partner Refusal Liability</div>
                    <p>We shall not be liable if DERIV, MPESA, or any third-party platform:</p>
                    <ul>
                        <li>Refuses your deposit or withdrawal,</li>
                        <li>Fails to authorize a transaction, or</li>
                        <li>Experiences downtime or transactional delays.</li>
                    </ul>
                </div>

                <div class="subsection">
                    <div class="subsection-title">4.3 Sufficient Balance Requirement</div>
                    <p>When requesting a withdrawal or payment:</p>
                    <ul>
                        <li>You may not exceed the available balance in your StepaKash Wallet (including applicable fees).</li>
                        <li>Transactions that exceed your available balance will be denied.</li>
                        <li>You must also meet any minimum withdrawal threshold set on the platform. If your balance is insufficient, your request will be automatically rejected.</li>
                    </ul>
                </div>
            </div>

            <div class="section">
                <span class="section-number">5</span>
                <h3>Fees and Charges</h3>
                
                <div class="subsection">
                    <div class="subsection-title">5.1 Service Fees</div>
                    <p>All applicable transaction fees, withdrawal charges, or service costs will be deducted directly from your account. A full breakdown of fees may be published and updated periodically on our website or app.</p>
                </div>
            </div>

            <div class="section">
                <span class="section-number">6</span>
                <h3>Suspension & Termination</h3>
                
                <div class="subsection">
                    <div class="subsection-title">6.1 Account Suspension or Termination</div>
                    <p>We may suspend or permanently terminate your access to StepaKash services, without prior notice, if we reasonably believe you:</p>
                    <ul>
                        <li>Violated any of these Terms,</li>
                        <li>Attempted to manipulate or exploit the platform,</li>
                        <li>Engaged in any form of fraudulent, illegal, or abusive conduct.</li>
                    </ul>
                </div>
            </div>

            <div class="section">
                <span class="section-number">7</span>
                <h3>Updates to Terms</h3>
                
                <div class="subsection">
                    <div class="subsection-title">7.1 Right to Amend</div>
                    <p>We reserve the right to modify these Terms at any time. Continued use of the StepaKash platform after changes are made will constitute your acceptance of the updated Terms.</p>
                </div>
            </div>

            <div class="section">
                <span class="section-number">8</span>
                <h3>Contact and Support</h3>
                <p>If you have any questions, disputes, or require support, you may reach out to our customer service team through our official channels listed on the website or app.</p>
            </div>

            <div class="checkbox-container">
                <h3 style="margin-bottom: 15px; border: none; text-transform: none; letter-spacing: normal;">Agreement Confirmation</h3>
                <p><strong>By creating an account or continuing to use StepaKash, you confirm that you have read, understood, and agree to abide by these Terms and Conditions.</strong></p>
            </div>

            <div class="disclaimer">
                <h2>DISCLAIMER</h2>
                <p>While your StepaKash Wallet offers fast, secure, and convenient access to digital funds, please note that it is not a bank account. In the rare event of company insolvency, the balance in your Wallet may not be covered by deposit protection schemes, and recovery of funds is not guaranteed.</p>
            </div>
        </div>
        
        <div class="footer">
            <p>&copy; <?php echo date("Y"); ?> StepaKash. All rights reserved.</p>
        </div>
    </div>
</body>
</html>