<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Techno School Login</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      margin: 0;
      padding: 0;
      background: #e6c6fa;
      height: 100vh;
      overflow-x: hidden;
    }

    .top-section {
      background: #2e0854;
      height: 250px;
      position: relative;
    }

    .wave {
      position: absolute;
      bottom: -1px;
      left: 0;
      width: 100%;
      transform: rotate(180deg);
    }

    .header {
      text-align: center;
      font-size: 3rem;
      color: white;
      padding-top: 60px;
      font-weight: bold;
      animation: fadeDown 1s ease forwards;
    }

    .container {
      display: flex;
      justify-content: center;
      gap: 100px;
      margin-top: 100px;
      flex-wrap: wrap;
      
    }

    .login-box {
      width: 250px;
      height: 200px;
      border-radius: 25px;
      background:rgb(210, 149, 248);
      backdrop-filter: blur(12px);
      box-shadow: 0 0 20px rgba(44, 41, 41, 0.2);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      font-size: 1.5rem;
      font-weight: bold;
      color: white;
      text-decoration: none;
      transform: scale(1);
      transition: transform 0.4s ease, box-shadow 0.4s ease;
    }

    .login-box:hover {
      transform: scale(1.3);
      box-shadow: 0 25px 35px rgba(0,0,0,0.3);
    }

    @keyframes pulseArrow {
  0%, 100% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.5);
  }
}

.login-box span {
  margin-top: 10px;
  font-size: 2rem;
  animation: pulseArrow 1.2s infinite ease-in-out;
  display: inline-block;
}

    .student {
      animation: slideInLeft 1s ease-out forwards;
    }

    .teacher {
      animation: slideInRight 1s ease-out forwards;
    }

    @keyframes slideInLeft {
  from {
    opacity: 0;
    transform: translateX(-100%) scale(0.8);
  }
  to {
    opacity: 1;
    transform: translateX(0) scale(1.3); 
  }
}

@keyframes slideInRight {
  from {
    opacity: 0;
    transform: translateX(100%) scale(0.8);
  }
  to {
    opacity: 1;
    transform: translateX(0) scale(1.3); 
  }
}

    @keyframes fadeDown {
      from {
        opacity: 0;
        transform: translateY(-40px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @media (max-width: 600px) {
      .container {
        flex-direction: column;
        align-items: center;
      }

      .login-box {
        margin-bottom: 20px;
      }
    }



@keyframes fadeUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
@media (max-width: 768px) {
  .header {
    font-size: 2rem;
  }

  .login-box {
    width: 200px;
    height: 180px;
    font-size: 1.3rem;
  }

  .login-box span {
    font-size: 1.5rem;
  }


}

  </style>
</head>
<body>

  <div class="top-section">
    <div class="header">Techno School</div>
    <!-- Wavy SVG divider -->
    <svg class="wave" viewBox="0 0 1440 140" preserveAspectRatio="none">
        <path fill="#e6c6fa" fill-opacity="1" d="M0,80 C120,20 360,140 480,80 C600,20 840,140 960,80 C1080,20 1320,140 1440,80 L1440,0 L0,0 Z"></path>
    </svg>
  </div>

  <div class="container">
    <a href="./std_login.php" class="login-box student">
      Student Login
      <span>➜</span>
    </a>
    <a href="./teach_login.php" class="login-box teacher">
      Teacher Login
      <span>➜</span>
    </a>
  </div>

</body>
</html>

