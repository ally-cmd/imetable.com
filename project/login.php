<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define hardcoded credentials (in a real scenario, these should be stored securely, not hardcoded)
    $valid_username = "user123";
    $valid_password = "password123";

    // Retrieve user inputs from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username and password match the hardcoded credentials
    if ($username === $valid_username && $password === $valid_password) {
        // Authentication successful
        // Start a session to persist login state
        session_start();
        $_SESSION['username'] = $username; // Store username in session variable
        // Redirect to a secured page
        header("Location: welcome.php");
        exit;
    } else {
        // Authentication failed
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 400px; margin: 50px auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
        input[type=text], input[type=password] { width: 100%; padding: 10px; margin: 5px 0 20px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer; width: 100%; }
        button:hover { background-color: #45a049; }
        .error { color: red; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php if (isset($error)) { ?>
            <p class="error"><?php echo $error; ?></p>
        <?php } ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
