<?php
include '../connection/connection.php';
session_start();
$id = $_SESSION['ID'];

if(!isset($_SESSION['ID'])){
  header("Location: ../index.php");
  exit();
}

$level = isset($_GET['level']) ? (int)$_GET['level'] : 1;
$tasks = [
  1 => "<!DOCTYPE html>
<html>
<head>
  <title>Document</title>
</head>
<body>
  <p>Hello, world!
</body>
</html>",

  2 => "<!DOCTYPE html>
<html>
<head>
  <title>Document</title>
</head>
<body>
  <div><span>Text here
</body>
</html>",

  3 => "<!DOCTYPE html>
<html>
<head>
  <title>Document</title>
</head>
<body>
  <h1>Title
</body>
</html>",

  4 => "<!DOCTYPE html>
<html>
<head>
  <title>Document</title>
</head>
<body>
  <ul>
      <li>Item 1
      <li>Item 2
  
</body>
</html>",

  5 => "<!DOCTYPE html>
<html>
<head>
  <title>Document</title>
</head>
<body>
  <table>
      <tr>
          <td>Data
      
  
</body>
</html>",

  6 => "<!DOCTYPE html>
<html>
<head>
  <title>Document</title>
</head>
<body>
  <a href='#'>Link
</body>
</html>",

  7 => "<!DOCTYPE html>
<html>
<head>
  <title>Document</title>
</head>
<body>
  <strong>Bold text
</body>
</html>",

  8 => "<!DOCTYPE html>
<html>
<head>
  <title>Document</title>
</head>
<body>
  <em>Italic text
</body>
</html>",

  9 => "<!DOCTYPE html>
<html>
<head>
  <title>Document</title>
</head>
<body>
  <section>Content
</body>
</html>",

  10 => "<!DOCTYPE html>
<html>
<head>
  <title>Document</title>
</head>
<body>
  <blockquote>Quote
</body>
</html>",

  11 => "<!DOCTYPE html>
<html>
<head>
  <title>Document</title>
</head>
<body>
  <form>
      <input type='text'>
  
</body>
</html>",

  12 => "<!DOCTYPE html>
<html>
<head>
  <title>Document</title>
</head>
<body>
  <article>News
</body>
</html>",

  13 => "<!DOCTYPE html>
<html>
<head>
  <title>Page Title

<body>
</body>
</html>",

  14 => "<!DOCTYPE html>
<html>
<head>
  <title>Document</title>
  <style>.class { color: red; }
</head>
<body>
</body>
</html>",

  15 => "<!DOCTYPE html>
<html>
<head>
  <title>Document</title>
  <script>console.log('Hello');
</head>
<body>
</body>
</html>"
];


$task = $tasks[$level] ?? 'Invalid Level';
$correct_answers = [
    1 => "</p>",
    2 => "</span></div>",
    3 => "</h1>",
    4 => "</li></ul>",
    5 => "</td></tr></table>",
    6 => "</a>",
    7 => "</strong>",
    8 => "</em>",
    9 => "</section>",
    10 => "</blockquote>",
    11 => "</form>",
    12 => "</article>",
    13 => "</title></head>",
    14 => "</style>",
    15 => "</script>"
];

$message = '';
$user_output = '';
$popup_class = '';
$next_level = $level;
$popup_text = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $user_input = trim($_POST['end_tags']);
  if ($user_input === $correct_answers[$level]) {
      $popup_class = 'popup-correct';
      $popup_text = '+1';
      $next_level = $level + 1;
      echo "<script>
          setTimeout(() => {
              window.location.href = 'levels.php?level=$next_level';
          }, 1500);
      </script>";
  } else {
      $popup_class = 'popup-incorrect';
      $popup_text = '-1';
  }
  $user_output = $task . ($user_input === $correct_answers[$level] ? $correct_answers[$level] : '');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <title>CoDev</title>
</head>
<body>
  <div class="game-container">
    <div class="level-title">
  <h2>Level <?php echo $level; ?></h2>
  </div>
    <div class="top-bar">
      <div class="hint-btn"></div>
      <div class="leave-btn"></div>
    </div>

    <div class="task-output-container">
  
  <!-- Task Panel Box -->
  <div class="task-panel">
      <p>Instruction: Insert the correct end tags for this HTML document:</p>
      <pre><?php echo htmlspecialchars($task); ?></pre>
      <form method="POST">
        <input type="text" name="end_tags" placeholder="Enter missing end tags" required>
        <button class="submit-btn" type="submit">Turn in</button>
      </form>
    </div>

  <!-- Output Container (Stacked Expected Output & Output Box) -->
  <div class="output-container">
    
          <!-- Lives -->
           <div class="lives">
            <!-- <img src="../img/0-lives.png" alt="lives Icon" class="lives-icon"> -->
            <img src="../img/1-lives.png" alt="lives Icon" class="lives-icon">
            <!-- <img src="../img/2-lives.png" alt="lives Icon" class="lives-icon">
            <img src="../img/3-lives.png" alt="lives Icon" class="lives-icon">
            <img src="../img/4-lives.png" alt="lives Icon" class="lives-icon">
            <img src="../img/5-lives.png" alt="lives Icon" class="lives-icon"> -->
            </div>
          <!-- Expected Output Box -->
          <div class="expected-output-box">
            <strong>Expected Output:</strong>
            <p><?php echo strip_tags($task . $correct_answers[$level]); ?></p>
          </div>
          
          <!-- Output Box -->
          <div class="output-box">
            <strong>Output:</strong>
            <p><?php echo strip_tags($user_output); ?></p>
          </div>

  </div>

</div>
<?php if ($popup_class): ?>
    <div class="popup <?php echo $popup_class; ?>"><?php echo $popup_text; ?></div>
<?php endif; ?>
</body>
</html>
