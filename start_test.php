<?php
session_start();
include 'database.php';
$reg_no = $_SESSION['reg_no'];
$class = $_SESSION['class'];
$name = $_SESSION['name'];

$_SESSION['reg_no']=$reg_no;
$_SESSION['class']=$class;
$_SESSION['name']=$name;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start Test</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(45deg, #2e0854, #e6c6fa);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            overflow: hidden;
            position: relative;
            text-align: center;
        }

        h1, h3 {
            margin: 10px;
            opacity: 0;
            animation: fadeInUp 1s forwards;
        }

        h1 {
            font-size: 48px;
            font-weight: bold;
            animation-delay: 0.3s;
            color: #fff;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.5);
        }

        h3 {
            font-size: 24px;
            font-weight: 500;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.4);
        }

        h3:nth-child(2) {
            animation-delay: 0.6s;
        }

        h3:nth-child(3) {
            animation-delay: 0.9s;
        }

        button {
            margin-top: 40px;
            padding: 18px 36px;
            background-color: #fff;
            color: #2e0854;
            border: none;
            border-radius: 50px;
            font-size: 22px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.4);
            transition: all 0.3s ease;
            animation: glow 2s infinite alternate;
        }

        button:hover {
            background-color: #e6c6fa;
            color: #2e0854;
            transform: scale(1.08);
        }

        .wave-container {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            transform: rotate(180deg);
        }

        svg {
            width: 100%;
            height: 150px;
            animation: wave 6s ease-in-out infinite;
        }

        @keyframes wave {
            0%, 100% {
                transform: translateX(0);
            }
            50% {
                transform: translateX(-30px);
            }
        }

        @keyframes fadeInUp {
            from {
                transform: translateY(20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes glow {
            from {
                box-shadow: 0 0 15px rgba(255, 255, 255, 0.2);
            }
            to {
                box-shadow: 0 0 25px rgba(255, 255, 255, 0.6);
            }
        }

        @media (max-width: 600px) {
            h1 {
                font-size: 32px;
            }
            h3 {
                font-size: 18px;
            }
            button {
                font-size: 18px;
                padding: 14px 28px;
            }
        }
    </style>
</head>
<body>
    <h1>Hello, <?php echo htmlspecialchars($name); ?> 👋</h1>
    <h3>Your test duration is <strong>45 minutes</strong></h3>
    <h3>✨ All the best! You got this! ✨</h3>

    <button onclick="navigate()">Start Test 🚀</button>

    <div class="wave-container">
        <svg viewBox="0 0 1440 150" preserveAspectRatio="none">
            <path fill="#2e0854" fill-opacity="1" 
                  d="M0,80 C120,20 360,140 480,80 C600,20 840,140 960,80 
                     C1080,20 1320,140 1440,80 L1440,0 L0,0 Z">
            </path>
        </svg>
    </div>

    <script>
        function navigate() {
            document.querySelector("button").innerText = "Starting...";
            setTimeout(() => {
                window.location.href = "test.php";
            }, 500);
        }
    </script>
</body>
</html>
