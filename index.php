 <?php
  include("connection.php");
  ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timetable App</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="Form">
        <div id="login Form">
            <h2>Login Form</h2>
            <form name="Form" action="login.php" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <br>
                <input type="submit" id="btn" value="login" name="sbmit" />
            </form>
            <button id="udsmBtn">Visit UDSM Website</button>
        </div>
        <div id="timetablePage" style="display: none;">
            <header>
                <h1>Timetable</h1>
                <button id="homeBtn">Home</button>
                <button id="changeSubjectCodeBtn">Change Subject Code</button>
            </header>
            <main id="timetableContent">
                <!-- Timetable will be displayed here -->
            </main>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
