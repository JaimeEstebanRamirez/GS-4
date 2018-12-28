<?php 
// Base URL of the application
$baseURL = (isset($_SERVER["HTTPS"]) ? "https://" : "http://").$_SERVER["HTTP_HOST"];
$baseURL .= str_replace(basename($_SERVER["SCRIPT_NAME"]), "", $_SERVER["SCRIPT_NAME"]);
define('BASE_URL', $baseURL);

// Email configuration
define('SENDER_NAME', 'GroupSwitzerland');
define('SENDER_EMAIL', 'noreply.groupswitzerland@gmail.com');

define('SMTP', TRUE);
define('SMTP_HOST', 'smtp.sendgrid.net');
define('SMTP_USERNAME', 'azure_0771731fdc839604c916a733e6b31e45@azure.com');
define('SMTP_PASSWORD', '@Italy2018');
define('SMTP_PORT', 587);
define('SMTP_SECURE', 'tls');