
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timetable App</title>
    <link rel="stylesheet" href="style.css">
     <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="container">
        <div id="loginPage">
            <h2>Login</h2>
            <form id="loginForm">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                  <i class='bx bxs-user'></i>
                <br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                  <i class='bx bxs-lock-alt'></i>
                <br>
                <button type="submit">Login</button>
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
