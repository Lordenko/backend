<?php
ob_start();

register_shutdown_function(function () {
    $error = error_get_last();

    if ($error && in_array($error['type'], [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR])) {
        ob_clean();
        http_response_code(500);

        echo "<h1>500 Internal Server Error</h1>";
        echo "<p>Oops! Something went wrong on our side.</p>";
        echo "<p>Please come back after <strong>" . date('H:i', strtotime('+10 minutes')) . "</strong>.</p>";
        exit;
    } else {
        http_response_code(200);
    }
});

//echo "Hello, world!";

non_existing_function();

ob_end_flush();
