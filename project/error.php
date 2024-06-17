<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Page</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: 50px auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
        h2 { color: #ff6347; }
        p { margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Error Occurred</h2>
        <?php
        // Check if error message is passed as a query parameter
        if (isset($_GET['message'])) {
            $error_message = htmlspecialchars($_GET['message']);
            echo "<p>Error Message: $error_message</p>";
        } else {
            echo "<p>An unspecified error occurred.</p>";
        }
        ?>
        <p>Please try again later or contact support if the problem persists.</p>
    </div>
</body>
</html>
