<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    # FIX: Replace this email with recipient email
    $mail_to = "demo@gmail.com";

    # Sender Data
    $subject = trim((string) $_POST["subject"]);
    $name    = str_replace(["\r", "\n"], [" ", " "], strip_tags(trim((string) $_POST["name"])));
    $email   = filter_var(trim((string) $_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone   = trim((string) $_POST["phone"]);
    $message = trim((string) $_POST["message"]);

    if (empty($name) or !filter_var($email, FILTER_VALIDATE_EMAIL) or empty($phone) or empty($subject) or empty($message)) {
        # Set a 400 (bad request) response code and exit.
        http_response_code(400);
        echo "Please complete the form and try again.";
        exit;
    }

    # Mail Content
    $content = "Name: $name\n";
    $content .= "Email: $email\n\n";
    $content .= "Phone: $phone\n";
    $content .= "Message:\n$message\n";

    # email headers.
    $headers = "From: $name <$email>";

    # Send the email.
    $success = mail($mail_to, $subject, $content, $headers);
    if ($success) {
        # Set a 200 (okay) response code.
        http_response_code(200);
        echo "Thank You! Your message has been sent.";
    } else {
        # Set a 500 (internal server error) response code.
        http_response_code(500);
        echo "Oops! Something went wrong, we couldn't send your message.";
    }
} else {
    # Not a POST request, set a 403 (forbidden) response code.
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}

?>
