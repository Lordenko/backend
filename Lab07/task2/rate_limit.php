<?php
$logFile = 'requests.log';
$ip = $_SERVER['REMOTE_ADDR'];
$time = time();
$limit = 5;
$window = 60;

$requests = [];
if (file_exists($logFile)) {
    $lines = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        [$logIp, $logTime] = explode(',', $line);
        $logTime = (int)$logTime;

        if ($time - $logTime < $window) {
            $requests[] = [$logIp, $logTime];
        }
    }
}

$userRequests = array_filter($requests, function ($req) use ($ip) {
    return $req[0] === $ip;
});

if (count($userRequests) >= $limit) {
    http_response_code(429);
    header('Retry-After: 60');
    echo "<h1>429 Too Many Requests</h1>";
    echo "<p>Please try again in a minute.</p>";
    exit;
}

$requests[] = [$ip, $time];

$logLines = array_map(fn($r) => $r[0] . ',' . $r[1], $requests);
file_put_contents($logFile, implode(PHP_EOL, $logLines) . PHP_EOL);

http_response_code(200);
echo "<h1>Welcome!</h1>";
echo "<p>You are within the allowed rate limit.</p>";
