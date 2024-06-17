<?php
// Assuming this script receives data via POST method from a form

// Example: Handling form data submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize data from the form
    $username = htmlspecialchars($_POST['username']); // Example: Sanitize input
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Example: Validate input (basic validation)
    $errors = [];
    if (empty($username)) {
        $errors[] = "Username is required";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email address is required";
    }
    if (empty($message)) {
        $errors[] = "Message is required";
    }

    // If there are validation errors, respond with errors
    if (!empty($errors)) {
        $response = [
            'status' => 'error',
            'message' => 'Validation errors',
            'errors' => $errors
        ];
    } else {
        // Process data (example: save to database or send an email)
        // In a real application, you might save data to a database or send an email here

        // Example response if data processing is successful
        $response = [
            'status' => 'success',
            'message' => 'Data processed successfully'
        ];
    }

    // Respond with JSON
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
} else {
    // Handle other HTTP methods if needed
    http_response_code(405); // Method Not A
