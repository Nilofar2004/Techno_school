<?php
session_start();
include 'database.php';

// DEBUG: Check if session variables are set
if (!isset($_SESSION['reg_no']) || !isset($_SESSION['class']) || !isset($_SESSION['name'])) {
    die("<p style='color:red;'>Session not set. Please log in again.</p>");
}

$reg_no = $_SESSION['reg_no'];
$class = $_SESSION['class'];
$name = $_SESSION['name'];
// Check if user has already submitted
$check = "SELECT * FROM student_answer WHERE reg_no = '$reg_no' LIMIT 1";
$alreadySubmitted = mysqli_query($conn, $check);

if (mysqli_num_rows($alreadySubmitted) > 0) {
    echo "<script>alert('You have already submitted the test.'); window.location.href='index.php';</script>";
    exit();
}

echo "<p><strong>Welcome, $name (Reg No: $reg_no, Class: $class)</strong></p>";

$questions = [];

$q2 = "SELECT q.question_id, q.question_text, o.option_id, o.option_text 
       FROM questions q 
       JOIN question_options o ON q.question_id = o.question_id
       WHERE q.class = '$class'";

$result = mysqli_query($conn, $q2);

if (!$result) {
    die("<p style='color:red;'>Query failed: " . mysqli_error($conn) . "</p>");
}

if (mysqli_num_rows($result) === 0) {
    echo "<p style='color:red;'>No questions found for class: <strong>$class</strong></p>";
}

while ($row = $result->fetch_assoc()) {
    $questions[$row['question_id']]['text'] = $row['question_text'];
    $questions[$row['question_id']]['options'][] = [
        'id' => $row['option_id'],
        'text' => $row['option_text'],
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start Test</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(45deg, #2e0854, #e6c6fa,rgb(96, 32, 160));
            color:  #2e0854;
            padding: 20px;
            overflow-x: hidden;
            transition: background 0.5s ease-in-out;
        }
        h1 {
            color:#2e0854;
            font-size: 36px;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-align: center;
            animation: fadeIn 2s ease-in-out;
        }
        .question {
            background:rgba(255, 255, 255, 0.2);
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            animation: slideIn 0.5s ease-out;
        }
        .question p {
            font-size: 20px;
            font-weight: bold;
        }
        label {
            font-size: 18px;
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
        }
        label:hover {
            transform: scale(1.05);
            color: #2e0854;
        }
        #timer {
            font-size: 24px;
            font-weight: bold;
            color: #e6c6fa;
            text-align: center;
            animation: timerAnimation 1s ease-in-out infinite alternate;
        }
        button {
            padding: 10px 20px;
            font-size: 18px;
            background-color: #2e0854;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }
        button:hover {
            background-color: #e6c6fa;
            color: #2e0854;
            transform: scale(1.05);
        }
        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
        @keyframes slideIn {
            0% { transform: translateX(-50%); opacity: 0; }
            100% { transform: translateX(0); opacity: 1; }
        }
        @keyframes timerAnimation {
            0% { color: #e6c6fa; }
            100% { color: #4CAF50; }
        }
    </style>
    <script>
        let timer = 1 * 60; // 1 minute

        function startTimer() {
            const timerDisplay = document.getElementById('timer');
            const interval = setInterval(() => {
                const minutes = Math.floor(timer / 60);
                const seconds = timer % 60;
                timerDisplay.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;

                if (timer <= 0) {
                    clearInterval(interval);
                    alert("Time's up!");
                    // Check for unanswered questions and mark them automatically
                    document.querySelectorAll('input[type="radio"]:not(:checked)').forEach(input => {
                        input.checked = true; // Mark it as answered
                    });
                    document.getElementById('testForm').submit();
                }
                timer--;
            }, 1000);
        }
    </script>
</head>
<body onload="startTimer()">
    <center>
        <h1>Start Test</h1>
        <p id="timer">1:00</p>
    </center>

    <form id="testForm" action="" method="POST">
        <?php if (count($questions) > 0): ?>
            <?php foreach ($questions as $question_id => $question): ?>
                <div class="question">
                    <p><?= htmlspecialchars($question['text']); ?></p>
                    <?php foreach ($question['options'] as $option): ?>
                        <div>
                            <input type="radio" name="answer[<?= $question_id; ?>]" 
                                   value="<?= $option['id']; ?>" 
                                   id="option_<?= $option['id']; ?>" required>
                            <label for="option_<?= $option['id']; ?>">
                                <?= htmlspecialchars($option['text']); ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
            <center><button type="submit" name="submit_test">Submit</button></center>
        <?php else: ?>
            <p style="color:red;">No questions to display for your class. Please contact admin.</p>
        <?php endif; ?>
    </form>
    <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_test'])) {
    $answers = $_POST['answer'] ?? [];
    $name = mysqli_real_escape_string($conn, $_SESSION['name']);
    $reg_no = mysqli_real_escape_string($conn, $_SESSION['reg_no']);
    $class = mysqli_real_escape_string($conn, $_SESSION['class']);

    foreach ($answers as $question_id => $option_id) {
        $question_text = mysqli_real_escape_string($conn, $questions[$question_id]['text']);

        $selected_option = array_filter($questions[$question_id]['options'], function ($option) use ($option_id) {
            return $option['id'] == $option_id;
        });

        if (!empty($selected_option)) {
            $selected_option_text = mysqli_real_escape_string($conn, reset($selected_option)['text']);

            $query = "INSERT INTO student_answer (reg_no, name, class, question, answer) 
                      VALUES ('$reg_no', '$name', '$class', '$question_text', '$selected_option_text')";

            if (!mysqli_query($conn, $query)) {
                echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
            }
        }
    }
    echo "<script>alert('Test submitted successfully.'); window.location.href='index.php';</script>";
    exit();
}
?>

</body>
</html>
