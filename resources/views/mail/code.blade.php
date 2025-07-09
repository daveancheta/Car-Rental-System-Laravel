<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Code - Secure Access</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            color: #333333;
            line-height: 1.6;
            padding: 20px;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
        }

        .header h1 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .header p {
            font-size: 16px;
            opacity: 0.9;
        }

        .content {
            padding: 40px 30px;
        }

        .greeting {
            font-size: 18px;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        .message {
            font-size: 16px;
            margin-bottom: 30px;
            color: #555555;
            line-height: 1.7;
        }

        .verification-section {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            margin: 30px 0;
            border: 2px solid #e9ecef;
        }

        .verification-label {
            font-size: 14px;
            font-weight: 600;
            color: #6c757d;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .verification-code {
            font-size: 36px;
            font-weight: 700;
            color: #2c3e50;
            background-color: #ffffff;
            padding: 20px 30px;
            border-radius: 8px;
            display: inline-block;
            letter-spacing: 8px;
            border: 2px solid #667eea;
            margin: 10px 0;
            font-family: 'Courier New', monospace;
        }

        .expiry-notice {
            font-size: 14px;
            color: #e74c3c;
            margin-top: 15px;
            font-weight: 500;
        }

        .instructions {
            background-color: #e8f4f8;
            border-left: 4px solid #667eea;
            padding: 20px;
            margin: 25px 0;
            border-radius: 0 8px 8px 0;
        }

        .instructions h3 {
            color: #2c3e50;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .instructions ul {
            list-style: none;
            padding-left: 0;
        }

        .instructions li {
            padding: 5px 0;
            color: #555555;
        }

        .instructions li:before {
            content: "→";
            color: #667eea;
            margin-right: 10px;
            font-weight: bold;
        }

        .security-notice {
            background-color: #fff3cd;
            border: 1px solid #ffeaa7;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
        }

        .security-notice h3 {
            color: #856404;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .security-notice p {
            color: #856404;
            font-size: 14px;
            margin: 0;
        }

        .footer {
            background-color: #f8f9fa;
            padding: 30px;
            text-align: center;
            border-top: 1px solid #e9ecef;
        }

        .footer p {
            color: #6c757d;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .company-info {
            color: #adb5bd;
            font-size: 12px;
            margin-top: 20px;
        }

        .divider {
            height: 1px;
            background-color: #e9ecef;
            margin: 30px 0;
        }

        @media (max-width: 600px) {
            .email-container {
                margin: 10px;
                border-radius: 8px;
            }

            .header,
            .content,
            .footer {
                padding: 20px;
            }

            .verification-code {
                font-size: 28px;
                letter-spacing: 4px;
                padding: 15px 20px;
            }
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="header">
            <h1>Verification Required</h1>
            <p>Secure your account access</p>
        </div>

        <div class="content">
            <div class="greeting">
                Hello,
            </div>

            <div class="message">
                We received a request to verify your account. To complete the verification process and secure your
                account, please use the verification code below.
            </div>

            <div class="verification-section">
                <div class="verification-label">Your Verification Code</div>
                <div class="verification-code">{{ Auth::user()->verification_code}}</div>
                <div class="expiry-notice">⏱️ This code expires in 10 minutes</div>
            </div>

            <div class="instructions">
                <h3>How to use this code:</h3>
                <ul>
                    <li>Return to the verification page</li>
                    <li>Enter the 6-digit code exactly as shown</li>
                    <li>Complete the verification process</li>
                </ul>
            </div>

            <div class="security-notice">
                <h3>🔒 Security Information</h3>
                <p>If you didn't request this verification code, please ignore this email or contact our support team
                    immediately. Never share this code with anyone.</p>
            </div>

            <div class="divider"></div>

            <p style="color: #6c757d; font-size: 14px;">
                Need help? Contact our support team at <strong>support@company.com</strong> or visit our help center.
            </p>
        </div>

        <div class="footer">
            <p>This is an automated message. Please do not reply to this email.</p>
            <p>If you have any questions, please contact our support team.</p>

            <div class="company-info">
                <p>© 2025 Your Company Name. All rights reserved.</p>
                <p>123 Business Street, City, State 12345</p>
            </div>
        </div>
    </div>
</body>

</html>