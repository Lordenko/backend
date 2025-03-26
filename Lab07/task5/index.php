<?php
require_once 'Response.php';

$response = new Response();
$response->setStatus(303);
$response->addHeader("Content-Type: text/html");
$response->addHeader("X-Powered-By: ❤️ PHP + Response Class");
$response->send("<h1>Вітаємо!</h1><p>Це динамічна відповідь.</p>");
