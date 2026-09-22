<?php
$errors = array();

if (isset($_POST['submit'])) {
    // Retrieve and trim form data
    $fullname   = trim($_POST['fullname']);
    $email      = trim($_POST['email']);
    $phone      = trim($_POST['phone']);
    $experience = trim($_POST['experience']);
    $ccnumber   = trim($_POST['ccnumber']);
    $job_role   = trim($_POST['job_role']);

    // 1. Validate Full Name (letters and spaces only)
    if (!preg_match("/^[a-zA-Z ]+$/", $fullname)) {
        $errors[] = "Invalid name format. Only letters and white space allowed.";
    }

    // 2. Validate Email using Regex matching standard structure
    if (!preg_match("/^[\w\.-]+@[\w\.-]+\.\w{2,4}$/", $email)) {
        $errors[] = "Invalid email format.";
    }

    // 3. Validate Phone Number (Strictly 10 digits)
    if (!preg_match("/^\d{10}$/", $phone)) {
        $errors[] = "Phone number must be exactly 10 digits.";
    }

    // 4. Validate Years of Experience (must be between 0 and 40)
    if (!is_numeric($experience) || $experience < 0 || $experience > 40) {
        $errors[] = "Years of experience must be a number between 0 and 40.";
    }

    // 5. Validate Credit Card Number (Strictly 16 digits)
    if (!preg_match("/^\d{16}$/", $ccnumber)) {
        $errors[] = "Credit card number must be exactly 16 digits.";
    }

    // 6. Validate Job Role selection
    if (empty($job_role)) {
        $errors[] = "Please select a valid job position.";
    }
} else {
    // Direct access redirect protection
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Status - Job Portal</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f4f7f6;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            background: #ffffff;
            width: 100%;
            max-width: 480px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        h3 {
            text-align: center;
            margin-bottom: 15px;
            font-size: 22px;
        }

        .success-title {
            color: #27ae60;
        }

        .error-title {
            color: #c0392b;
        }

        p {
            font-size: 14px;
            color: #555;
            line-height: 1.6;
            margin-bottom: 15px;
            text-align: center;
        }

        .success-box {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .success-box ul {
            list-style: none;
            padding: 0;
        }

        .success-box li {
            font-size: 14px;
            padding: 8px 0;
            color: #166534;
            border-bottom: 1px dashed #dcfce7;
            display: flex;
            justify-content: space-between;
        }

        .success-box li:last-child {
            border-bottom: none;
        }

        .error-list {
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .error-msg {
            color: #b91c1c;
            font-size: 14px;
            margin-bottom: 8px;
            text-align: left;
        }

        .error-msg:last-child {
            margin-bottom: 0;
        }

        .btn {
            display: block;
            width: 100%;
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

    <div class="container">
        <?php if (empty($errors)) { ?>
            <h3 class="success-title">Application Successful!</h3>
            <p>Thank you, <b><?php echo htmlspecialchars($fullname); ?></b>. Here are the details you submitted:</p>
            
            <div class="success-box">
                <ul>
                    <li><span><b>Email:</b></span> <span><?php echo htmlspecialchars($email); ?></span></li>
                    <li><span><b>Phone:</b></span> <span><?php echo htmlspecialchars($phone); ?></span></li>
                    <li><span><b>Experience:</b></span> <span><?php echo htmlspecialchars($experience); ?> years</span></li>
                    <li><span><b>Credit Card:</b></span> <span><?php echo htmlspecialchars($ccnumber); ?></span></li>
                    <li><span><b>Job Role:</b></span> <span><?php echo htmlspecialchars($job_role); ?></span></li>
                </ul>
            </div>

            <a href="index.html" class="btn">Go Back</a>
        <?php } else { ?>
            <h3 class="error-title">Submission Failed!</h3>
            <p>Please fix the following errors before submitting again:</p>
            
            <div class="error-list">
                <?php foreach ($errors as $error) { ?>
                    <p class="error-msg">* <?php echo htmlspecialchars($error); ?></p>
                <?php } ?>
            </div>

            <a href="index.html" class="btn">Go Back</a>
        <?php } ?>
    </div>

</body>
</html>