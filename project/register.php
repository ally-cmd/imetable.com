<?php
// Database connection details (modify as per your database setup)
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "your_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables to store input data and error messages
$username = $email = $password = $confirm_password = "";
$errors = [];

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate username
    if (empty(trim($_POST["username"]))) {
        $errors[] = "Please enter a username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Sanitize and validate email
    if (empty(trim($_POST["email"]))) {
        $errors[] = "Please enter an email address.";
    } else {
        $email = trim($_POST["email"]);
        // Check if email is valid format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format.";
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $errors[] = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $errors[] = "Password must have at least 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $errors[] = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if ($password != $confirm_password) {
            $errors[] = "Passwords do not match.";
        }
    }

    // If no errors, insert user data into database
    if (empty($errors)) {
        // Prepare SQL statement for insertion
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sss", $param_username, $param_email, $param_password);

            // Set parameters
            $param_username = $username;
            $param_email = $email;
            // Hash the password before storing in database
            $param_password = password_hash($password, PASSWORD_DEFAULT);

            // Execute the prepared statement
            if ($stmt->execute()) {
                // Redirect to login page after successful registration
                header("location: login.php");
                exit();
            } else {
                $errors[] = "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    
    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 400px; margin: 50px auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
        input[type=text], input[type=email], input[type=password] { width: 100%; padding: 10px; margin: 5px 0 20px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0;
