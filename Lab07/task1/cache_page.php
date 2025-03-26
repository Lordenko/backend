<?php
$cacheFile = 'cache.html';

$statusCode = 200;


if (file_exists($cacheFile) && $statusCode != 404) {
    header('X-Cache: HIT');
    readfile($cacheFile);
    exit;
}

ob_start();


http_response_code($statusCode);

if ($statusCode === 200) {
    echo "<h1>Welcome to the cached page!</h1>";
    echo "<p>This content will be cached and reused.</p>";
} else {
    echo "<h1>404 Not Found</h1>";
    echo "<p>The page you requested was not found.</p>";
}

$content = ob_get_contents();
ob_end_flush();

if ($statusCode === 200) {
    file_put_contents($cacheFile, $content);
} elseif ($statusCode === 404 && file_exists($cacheFile)) {
    unlink($cacheFile);
}
