<?php include 'database.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Teacher Panel</title>
  <style>
    body {
        font-family: 'Segoe UI', sans-serif;
        margin: 0;
        padding: 0;
        background: linear-gradient(45deg, #2e0854, #e6c6fa);
        color: #fff;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        min-height: 100vh;
    }

    .container {
        width: 95%;
        max-width: 900px;
        margin: 40px auto;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        padding: 30px;
        backdrop-filter: blur(12px);
        box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
        text-align: center;
        animation: fadeInUp 1s ease-in-out forwards;
    }

    h1 {
        margin-bottom: 30px;
        font-size: 36px;
        color: white;
        text-shadow: 2px 2px 5px rgba(0,0,0,0.5);
    }

    form {
      margin-bottom: 20px;
      display: flex;
      justify-content: center;
      gap: 100px;
      margin-top: 100px;
      flex-wrap: wrap;
    }

    select, input[type="text"], button {
        padding: 10px;
        margin: 10px 5px;
        border: none;
        border-radius: 10px;
        font-size: 16px;
    }

    select, input[type="text"] {
        width: 80%;
        max-width: 300px;
        background-color: #fff;
        color: #2e0854;
    }

    button {
      width: 150px;
      height: 100px;
      border-radius: 25px;
      background:rgb(210, 149, 248);
      backdrop-filter: blur(12px);
      box-shadow: 0 0 20px rgba(44, 41, 41, 0.2);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      font-size: 1rem;
      font-weight: bold;
      color: white;
      text-decoration: none;
      transform: scale(1);
      transition: transform 0.4s ease, box-shadow 0.4s ease;
    }

    button:hover {
        background-color: #e6c6fa;
        color: #2e0854;
        transform: scale(1.05);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background: #fff;
        color: #2e0854;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0,0,0,0.2);
    }

    table, th, td {
        border: 1px solid #ddd;
    }

    th {
        background-color: #2e0854;
        color: #fff;
    }

    td {
        background-color: #f9f9f9;
        color: #2e0854;
    }

    tr:nth-child(even) td {
        background-color: #f0e6fc;
    }

    tr:hover td {
        background-color: #e6c6fa;
    }
    .top-section {
      background: #2e0854;
      height: 250px;
      width: 100%;
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

    @media (max-width: 600px) {
        h1 {
            font-size: 28px;
        }
        button, select, input[type="text"] {
            font-size: 14px;
            padding: 8px;
            color:#e6c6fa;
        }
    }
    .actions {
        max-width: 800px;
        margin: 30px auto;
        background: linear-gradient(45deg,rgb(102, 48, 157), #e6c6fa, rgb(122, 66, 179));
        backdrop-filter: blur(40px);
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(6, 6, 6, 0.1);
        font-family: 'Segoe UI', sans-serif;
    }

    form {
        margin-bottom: 30px;
    }

    select, input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-top: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 16px;
    }

    button {
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 8px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    table th, table td {
        padding: 12px 15px;
        border-bottom: 1px solid #ddd;
        text-align: left;
    }

    table th {
        background-color:rgb(210, 149, 248);
        color: white;
    }

    table tr:hover {
        background-color: #f1f1f1;
    }

    .form-title {
        font-weight: bold;
        font-size: 18px;
        color: #003366;
        margin-bottom: 10px;
    }

  </style>
</head>
<body>

  </div>

  <div class="container">
    <h1>👨‍🏫 Teacher Panel</h1>
    <form method="post" action="">
      <button name="add">Add Question</button>
      <button name="view">View Question</button>
      <button name="delete_ques">Delete Question</button>
      <button name="delete_class">Delete Class</button>
      <button name="view_student">View Student</button>
      <button name="view_student_answer">View Student Answer</button>
    </form>
    
</div>
<div class="actions">
<?php
    if (isset($_POST['add'])) 
    {
        echo '<form method="post">
            <select name="class">
                <option value="VI">6th</option>
                <option value="VII">7th</option>
                <option value="VIII">8th</option>
                <option value="IX">9th</option>
                <option value="X">10th</option>
                <option value="XI">11th</option>
                <option value="XII">12th</option>
            </select>
             <input type="text" name="question" id="question" placeholder="Enter Question" required><br><br>
                <input type="text" name="options" id="options" placeholder="Enter Options (Comma-Separated)" required><br><br>
            <button name="addbtn">Add Question</button>
        </form>';
    }
    if (isset($_POST['addbtn'])) 
    {      
      $class = $_POST['class'];  
      $question = $_POST['question']; 
      $options = explode(',', $_POST['options']);
               $q2="insert into questions (question_text, class)values('$question', '$class');";
               $res2=mysqli_query($conn,$q2);
                if($res2)
                {
                  $questionid = mysqli_insert_id($conn); 
                  foreach ($options as $option) 
                  {
                      $option = trim($option); 
                      $insertOption = "INSERT INTO question_options (class,question_id, option_text) VALUES ('$class','$questionid', '$option')";
                      mysqli_query($conn, $insertOption);
                  }
                  echo'<script>alert("Added successfully")</script>';
                }
    }
    if (isset($_POST['view'])) 
    {
        echo '<form method="post">
            <select name="class">
                <option value="VI">6th</option>
                <option value="VII">7th</option>
                <option value="VIII">8th</option>
                <option value="IX">9th</option>
                <option value="X">10th</option>
                <option value="XI">11th</option>
                <option value="XII">12th</option>
            </select>
            <button name="viewbtn">View Question</button>
        </form>';
    }
    if (isset($_POST['viewbtn'])) 
    {
    $class = $_POST['class'];  
    $q1 = "SELECT q.class, q.question_id, q.question_text, GROUP_CONCAT(DISTINCT o.option_text SEPARATOR ', ') AS options 
           FROM questions q JOIN question_options o ON q.question_id = o.question_id WHERE q.class = '$class' GROUP BY q.class, q.question_id, q.question_text;";
    $res1 = mysqli_query($conn, $q1);

    if ($res1) 
    { 
        ?>
        <table border="1">
            <tr>
                <th>Question_Id</th>
                <th>Class</th>
                <th>Questions</th>
                <th>Options</th>
            </tr>
            <?php 
            while ($row = mysqli_fetch_assoc($res1)) 
            { 
                ?>
                <tr>
                <td><?php echo htmlspecialchars($row['question_id']); ?></td>
                    <td><?php echo htmlspecialchars($row['class']); ?></td>
                    <td><?php echo htmlspecialchars($row['question_text'] ?? 'No question available'); ?></td>
                    <td><?php echo htmlspecialchars($row['options'] ?? 'No options available'); ?></td>
                </tr>
                <?php 
            } 
            ?>
        </table>
        <?php 
    } 
    else 
    {
        echo "Query failed: " . mysqli_error($conn);
    }
}
if (isset($_POST['delete_ques'])) 
{
    echo '<form method="post">
             <input type="text" name="ques_id" id="question_id" placeholder="Enter Question ID" required><br><br>
        <button name="del_ques">Delete Question</button>
    </form>';
}
if (isset($_POST['del_ques'])) 
{        
            $ques_id = $_POST['ques_id']; 
           $q2="delete from questions where question_id='$ques_id';";
           $res2=mysqli_query($conn,$q2);
            if($res2)
            {  
                $deleteOption = "delete from question_options where question_id='$ques_id';";
                mysqli_query($conn, $deleteOption);
                echo'<script>alert("Deleted successfully")</script>';
            }
}

if (isset($_POST['delete_class'])) 
{
    echo '<form method="post">
             <select name="class">
                <option value="VI">6th</option>
                <option value="VII">7th</option>
                <option value="VIII">8th</option>
                <option value="IX">9th</option>
                <option value="X">10th</option>
                <option value="XI">11th</option>
                <option value="XII">12th</option>
            </select>
            <button name="del_class">Delete Class</button>
    </form>';
}
if (isset($_POST['del_class'])) 
{        
            $class = $_POST['class']; 
           $q2="delete from questions where class='$class';";
           $res2=mysqli_query($conn,$q2);
            if($res2)
            {  
                $deleteOption = "delete from question_options where class='$class';";
                mysqli_query($conn, $deleteOption);
                echo'<script>alert("Deleted successfully")</script>';
            }
}
if (isset($_POST['view_student'])) 
    {
        echo '<form method="post">
            <select name="class">
                <option value="VI">6th</option>
                <option value="VII">7th</option>
                <option value="VIII">8th</option>
                <option value="IX">9th</option>
                <option value="X">10th</option>
                <option value="XI">11th</option>
                <option value="XII">12th</option>
            </select>
            <button name="viewstudentbtn">View</button>
        </form>';
    }
    if (isset($_POST['viewstudentbtn'])) 
    {
    $class = $_POST['class'];  
    $q1 = "SELECT * FROM student WHERE class = '$class';";
    $res1 = mysqli_query($conn, $q1);

    if ($res1) 
    { 
        ?>
        <table border="1">
            <tr>
                <th>Register No</th>
                <th>Name</th>
                <th>Class</th>
                <th>Section</th>
            </tr>
            <?php 
            while ($row = mysqli_fetch_assoc($res1)) 
            { 
                ?>
                <tr>
                <td><?php echo htmlspecialchars($row['reg_no']); ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['class']); ?></td>
                    <td><?php echo htmlspecialchars($row['section']); ?></td>
                </tr>
                <?php 
            } 
            ?>
        </table>
        <?php 
    } 
    else 
    {
        echo "Query failed: " . mysqli_error($conn);
    }
}

if (isset($_POST['view_student_answer'])) 
    {
        echo '<form method="post">
            <select name="class">
                <option value="VI">6th</option>
                <option value="VII">7th</option>
                <option value="VIII">8th</option>
                <option value="IX">9th</option>
                <option value="X">10th</option>
                <option value="XI">11th</option>
                <option value="XII">12th</option>
            </select>
             <input type="text" name="reg_no"  placeholder="Enter Register No" required><br><br>
            <button name="viewstudentanswer">Add Question</button>
        </form>';
    }
    if (isset($_POST['viewstudentanswer'])) 
    {
    $class = $_POST['class'];  
    $reg_no = $_POST['reg_no'];  
    $q1 = "SELECT * FROM student_answer WHERE class = '$class' and reg_no='$reg_no';";
    $res1 = mysqli_query($conn, $q1);

    if ($res1) 
    { 
        ?>
        <table border="1">
            <tr>
                <th>Question</th>
                <th>Answer</th>
            </tr>
            <?php 
            while ($row = mysqli_fetch_assoc($res1)) 
            { 
                ?>
                <tr>
                <td><?php echo htmlspecialchars($row['question']); ?></td>
                    <td><?php echo htmlspecialchars($row['answer']); ?></td>
                </tr>
                <?php 
            } 
            ?>
        </table>
        <?php 
    } 
    else 
    {
        echo "Query failed: " . mysqli_error($conn);
    }
}
    ?>
</div>

</body>
</html>