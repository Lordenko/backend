<?php
ob_start();

$redirectsPath = __DIR__ . "/redirects.json";
if (!file_exists($redirectsPath)) {
    http_response_code(500);
    exit("<h1>500 Internal Server Error</h1><p>redirects.json not found</p>");
}

$redirects = json_decode(file_get_contents($redirectsPath), true);

$fullUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$scriptPath = $_SERVER['SCRIPT_NAME'];
$virtualPath = substr($fullUri, strlen($scriptPath));
$virtualPath = '/' . ltrim($virtualPath, '/');

if (isset($redirects[$virtualPath])) {
    $target = $redirects[$virtualPath];

    if ($target === "/404") {
        http_response_code(404);
        echo "<h1>404 Not Found</h1>";
        echo "<p>The page you requested was removed or no longer exists.</p>";
    } else {
        header("Location: $target", true, 301);
        exit;
    }
} else {
    http_response_code(200);
    echo "<h1>Welcome to the current page: $virtualPath</h1>";
}

ob_end_flush();
