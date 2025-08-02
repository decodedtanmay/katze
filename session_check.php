<?php
session_start();
header('Content-Type: application/json');

// Log all session data
error_log("Session data: " . print_r($_SESSION, true));

echo json_encode([
    'session_exists' => isset($_SESSION) && !empty($_SESSION),
    'user_id_exists' => isset($_SESSION['user_id']),
    'user_id' => isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null,
    'username_exists' => isset($_SESSION['username']),
    'username' => isset($_SESSION['username']) ? $_SESSION['username'] : null,
    'all_session_keys' => array_keys($_SESSION)
]);
?>