<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Welcome to Our Software</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            color: #000000;
            background-color: #ffffff;
        }

        .email-container {
            max-width: 600px;
            margin: 40px auto;
            padding: 40px;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 22px;
            margin: 0;
        }

        .content {
            font-size: 15px;
            line-height: 1.6;
        }

        .content h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .content p {
            margin: 10px 0;
        }

        .details {
            margin-top: 20px;
        }

        .details ul {
            list-style: none;
            padding: 0;
        }

        .details li {
            margin-bottom: 8px;
        }

        .footer {
            text-align: center;
            font-size: 13px;
            margin-top: 40px;
            color: #555;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="header">
            <h1>Welcome to Upliftmis</h1>
        </div>

        <div class="content">
            <h2>Dear {{ $details['contact_person_name'] }},</h2>

            <p>
                We are thrilled to welcome you and your organization, <strong>{{ $details['organization_name']
                    }}</strong>, as a valued partner on our platform.
            </p>

            <p>
                Your registration was successful, and we are excited to collaborate with you in driving positive impact
                through innovation and shared efforts.
            </p>

            <div class="details">
                <p><strong>Registration Summary:</strong></p>
                <ul>
                    <li><strong>Organization Name:</strong> {{ $details['organization_name'] }}</li>
                    <li><strong>Contact Person:</strong> {{ $details['contact_person_name'] }}</li>
                    <li><strong>Designation:</strong> {{ $details['designation'] }}</li>
                    <li><strong>Phone Number:</strong> {{ $details['phone_number'] }}</li>
                    <li><strong>Email Address:</strong> {{ $details['email'] }}</li>
                    <li><strong>Username:</strong> {{ $details['user_id'] }}</li>
                    <li><strong>Password:</strong> {{ $details['password'] }}</li>
                </ul>
            </div>

            <p>
                You can now log in to your account and start managing your partnership activities. If you need
                assistance, our support team is always here to help.
            </p>

            <p>
                We look forward to a fruitful collaboration!
            </p>

            <p>Warm regards,<br>
                <strong>Uplift Mis Team</strong>
            </p>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} Uplift Mis | All Rights Reserved
        </div>
    </div>
</body>

</html>