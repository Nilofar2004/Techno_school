<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(45deg, #2e0854, #e6c6fa);
            font-family: Arial, sans-serif;
            color: white;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            overflow: hidden;
            position: relative;
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 700;
            color: white;
        }

        form {
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 400px;
            z-index: 10;
        }

        input, button {
            width: 90%;
            margin: 10px 0;
            padding: 12px;
            border-radius: 10px;
            border: none;
            font-size: 16px;
        }

        input {
            background-color: rgba(255, 255, 255, 0.7);
        }

        button {
            background-color: #2e0854;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #e6c6fa;
        }

        /* Wave Animation */
        .wave-container {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            transform: rotate(180deg);
        }

        svg {
            width: 100%;
            height: 150px;
            position: relative;
            bottom: 0;
            animation: wave 6s ease-in-out infinite;
        }

        @keyframes wave {
            0% {
                transform: translateX(0);
            }
            50% {
                transform: translateX(-20px);
            }
            100% {
                transform: translateX(0);
            }
        }

        @media (max-width: 480px) {
            form {
                padding: 20px;
                width: 90%;
            }
            input, button {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <h1>Student Login</h1>
    <form action="" method="post">
        <input type="text" placeholder="Student Name" name="std_name" required>
        <input type="text" placeholder="Register No" name="reg_no" required>
        <input type="text" placeholder="Class" name="class" required>
        <input type="text" placeholder="Section" name="section" required>
        <button name="login">Login</button>
    </form>

    <div class="wave-container">
        <svg viewBox="0 0 1440 150" preserveAspectRatio="none">
            <path fill="#2e0854" fill-opacity="1" d="M0,80 C120,20 360,140 480,80 C600,20 840,140 960,80 C1080,20 1320,140 1440,80 L1440,0 L0,0 Z"></path>
        </svg>
    </div>

    <?php
    session_start();
    include 'database.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['login'])) {
            $name = $_POST['std_name'];
            $reg_no = $_POST['reg_no'];
            $class = $_POST['class'];
            $section = $_POST['section'];

            // Sanitize input to avoid SQL injection
            $name = mysqli_real_escape_string($conn, $name);
            $reg_no = mysqli_real_escape_string($conn, $reg_no);
            $class = mysqli_real_escape_string($conn, $class);
            $section = mysqli_real_escape_string($conn, $section);

            // Check if user already exists
            $check_query = "SELECT * FROM student WHERE reg_no = '$reg_no'";
            $check_result = mysqli_query($conn, $check_query);
            
            if (mysqli_num_rows($check_result) > 0) {
                // User already exists, log them in
                $user = mysqli_fetch_assoc($check_result);
                $_SESSION['reg_no'] = $user['reg_no'];
                $_SESSION['class'] = $user['class'];
                $_SESSION['name'] = $user['name'];
                header("Location:start_test.php");
                exit();
            } else {
                // User doesn't exist, insert new record
                $query = "INSERT INTO student(reg_no, name, class, section) VALUES('$reg_no', '$name', '$class', '$section')";
                
                // Execute the query and check for errors
                if (mysqli_query($conn, $query)) {
                    $_SESSION['reg_no'] = $reg_no;
                    $_SESSION['class'] = $class;
                    $_SESSION['name'] = $name;
                    header("Location:start_test.php");
                    exit();
                } else {
                    // Display any errors in the SQL query
                    echo "Error: " . mysqli_error($conn);
                }
            }
        }
    }
    ?>
</body>
</html>
