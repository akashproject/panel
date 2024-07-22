<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
    <style>
        @import url('https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        h4 {
            font-size: 25px;
        }

        h6 {
            font-size:18px;
            margin: 0;
        }
        p {
            margin: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .email-header, .email-footer {
            text-align: center;
            padding: 20px;
        }

        .email-header-title{
            background-color: #007bff;
            color: #ffffff;
        }

        .email-body {
            padding: 20px;
            line-height: 1.6;
        }

        .btn {
            display: inline-block;
            font-weight: 400;
            color: #212529;
            text-align: center;
            vertical-align: middle;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .btn-primary {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }

        @media only screen and (max-width: 600px) {
            .email-container {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <div style="text-align:center" >
                <img src="https://devsov.baazar.live/panel/assets/administrator/img/logo.png" style="width: 100%; max-width: 300px;">
            </div>
            <div class="email-header-title" >
                <h1>Registration Successful</h1>
            </div>
        </div>
        <div class="email-body">
            <p>Hi {{ $name }},</p>
            <p>Thank you for registering with Baazar Live. We are excited to have you on board.</p>
            <p>Your account has been successfully created. You can now log in and start using our services.</p>
            <div style="margin: 30px 0;">
                <div style="text-align:center">
                    <h4 style="font-size: 25px;"> Login Credentials </h4>
                </div>
                <h6> Email Address : <a href="javascript:void()" > {{ $email }} </a></h6>
                <h6> Password : <a href="javascript:void()" > {{ $password }} </a></h6>
            </div>
            <p>If you have any questions, feel free to <a href="mailto:support@baazar.live">contact us</a>.</p>
            <p>Best regards,</p>
            <p>The Baazar Live Team</p>
            <div style="text-align:center">
                <p><a href="{{ url('/') }}" class="btn btn-primary" style="color: #fff;font-size: 28px;text-decoration: none;padding: 4px 30px;margin-top: 25px;">Log In</a></p>
            </div>
        </div>
        <div class="email-footer">
            <p>&copy; 2024 Baazar Live. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
