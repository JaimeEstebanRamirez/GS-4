<?php 
// Base URL of the application
$baseURL = (isset($_SERVER["HTTPS"]) ? "https://" : "http://").$_SERVER["HTTP_HOST"];
$baseURL .= str_replace(basename($_SERVER["SCRIPT_NAME"]), "", $_SERVER["SCRIPT_NAME"]);
define('BASE_URL', $baseURL);

// Email configuration
define('SENDER_NAME', 'GroupSwitzerland');
define('SENDER_EMAIL', 'noreply.groupswitzerland@gmail.com');

define('SMTP', TRUE);
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_USERNAME', 'noreply.groupswitzerland@gmail.com');
define('SMTP_PASSWORD', '@Camerino2018');
define('SMTP_PORT', 587);
define('SMTP_SECURE', 'tls');