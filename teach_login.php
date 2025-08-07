<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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
            0% { transform: translateX(0); }
            50% { transform: translateX(-20px); }
            100% { transform: translateX(0); }
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

    <h1>Admin Login</h1>
    <form action="" method="post">
        <input type="text" placeholder="Enter your Name" name="name" required>
        <input type="password" placeholder="Enter your Password" name="pass" required>
        <button name="login">Login</button>
    </form>

    <div class="wave-container">
        <svg viewBox="0 0 1440 150" preserveAspectRatio="none">
            <path fill="#2e0854" fill-opacity="1" d="M0,80 C120,20 360,140 480,80 C600,20 840,140 960,80 C1080,20 1320,140 1440,80 L1440,0 L0,0 Z"></path>
        </svg>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = "Techno";
        $password = "Techno123";

        if (isset($_POST['login'])) {
            $name = $_POST['name'];
            $pass = $_POST['pass'];

            if ($username === $name && $password === $pass) {
                header("Location: admin.php");
                exit();
            } else {
                echo '<script>alert("Wrong Username or Password. Try again!")</script>';
            }
        }
    }
    ?>
</body>
</html>
