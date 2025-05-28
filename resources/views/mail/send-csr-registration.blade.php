<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our CSR Partner Program</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #007bff;
            color: #ffffff;
            text-align: center;
            padding: 12px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .content {
            padding: 8px;
            line-height: 1.6;
            color: #333333;
        }

        .content h2 {
            font-size: 20px;
            color: #007bff;
        }

        .content p {
            margin: 10px 0;
        }

        .credentials {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
        }

        .credentials p {
            margin: 5px 0;
            font-size: 16px;
        }

        .credentials strong {
            color: #333333;
        }

        .button {
            text-align: center;
            margin: 20px 0;
        }

        .button a {
            display: inline-block;
            padding: 12px 24px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .button a:hover {
            background-color: #0056b3;
        }

        .footer {
            background-color: #f4f4f4;
            text-align: center;
            padding: 10px;
            font-size: 12px;
            color: #666666;
        }

        @media only screen and (max-width: 600px) {
            .container {
                width: 100%;
            }

            .header h1 {
                font-size: 20px;
            }

            .content h2 {
                font-size: 18px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Welcome to Our CSR Partner Program!</h1>
        </div>
        <div class="content">
            <h2>Hello, CSR Partner!</h2>
            <p>Thank you for registering as a CSR Partner with XYZ Company. We are excited to have you on board
                and look forward to collaborating with you to make a positive impact.</p>
            <p>Your account has been successfully created. Below are your login credentials to access the CSR Partner
                Portal:</p>
            <div class="credentials">
                <p><strong>User ID:</strong> {{ $details['user_id'] }}</p>
                <p><strong>Password:</strong> {{ $details['password'] }}</p>
            </div>
            <p>For security reasons, we recommend changing your password after your first login.</p>
            <div class="button">
                <a href="[Your_Login_URL]">Log In to Your Account</a>
            </div>
            <p>If you have any questions or need assistance, feel free to contact our support team at <a
                    href="mailto:support@example.com">support@example.com</a>.</p>
            <p>Welcome again, and let's make a difference together!</p>
            <p>Best regards,<br>The [Your Company Name] Team</p>
        </div>
        <div class="footer">
            <p>&copy; [Current_Year] [Your Company Name]. All rights reserved.</p>
            <p>If you did not register for this account, please contact us at <a
                    href="mailto:support@example.com">support@example.com</a>.</p>
        </div>
    </div>
</body>

</html>